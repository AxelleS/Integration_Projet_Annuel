<?php

class Installer
{

	public function testConnectionBDD($arrayData)
    {
        try {
            $testConnexion = new PDO('mysql:host='.$arrayData['dbhost'].';charset=UTF8',$arrayData['dbuser'],$arrayData['dbpwd']);
        } catch(PDOException $e) {
            return 0;
        }
        return 1;
    }

    public function setParameterFile($arrayData)
    {
        CoreFile::testAppDirectory('config');
        if(empty($arrayData['dbport'])){
            $arrayData['dbport'] = 3306;
        }
        if(empty($arrayData['dbname'])){
            $arrayData['dbname'] = "tosle_database";
        }
        if($file = fopen("App/config/parameter.php", 'w')){
            fputs($file, '<?php'.PHP_EOL);
            fputs($file, '	define(\'DBUSER\', \''.$arrayData['dbuser'].'\');'.PHP_EOL);
            fputs($file, '	define(\'DBPWD\', \''.$arrayData['dbpwd'].'\');'.PHP_EOL);
            fputs($file, '	define(\'DBHOST\', \''.$arrayData['dbhost'].'\');'.PHP_EOL);
            fputs($file, '	define(\'DBNAME\', \''.$arrayData['dbname'].'\');'.PHP_EOL);
            fputs($file, '	define(\'DBPORT\', \''.$arrayData['dbport'].'\');'.PHP_EOL);
            fclose($file);
            return 1;
        }
        return 0;
    }

    public static function checkDatabaseConnexion()
    {
        try {
            $database = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME.";charset=UTF8",DBUSER,DBPWD);
            return 1;
        } catch(Exception $e){
            return 0;
        }
    }

    public function setConfiguration($arrayData)
    {
    	if(!file_exists("../baseToImportFinal.sql")){
	    	try {
	            $bdd = new PDO('mysql:host='.DBHOST.';charset=UTF8',DBUSER,DBPWD);
	        } catch(PDOException $e) {
	            return ['SQL' => 'Failed to access at the database'];;
	        }
	        $bdd->query(file_get_contents("../baseToImportFinal.sql"));
	        $user = new User();
	        $user->setId($arrayData['id']);
	        $user->setFirstname($arrayData['firstname']);
	        $user->setLastname($arrayData['lastname']);
	        $user->setYearsOld($arrayData['years_old']);
	        $user->setEmail($arrayData['email']);
	        $user->setPhone($arrayData['phone']);
	        $user->setAddress($arrayData['address']);
	        $user->setAddress2($arrayData['address_2']);
	        $user->setZipcode($arrayData['zipcode']);
	        $user->setCity($arrayData['city']);
	        $user->save();
	    }
	}
}