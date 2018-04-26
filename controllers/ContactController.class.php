<?php

class ContactController
{
    public function indexAction($params)
    {
        //Appelle la vue
        if ($_SESSION['is_connected']) {
            $v = new View('contact','connected');
        } else {
            $v = new View('contact');
        }
    }

    public function saveAction($params){}
}
