<?php

class FaqController
{
    public function indexAction($params)
    {
        //Appelle la vue
        if ($_SESSION['is_connected']) {
            $v = new View('faq','connected');
        } else {
            $v = new View('faq');
        }
    }
}
