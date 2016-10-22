<?php

/**
* PHP OOP Login Register Project
* You can copy paste it
* @package ooplr
**/


// Loading Main Function/init
require_once 'core/init.php';

if(Input::exists()){
    $validate = new Validate();
    $validation = $validate->check($_POST, array(
        'username' => array(
            'required' => true,
            'min' => 2,
            'max' => 20,
            'unique' => 'users'
        ),
        'password' => array(
            'required' => true,
            'min' => 6
        ),
        'password_again' => array(
            'required' => true,
            'matches' => 'password'           
        ),
        'name' => array(            
            'required' => true,
            'min' => 2,
            'min' => 50
        ),
    ));
    
    if($validate->passed()){
        echo 'Passed';
    } else {
        print_r($validation->errors());
    }
}
?>
<form action="" method="post">
    <div class="field">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="<?php echo escape(Input::get('username')); ?>" autocomplete="off"/>
    </div>
    
    <div class="field">
        <label for="password">Choose a Password</label>
        <input type="password" name="password" id="password"/>
    </div>
    
    <div class="field">
        <label for="password_again">Enter your Password Again</label>
        <input type="password" name="password_again" id="password_again"/>
    </div>
    
    <div class="field">
        <label for="name">Name</label>
        <input type="text" name="name" value="<?php echo escape(Input::get('name')); ?>" id="name"/>
    </div>
    <input type="submit" value="Register"/>
</form>