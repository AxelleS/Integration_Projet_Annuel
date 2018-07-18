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

            $config = $user->configFormUserSignup([]);
            $v = new View('signup');
            $v->assign('config',$config);
        }
    }

    public function mailAction($params){
        $user = new User();
        $user->setId($_SESSION['id_user']);
        $request = $user->select('id');
        $donnees = $request->fetch();

        $company = new Homepage();
        $donnees_company = $company->select()->fetch();

        $mail = New PhpMailer();
        $mail->CharSet = "utf-8";
        $mail->IsHTML(true);
        $mail->From = $donnees_company['email_company'];
        $mail->FromName = $donnees_company['name_company'];
        $mail->AddAddress($donnees['email']);

        $mail->Subject = 'Confirmation d\'inscription';
        $mail->Body = 'Bonjour,<br>Nous vous confirmons votre inscription.<br>Votre identifiant : <b>'.$donnees['email'].'</b><br>Votre mot de passe : <b>Celui que vous avez choisi</b>';

        $mail->Send();

        header("Location: ".DIRNAME.Route::getSlug('customerreservations','index'));
    }
}
