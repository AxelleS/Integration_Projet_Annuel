<?php

//pramètres de la BDD
//user
define("DBUSER", "root");
//mot de passe
define("DBPWD", "");
//host
define("DBHOST", "localhost");
//nom BDD
define("DBNAME", "cms_escape");
//port BDD
define("DBPORT", "3306");

//Défini les caractères de chemin relatif
define("DS", "/");

$scriptName = (dirname($_SERVER["SCRIPT_NAME"])=="/")?"":dirname($_SERVER["SCRIPT_NAME"]);
define("DIRNAME", $scriptName.DS);
