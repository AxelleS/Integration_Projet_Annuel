<?php

class IndexController
{
    public function indexAction($params)
    {
        $homepage = new Homepage();
        $homepage->setId(1);
        $response_homepage = $homepage->select('id');
        $donnees_homepage = $response_homepage->fetch();

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

        $v = new View();
        $v->assign("donnees",$donnees_homepage);

    }
}
