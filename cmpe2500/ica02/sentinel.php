<?php
session_start(); // will hold our "validation" data
if( !isset($_SESSION['username'])) // NOT Logged IN - bail to login page...
{
    header("location:login.php");
    die();
}
?>