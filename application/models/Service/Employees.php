<?php

class Application_Model_Service_Employees extends App_BaseService {

    protected $_mapper;
    protected $_errorCode;

    public function __construct() {
        $this->_mapper = new Application_Model_Mapper_Employees();
    }

    public function createNewEmployee(array $data) {
        $employee = new Application_Model_Employees();
        $employee->__set("firstname", $data['firstname']);
        $employee->__set("lastname", $data['lastname']);
        $this->getMapper()->save($employee);
        $this->setFlag(true)
                ->setMsg("success", "Employee Added!");
        return $this->getResult();
    }

    public function editEmployee($id, array $data) {
        $employeeMapper = new Application_Model_Mapper_Employees();
        $employee = $employeeMapper->findById($id);
        $employee->__set("firstname", $data['firstname']);
        $employee->__set("lastname", $data['lastname']);
        $this->getMapper()->save($employee);
        $this->setFlag(true)
                ->setMsg("success", "Employee Added!");
        return $this->getResult();
    }

    public function deleteEmployee($id, array $data) {
        $employeeMapper = new Application_Model_Mapper_Employees();
        $employee = $employeeMapper->findById($id);
        $employeeMapper->delete($employee);
        $this->setFlag(true)
                ->setMsg("success", "Employee deleted!");
        return $this->getResult();
    }

    public function getCodedMsg($code=null) {
        switch ($code) {
            case 666:
                $msg = "Error code [666] : Error!";
                return $msg;
                break;
            case 101:
                $msg = "Error code [101] : Not found!";
                return $msg;
                break;
            default:
                $msg = "Saved!";
                return $msg;
                break;
        }
    }

}