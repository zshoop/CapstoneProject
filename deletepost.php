<?php
session_start();
include("autoload.php");
$login = new SignIn();
$profiledata = $login->login_id($_SESSION['userid']);

if(isset($_GET['post'])){
    $post = new Post();
    $post->deletePost($_GET['post']);
}

if(isset($_SERVER['HTTP_REFERER'])){
    $return = $_SERVER['HTTP_REFERER'];
} else{
    $return = "userprofile.php";
}

header("Location: " . $return);
die;