<?php

class ActivitiesController extends Zend_Controller_Action {

    public function init() {
        $this->view->activities = true;
        $this->_helper->contextSwitch()
                ->addActionContext('list', array('xml', 'json'))
                ->setAutoJsonSerialization(true)
                ->initContext();
    }

    public function indexAction() {
        $this->_forward("list");
    }

    public function listAction() {
        $this->view->pageTitle = "Activities";
    }

    public function calendarAction() {
        if ($this->_request->isXmlHttpRequest()) {
            $this->_helper->getHelper('layout')->disableLayout();
        }
    }

}

