<?php

try
{
    $pdo = new PDO("mysql:host=127.0.0.1;dbname=cms_escape", "root", "");
}
catch(Exception $e)
{
    die('Erreur SQL : '.$e->getMessage());
}

$datejour = $pdo->query("SELECT id FROM calendar WHERE date_calendar LIKE '".date('Y-m-d')."'")->fetch()['id'];

$reponse = $pdo->query("
    SELECT COUNT(time_slot.id) as nbGames
    FROM calendar
    LEFT JOIN time_slot ON calendar.id = time_slot.id_calendar
    WHERE calendar.id LIKE '".$datejour."'
    AND time_slot.id_user IS NOT NULL
");

$nbGames = $reponse->fetch()['nbGames'];

echo $nbGames;