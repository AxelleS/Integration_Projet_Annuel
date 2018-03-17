<?php
class Room extends BaseSql{

  protected $id = null;
  protected $name;
  protected $description;
  protected $url_video;
  protected $capacity;
  protected $is_pregnant = 0;
  protected $is_wheelchair = 0;
  protected $is_deaf = 1;

  protected $date_inserted;
  protected $date_updated;

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

  public function setUrlVideo($url_video) {
    $this->url_video=strtolower(trim($url_video));
  }

  public function setCapacity($capacity) {
    $this->capacity=$capacity;
  }

  public function setIsPregnant($is_pregnant) {
    $this->is_pregnant=$is_pregnant;
  }

  public function setIsWheelchair($is_wheelchair) {
    $this->is_wheelchair=$is_wheelchair;
  }

  public function setIsDeaf($is_deaf) {
    $this->is_deaf=$is_deaf;
  }

}

 ?>
