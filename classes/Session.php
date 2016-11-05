<?php

/**
* PHP OOP Login Register Project
* You can copy paste it
* @package ooplr
**/

class Session {
    public static function put($name, $value) {
        return $_SESSION[$name] = $value;
    }
}
