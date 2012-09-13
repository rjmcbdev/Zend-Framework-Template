<?php

class IndexController extends Zend_Controller_Action {

    public function init() {
        $this->_helper->contextSwitch()
                ->addActionContext('a', array('xml', 'json'))
                ->addActionContext('list', array('xml', 'json'))
                ->addActionContext('index', array('xml', 'json'))
                ->addActionContext('edit', array('xml', 'json'))
                ->addActionContext('delete', array('xml', 'json'))
                ->setAutoJsonSerialization(true)
                ->initContext();
        $this->params = $this->_getAllParams();
    }

    function aAction() {
        $this->view->team = 'a';
        $this->view->players = array(
            'David James',
            'Ashley Cole',
            'John Terry',
            'Rio Ferdinand',
            'Glen Johnson',
            'Joe Cole',
            'Steven Gerrard',
            'Frank Lampard',
            'David Beckham',
            'Wayne Rooney',
            'Michael Owen',
        );
    }

    public function indexAction() {
        $params = $this->params;
//        $emp = new Application_Model_Service_Employees();
//        $data = array(
//            "firstname" => $params["firstname"],
//            "lastname" => $params["lastname"]
//        );
//        $result = $emp->createNewEmployee($data);
        if ($this->getRequest()->isPost()) {
            $emp = new Application_Model_Mapper_Employees();
            $employee = $emp->findById($params[id]);
            $employee = $employee->toArray();
            $this->view->result = $employee;
        }
    }

    public function editAction() {
        $params = $this->params;
        $id = $params['id'];
        $employee = new Application_Model_Service_Employees();
        $data = array(
            "firstname" => $params['firstname'],
            "lastname" => $params['lastname']
        );
        $employee->editEmployee($id, $data);
    }

    public function deleteAction() {
        $params = $this->params;
        $id = $params['id'];
        $employee = new Application_Model_Service_Employees();
        $data = array(
            "firstname" => $params['firstname'],
            "lastname" => $params['lastname']
        );
        $result = $employee->deleteEmployee($id, $data);
        $this->view->result = $result;
    }

    public function listAction() {
        $params = $this->getRequest()->getParams();
        $this->view->params = $params;
        $this->view->flag = true;
        $this->view->msg = "Success!";
    }

    public function pagesAction() {
        
    }

    public function calendarAction() {
        $this->_helper->getHelper('layout')->disableLayout();
        $this->_helper->viewRenderer->setNoRender(false);
    }

    public function tablesAction() {
        $this->_helper->getHelper('layout')->disableLayout();
        $this->_helper->viewRenderer->setNoRender(false);
    }

}

