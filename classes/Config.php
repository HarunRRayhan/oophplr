<?php

/**
* PHP OOP Login Register Project
* You can copy paste it
* @package ooplr
**/

/**
 * Config Class
 */
class Config {
    
   /**
    * getting Config
    * @param string $path
    * @return string/boolean
    */
    public static function get($path = null) {
        if($path){
            $config = $GLOBALS['config'];
            $path = explode('/', $path);
            
            foreach($path as $bit){
                if(isset($config[$bit])) {
                    $config = $config[$bit];
                    
                }
            }
            
            return $config;
        }
        
        return false;
    }    
}