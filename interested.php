<?php
session_start();
include("autoload.php");
$login = new SignIn();
$profiledata = $login->login_id($_SESSION['userid']);

if(isset($_SERVER['HTTP_REFERER'])){
    $return = $_SERVER['HTTP_REFERER'];
} else{
    $return = "userprofile.php";
}

if(isset($_GET['post'])){
    $post = new Post();
    $post->interested($_GET['post'], $_SESSION['userid']);
}


header("Location: " . $return);
die;
