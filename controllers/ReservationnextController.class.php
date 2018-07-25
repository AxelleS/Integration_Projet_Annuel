<?php

class ReservationnextController
{
    public function indexAction($params)
    {
        $infoResa = $params['POST'];

        $slot = new Time_slot();
        $slot->setId($infoResa['slotChoose']);
        $donneesSlot = $slot->select('id')->fetch();

        $room = new Room();
        $room->setId($donneesSlot['id_room']);
        $donneesRoom = $room->select('id')->fetch();

        $calendar = new Calendar();
        $calendar->setId($donneesSlot['id_calendar']);
        $donneesCalendar = $calendar->select('id')->fetch();


        //Appelle la vue
        if ($_SESSION['is_connected']) {
            $v = new View('reservationnext','connected');
        } else {
            $v = new View('reservationnext');
        }
        $v->assign('roomDetails', $donneesRoom);
        $v->assign('slotDetails', $donneesSlot);
        $v->assign('calendarDetails', $donneesCalendar);
    }

    public function savePlayersAction($params)
    {
        $timeSlot = $params['GET']['timeslot'];

        $playerInfo = new Player();
        $playerInfo->setIdTimeSlot($timeSlot);

        $players = $params['GET']['players'];
        $players = explode('&', $players);
        unset($players[count($players)-1]);
        foreach ($players as $player) {
            $infos = explode('/', $player);
            $playerInfo->setFirstname($infos[0]);
            $playerInfo->setLastname($infos[1]);
            $playerInfo->setEmail($infos[2]);
            $playerInfo->setIsSurprise($infos[3]);
            $playerInfo->save();
        }

        exit;
    }

    public function saveAction($params)
    {
        $timeSlot = new Time_slot();
        $timeSlot->setId($params['URL'][0]);
        $donneesTimeSlot = $timeSlot->select('id')->fetch();
        $timeSlot->setIdCalendar($donneesTimeSlot['id_calendar']);
        $timeSlot->setIdRoom($donneesTimeSlot['id_room']);
        $timeSlot->setTimeSlot($donneesTimeSlot['time_slot']);

        $players = new Player();
        $players->setIdTimeSlot($params['URL'][0]);
        $response = $players->select('id_time_slot');
        $timeSlot->setNumberPlayer($response->rowCount());

        $room = new Room();
        $room->setId($donneesTimeSlot['id_room']);
        $donneesRoom = $room->select('id')->fetch();
        $timeSlot->setTotalPrice($donneesRoom['price']);

        $timeSlot->setIdUser($_SESSION['id_user']);

        $timeSlot->setDateBill(date('Y-m-d '));

        $timeSlot->save();

        header("Location: ".DIRNAME.Route::getSlug('reservationnext','mail'));
    }

    public function mailAction($params)
    {
        $user = new User();
        $user->setId($_SESSION['id_user']);
        $request = $user->select('id');
        $donnees = $request->fetch();

        $company = new Homepage();
        $donnees_company = $company->select()->fetch();

        $subject = "Confirmation de votre réservation";
        $body = 'Bonjour,<br>Nous vous confirmons la réservation de votre partie.<br>Pour consulter la facture ou pour annuler la réservation, merci de vous connecter sur votre compte client.';

        Data::sendMail($donnees['email'], $donnees_company['email_company'], $donnees_company['name_company'], $subject, $body);

        header("Location: ".DIRNAME.Route::getSlug('customerreservations','index'));
    }
}
