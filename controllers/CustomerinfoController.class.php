<?php

class CustomerinfoController
{
    public function indexAction($params)
    {        
        $id_user = 1;
        //Va chercher les infos de l'utilisateur
        $user = new User();
        $user->setId($id_user);
        $response = $user->select('id');
        $donnees = $response->fetch();
        $v = new View('customerinfo','connected');
        $v->assign("donnees",$donnees);
    }

}
