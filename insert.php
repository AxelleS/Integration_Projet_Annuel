<?php

try
{
    $pdo = new PDO("mysql:host=127.0.0.1;dbname=cms_escape", "root", "");
}
catch(Exception $e)
{
    die('Erreur SQL : '.$e->getMessage());
}

$day = 1;
$month = date('m');
$year = date('Y');

$nextday = date('Y-m-d', mktime(0,0,0,$month, $day, $year));

$pdo->query("TRUNCATE TABLE calendar");

while($nextday < ($year+1).'-12-31') {
    $nextday = date('Y-m-d', mktime(0,0,0,$month, $day, $year));
    $query = $pdo->prepare("INSERT INTO calendar (date_calendar) VALUE (:date_calendar)");
    $query->execute(
        array(
            ":date_calendar" => $nextday
        )
    );
    $day++;
}

$response_calendar = $pdo->query("SELECT * FROM calendar");

$pdo->query("TRUNCATE TABLE room");

for ($i=0;$i<3;$i++){
    $nameRoom = ['Escape the Library', 'Escape the Lab', 'Escape the School'];
    $query = $pdo->prepare("INSERT INTO room (name, description, url_video, capacity, is_pregnant, is_wheelchair, is_deaf) VALUE (:name, :description, :url_video, :capacity, :is_pregnant, :is_wheelchair, :is_deaf)");
    $query->execute(
        array(
            ":name" => $nameRoom[$i],
            ":description" => "@todo",
            ":url_video" => null,
            ":capacity" => 5,
            ":is_pregnant" => true,
            ":is_wheelchair" => true,
            ":is_deaf" => true
        )
    );
}

$slots = [
    '10h00-11h30',
    '12h00-13h30',
    '14h00-15h30',
    '16h00-17h30',
    '18h00-19h30',
    '20h00-21h30',
    '22h00-23h30'
];

$pdo->query("TRUNCATE TABLE time_slot");

while($donnees_calendar = $response_calendar->fetch()) {
    $response_room = $pdo->query("SELECT * FROM room");
    while($donnees_room = $response_room->fetch()) {
        foreach($slots as $slot) {
            $query = $pdo->prepare("INSERT INTO time_slot (id_calendar, id_room, id_user, time_slot, number_player, total_price, date_bill, opinion) VALUES (:id_calendar, :id_room, :id_user, :time_slot, :number_player, :total_price, :date_bill, :opinion)");
            $query->execute(
                array(
                    ":id_calendar" => $donnees_calendar['id'], 
                    ":id_room" => $donnees_room['id'], 
                    ":id_user" => null,
                    ":time_slot" => $slot,
                    ":number_player" => 0,
                    ":total_price" => 0,
                    ":date_bill" => null,
                    ":opinion" => null
                )
            );
        }
    }
}

