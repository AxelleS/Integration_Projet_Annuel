<?php

class CalendarController {

	public function indexAction($params)
    {
        $rooms = new Room();
        $rooms->setStatus(ACTIF);
        $response = $rooms->select('status');

        $rooms_data = [];
        while($donnees_rooms = $response->fetch()){
            $rooms_data[$donnees_rooms['id']] = $donnees_rooms['name'];
        }
        $v = new View('calendar', 'back');
        $v->assign('rooms', $rooms_data);
    }

    public function ajaxSaveAction($params){
        $elements = $params['GET']['timeSlots'];

	    foreach ($elements as $element) {
	        $timeSlot = new Time_slot();
            $timeSlot->setId($element[0]);
            $response = $timeSlot->select('id');
            $donnees = $response->fetch();
            $timeSlot->setIdCalendar($donnees['id_calendar']);
            $timeSlot->setIdRoom($donnees['id_room']);
            $timeSlot->setTimeSlot($donnees['time_slot']);
            $timeSlot->setNumberPlayer($donnees['number_player']);
            $timeSlot->setTotalPrice($donnees['total_price']);
            $timeSlot->setDateBill($donnees['date_bill']);
            $timeSlot->setOpinion($donnees['opinion']);

            if ($element[1] == 1) {
                if($donnees['id_user'] == 0) {
                    $timeSlot->setIdUser(null);
                } else {
                    $timeSlot->setIdUser($donnees['id_user']);
                }
            } else {
                $timeSlot->setIdUser(0);
            }

            $timeSlot->save();
        }

        exit;
    }

    public function ajaxTableAction($params){
        $id_salle = $params['GET']['room'];

        $day = $params['GET']['day'];
        $month = $params['GET']['month'];
        $year = $params['GET']['year'];

        if($day < 10) {
            $day = "0".$day;
        }

        if($month < 10){
            $month = "0".$month;
        }

        $theDate = $year.'-'.$month.'-'.$day;

        $calendar = new Calendar();
        $calendar->setDateCalendar($theDate);
        $response_date = $calendar->select('date_calendar');

        $donnees_date = $response_date->fetch();

        $timeSlot = new Time_slot();
        $timeSlot->setIdCalendar($donnees_date['id']);
        $response_timeSlot = $timeSlot->select('id_calendar');

        while($donnees_timeSlot = $response_timeSlot->fetch()){
            $temp = array();
            if($id_salle == $donnees_timeSlot['id_room']){
                if(is_null($donnees_timeSlot['id_user'])){
                    $temp['id_user'] = '';
                    $temp['time_slot'] = $donnees_timeSlot['time_slot'];
                    $temp['nb_players'] = '';
                    $temp['price'] = '';
                    $temp['is_active'] = true;
                } else {
                    if($donnees_timeSlot['id_user'] != 0) {
                        $temp['id_user'] = $donnees_timeSlot['id_user'];
                        $temp['time_slot'] = $donnees_timeSlot['time_slot'];
                        $temp['nb_players'] = $donnees_timeSlot['number_player'];
                        $temp['price'] = $donnees_timeSlot['total_price'];
                        $temp['is_active'] = true;
                    } else {
                        $temp['id_user'] = '';
                        $temp['time_slot'] = $donnees_timeSlot['time_slot'];
                        $temp['nb_players'] = '';
                        $temp['price'] = '';
                        $temp['is_active'] = false;
                    }
                }
                $timeSlot_Tab[$donnees_timeSlot['id']] = $temp;
            }
        }

        echo json_encode($timeSlot_Tab);
        exit;
    }

    public function ajaxCalendarAction($params)
    {
        $id_salle = $params['GET']['room'];

        // Récuperation des variables passées, on donne soit année; mois; année+mois
        if (!isset($params['GET']['month'])) $num_month = date('n'); else $num_month = $params['GET']['month'] + 1;
        if (!isset($params['GET']['year'])) $num_year = date('Y'); else $num_year = $params['GET']['year'];

        if ($num_month < 10) {
            $monthTemp = "0" . $num_month;
        } else {
            $monthTemp = $num_month;
        }
        $date = $num_year . '-' . $monthTemp . '-%';

        $calendar = new Calendar();
        $calendar->setDateCalendar($date);
        $response_date = $calendar->select('date_calendar');

        while ($donnees_date = $response_date->fetch()) {
            $dayTemp = explode('-', $donnees_date['date_calendar']);
            $day = intval($dayTemp[2]);

            $temp = array();
            $timeSlot = new Time_slot();
            $timeSlot->setIdCalendar($donnees_date['id']);
            $response_timeSlot = $timeSlot->select('id_calendar');
            while ($donnees_timeSlot = $response_timeSlot->fetch()) {
                if ($id_salle == $donnees_timeSlot['id_room']) {
                    if (is_null($donnees_timeSlot['id_user'])) {
                        $temp[$donnees_timeSlot['id']] = $donnees_timeSlot['time_slot'];
                    }
                }
            }
            $timeSlot_Tab[$day] = $temp;
        }
        echo json_encode($timeSlot_Tab);
        exit;
    }

    function insertNewSlotAction($params){
	    $idRoom = $params['URL'][0];

        $calendar = new Calendar();
        $responseCalendar = $calendar->select();

        $slots = [
            '10h00-11h30',
            '12h00-13h30',
            '14h00-15h30',
            '16h00-17h30',
            '18h00-19h30',
            '20h00-21h30',
            '22h00-23h30'
        ];

        $timeSlot = new Time_slot();

        while($donnees_calendar = $responseCalendar->fetch()) {
            foreach($slots as $slot) {
                $timeSlot->setIdCalendar($donnees_calendar['id']);
                $timeSlot->setIdRoom($idRoom);
                $timeSlot->setIdUser(null);
                $timeSlot->setTimeSlot($slot);
                $timeSlot->setNumberPlayer(0);
                $timeSlot->setTotalPrice(0);
                $timeSlot->setDateBill(null);
                $timeSlot->setOpinion(null);
                $timeSlot->save();
            }
        }

        header("Location: ".DIRNAME.Route::getSlug('organization','index'));
    }
}

 ?>
