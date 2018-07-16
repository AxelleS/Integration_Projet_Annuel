<?php

class ErrorsController
{
    public function quatreCentQuatreAction($params)
    {
        //Appelle la vue
        if ($_SESSION['is_connected']) {
            $v = new View('404', 'connected');
        } else {
            $v = new View('404');
        }
    }

    public function quatreCentTroisAction($params)
    {
        //Appelle la vue
        if ($_SESSION['is_connected']) {
            $v = new View('403', 'connected');
        } else {
            $v = new View('403');
        }
    }
}