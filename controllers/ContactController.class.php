<?php

class ContactController
{
    public function indexAction($params)
    {
        /*
        //Appelle la vue
        if ($_SESSION['is_connected']) {
            $v = new View('contact','connected');
        } else {
            $v = new View('contact');
        }*/

        $id_user = 1;
        //Va chercher les infos de l'utilisateur

        $user = new User();
        $user->setId($id_user);
        $response = $user->select('id');
        $donnees_user = $response->fetch();

        $contact = new Contact();
        $contact->setId($id_user);
        $contact->setFirstname($donnees_user['firstname']);
        $contact->setLastname($donnees_user['lastname']);
        $contact->setEmail($donnees_user['email']);
        $contact->setPhone($donnees_user['phone']);

        $config = $contact->configFormContact();
        $v = new View('contact','connected');
        $v->assign('config',$config);
    }

    public function saveAction($params){}
}
