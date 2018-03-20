<?php
class Contact extends BaseSql{

  protected $id = null;
  protected $firstname;
  protected $lastname;
  protected $email;
  protected $address;
  protected $subject;
  protected $content;
  protected $phone = null;
  protected $is_read = 0;
  protected $date_send;

  public function __construct() {
    parent::__construct();
  }

  public function setId($id) {
    $this->id=$id;
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

  public function setPhone($phone) {
    $this->phone=trim($phone);
  }

  public function setSubject($subject) {
    $this->subject=strtolower(trim($subject));
  }

  public function setContent($content) {
    $this->content=trim($content);
  }

  public function setIsRead($status) {
    $this->status=$status;
  }

}

 ?>
