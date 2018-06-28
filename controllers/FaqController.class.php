<?php

class FaqController
{
    public function indexAction($params)
    {
        $faq = new Faq();
        $response = $faq->select();

        //Appelle la vue
        if ($_SESSION['is_connected']) {
            $v = new View('faq','connected');
        } else {
            $v = new View('faq');
        }

        $v->assign('donnees', $response);
    }
}
