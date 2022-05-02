<?php
session_start();
include("autoload.php");

if(isset($_SESSION['userid'])){
    $_SESSION['userid'] = NULL;
    unset($_SESSION['userid']);
}
header("Location: ../Capstone/login.php");
die;