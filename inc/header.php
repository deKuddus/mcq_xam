<?php
$filePath = realpath(dirname(__FILE__));
include_once ($filePath.'/../library/Session.php');
Session::sessioninit();
include_once ($filePath.'/../library/Database.php');
include_once ($filePath.'/../helper/Format.php');

spl_autoload_register(function($class){
    include_once "classes/".$class.".php";

  
});


if(isset($_GET['action']) && $_GET['action'] == "logout"){
    Session::sessionDestroy();
    header("Location:index.php");
}

$db = new Database();
$fm = new Format();
$user = new User();
$process = new Process();
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
<?php

    if(isset($_GET['action']) && $_GET['action'] == "logout"){
        Session::sessionDestroy();
        header("Location:index.php");
    }

?>
<section class="content">


    <header class="header">
        <h2>Online Exam System</h2>
    </header>

  <div class="maincontent">
    <div class="menu">
        <ul>
            <?php
                $logChk = Session::get("login");
                if($logChk == true){?>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="exam.php">Exam</a></li>
                    <li><a href="?action=logout">Logout</a></li>
            <?php }else{?>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="register.php">Register</a></li>
            <?php } ?>
             <?php 
                $logChk = Session::get("login");
                if($logChk == true){?>
            <span style="float: right;margin-right: 30px;">Welcome : <strong style="color: #444"><?php echo Session::get("name");?></strong></span>
             <?php }?>
        </ul>

    </div>
