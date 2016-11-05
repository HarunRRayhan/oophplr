<?php

/**
* PHP OOP Login Register Project
* You can copy paste it
* @package ooplr
**/

class Redirect {
    public static function to($location = null) {
        if($location) {
            if(is_numeric($location)) {
                switch ($location) {
                    case 404:
                        header('HTTP/1.0 404 Not Found');
                        include 'includes/errors/404.php';
                        exit();
                    break;
                }
            }
            header('Location: ' . $location);
            exit();
        }
    }
}