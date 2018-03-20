<?php

class UserController
{
    public function indexAction($params)
    {
        $v = new View();
    }

    public function addAction($params)
    {
        echo "ajout d'un user";
    }
    public function modifyAction($params)
    {
        echo "modification d'un utilisateur";
    }
}
