<?php

//Défini les caractères de chemin relatif
define("DS", "/");

$scriptName = (dirname($_SERVER["SCRIPT_NAME"])=="/")?"":dirname($_SERVER["SCRIPT_NAME"]);
define("DIRNAME", $scriptName.DS);