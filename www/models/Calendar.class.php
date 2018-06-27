<?php
class Calendar extends BaseSql{

    protected $id = null;
    protected $date_calendar;

    public function __construct() {
    parent::__construct();
    }

    public function setId($id) {
    $this->id=$id;
    }

    public function setDateCalendar($date_calendar) {
    $this->date_calendar=$date_calendar;
    }

}

 ?>
