<?php
class Picture extends BaseSql{

  protected $id = null;
  protected $id_room;
  protected $url_picture;
  protected $order_picture;
  protected $is_main = 0;

  protected $foreign;

  public function __construct() {
    parent::__construct();
  }

  public function setId($id) {
    $this->id=$id;
  }

  public function setIdRoom($id_room) {
    $this->id_room=$id_room;
  }

  public function setUrlPicture($url_picture) {
    $this->url_picture=strtolower(trim($url_picture));
  }

  public function setOrderPicture($order_picture) {
    $this->order_picture=$order_picture;
  }

  public function setIsMain($is_main) {
    $this->is_main=$is_main;
  }

  public function setForeign($foreign){
      $this->foreign=$foreign;
  }

}

 ?>
