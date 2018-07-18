<?php

class CustomerreservationsController
{
    public function indexAction($params)
    {
        //Va chercher toutes les réservations du client
        $time_slot = new Time_slot();
        $time_slot->setIdUser($_SESSION['id_user']);
        $response_timeslot = $time_slot->select('id_user', 'ASC');
        $i = 0;

        $array = [];
        
        while($donnees_timeslot = $response_timeslot->fetch()){
            //Reformate la date 'Y-m-d' en 'd/m/Y'
            $dateExploded = explode('-',$donnees_timeslot['date_bill']);
            $donnees_timeslot['date_booking'] = $dateExploded[2].'/'.$dateExploded[1].'/'.$dateExploded[0];
            unset($donnees_timeslot['date_bill']);

            //Va chercher la date à laquelle correspond l'id_date
            $calendar = new Calendar();
            $calendar->setId($donnees_timeslot['id_calendar']);
            $response_calendar = $calendar->select('id');
            $donnees_calendar = $response_calendar->fetch();

            //Reformate la date 'Y-m-d' en 'd/m/Y'
            $dateExploded = explode('-',$donnees_calendar['date_calendar']);
            $donnees_timeslot['date_calendar'] = $dateExploded[2].'/'.$dateExploded[1].'/'.$dateExploded[0];
            unset($donnees_timeslot['id_calendar']);

            //Créer des variables permettant d'afficher ensuite les actions autorisées
            $donnees_timeslot['date_game'] = new DateTime(date('Y-m-d', mktime(0,0,0,$dateExploded[1],$dateExploded[2],$dateExploded[0])));
            $donnees_timeslot['date_now'] = new DateTime(date('Y-m-d', mktime(0,0,0,date('m'),date('d'),date('Y'))));
            //Donne l'intervalle entre les deux dates
            $donnees_timeslot['interval'] = $donnees_timeslot['date_now']->diff($donnees_timeslot['date_game'])->format('%a');

            //Va chercher le nom de la room à laquelle correspond l'id_room
            $room = new Room();
            $room->setId($donnees_timeslot['id_room']);
            $response_room = $room->select('id');
            $donnees_room = $response_room->fetch();
            $donnees_timeslot['name_room'] = $donnees_room['name'];
            unset($donnees_timeslot['id_room']);

            //Affecte le précedent tableau à un tableau à 2 dimensions
            $array[$i] = $donnees_timeslot;

            $i++;
        }
        //Appelle la vue
        $v = new View('customerreservations','connected');
        //Passe en paramètre le tableau créé
        $v->assign("donnees",$array);
    }

    public function cancelAction($params)
    {
        $id_time_slot = $params['URL'][0];

        $time_slot = new Time_slot();
        $time_slot->setId($id_time_slot);

        $response_timeslot = $time_slot->select('id');
        $donnees_timeslot = $response_timeslot->fetch();

        $time_slot->setIdCalendar($donnees_timeslot['id_calendar']);   
        
        $time_slot->setIdRoom($donnees_timeslot['id_room']);
        
        $time_slot->setIdUser(null);
        
        $time_slot->setTimeSlot($donnees_timeslot['time_slot']);
        
        $time_slot->setNumberPlayer(0);
        
        $time_slot->setTotalPrice(0);
        
        $time_slot->setDateBill(null);
        
        $time_slot->setOpinion(null);

        $time_slot->save();

        $user = new User();
        $user->setId($_SESSION['id_user']);
        $donnees_user = $user->select('id')->fetch();

        $room = new Room();
        $room->setId($donnees_timeslot['id_room']);
        $donnees_room = $room->select('id')->fetch();
        $priceTTC = $donnees_room['price'] + ($donnees_room['price'] * 0.2);
        echo $priceTTC;

        $contact = new Contact();
        $contact->setFirstname($donnees_user['firstname']);
        $contact->setLastname($donnees_user['lastname']);
        $contact->setEmail($donnees_user['email']);
        $contact->setPhone($donnees_user['phone']);
        $contact->setSubject('Demande de remboursement');
        $contact->setContent('Bonjour, vous recevez ce message car M(me) '.substr($donnees_user['firstname'], 0, 1).'. '.$donnees_user['lastname'].' a annulé sa réservation d\'un montant de '.$priceTTC.'€. Veuillez procéder au remboursement.');
        $contact->save();

        header("Location: ".DIRNAME.Route::getSlug('customerreservations', 'index'));
    }
}
