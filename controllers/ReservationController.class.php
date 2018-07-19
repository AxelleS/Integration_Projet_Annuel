<?php

class ReservationController
{
    public function indexAction($params)
    {
        $room = new Room();
        $room->setStatus(ACTIF);
        $response = $room->select('status');

         //Appelle la vue
         if ($_SESSION['is_connected']) {
            $v = new View('reservation','connected');
        } else {
            $v = new View('reservation');
        }

        $v->assign('response', $response);

    }
}
