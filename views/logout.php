<?php
//require '../configurations/config.php';
error_reporting(E_ALL ^ E_NOTICE);
session_start();
$userid = $_SESSION['userid'];
$username = $_SESSION['username'];
?>
<html>
    <?php
    $page_title = 'Logout';
    include '../includes/header.php';
    ?>
    <body>
        <?php
        if($username && $userid){
            echo "You have been logged out. <a href='./login.php'>Member</a>";
            session_destroy();
        }else{
            echo "You are not logged in.";
        }
        ?>
    </body>
    
</html>

