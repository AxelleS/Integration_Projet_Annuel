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
            $testconnection = new PDO('mysql:host='.$infosBDD['pathBDD'].';port='.$infosBDD['portBDD'].';charset=UTF8',$infosBDD['userBDD'],$infosBDD['pwdBDD']);
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
            fputs($file, '	define("DBUSER", "'.$infosBDD['userBDD'].'");'.PHP_EOL);
            fputs($file, '	define("DBPWD", "'.$infosBDD['pwdBDD'].'");'.PHP_EOL);
            fputs($file, '	define("DBHOST", "'.$infosBDD['pathBDD'].'");'.PHP_EOL);
            fputs($file, '	define("DBNAME", "'.$infosBDD['nameBDD'].'");'.PHP_EOL);
            fputs($file, '	define("DBPORT", "'.$infosBDD['portBDD'].'");'.PHP_EOL);
            fclose($file);

            $_SESSION['install_finish'] = false;

            include 'conf.inc.php';
            $pdo = new PDO('mysql:host='.DBHOST.';charset=UTF8',DBUSER,DBPWD);
            $pdo->query("CREATE DATABASE ".DBNAME."");

            $user = new User();

            $config = $user->configFormUserInstaller([]);
            $v = new View('newUserBDD','installer');
            $v->assign('config',$config);
        }
    }

    public function setConfiguration($userInfo)
    {
        echo DIRNAME."sql/baseToImportFinal.sql";
        echo '<br>';
        echo "sql/baseToImportFinal.sql";
    	if(file_exists("sql/baseToImportFinal.sql")){
            $pdo = new PDO('mysql:host='.DBHOST.';port='.DBPORT.'dbname='.DBNAME,DBUSER,DBPWD);
            $pdo->query(file_get_contents("sql/baseToImportFinal.sql"));

            $user = new User();

            $char = 'abcdefghijklmnopqrstuvwxyz0123456789';
            $token = str_shuffle($char);
            $token = substr($token, 0, 11);

            $user->setToken($token);

            $user->setFirstname($userInfo['firstname']);
            $user->setLastname($userInfo['lastname']);
            $user->setYearsOld($userInfo['years_old']);
            $user->setEmail($userInfo['email']);
            $user->setPhone($userInfo['phone']);
            $user->setAddress($userInfo['address']);
            $user->setAddress2($userInfo['address_2']);
            $user->setZipcode($userInfo['zipcode']);
            $user->setCity($userInfo['city']);
            $user->setPassword($userInfo['password']);
            $user->setStatus(2);
            $user->setType(1);
            $user->save();

            $_SESSION['install_finish'] = true;

            header("Location: ".DIRNAME.Route::getSlug('index','index'));
    	}
    	die;
	}
}