<?php

class UsersController
{
    public function indexAction($params)
    {
        if (count($params['URL']) == 0){
            $v = new View('users','back');
        } else {
            if ($params['URL'][0] == 'customer'){
                $v = new View('usersDetails','back');
                $v->assign('title', 'Clients');
                $v->assign('type', 2);
            } else {
                $v = new View('usersDetails','back');
                $v->assign('title', 'Administrateur');
                $v->assign('type', 1);
            }
        }

    }

    public function generateAction($params)
    {
        $typeUser = $params['GET']['type'];
        $customer = new User();
        $customer->setType($typeUser);
        $response = $customer->select('id_type');

        $donnees_customer = [];
        while ($donnees = $response->fetch()) {
            $donnees_customer[$donnees['id']] = $donnees;
        }

        echo json_encode($donnees_customer);
        exit;
    }

    public function deleteAction($params)
    {
        $idUser = $params['GET']['idUser'];
        $customer = new User();
        $customer->setId($idUser);
        $customer->delete('id');

        $customer->setId($idUser);
        $response = $customer->select('id');
        if ($response->rowCount() < 1) {
            echo 1;
        } else {
            echo 0;
        }
        exit;
    }

    public function editAction($params){
        $idUser = $params['URL'][0];
        // //Va chercher les infos de l'utilisateur
        $user = new User();
        $user->setId($idUser);
        $response = $user->select('id');
        $donnees_user = $response->fetch();

        $user->setFirstname($donnees_user['firstname']);
        $user->setLastname($donnees_user['lastname']);
        $user->setYearsOld($donnees_user['years_old']);
        $user->setEmail($donnees_user['email']);
        $user->setPhone($donnees_user['phone']);
        $user->setAddress($donnees_user['address']);
        $user->setAddress2($donnees_user['address_2']);
        $user->setZipcode($donnees_user['zipcode']);
        $user->setCity($donnees_user['city']);
        $user->setPicture($donnees_user['url_picture']);
        $user->setStatus($donnees_user['status']);
        $user->setType($donnees_user['id_type']);

        $config = $user->configFormUserAddModifyBO([]);
        $v = new View('userEdit','back');
        $v->assign('config',$config);
    }

    public function saveCustomerAction($params){
        $infoUser = $params['POST'];
        $user = new User();

        $errors = Validate::checkForm($infoUser);

        if(count($errors) > 0) {
            $user->setFirstname($infoUser['firstname']);
            $user->setLastname($infoUser['lastname']);
            $user->setYearsOld($infoUser['years_old']);
            $user->setEmail($infoUser['email']);
            $user->setPhone($infoUser['phone']);
            $user->setAddress($infoUser['address']);
            $user->setAddress2($infoUser['address_2']);
            $user->setZipcode($infoUser['zipcode']);
            $user->setCity($infoUser['city']);

            $config = $user->configFormUserInfos($errors);
            $v = new View('customerinfo','connected');
            $v->assign('config',$config);
        } else {
            if (isset($_FILES) && count($_FILES) > 0) {
                $varReturn = Files::uploadPicture($_FILES['picture']);
                if (!is_array($varReturn)) {
                    $user->setPicture($varReturn);
                } else {
                    if ($infoUser['picture-old'] != '') {
                        $user->setPicture($infoUser['picture-old']);
                    } else {
                        $user->setPicture(null);
                    }
                }
            }

            $user->setId($infoUser['id']);

            $user->setFirstname($infoUser['firstname']);
            $user->setLastname($infoUser['lastname']);
            $user->setYearsOld($infoUser['years_old']);
            $user->setEmail($infoUser['email']);
            $user->setPhone($infoUser['phone']);
            $user->setAddress($infoUser['address']);
            $user->setAddress2($infoUser['address_2']);
            $user->setZipcode($infoUser['zipcode']);
            $user->setCity($infoUser['city']);
            $user->save();

            header("Location: " . DIRNAME . Route::getSlug('customerinfo', 'index'));
        }
    }

    public function signupAction($params){
        $infoUser = $params['POST'];
        $user = new User();

        $errors = Validate::checkForm($infoUser);

        if(!isset($infoUser['cgu'])){
            $errors['cgu'] = 'Vous devez accepter les CGU et CGV';
        }

        $checkDoublonEmail = $infoUser['email'];
        $user->setEmail($checkDoublonEmail);
        $response=$user->count('email');
        $check['email'] = $response->fetch();

        if($check['email']['count(*)'] != '0' ){
            $errors['email'] = 'Cette adresse mail existe déjà';
        }

        if(count($errors) > 0) {
            $user->setFirstname($infoUser['firstname']);
            $user->setLastname($infoUser['lastname']);
            $user->setYearsOld($infoUser['years_old']);
            $user->setEmail($infoUser['email']);
            $user->setPhone($infoUser['phone']);
            $user->setAddress($infoUser['address']);
            $user->setAddress2($infoUser['address_2']);
            $user->setZipcode($infoUser['zipcode']);
            $user->setCity($infoUser['city']);

            $config = $user->configFormUserSignup($errors);
            $v = new View('signup');
            $v->assign('config',$config);
        } else {
            if (isset($_FILES) && count($_FILES) > 0) {
                $varReturn = Files::uploadPicture($_FILES['picture']);
                if (!is_array($varReturn)) {
                    $user->setPicture($varReturn);
                } else {
                    if ($infoUser['picture-old'] != '') {
                        $user->setPicture($infoUser['picture-old']);
                    } else {
                        $user->setPicture(null);
                    }
                }
            }

            $char = 'abcdefghijklmnopqrstuvwxyz0123456789';
            $token = str_shuffle($char);
            $token = substr($token, 0, 11);

            $user->setPassword($infoUser['password']);
            $user->setToken($token);
            $_SESSION['token'] = $token;

            $user->setFirstname($infoUser['firstname']);
            $user->setLastname($infoUser['lastname']);
            $user->setYearsOld($infoUser['years_old']);
            $user->setEmail($infoUser['email']);
            $user->setPhone($infoUser['phone']);
            $user->setAddress($infoUser['address']);
            $user->setAddress2($infoUser['address_2']);
            $user->setZipcode($infoUser['zipcode']);
            $user->setCity($infoUser['city']);
            $user->setStatus(4);
            $user->setType(2);
            $user->save();

            $user->setEmail($infoUser['email']);

            $response = $user->select('email');
            $donnees = $response->fetch();

            $_SESSION['id_user'] = $donnees['id'];

            header("Location: " . DIRNAME . Route::getSlug('signup', 'mail'));
        }
    }

    public function saveAction($params)
    {        
		if(!empty($params["POST"])){

            $errors = Validate::checkForm($params["POST"]);

			if(count($errors) < 1){
			    $user = new User();
                if($params["POST"]["id"] != '') {
                    $user->setId($params["POST"]["id"]);
                } else {
                    $string = md5(uniqid());
                    $password = substr($string, strlen($string)-8);
                    $user->setPassword($password);

                    $company = new Homepage();
                    $donnees_company = $company->select()->fetch();

                    $subject = "Création de votre compte";
                    $body = 'Bonjour,<br>Vous recevez ce message car un administrateur de chez <b>'.$donnees_company['name_company'].'</b> vient de créer votre compte.<br>Voici vos identifiants :<br>Identifiant : <b>'.$params['POST']['email'].'</b><br>Mot de passe : <b>'.$password.'</b>';

                    Data::sendMail($params['POST']['email'], $donnees_company['email_company'], $donnees_company['name_company'], $subject, $body);

                    $char = 'abcdefghijklmnopqrstuvwxyz0123456789';
                    $token = str_shuffle($char);
                    $token = substr($token, 0, 11);
                    $user->setToken($token);
		        }
                $response = $user->select('id');
                $donnees = $response->fetch();
		
                $user->setType($params['POST']['id_type']);
                $user->setFirstname($params['POST']['firstname']);
                $user->setLastname($params['POST']['lastname']);
                $user->setYearsOld($params['POST']['years_old']);
                $user->setEmail($params['POST']['email']);
                $user->setPhone($params['POST']['phone']);
                $user->setAddress($params['POST']['address']);
                $user->setAddress2($params['POST']['address_2']);
                $user->setZipcode($params['POST']['zipcode']);
                $user->setCity($params['POST']['city']);
                $user->setStatus($params['POST']['status']);

                $user->save();

                if($params['POST']['id_type'] == 1) {
                    $nextURL = 'admin';
                } else {
                    $nextURL = 'customer';
                }
                header("Location: ".DIRNAME.Route::getSlug('users','index')."/".$nextURL);
			} else {
                $user = new User();
                $user->setType($params['POST']['id_type']);
                $user->setFirstname($params['POST']['firstname']);
                $user->setLastname($params['POST']['lastname']);
                $user->setYearsOld($params['POST']['years_old']);
                $user->setEmail($params['POST']['email']);
                $user->setPhone($params['POST']['phone']);
                $user->setAddress($params['POST']['address']);
                $user->setAddress2($params['POST']['address_2']);
                $user->setZipcode($params['POST']['zipcode']);
                $user->setCity($params['POST']['city']);
                $user->setStatus($params['POST']['status']);

                $config = $user->configFormUserAddModifyBO($errors);
                $v = new View('userEdit','back');
                $v->assign('config',$config);
            }
		} else {
            header("Location: ".DIRNAME.Route::getSlug('users','index'));
        }
    }

    function addAction($params){
        $user = new User();
        $config = $user->configFormUserAddModifyBO([]);
        $v = new View('userEdit','back');
        $v->assign('config', $config);
    }

    function validatesignupAction($params) {
        $user = new User();
        $user->setId($params['URL'][0]);
        $response = $user->select('id');
        $donnees = $response->fetch();
        if ($donnees['token'] === $params['URL'][1] && $donnees['status'] == 4) {
            $user->setType($donnees['id_type']);
            $user->setFirstname($donnees['firstname']);
            $user->setLastname($donnees['lastname']);
            $user->setYearsOld($donnees['years_old']);
            $user->setEmail($donnees['email']);
            $user->setPhone($donnees['phone']);
            $user->setAddress($donnees['address']);
            $user->setAddress2($donnees['address_2']);
            $user->setZipcode($donnees['zipcode']);
            $user->setCity($donnees['city']);
            $user->setStatus(2);
            $user->save();
        } else {
            header("Location: ".DIRNAME.Route::getSlug('index','index'));
        }
    }

    function changePasswordBOAction($params){
        $infoPassword = $params['POST'];
        if(count($infoPassword) > 0) {
            $errors = Validate::checkForm($infoPassword);

            if(count($errors) < 1) {
                $user = new User();
                $user->setId($_SESSION['id_user']);
                $response = $user->select('id');
                $donnees = $response->fetch();

                $user->setType($donnees['id_type']);
                $user->setFirstname($donnees['firstname']);
                $user->setLastname($donnees['lastname']);
                $user->setYearsOld($donnees['years_old']);
                $user->setEmail($donnees['email']);
                $user->setPhone($donnees['phone']);
                $user->setAddress($donnees['address']);
                $user->setAddress2($donnees['address_2']);
                $user->setZipcode($donnees['zipcode']);
                $user->setCity($donnees['city']);
                $user->setPicture($donnees['url_picture']);
                $user->setStatus($donnees['status']);

                $user->setPassword($infoPassword['password']);

                $user->save();
                header("Location: ".DIRNAME.Route::getSlug('dashboardadmin','index'));
            } else {
                $v = new View('changepwd','back');
                $v->assign('errors', $errors);
            }
        } else {
            $v = new View('changepwd','back');
            $v->assign('errors', []);
        }

    }

    function changePasswordFOAction($params){
        $infoPassword = $params['POST'];
        if(count($infoPassword) > 0) {
            $errors = Validate::checkForm($infoPassword);

            if(count($errors) < 1) {
                $user = new User();
                $user->setId($_SESSION['id_user']);
                $response = $user->select('id');
                $donnees = $response->fetch();

                $user->setType($donnees['id_type']);
                $user->setFirstname($donnees['firstname']);
                $user->setLastname($donnees['lastname']);
                $user->setYearsOld($donnees['years_old']);
                $user->setEmail($donnees['email']);
                $user->setPhone($donnees['phone']);
                $user->setAddress($donnees['address']);
                $user->setAddress2($donnees['address_2']);
                $user->setZipcode($donnees['zipcode']);
                $user->setCity($donnees['city']);
                $user->setPicture($donnees['url_picture']);
                $user->setStatus($donnees['status']);

                $user->setPassword($infoPassword['password']);

                $user->save();
                header("Location: ".DIRNAME.Route::getSlug('customerreservations','index'));
            } else {
                $v = new View('changepwdFO','connected');
                $v->assign('errors', $errors);
            }
        } else {
            $v = new View('changepwdFO','connected');
            $v->assign('errors', []);
        }

    }

}
