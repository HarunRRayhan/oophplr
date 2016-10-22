<?php

/**
* PHP OOP Login Register Project
* You can copy paste it
* @package ooplr
**/

/**
 * Input Class
 */
class Input {
    
    /**
     * Checking if Form Submitted
     * @param string $type get form method, default POST
     * @return boolean
     */
    public static function exists($type = 'post') {
        switch ($type){
            case 'post':
                return (!empty($_POST)) ? true : false;
            break;            
            case 'get':
                return (!empty($_GET)) ? true : false;
            break;            
            default :
                return false;
            break;
        }
    } // end exists()
    
    /**
     * Get Input Fields with data
     * @param string $item - input fileds name
     * @return string
     */
    public static function get($item) {
        if(isset($_POST[$item])) {
            return $_POST[$item];
        } else if(isset($_GET[$item])) {
            return $_GET[$item];
        }
        return '';
    } // get()
}