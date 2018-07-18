<?php
class Statistic extends BaseSql{

  protected $id = null;
  protected $value_cookie;
  protected $created_at;

  public function __construct() {
    parent::__construct();
  }

  public function setId($id) {
    $this->id=$id;
  }

  public function setValueCookie($value_cookie){
    $this->value_cookie= $value_cookie;
  }

  public function setCreatedAt($created_at) {
    $this->created_at = $created_at;
  }
}

 ?>
