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

            $config = $user->configFormUserAddModify([]);
            $v = new View('signup');
            $v->assign('config',$config);
        }
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
