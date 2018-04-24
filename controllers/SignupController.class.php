<?php

class SignUpController
{
    public function indexAction($params)
    {
        //Appelle la vue
        if ($_SESSION['is_connected']) {
            $v = new View('customerreservations','connected');
        } else {
            $v = new View('signup');
        }
    }

    public function saveAction($params){
        print_r($params['POST']);

        $char = 'abcdefghijklmnopqrstuvwxyz0123456789';
        $token = str_shuffle($char);
        $token = substr($token, 0, 11);

        $user = new User();
        $error = '';
        $params['POST']['input-password'] == '' ? $error = $error.' & '.'mot de passe manquant' : $password = $params['POST']['input-password'];

        $params['POST']['input-password-validate'] == '' ? $error = $error.' & '.'confirmation mot de passe manquant' : $password_validate = $params['POST']['input-password-validate'];

        if((isset($password)) && (isset($password_validate)))
            $password != $password_validate ? $error = $error.' & '.'mot de passe et confirmation différents' : $user->setPassword($password);

        $params['POST']['input-lastname'] == '' ? $error = $error.' & '.'nom manquant' : $user->setLastname($params['POST']['input-lastname']);
        $donnees_user['lastname'] = $params['POST']['input-lastname'];

        $params['POST']['input-firstname'] == '' ? $error = $error.' & '.'prénom manquant' : $user->setFirstname($params['POST']['input-firstname']);
        $donnees_user['firstname'] = $params['POST']['input-firstname'];

        $params['POST']['input-years'] == '' ? $error = $error.' & '.'age manquant' : (is_numeric($params['POST']['input-years']) ? $user->setYearsOld($params['POST']['input-years']) : $error = $error.' & '.'age incorrect');
        $donnees_user['years'] = $params['POST']['input-years'];

        $params['POST']['input-email'] == '' ? $error = $error.' & '.'email manquant' : $user->setEmail($params['POST']['input-email']);
        $donnees_user['email'] = $params['POST']['input-email'];

        $params['POST']['input-phone'] == '' ? $error = $error.' & '.'telephone manquant' : (strlen($params['POST']['input-phone']) == 10 ? $user->setPhone($params['POST']['input-phone']) : $error = $error.' & '.'telephone incorrect');
        $donnees_user['phone'] = $params['POST']['input-phone'];

        $params['POST']['input-address'] == '' ? $error = $error.' & '.'adresse manquant' : $user->setAddress($params['POST']['input-address']);
        $donnees_user['address'] = $params['POST']['input-address'];

        $params['POST']['input-complete'] == '' ? $user->setAddress2('null') : $user->setAddress2($params['POST']['input-complete']);
        $donnees_user['complete'] = $params['POST']['input-complete'];

        $params['POST']['input-zipcode'] == '' ? $error = $error.' & '.'code postal manquant' : (strlen($params['POST']['input-zipcode']) == 5 ? $user->setZipcode($params['POST']['input-zipcode']) : $error = $error.' & '.'code postal incorrect');
        $donnees_user['zipcode'] = $params['POST']['input-zipcode'];
        
        $params['POST']['input-city'] == '' ? $error = $error.' & '.'ville manquant' : $user->setCity($params['POST']['input-city']);
        $donnees_user['city'] = $params['POST']['input-city'];

        $params['POST']['input-photo'] == '' ? $user->setPicture('null') : $user->setPicture($params['POST']['input-photo']);

        $user->setToken($token);

        if($error != ''){
            $donnees_user['error'] = $error;
            $v = new View('signup');
            $v->assign("donnees",$donnees_user);
        } else {
            $user->save();

            $user->setEmail($donnees_user['email']);
            $response = $user->select('email');
            $monuser = $response->fetch();

            $_SESSION['id_user'] = $monuser['id'];
            $_SESSION['token'] = $token;

            header("Location: ".DIRNAME.Route::getSlug('customerreservations','index'));
        }
    }

    public function saveAction($params){}
}
