<?php

//pramètres de la BDD
//user
define("DBUSER", "root");
//mot de passe
define("DBPSW", "root");
//host
define("DBHOST", "localhost");
//nom BDD
define("DBNAME", "projetannuel3iw2");
//port BDD
define("DBPORT", "3306");

//Défini les caractères de chemin relatif
define("DS", "/");

$scriptName = (dirname($_SERVER["SCRIPT_NAME"])=="/")?"":dirname($_SERVER["SCRIPT_NAME"]);
define("DIRNAME", $scriptName.DS);
