<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseService
 *
 * @author Arjay
 */
abstract class App_BaseModel {

    public $active;
    public $added_on;
    public $added_by;
    public $modified_on;
    public $modified_by;

    function __construct() {
        $this->_setDefaultAddedOn();
        $this->_setDefaultActive();
    }

    private function _setDefaultAddedOn() {
        $date = new Zend_Date();
        $date = date("Y-m-d H:i:s", $date->getTimestamp());
        $this->added_on = $date;
    }

    private function _setDefaultActive() {
        $this->active = 1;
    }

}

?>
