<?php

class DashboardadminController
{
    public function indexAction($params)
    {
        $contact = new Contact();
        $contact->setIsRead(0);
        $response_contact = $contact->select('is_read');
        $nbMessages = $response_contact->rowCount();
        $contactArray = '';
        if ($nbMessages > 0) {
            while($donnees_contact = $response_contact->fetch()){
                $toCut = explode(' ', $donnees_contact['date_send']);
                $dateExplode = explode('-', $toCut[0]);
                $date = $dateExplode[2].'/'.$dateExplode[1].'/'.$dateExplode[0];
                $hour = substr($toCut[1], 0, 5);
                $donnees_contact['date'] = $date;
                $donnees_contact['hour'] = $hour;
                if (strlen($donnees_contact['content']) > 50) {
                    $message = substr($donnees_contact['content'], 0, 50).' [...]';
                } else {
                    $message = $donnees_contact['content'];
                }

                $donnees_contact['message'] = $message;
                $contactArray = $donnees_contact;
            }
        }

        $v = new View('dashboardadmin', 'back');
        $v->assign('nbMessages', $nbMessages);
        $v->assign('contact', $contactArray);
    }
}
