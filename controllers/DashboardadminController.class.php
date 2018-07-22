<?php

class DashboardadminController
{
    public function indexAction($params)
    {
        $contact = new Contact();
        $contact->setIsRead(0);
        $response_contact = $contact->select('is_read', 'DESC');
        $nbMessages = $response_contact->rowCount();
        $contactArray = [];

        if ($nbMessages > 0) {
            $i = 0;
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
                if ($i < 1) {
                    array_push($contactArray, $donnees_contact);
                }

                $i++;
            }
        }

        $users = new User();
        $users->setType(2);
        $response_users = $users->select('id_type', 'DESC');
        $usersArray = [];

        if ($response_users->rowCount() > 0) {
            $i = 0;
            while($donnees_users = $response_users->fetch()){
                $toCut = explode(' ', $donnees_users['date_inserted']);
                $dateExplode = explode('-', $toCut[0]);
                $donnees_users['day'] = $dateExplode[2];
                $months = ['', 'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
                $donnees_users['month'] = $months[intval($dateExplode[1])];
                $donnees_users['year'] = $dateExplode[0];
                $donnees_users['lastname'] = substr($donnees_users['lastname'],0,1).'.';
                if ($i < 5) {
                    array_push($usersArray, $donnees_users);
                }

                $i++;
            }
        }

        $visite = new Statistic();
        for ($i=0; $i<10; $i++) {
            $dateHeure = date('Y-m-d').' 0'.$i.'%';

            $visite->setCreatedAt($dateHeure);
            $response_visi = $visite->count('created_at');
            $stats['number_visite_today'][$i] = $response_visi->fetch();
        }

        for ($i=10; $i <24 ; $i++) {
            $dateHeure = date('Y-m-d').' '.$i.'%';

            $visite->setCreatedAt($dateHeure);
            $response_visi = $visite->count('created_at');
            $stats['number_visite_today'][$i] = $response_visi->fetch();
        }

        $v = new View('dashboardadmin', 'back');
        $v->assign('nbMessages', $nbMessages);
        $v->assign('contacts', $contactArray);
        $v->assign('users', $usersArray);
        $v->assign('stats', $stats);
    }
}
