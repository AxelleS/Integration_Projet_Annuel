<?php
class Type_user extends BaseSql{

  protected $id = null;
  protected $libel;

  public function __construct() {
    parent::__construct();
  }

  public function setId($id) {
    $this->id=$id;
  }

  public function setLibel($libel){
    $this->libel= $libel;
  }
}

?>
