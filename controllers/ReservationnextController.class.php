<?php

class ReservationnextController
{
    public function indexAction($params)
    {
        //Appelle la vue
        if ($_SESSION['is_connected']) {
            $v = new View('reservationnext','connected');
        } else {
            $v = new View('reservationnext');
        }

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
