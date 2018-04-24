<?php

class SigninController
{
    public function indexAction($params)
    {
        //Appelle la vue
        if ($_SESSION['is_connected']) {
            $v = new View('customerreservations','connected');
        } else {
            $v = new View('signin');
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
            echo 'token save : '.$token;
            $_SESSION['email_user'] = $donnees_user['email'];

            $user->setEmail($donnees_user['email']);
            $response = $user->select('email');
            $donnees_user2 = $response->fetch();
            echo 'token bdd : '.$donnees_user2['token'];die;

    
            header("Location: ".DIRNAME.Route::getSlug('customerreservations','index'));

        } else {
            $donnees['email'] = $params['POST']['input-email'];
            $donnees['error'] = 'identifiants incorrects !';
            $v = new View('signin');
            $v->assign("donnees",$donnees);
        }        
    }
}