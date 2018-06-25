<?php

class ParametersController
{
    public function indexAction($params)
    {
        $footer = new Footer();
        $footer->setId(1);
        $response_footer = $footer->select('id');
        $donnee_footer = $response_footer->fetch();

        $homepage = new Homepage();
        $homepage->setId(1);
        $response_homepage = $homepage->select('id');
        $donnees_homepage = $response_homepage->fetch();
        $donnee_footer['unit_price'] = $donnees_homepage['unit_price'];

        $v = new View('parameters','back');
        $v->assign("donnees",$donnee_footer);

    }

    public function saveAction($params)
    {

    }
}