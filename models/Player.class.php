<?php
class Player extends BaseSql{

  protected $id = null;
  protected $id_time_slot;
  protected $firstname;
  protected $lastname;
  protected $email;
  protected $is_surprise = 0;

  protected $foreign;

  public function __construct() {
    parent::__construct();
  }

  public function setId($id) {
    $this->id=$id;
  }

  public function setIdTimeSlot($id_time_slot) {
    $this->id_time_slot=$id_time_slot;
  }

  public function setFirstname($firstname) {
    $this->firstname=ucfirst(strtolower(trim($firstname)));
  }

  public function setLastname($lastname) {
    $this->lastname=ucfirst(strtoupper(trim($lastname)));
  }

  public function setEmail($email) {
    $this->email=strtolower(trim($email));
  }

  public function setIsSurprise($is_surprise) {
    $this->is_surprise=$is_surprise;
  }

  public function setForeign($foreign){
      $this->foreign=$foreign;
  }

}

 ?>
