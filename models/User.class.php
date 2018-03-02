<?php
class User extends BaseSql{

  protected $id = null;
  protected $firstname;
  protected $lastname;
  protected $years_old;
  protected $email;
  protected $phone;
  protected $address;
  protected $address_2;
  protected $zipcode;
  protected $city;
  protected $password;
  protected $token = "11111111111111111111111111111111";

  protected $status = 2; //Définit l'état de l'utilisateur, 1 banni, 2 toujours ok, etc etc
  protected $date_inserted;
  protected $date_updated;

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

  public function setYearsOld($years_old) {
    $this->years_old=$years_old;
  }

  public function setEmail($email) {
    $this->email=strtolower(trim($email));
  }

  public function setPhone($phone) {
    $this->phone=trim($phone);
  }

  public function setAddress($address) {
    $this->address=strtolower(trim($address));
  }

  public function setAdress2($address_2) {
    $this->address_2=strtolower(trim($address_2));
  }

  public function setZipcode($zipcode) {
    $this->zipcode=trim($zipcode);
  }

  public function setCity($city) {
    $this->city=strtoupper(trim($city));
  }

  public function setPassword($password) {
    $this->password= password_hash($password, PASSWORD_DEFAULT); //possibilité de sécuriser avec des algos plus facilement
    //on peut changer la constante pour mettre à jour le hash plus facilement
  }

  public function setToken($token) {
    $this->token=$token;
  }

  public function setStatus($status) {
    $this->status=$status;
  }

}

 ?>
