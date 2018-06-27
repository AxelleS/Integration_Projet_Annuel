<?php

class SigninController
{
    public function indexAction($params)
    {
        //Appelle la vue
        if ($_SESSION['is_connected']) {
            $v = new View('customerreservations','connected');
        } else {
            $user = new User();

            $config = $user->configFormUserConnect();
            $v = new View('signin');
            $v->assign('config',$config);
        }
    }

    public function connectAction($params){
        
        $error = false;

        $user = new User();
        $user->setEmail($params['POST']['input-email']);
        $response = $user->select('email');

        if($response != false){
            $donnees_user = $response->fetch();
            if (!password_verify($params['POST']['input-password'], $donnees_user['password'])) {
                $error = true;
            }
        } else{
            $error = true;
        }
        

        if($error == false){
            $char = 'abcdefghijklmnopqrstuvwxyz0123456789';
            $token = str_shuffle($char);
            $token = substr($token, 0, 11);
    
            $user = new User();
            $user->setId($donnees_user['id']);
            $user->setToken($token);
    
            $user->majToken();
    
            $_SESSION['token'] = $token;
            $_SESSION['id_user'] = $donnees_user['id'];
    
            header("Location: ".DIRNAME.Route::getSlug('customerreservations','index'));

        } else {
            $donnees['email'] = $params['POST']['input-email'];
            $donnees['error'] = 'identifiants incorrects !';
            $v = new View('signin');
            $v->assign("donnees",$donnees);
        }        
    }

    public function lostpasswordAction($params){
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

        $string = str_shuffle("abcdefghijklmnopqrstuvwxyz0123456789");
        $password = substr($string, strlen($string)-8);

        $user->setPassword($password);
        $user->save();

        $mail->Subject = "New Password";
        $mail->Body = 'Hello,<br>You ask for a new password, and here is it : <b>'.$password.'</b>';

        $mail->Send();

        header("Location: ".DIRNAME.Route::getSlug('signin','index'));
    }
}
