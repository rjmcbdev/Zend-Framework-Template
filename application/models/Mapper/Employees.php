<?php

class Application_Model_Mapper_Employees extends App_BaseMapper {

    private $_dbTable;

    function __construct() {
        $this->_dbTable = new Application_Model_DbTable_Employees();
    }

    public function save(Application_Model_Employees $employee) {
        $id = $employee->__get("id");

        /* current date */
        $date = new Zend_Date();
        $date = date("Y-m-d H:i:s", $date->getTimestamp());

        if (empty($id)) {
            $data = array(
                'firstname' => ucwords($employee->__get("firstname")),
                'lastname' => ucwords($employee->__get("lastname")),
                'added_on' => $date,
                'active' => 1
            );

            $this->_dbTable->insert($data);
        } else {
            $data = array(
                'user_id' => $employee->__get("user_id"),
                'firstname' => ucwords($employee->__get("firstname")),
                'lastname' => ucwords($employee->__get("lastname")),
                'active' => $employee->__get("active"),
            );
            $where = $this->_dbTable->getAdapter()->quoteInto("id=?", $id);
            $this->_dbTable->update($data, $where);
        }
    }

    public function delete(Application_Model_Employees $employee) {
        if ($employee) {
            $id = $employee->__get("id");
            $data = array(
                "active" => 0
            );
            $where = $this->_dbTable->getAdapter()->quoteInto("id=?", $id);
            $this->_dbTable->update($data, $where);
        }
    }

    /**
     *
     * @param type $id
     * @return Application_Model_Employees 
     */
    public function findById($id) {
        $object = $this->_dbTable->find($id);
        $select = $this->_dbTable->select()
                ->where("id=?", $id)
                ->where("active=?", 1);
        $object = $this->_dbTable->fetchRow($select);
        if (empty($object)) {
            $this->setFlag(false)->setMsg("error", 101);
            return $this->getResult();
        }
        print_r($object);


        /* Instantiate Model */
        $employee = new Application_Model_Employees($object);

        return $employee;
    }

    public function getDbTable() {
        return $this->_dbTable;
    }

    public function setDbTable($dbTable) {
        $this->_dbTable = $dbTable;
    }

}

