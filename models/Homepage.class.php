<?php
class Homepage extends BaseSql{

  protected $id = null;
  protected $id_room_1;
  protected $id_room_2;
  protected $id_room_3;
  protected $title_introduction;
  protected $description_introduction;
  protected $url_video;
  protected $name_company;
  protected $address_company;
  protected $zipcode_company;
  protected $city_company;
  protected $url_google;

  public function __construct() {
    parent::__construct();
  }

  public function setId($id) {
    $this->id=$id;
  }

  public function setIdRoom1($id_room_1) {
    $this->id_room_1=$id_room_1;
  }
  
  public function setIdRoom2($id_room_2) {
    $this->id_room_2=$id_room_2;
  }

  public function setIdRoom3($id_room_3) {
    $this->id_room_3=$id_room_3;
  }

  public function setTitleIntroduction($title_introduction) {
    $this->title_introduction=ucfirst(strtolower(trim($title_introduction)));
  }

  public function setDescriptionIntroduction($description_introduction) {
    $this->description_introduction=trim($description_introduction);
  }

  public function setUrlVideo($url_video) {
    $this->url_video=strtolower(trim($url_video));
  }

  public function setNameCompany($name_company) {
    $this->name_company=ucfirst(strtolower(trim($name_company)));
  }

  public function setAddressCompany($address_company) {
    $this->address_company=strtolower(trim($address_company));
  }

  public function setZipcodeCompany($zipcode_company) {
    $this->zipcode_company=trim($zipcode_company);
  }

  public function setCityCompany($city_company) {
    $this->city_company=strtoupper(trim($city_company));
  }

  public function setUrlGoogle($url_google) {
    $this->url_google=strtolower(trim($url_google));
  }

}

 ?>
