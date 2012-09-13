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
abstract class App_BaseResults {

    public $msg = array("default" => "Saved");
    public $flag = true;

    public function setMsg($type, $code) {
        $labels = array("default", "error", "success", "warning", "important", "info");
            $msg = $this->getCodedMsg($code);
        if (in_array($type, $labels)) {
            $this->msg[$type] = $msg;
            return $this;
        }
        return $this;
    }

    public function getMsg() {
        return $this->msg;
    }

    public function setFlag($flag) {
        $this->flag = $flag;
        return $this;
    }

    public function getFlag() {
        return $this->flag;
    }

    public function getResult() {
        if (!$this->flag) {
            $this->showErrorOnly();
        }
        $result = array(
            "msg" => $this->msg,
            "flag" => $this->flag
        );
        return $result;
    }

    public function showErrorOnly() {
        $labels = array("default", "success", "warning", "important", "info");
        foreach ($labels as $val) {
            unset($this->msg[$val]);
        }
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

?>
