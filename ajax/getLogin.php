<?php

	$filePath = realpath(dirname(__FILE__));
	include_once ($filePath.'/../classes/User.php');
	$user = new User();

	
	$email    = $_POST['email'];
	$password = $_POST['password'];

	$userLogin = $user->userLogin($email,$password);
?>