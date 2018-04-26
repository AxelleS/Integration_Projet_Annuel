<?php

class UsersController
{
    public function indexAction($params)
    {
        $v = new View();
    }

    public function editAction($params){}

    public function saveAction($params)
    {        
		if(!empty($params["POST"])){
			
			$errors = Validate::checkForm($config, $params["POST"]);

			if(empty($errors)){
                if(!is_null($params["POST"]["id"])) {
                    $user->setId($params["POST"]["id"]);
                }
                $user->setFirstname($params['POST']['firstname']);
                $user->setLastname($params['POST']['lastname']);
                $user->setYearsOld($params['POST']['yearsold']);
                $user->setEmail($params['POST']['email']);
                $user->setPhone($params['POST']['phone']);
                $user->setAddress($params['POST']['address']);
                $user->setAddress2($params['POST']['address_2']);
                $user->setZipcode($params['POST']['zipcode']);
                $user->setCity($params['POST']['city']);
                $user->setPicture($params['POST']['picture']);
                $user->setPassword($params['POST']['password']);
                $user->save();
                header("Location: ".DIRNAME.Route::getSlug('customerinfo','index'));
			}
		} else {
            header("Location: ".DIRNAME.Route::getSlug('customerinfo','index'));
        }
		
		$v = new View("customerinfo","connected");
		$v->assign("config", $config);
		$v->assign("errors", $errors);
        
        
        $params['POST']['input-email'] == '' ? $error = true : $user->setEmail($params['POST']['input-email']);

        $params['POST']['input-phone'] == '' ? $error = true : (strlen($params['POST']['input-phone']) == 10 ? $user->setPhone($params['POST']['input-phone']) : $error = true);

        $params['POST']['input-address'] == '' ? $error = true : $user->setAddress($params['POST']['input-address']);

        $params['POST']['input-complete'] == '' ? $user->setAddress2('null') : $user->setAddress2($params['POST']['input-complete']);

        $params['POST']['input-zipcode'] == '' ? $error = true : (strlen($params['POST']['input-zipcode']) == 5 ? $user->setZipcode($params['POST']['input-zipcode']) : $error = true);

        $params['POST']['input-city'] == '' ? $error = true : $user->setCity($params['POST']['input-city']);

        $params['POST']['input-photo'] == '' ? $user->setPicture($params['POST']['input-photo-old']) : ($params['POST']['input-photo'] != $params['POST']['input-photo-old'] ? $user->setPicture($params['POST']['input-photo']) : $user->setPicture($params['POST']['input-photo-old']));

        if($error){
            $donnees_user['error'] = "Vous avez fait une erreur !";
            $v = new View('customerinfo','connected');
            $v->assign("donnees",$donnees_user);
        } else {
            $user->setId($params['POST']['input-id']);
            $user->save();

            $user_new = new User();
            $user_new->setId($params['POST']['input-id']);
            $response = $user_new->select('id');
            $donnees_new = $response->fetch();
            $donnees_new['error'] = "Modification enregistrées !";
            $v = new View('customerinfo','connected');
            $v->assign("donnees",$donnees_new);
        }
        // $id_user = 1;
        // //Va chercher les infos de l'utilisateur
        // $user = new User();
        // $user->setId($id_user);
        // $response = $user->select('id');
        // $donnees = $response->fetch();
        // $v = new View('customerinfo','connected');
        // $v->assign("donnees",$donnees);
    }

    public function deleteAction($params){}
}
