<?php

class UsersController
{
    public function indexAction($params)
    {
        $v = new View('users', 'back');
    }

    public function editAction($params){}

    public function saveAction($params)
    {
        // print_r($params['POST']);
        $user = new User();
        $user->setId($params['POST']['input-id']);
        $response = $user->select('id');
        $donnees_user = $response->fetch();
        $error = false;
        // $params['POST']['input-password'] == '' ? $error = true : $password = $params['POST']['input-password'];

        // $params['POST']['input-password-validate'] == '' ? $error = true : $password_validate = $params['POST']['input-password-validate'];

        // if((isset($password)) && (isset($password_validate)))
        //     $password != $password_validate ? $error = true : (password_hash($password, PASSWORD_DEFAULT) != $donnees_user['password'] ? $error = true : $user->setPassword($params['POST']['input-password']));

        $params['POST']['input-lastname'] == '' ? $error = true : $user->setLastname($params['POST']['input-lastname']);

        $params['POST']['input-firstname'] == '' ? $error = true : $user->setFirstname($params['POST']['input-firstname']);

        $params['POST']['input-years'] == '' ? $error = true : (is_numeric($params['POST']['input-years']) ? $user->setYearsOld($params['POST']['input-years']) : $error = true);

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
