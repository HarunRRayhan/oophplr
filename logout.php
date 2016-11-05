<?php

/**
* PHP OOP Login Register Project
* You can copy paste it
* @package ooplr
**/


// Loading Main Function/init
require_once 'core/init.php';

$user = new User();
$user->logout();

Redirect::to('index.php');