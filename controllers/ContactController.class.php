<?php

class ContactController
{
    public function indexAction($params)
    {
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


        $config = $contact->configFormContact([]);

        if ($_SESSION['is_connected']) {
            $v = new View('contact','connected');
        } else {
            $v = new View('contact');
        }
        $v->assign('config',$config);
    }

    public function saveAction($params){
        $infoContact = $params['POST'];
        $contact = new Contact();

        $errors = Validate::checkForm($infoContact);

        if(count($errors) > 0) {
            $contact->setLastname($infoContact['lastname']);
            $contact->setFirstname($infoContact['firstname']);
            $contact->setEmail($infoContact['email']);
            $contact->setPhone($infoContact['phone']);
            $contact->setSubject($infoContact['object']);
            $contact->setContent($infoContact['message']);

            $config = $contact->configFormContact($errors);
            if ($_SESSION['is_connected']) {
                $v = new View('contact','connected');
            } else {
                $v = new View('contact');
            }
            $v->assign('config',$config);
        } else {
            $contact->setLastname($infoContact['lastname']);
            $contact->setFirstname($infoContact['firstname']);
            $contact->setEmail($infoContact['email']);
            $contact->setPhone($infoContact['phone']);
            $contact->setSubject($infoContact['object']);
            $contact->setContent($infoContact['message']);
            $contact->setIsRead(0);
            $contact->save();
            header("Location: ".DIRNAME.Route::getSlug('index','index'));
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
        $contact->setLastname($donnees['lastname']);
        $contact->setFirstname($donnees['firstname']);
        $contact->setPhone($donnees['phone']);
        $contact->setEmail($donnees['email']);
        $contact->setSubject($donnees['subject']);
        $contact->setContent($donnees['content']);
        $contact->setIsRead(1);
        $contact->save();

        $toCut = explode(' ', $donnees['date_send']);
        $dateExplode = explode('-', $toCut[0]);
        print_r($dateExplode);
        $date = $dateExplode[2].'/'.$dateExplode[1].'/'.$dateExplode[0];
        $hour = substr($toCut[1], 0, 5);
        $donnees['date_send'] = $date.' '.$hour;

        $v = new View('viewMessage','back');
        $v->assign('donnees',$donnees);
    }
}
