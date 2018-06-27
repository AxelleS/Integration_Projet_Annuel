<?php
class Time_slot extends BaseSql{

  protected $id = null;
  protected $id_calendar;
  protected $id_room;
  protected $id_user = null;
  protected $time_slot;
  protected $number_player = null;
  protected $total_price = null;
  protected $date_bill = null;
  protected $opinion = null;

  protected $foreign;

  public function __construct() {
    parent::__construct();
  }

  public function setId($id) {
    $this->id=$id;
  }

  public function setIdCalendar($id_calendar) {
    $this->id_calendar=$id_calendar;
  }

  public function setIdRoom($id_room) {
    $this->id_room=$id_room;
  }

  public function setIdUser($id_user) {
    $this->id_user=$id_user;
  }

  public function setTimeSlot($time_slot) {
    $this->time_slot=strtolower(trim($time_slot));
  }

  public function setNumberPlayer($number_player) {
    $this->number_player=$number_player;
  }

  public function setTotalPrice($total_price) {
    $this->total_price=$total_price;
  }

  public function setDateBill($date_bill) {
    $this->date_bill=$date_bill;
  }

  public function setOpinion($opinion) {
    $this->opinion=$opinion;
  }

  public function setForeign($foreign){
      $this->foreign=$foreign;
  }

}

 ?>
