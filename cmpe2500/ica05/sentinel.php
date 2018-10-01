<?php
session_start();
if(!isset($_SESSION['username'])) // NOT Logged IN - bail to login page...
{
    header("location:login.php");
    die();
}
?>