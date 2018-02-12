<?php
    $filePath = realpath(dirname(__FILE__));
   
    include_once ($filePath.'/../../library/Session.php');
    include_once ($filePath.'/../../classes/User.php');
    include_once ($filePath.'../../classes/Admin.php');
    include_once ($filePath.'../../classes/Exam.php');
    $user = new User();
    $admin = new Admin();
    $exam = new Exam();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>exam</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.min.css">
    <script src="js/jquery.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/main.js"></script>
</head>
<body>

<section class="content">


    <header class="header">
        <h2>Online Exam System</h2>
    </header>
    <div class="maincontent">
    

