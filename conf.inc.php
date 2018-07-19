<?php

//Paramètres de la BDD
//user
define("DBUSER", "root");
//mot de passe
define("DBPWD", "root");
//host
define("DBHOST", "localhost");
//nom BDD
define("DBNAME", "cms_escape");
//port BDD
define("DBPORT", "3306");

//Constante status room
define("ACTIF", 1);
define("INACTIF", 2);
define("SUPPRIME", 3);

//Paramètres mails
//host STMP (gmail)
define("MAIL_HOST", "smtp.gmail.com");
//port SMTP (gmail)
define("MAIL_PORT", 465);
//user gmail
define("MAIL_USER", "3iw2.groupe7@gmail.com");
//pwd gmail
define("MAIL_PWD", "CMSPROJECT");

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
