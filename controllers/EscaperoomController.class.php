<?php

class EscaperoomController
{
    public function indexAction($params)
    {
        //A rendre dynamique 
        $id_room = $params['URL'][0];
        ////////
        $room = new Room();
        $room->setId($id_room);
        $response_room = $room->select('id');
        $donnees_room = $response_room->fetch();

        $picture = new Picture();
        $picture->setIdRoom($donnees_room['id']);
        $response_picture = $picture->select('id_room');
        while($donnees_picture = $response_picture->fetch()){
            switch($donnees_picture['order_picture']){
                case 1:
                    $donnees_room['picture_1'] = $donnees_picture['url_picture'];
                break;
                case 2:
                    $donnees_room['picture_2'] = $donnees_picture['url_picture'];
                break;
                case 3:
                    $donnees_room['picture_3'] = $donnees_picture['url_picture'];
                break;
                case 4:
                    $donnees_room['picture_4'] = $donnees_picture['url_picture'];
                break;
            }
        }
        $opinion = new Time_slot();
        $opinion->setIdRoom($donnees_room['id']);
        $response_opinion = $opinion->select('id_room');
        $opinions = array();
        while($donnees_opinion = $response_opinion->fetch()){
            if(!is_null($donnees_opinion['opinion'])){
                $date = new Calendar();
                $date->setId($donnees_opinion['id_calendar']);
                $response_date = $date->select('id');
                $donnees_date = $response_date->fetch();
                $dateExploded = explode('-',$donnees_date['date_calendar']);
                $donnees_date['date_calendar'] = $dateExploded[2].'/'.$dateExploded[1].'/'.$dateExploded[0];
            
                $user = new User();
                $user->setId($donnees_opinion['id_user']);
                $response_user = $user->select('id');
                $donnees_user = $response_user->fetch();
                $opinion_lastname = substr($donnees_user['lastname'],0,1) . '.' ;

                $opinion_people['date'] = $donnees_date['date_calendar'];
                $opinion_people['name'] = $opinion_lastname . ' ' . $donnees_user['firstname'];
                $opinion_people['score'] = $donnees_opinion['opinion'];

                array_push($opinions, $opinion_people);
            }
        }

        $donnees_room['opinions'] = $opinions;
       
        $v = new View('escaperoom');
        $v->assign("donnees",$donnees_room);
    }
}
