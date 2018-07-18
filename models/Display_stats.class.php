<?php
class Display_stats extends BaseSql{

  protected $id = null;
  protected $name;
  protected $activate = null;

  public function __construct() {
    parent::__construct();
  }

  public function setId($id) {
    $this->id=$id;
  }

  public function setName($name){
    $this->name= $name;
  }

  public function setActivate($activate) {
    $this->activate=$activate;
  }


}

 ?>