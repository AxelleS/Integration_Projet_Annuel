<?php
class Nav extends BaseSql{

  protected $id = null;
  protected $id_parent = null;
  protected $title;
  protected $url_location;
  protected $order_nav;
  protected $is_frontoffice = 0;
  protected $url_logo;

  protected $foreign;

  public function __construct() {
    parent::__construct();
  }

  public function setId($id) {
    $this->id=$id;
  }

  public function setIdParent($id_parent) {
    $this->id_parent=$id_parent;
  }

  public function setTitle($title) {
    $this->title=strtoupper(trim($title));
  }

  public function setUrlLocation($url_location) {
    $this->url_location=strtolower(trim($url_location));
  }

  public function setOrderNav($order_nav) {
    $this->order_nav=$order_nav;
  }

  public function setIsFrontOffice($is_frontoffice) {
    $this->is_frontoffice=$is_frontoffice;
  }

  public function setUrlLogo($url_logo) {
    $this->url_logo=strtolower(trim($url_logo));
  }

  public function setForeign($foreign){
      $this->foreign=$foreign;
  }
}

 ?>
