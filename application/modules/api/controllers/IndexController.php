<?php

class Api_IndexController extends Zend_Rest_Controller{

    public function init() {
        $this->_helper->contextSwitch()
                ->addActionContext('index', array('xml', 'json'))
                ->addActionContext('get', array('xml', 'json'))
                ->addActionContext('put', array('xml', 'json'))
                ->addActionContext('post', array('xml', 'json'))
                ->addActionContext('delete', array('xml', 'json'))
                ->setAutoJsonSerialization(true)
                ->initContext();
        $this->params = $this->_getAllParams();
    }

    public function indexAction() {
        $this->view->test = "as";
        
    }

    public function getAction() {
//        $a = new Zend_Rest_Controller($request, $response);
        
        print_r($this->getResponse());
        $this->view->a = "as";
//        $this->getResponse()
//                ->appendBody("From getAction() returning the requested article");
    }

    public function postAction() {
        $this->getResponse()
                ->appendBody("From postAction() creating the requested article");
    }

    public function putAction() {
        $this->getResponse()
                ->appendBody("From putAction() updating the requested article");
    }

    public function deleteAction() {
        $this->getResponse()
                ->appendBody("From deleteAction() deleting the requested article");
    }

}

