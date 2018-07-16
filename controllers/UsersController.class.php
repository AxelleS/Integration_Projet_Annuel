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
        $response = $customer->delete('id');
        echo $response;
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
            $user->setStatus(2);
            $user->setType(2);
	    $user->setDateInserted(date('Y-m-d H:i:s'));
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

			if(empty($errors)){
			    $user = new User();
                if($params["POST"]["id"] != '') {
			echo 'id : '.$params["POST"]["id"];
			echo '<br>';
                    $user->setId($params["POST"]["id"]);
                } else {
	 	    $user->setPassword('MotDePasse'.date('Y'));
		    $char = 'abcdefghijklmnopqrstuvwxyz0123456789';
                    $token = str_shuffle($char);
                    $token = substr($token, 0, 11);
                    $user->setToken($token);
		    $user->setDateInserted(date('Y-m-d H:i:s'));
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
                $user->setPicture($donnees['url_picture']);
                $user->setStatus($params['POST']['status']);

                $firsname = strtoupper(trim($params['POST']['firstname']));
                $lastname = strtolower(trim($params['POST']['lastname']));

                //Mot de passe par défault à la création d'un compte dans le BO : première lettre prénom en MAJ + 6 première lettres nom famille (ou tout le nom de famille) en MIN + 2 premiers chiffres du code postal
                $decoup_firsname = substr($firsname, 0, 1);
                $decoup_lastname = strlen($lastname) < 6 ? $lastname : substr($lastname, 0, 6);
                $decoup_zipcode = substr($params['POST']['zipcode'], 0, 2);
                $password = $decoup_firsname.$decoup_lastname.$decoup_zipcode;

                $user->setPassword($password);
                $user->save();

                if($params['POST']['id_type'] == 1) {
                    $nextURL = 'admin';
                } else {
                    $nextURL = 'customer';
                }
                header("Location: ".DIRNAME.Route::getSlug('users','index')."/".$nextURL);
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
		$user->setDateInserted(date('Y-m-d H:i:s'));

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
