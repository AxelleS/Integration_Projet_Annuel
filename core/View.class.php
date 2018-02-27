<?php

class View
{
    private $v;
    private $t;

    public function __construct($v="default", $t="default"){
        $this->v = $v.".view.php";
        $this->t = $t.".tpl.php";

        if(!file_exists("views/".$this->v)){
            die("La vue " . $this->v . " n'existe pas");
        }

        if(!file_exists("views/templates/".$this->t)){
            die("Le template " . $this->t . " n'existe pas");
        }
    }

    function __destruct(){
        include "views/templates/".$this->t;
    }
}