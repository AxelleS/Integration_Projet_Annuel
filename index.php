<?php
session_start();
require "conf.inc.php";

function myAutoloader($class){
    $class = $class.".class.php";
    if(file_exists("core/".$class)){
        include "core/".$class;
    } elseif(file_exists("models/".$class)){
        include "models/".$class;
    }
}

spl_autoload_register('myAutoloader');

//Récupère l'url
$uri = $_SERVER["REQUEST_URI"];
$uri = explode("?", $uri);
$uri = str_ireplace(DIRNAME, "", urldecode($uri[0]));
//$uri -> controller/action
$uriExploded = explode(DS, $uri);

//condition ternaire pour affecter la chaine "index"
$c = (empty($uriExploded[0])) ? "index" : $uriExploded[0];
$a = (empty($uriExploded[1])) ? "index" : $uriExploded[1];

//Supprime les deux premières case du tableau
unset($uriExploded[0]);
unset($uriExploded[1]);

// Controller : NameController
$c = ucfirst(strtolower($c)) . "Controller";
// Action : nameAction
$a = strtolower($a) . "Action";

//Récupère les paramètre POST GET et URL en fonction de l'url
$params = ["POST" => $_POST, "GET" => $_GET, "URL" => array_values($uriExploded)];

//Est-ce que le controller existe
if (file_exists("controllers/" . $c . ".class.php")) {
    include "controllers/" . $c . ".class.php";
    //Est-ce que la class existe
    if (class_exists($c)) {
        $objC = new $c();
        //Vérifie si la méthode existe
        if (method_exists($objC, $a)) {
            $objC->$a($params);
        } else {
            die("L'action " . $a . " n'existe pas");
        }
    } else {
        die("La classe " . $c . " n'existe pas");
    }
} else {
    die("le controller " . $c . " n'existe pas");
}
