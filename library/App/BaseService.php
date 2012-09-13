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
abstract class App_BaseService extends App_BaseResults {

    public function setMapper(App_BaseMapper $mapper = null) {
        $this->_mapper = new $mapper;
    }

    public function getMapper() {
        return $this->_mapper;
    }

}

?>
