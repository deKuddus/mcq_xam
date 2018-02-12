<?php

	$filePath = realpath(dirname(__FILE__));
	include_once ($filePath.'/../classes/User.php');


	$user = new User();


	/*$userid   = $_POST['id'];
	$name 	  = $_POST['name'];
	$userName = $_POST['userName'];
	$email    = $_POST['email'];*/

	$userProfileUpdate = $user->userProfileUpdate($_POST);

?>