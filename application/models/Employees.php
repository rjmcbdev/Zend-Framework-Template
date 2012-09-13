<?php

class Application_Model_Employees extends App_BaseModel {

    private $id,
    $user_id,
    $firstname,
    $lastname;

    function __construct(Zend_Db_Table_Row $options= null) {
        if ($options) {
            $options = $options->toArray();
            $this->setOptions($options);
        }
    }

    public function setOptions($options) {
        foreach ($options as $key => $val) {
            switch ($key) {
                case "user_id":
                    $val = null;
                    break;
                default:
                    break;
            }
            $this->__set($key, $val);
        }
        return $this;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }

    public function __get($name) {
        return $this->$name;
    }

    public function toArray() {
        $array = array(
            "id" => $this->__get("id"),
            "user_id" => $this->__get("user_id"),
            "firstname" => $this->__get("firstname"),
            "lastname" => $this->__get("lastname"),
        );
        return $array;
    }

}

