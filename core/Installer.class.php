<?php

class Installer
{

	public static function testConnectionBDD($infosBDD)
    {
        error_reporting(0);

        if(empty($infosBDD['portBDD'])){
            $infosBDD['portBDD'] = 3306;
        }

        try {
            $testConnexion = new PDO('mysql:host='.$infosBDD['pathBDD'].';port='.$infosBDD['portBDD'].';charset=UTF8',$infosBDD['userBDD'],$infosBDD['pwdBDD']);
        } catch(PDOException $e) {
            return false;
        }
        return true;
    }

    public function setParameterFile($infosBDD)
    {
        if(empty($infosBDD['portBDD'])){
            $infosBDD['portBDD'] = 3306;
        }
        
        $infosBDD['nameBDD'] = "cms_escape";

        if($file = fopen("conf.inc.php", 'w')){
            fputs($file, '<?php'.PHP_EOL);
            fputs($file, '	define(\'DBUSER\', \''.$infosBDD['userBDD'].'\');'.PHP_EOL);
            fputs($file, '	define(\'DBPWD\', \''.$infosBDD['pwdBDD'].'\');'.PHP_EOL);
            fputs($file, '	define(\'DBHOST\', \''.$infosBDD['pathBDD'].'\');'.PHP_EOL);
            fputs($file, '	define(\'DBNAME\', \''.$infosBDD['nameBDD'].'\');'.PHP_EOL);
            fputs($file, '	define(\'DBPORT\', \''.$infosBDD['portBDD'].'\');'.PHP_EOL);
            fclose($file);

            $v = new View('newUserBDD', 'installer');
        }
        echo 'failed';die;
    }

    public function setConfiguration($infosBDD)
    {
    	if(!file_exists("../baseToImportFinal.sql")){
	    	try {
	            $bdd = new PDO('mysql:host='.DBHOST.';charset=UTF8',DBUSER,DBPWD);
	        } catch(PDOException $e) {
	            return ['SQL' => 'Failed to access at the database'];;
	        }
	        $bdd->query(file_get_contents("../baseToImportFinal.sql"));
	        $user = new User();
	        $user->setId($infosBDD['id']);
	        $user->setFirstname($infosBDD['firstname']);
	        $user->setLastname($infosBDD['lastname']);
	        $user->setYearsOld($infosBDD['years_old']);
	        $user->setEmail($infosBDD['email']);
	        $user->setPhone($infosBDD['phone']);
	        $user->setAddress($infosBDD['address']);
	        $user->setAddress2($infosBDD['address_2']);
	        $user->setZipcode($infosBDD['zipcode']);
	        $user->setCity($infosBDD['city']);
	        $user->save();
	    }
	}
}