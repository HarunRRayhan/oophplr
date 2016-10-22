<?php

/**
* PHP OOP Login Register Project
* You can copy paste it
* @package ooplr
**/


// Loading Main Function/init
require_once 'core/init.php';

$userInsert = DB::getInstance()->update('users', 5, array(
    'password' => 'newpassword',
    'name' => 'Nothing'
));



