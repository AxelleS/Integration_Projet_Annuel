<?php
class Faq extends BaseSql{

  protected $id = null;

  public function __construct() {
    parent::__construct();
  }

  public function setId($id) {
    $this->id=$id;
  }

  public function setName($name) {
    $this->name=ucfirst(strtolower(trim($name)));
  }

  public function setDescription($description) {
    $this->description=trim($description);
  }

}

 ?>
