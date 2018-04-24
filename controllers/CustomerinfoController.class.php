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
         //Appelle la vue
        if ($_SESSION['is_connected']) {
            $v = new View('customerinfo','connected');
        } else {
            $v = new View('customerinfo');
        }

        $v->assign("donnees",$donnees);
    }

}
