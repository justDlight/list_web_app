<?php
//Destroys sessions which in return logs out the user and bring them back to login.php
    session_start();  
    unset($_SESSION['sess_user']);  
    session_destroy();  
    header("location:https://climbingtasmania.com/login.php");  
?>  