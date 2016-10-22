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
                
                $value = $source[$item];
                
                if($rule === 'required' && empty($value)){
                    $this->addError("{$item} is required");
                } else {
                    
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