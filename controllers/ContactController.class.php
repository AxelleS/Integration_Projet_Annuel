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

        $contact = new Contact();
        $id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : 0;
        if($id_user != 0) {
            $user = new User();
            $user->setId($id_user);
            $response = $user->select('id');
            $donnees_user = $response->fetch();
            $contact->setFirstname($donnees_user['firstname']);
            $contact->setLastname($donnees_user['lastname']);
            $contact->setEmail($donnees_user['email']);
            $contact->setPhone($donnees_user['phone']);
        }
        //Va chercher les infos de l'utilisateur

        $config = $contact->configFormContact();
        $v = new View('contact','connected');
        $v->assign('config',$config);
    }

    public function saveAction($params){
        //print_r($params);die;
        if(isset($params['POST'])) {
            if((!is_null($params['POST']['lastname']))&&(!is_null($params['POST']['firstname']))&&(!is_null($params['POST']['email']))&&(!is_null($params['POST']['object']))&&(!is_null($params['POST']['message']))){
                $contact = new Contact();
                $contact->setLastname($params['POST']['lastname']);
                $contact->setFirstname($params['POST']['firstname']);
                $contact->setEmail($params['POST']['email']);
                $contact->setPhone($params['POST']['phone']);
                $contact->setSubject($params['POST']['object']);
                $contact->setContent($params['POST']['message']);
                $contact->setIsRead(0);
                $contact->save();
                header("Location: ".DIRNAME.Route::getSlug('index','index'));
            } else {
                header("Location: ".DIRNAME.Route::getSlug('contact','index'));
            }
        }
    }

    public function viewAllAction($params){
        $contact = new Contact();
        $response = $contact->select(null, 'DESC');

        $donnees_contact = [];
        while ($donnees = $response->fetch()) {
            $toCut = explode(' ', $donnees['date_send']);
            $dateExplode = explode('-', $toCut[0]);
            $date = $dateExplode[2].'/'.$dateExplode[1].'/'.$dateExplode[0];
            $hour = substr($toCut[1], 0, 5);
            $donnees['date_send'] = $date.' '.$hour;
            if (strlen($donnees['content']) > 20) {
                $message = substr($donnees['content'], 0, 20).' [...]';
            } else {
                $message = $donnees['content'];
            }

            $donnees['content'] = $message;

            array_push($donnees_contact, $donnees);
        }

        $v = new View('viewMessages','back');
        $v->assign('donnees',$donnees_contact);
    }

    public function openMessageAction($params){
        $contact = new Contact();
        $contact->setId($params['URL'][0]);
        $response = $contact->select('id');
        $donnees = $response->fetch();

        $v = new View('viewMessage','back');
        $v->assign('donnees',$donnees);
    }
}
