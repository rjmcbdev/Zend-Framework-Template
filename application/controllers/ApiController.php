<?php

class ApiController extends Zend_Rest_Controller {

    public function init() {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
    }

    public function indexAction() {
        $this->getResponse()
                ->appendBody("From indexAction() returning all articles");
    }

    public function getAction() {
//        $a = new Zend_Rest_Controller($request, $response);
        $this->getResponse()
                ->appendBody("From getAction() returning the requested article");
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

