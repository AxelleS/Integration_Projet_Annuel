<?php

class CustomerresaController
{
    public function indexAction($params)
    {
        //Va chercher toutes les réservations du client
        $time_slot = new Time_slot();
        $time_slot->setIdUser(1);
        $response_timeslot = $time_slot->select('id_user');
        $i = 0;
        
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
        $v = new View('customerresa','connected');
        //Passe en paramètre le tableau créé
        $v->assign("donnees",$array);
    }
}
