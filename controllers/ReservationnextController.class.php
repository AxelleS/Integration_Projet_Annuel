<?php

class ReservationnextController
{
    public function indexAction($params)
    {
        //Appelle la vue
        if ($_SESSION['is_connected']) {
            $v = new View('reservationnext','connected');
        } else {
            $v = new View('reservationnext');
        }

    }

    public function saveAction($params)
    {
        
    }
}
