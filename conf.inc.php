<?php

//Paramètres de la BDD
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

//Paramètres pour les fichiers
//Repertoire d'upload
define('TARGET', 'files/');
//Taille max en octets
define('MAX_SIZE', 10000000);
//Largeur max de l'image en pixels
define('WIDTH_MAX', 800);
//Hauteur max de l'image en pixels
define('HEIGHT_MAX', 800);

//Défini les caractères de chemin relatif
define("DS", "/");

$scriptName = (dirname($_SERVER["SCRIPT_NAME"])=="/")?"":dirname($_SERVER["SCRIPT_NAME"]);
define("DIRNAME", $scriptName.DS);
