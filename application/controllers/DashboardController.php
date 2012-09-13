<?php

class DashboardController extends Zend_Controller_Action
{

    public function init()
    {
        $this->view->dashboard= true;
    }

    public function indexAction()
    {
        $this->view->pageTitle = "Dashboard";
    }
}

