<?php

/**
* PHP OOP Login Register Project
* You can copy paste it
* @package ooplr
**/


// Loading Main Function/init
require_once 'core/init.php';



if(Session::exists('home')){
    echo '<p>' . Session::flash('home') . '</p>';
}

$user = new User(); 
if($user->isLoggedIn()) {
 ?>
<p>Hello <a href="#"><?php echo escape($user->data()->username); ?></a>!</p>
<ul>
    <li><a href="logout.php">Logout</a></li>
    <li><a href="update.php">Update details</a></li>
    <li><a href="changepassword.php">Change Password</a></li>
</ul>
<?php
} else {
    echo '<p>You need to <a href="login.php">log in</a> or <a href="register.php">register</a></p>';
}


