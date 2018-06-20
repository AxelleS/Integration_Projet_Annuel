<?php

class SignUpController
{
    public function indexAction($params)
    {
        //Appelle la vue
        if ($_SESSION['is_connected']) {
            $v = new View('customerreservations','connected');
        } else {
            $user = new User();

            $config = $user->configFormUserAddModify();
            $v = new View('signup');
            $v->assign('config',$config);
        }
    }

    public function saveAction($params)
    {
        //Save the data
        print_r($params);
        $user = new User();

        $infoUser = $params['POST'];

        $char = 'abcdefghijklmnopqrstuvwxyz0123456789';
        $token = str_shuffle($char);
        $token = substr($token, 0, 11);

        $user->setFirstname($infoUser['firstname']);
        $user->setLastname($infoUser['lastname']);
        $user->setYearsOld($infoUser['years_old']);
        $user->setEmail($infoUser['email']);
        $user->setPhone($infoUser['phone']);
        $user->setAddress($infoUser['address']);
        $user->setAddress2($infoUser['address_2']);
        $user->setZipcode($infoUser['zipcode']);
        $user->setCity($infoUser['city']);
        $user->setPicture($infoUser['picture']);
        $user->setPassword($infoUser['password']);
        $user->setStatus(2);
        $user->setType(2);
        $user->setToken($token);
        $user->save();

        $user->setEmail($infoUser['email']);

        $response = $user->select('email');
        $donnees = $response->fetch();

        $_SESSION['token'] = $token;
        $_SESSION['id_user'] = $donnees['id'];

        header("Location: ".DIRNAME.Route::getSlug('signup','mail'));
    }

    public function mailAction($params){
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

        $mail->Subject = 'Registration confirmation';
        $mail->Body = 'Hello,<br>You\'re successfully registered.<br>Your login : <b>'.$donnees['email'].'</b><br>Your password : <b>Only you know him</b>';

        $mail->Send();

        header("Location: ".DIRNAME.Route::getSlug('customerreservations','index'));
    }
}
