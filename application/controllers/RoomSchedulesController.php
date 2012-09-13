<?php

class RoomSchedulesController extends Zend_Controller_Action {

    public function init() {
        $this->view->roomSchedule = true;
    }

    public function indexAction() {
        $this->view->pageTitle = "Room Schedules";
    }

}

