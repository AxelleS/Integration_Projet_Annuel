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

    public function saveAction($params)
    {
        //Save the data

        header("Location: ".DIRNAME.Route::getSlug('reservationnext','mail'));
    }

    public function mailAction($params)
    {
        $user = new User();
        $user->setId($_SESSION['id_user']);
        $request = $user->select('id');
        $donnees = $request->fetch();

        $mail = New PhpMailer();
        $mail->CharSet = "utf-8";
        $mail->IsHTML(true);
        $mail->From = 'contact@play-with-my-cms.com';
        $mail->FromName = 'Team PlayWithMyCMS';
        $mail->AddAddress($donnees['email']);

        $mail->Subject = "Booking confirmation";
        $mail->Body = 'Hello,<br>You\'re successfully booked a game.<br>To view the invoice or to cancel the booking please signin to your account.';

        $mail->Send();

        header("Location: ".DIRNAME.Route::getSlug('customerreservations','index'));
    }
}
