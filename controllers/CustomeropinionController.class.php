<?php

class CustomeropinionController
{
    public function indexAction($params)
    {
        $id_time_slot = $params['URL'][0];

        //Va chercher toutes les infos de la résa
        $time_slot = new Time_slot();
        $time_slot->setId($id_time_slot);
        $response_timeslot = $time_slot->select('id');
        $donnees_timeslot = $response_timeslot->fetch();

        //Va chercher la date à laquelle correspond l'id_date
        $calendar = new Calendar();
        $calendar->setId($donnees_timeslot['id_calendar']);
        $response_calendar = $calendar->select('id');
        $donnees_calendar = $response_calendar->fetch();

        //Reformate la date 'Y-m-d' en 'd/m/Y'
        $dateExploded = explode('-',$donnees_calendar['date_calendar']);
        $donnees_timeslot['date_calendar'] = $dateExploded[2].'/'.$dateExploded[1].'/'.$dateExploded[0];
        unset($donnees_timeslot['id_calendar']);

        //Va chercher le nom de la room à laquelle correspond l'id_room
        $room = new Room();
        $room->setId($donnees_timeslot['id_room']);
        $response_room = $room->select('id');
        $donnees_room = $response_room->fetch();
        $donnees_timeslot['name_room'] = $donnees_room['name'];
        unset($donnees_timeslot['id_room']);

        //Appelle la vue
        if ($_SESSION['is_connected']) {
            $v = new View('customeropinion','connected');
        } else {
            $v = new View('customeropinion');
        }

        //Passe en paramètre le tableau
        $v->assign("donnees",$donnees_timeslot);
    }

    public function saveAction($params)
    {
        $id_time_slot = $params['POST']['id_time_slot'];

        $note = $params['POST']['lanote'];

        $time_slot = new Time_slot();
        $time_slot->setId($id_time_slot);

        $response_timeslot = $time_slot->select('id');
        $donnees_timeslot = $response_timeslot->fetch();

        $time_slot->setIdCalendar($donnees_timeslot['id_calendar']);   
        
        $time_slot->setIdRoom($donnees_timeslot['id_room']);
        
        $time_slot->setIdUser($donnees_timeslot['id_user']);
        
        $time_slot->setTimeSlot($donnees_timeslot['time_slot']);
        
        $time_slot->setNumberPlayer($donnees_timeslot['number_player']);
        
        $time_slot->setTotalPrice($donnees_timeslot['total_price']);
        
        $time_slot->setDateBill($donnees_timeslot['date_bill']);
        
        $time_slot->setOpinion($note);

        $time_slot->save();

        header("Location: ".DIRNAME.Route::getSlug('customerreservations','index'));
    }

}
