<?php

class ReservationController
{
    public function indexAction($params)
    {
         //Appelle la vue
         if ($_SESSION['is_connected']) {
            $v = new View('reservation','connected');
        } else {
            $v = new View('reservation');
        }

    }
}
