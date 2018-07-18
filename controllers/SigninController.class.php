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

            $config = $user->configFormUserConnect([]);
            $v = new View('signin');
            $v->assign('config',$config);
        }
    }

    public function connectAction($params){
        $error['mpd'] = false;
        $error['status'] = false;

        $user = new User();
        $user->setEmail($params['POST']['email']);
        $response = $user->select('email');

        if($response->rowCount() > 0){
            $donnees_user = $response->fetch();
            if (!password_verify($params['POST']['password'], $donnees_user['password'])) {
                $error['mpd'] = true;
            }

            if($donnees_user['status'] != 2) {
                $error['status'] = true;
            }
        } else{
            $error['mpd'] = true;
        }

        if ($error['mpd'] == true || $error['status'] == true) {

            if($error['mpd'] == true) {
                $errors['signin'] = "L'email ou le mot de passse est incorrect";
            } else {
                if($error['status'] == true) {
                    $errors['signin'] = "Votre compte est désactivé, veuillez nous contacter pour plus d'information";
                }
            }

            $user->setEmail($params['POST']['email']);
            $config = $user->configFormUserConnect($errors);
            $v = new View('signin');
            $v->assign('config',$config);
        } else {
            $char = 'abcdefghijklmnopqrstuvwxyz0123456789';
            $token = str_shuffle($char);
            $token = substr($token, 0, 11);

            $user = new User();
            $user->setId($donnees_user['id']);
            $user->setToken($token);

            $user->majToken();

            $_SESSION['token'] = $token;
            $_SESSION['id_user'] = $donnees_user['id'];

            if($donnees_user['id_type'] == 1) {
                header("Location: ".DIRNAME.Route::getSlug('dashboardadmin','index'));
            } else {
                header("Location: ".DIRNAME.Route::getSlug('customerreservations','index'));
            }
        }
    }

    public function lostpasswordAction($params){
        $infoUser = $params['POST'];
        if(count($infoUser) > 0) {
            $user = new User();
            $user->setEmail($infoUser['email']);
            $request = $user->select('email');
            if($request->rowCount() > 0) {
                $donnees_user = $request->fetch();

                $company = new Homepage();
                $donnees_company = $company->select()->fetch();

                $mail = New PhpMailer();
                $mail->CharSet = "utf-8";
                $mail->IsHTML(true);
                $mail->From = $donnees_company['email_company'];
                $mail->FromName = $donnees_company['name_company'];
                $mail->AddAddress($donnees_user['email']);

                $string = md5(uniqid());
                $password = substr($string, strlen($string)-8);

                $user->setId($donnees_user['id']);

                $user->setFirstname($donnees_user['firstname']);
                $user->setLastname($donnees_user['lastname']);
                $user->setYearsOld($donnees_user['years_old']);
                $user->setPicture($donnees_user['url_picture']);
                $user->setPhone($donnees_user['phone']);
                $user->setAddress($donnees_user['address']);
                $user->setAddress2($donnees_user['address_2']);
                $user->setZipcode($donnees_user['zipcode']);
                $user->setCity($donnees_user['city']);

                $user->setPassword($password);
                $user->save();

                $mail->Subject = "Mot de passe oublié";
                $mail->Body = 'Bonjour,<br>Voici le nouveau mot de passe que vous avez demandé : <b>'.$password.'</b>';

                $mail->Send();
                header("Location: ".DIRNAME.Route::getSlug('signin','index'));
            } else {
                $errors['email'] = "L'email n'est pas connu";

                $user->setEmail($infoUser['email']);
                $config = $user->configFormLostPassword($errors);
                $v = new View('lostPassword');
                $v->assign('config',$config);
            }

        } else {
            $user = new User();

            $config = $user->configFormLostPassword([]);
            $v = new View('lostPassword');
            $v->assign('config',$config);
        }

    }

    public function disconnectAction($params){
        $_SESSION['token'] = "";
        $_SESSION['id_user'] = "";
        $_SESSION['is_connected'] = "";
        session_destroy();
        header("Location: ".DIRNAME.Route::getSlug('index','index'));
    }
}
