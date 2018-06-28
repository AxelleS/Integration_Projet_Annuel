<?php

class ReservationController
{
    public function indexAction($params)
    {
        $room = new Room();
        $response = $room->select();

         //Appelle la vue
         if ($_SESSION['is_connected']) {
            $v = new View('reservation','connected');
        } else {
            $v = new View('reservation');
        }

        $v->assign('response', $response);

    }
}
