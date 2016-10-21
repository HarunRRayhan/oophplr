<?php

/**
* PHP OOP Login Register Project
* You can copy paste it
* @package ooplr
**/

//Starting Session
session_start();

$GLOBALS['config'] = array(
    'mysql'     => array(
        'host' => '127.0.0.1',
        'username' => 'root',
        'password' => '',
        'db' => 'lr'
    ),
    'remember'  => array(
        'cookie_name' => 'hash',
        'cookie_expiry' => 604800
    ),
    'session'   => array(
        'session_name' => 'user'
    )
);

