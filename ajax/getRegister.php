<?php

	$filePath = realpath(dirname(__FILE__));
	include_once ($filePath.'/../classes/User.php');
	$user = new User();

	$name 	  = $_POST['name'];
	$userName = $_POST['userName'];
	$email    = $_POST['email'];
	$password = $_POST['password'];

	$userRegister = $user->userRegisteration($name,$userName,$email,$password);

?>