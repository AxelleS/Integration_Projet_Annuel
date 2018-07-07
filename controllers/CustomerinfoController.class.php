<?php

class CustomerinfoController
{
    public function indexAction($params)
    {
        // //Va chercher les infos de l'utilisateur
        $user = new User();
        $user->setId($_SESSION['id_user']);
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

        $config = $user->configFormUserInfos([]);
        $v = new View('customerinfo','connected');
        $v->assign('config',$config);
    }

}
