<?php

class IndexController
{
    public function indexAction($params)
    {
        if(isset($_COOKIE['cookie'])){
            $statitique = new Statistic();
            $statitique->setValueCookie($_COOKIE['cookie']);
            $nbCookies = $statitique->count('value_cookie')->fetch();
            if($nbCookies[0] < 1) {
                $statitique->save();
            }
        }

        $homepage = new Homepage();
        $homepage->setId(1);
        $response_homepage = $homepage->select('id');
        $donnees_homepage = $response_homepage->fetch();

        $picture = new Picture();
        $response_picture = $picture->select('id_room');
        $array_image = array();
        while($donnees_picture = $response_picture->fetch()){
            array_push($array_image,$donnees_picture['url_picture']);
        }
        $donnees_homepage['carrousel'] = $array_image;
        
        $room = new Room();
        $room->setId($donnees_homepage['id_room_1']);
        $response_room = $room->select('id');
        $donnees_room = $response_room->fetch();
        $donnees_homepage['name_room_1'] = $donnees_room['name'];

        $room->setId($donnees_homepage['id_room_2']);
        $response_room = $room->select('id');
        $donnees_room = $response_room->fetch();
        $donnees_homepage['name_room_2'] = $donnees_room['name'];

        $room->setId($donnees_homepage['id_room_3']);
        $response_room = $room->select('id');
        $donnees_room = $response_room->fetch();
        $donnees_homepage['name_room_3'] = $donnees_room['name'];

        $picture->setIdRoom($donnees_homepage['id_room_1']);
        $response_picture = $picture->select('id_room');
        while($donnees_picture = $response_picture->fetch()){
            if($donnees_picture['is_main'] == 1){
                $donnees_homepage['picture_room_1'] = $donnees_picture['url_picture'];
            }
        }

        $picture->setIdRoom($donnees_homepage['id_room_2']);
        $response_picture = $picture->select('id_room');
        while($donnees_picture = $response_picture->fetch()){
            if($donnees_picture['is_main'] == 1){
                $donnees_homepage['picture_room_2'] = $donnees_picture['url_picture'];
            }
        }

        $picture->setIdRoom($donnees_homepage['id_room_3']);
        $response_picture = $picture->select('id_room');
        while($donnees_picture = $response_picture->fetch()){
            if($donnees_picture['is_main'] == 1){
                $donnees_homepage['picture_room_3'] = $donnees_picture['url_picture'];
            }
        }

        //Appelle la vue
        if ($_SESSION['is_connected']) {
            $v = new View('index','connected');
        } else {
            $v = new View('index');
        }

        $donnees_maps = Data::getMapsModal($donnees_homepage['address_company'], $donnees_homepage['city_company'], $donnees_homepage['zipcode_company']);

        $donnees_video = Data::getPlayerVideo($donnees_homepage['url_video']);
        $v->assign('donnees_video', $donnees_video);
        $v->assign("donnees_maps", $donnees_maps);
        $v->assign("donnees",$donnees_homepage);

    }
}
