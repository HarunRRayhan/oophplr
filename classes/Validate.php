<?php

/**
* PHP OOP Login Register Project
* You can copy paste it
* @package ooplr
**/

class Validate{
    private $_passed = false,
            $_errors = array(),
            $_db = null;
    
    /**
     * Constructor
     */
    public function __construct() {
        $this->_db = DB::getInstance();
    } // __construct
    
    public function check($source, $items = array()) {
        foreach($items as $item => $rules) {
            foreach($rules as $rule => $rule_value) {
                
                $value = trim($source[$item]);
                $item = escape($item);
                
                if($rule === 'required' && empty($value)){
                    $this->addError("{$item} is required");
                } else if(!empty ($value)) {
                    switch($rule) {
                        case 'min':
                            if(strlen($value) < $rule_value) {
                                $this->addError("{$item} must be a minimum of {$rule_value} characters.");
                            }
                        break;
                        case 'max':
                            if(strlen($value) > $rule_value) {
                                $this->addError("{$item} must be a maximum of {$rule_value} characters.");
                            }
                        break;
                        case 'matches':
                            if($value != $source[$rule_value]){
                              $this->addError("{$rule_value} must match with {$item}")  ;
                            }
                        break;
                        case 'unique':
                            $check = $this->_db->get($rule_value, array($item, '=', $value));
                            if($check->count()) {
                                $this->addError("{$item} already exists.");
                            }
                        break;
                    }
                }
                
            }
        }
        
        if(empty($this->errors())) {
            $this->_passed = true;
        }
        
        return $this;
    } // check()
    
    /**
     * 
     * @param String $error
     */
     private function addError($error) {
         $this->_errors[] = $error;
    } // addError()
    
    public function errors() {
        return $this->_errors;
    }
    
    public function passed() {
        return $this->_passed;
    }
    
}