<?php

class CustomerinfoController
{
    public function indexAction($params)
    {        
        //Va chercher les infos de l'utilisateur
        $user = new User();
        $user->setId(1);
        $response = $user->select('id');
        $donnees = $response->fetch();
        $v = new View('customerinfo','connected');
        $v->assign("donnees",$donnees);
    }
}
