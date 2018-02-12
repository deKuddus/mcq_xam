<?php
    
    Session::checkAdminSession();
?>

<div class="menu">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="user.php">Manage User</a></li>
            <li><a href="addQustion.php">Add Question</a></li>
            <li><a href="questionList.php">Question List</a></li>
            <li><a href="?action=logout">Logout</a></li>
        </ul>
    </div>

