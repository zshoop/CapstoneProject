<?php
if(isset($_SESSION['url_address'])){
    header("Location: userprofile.php?user=" . $_SESSION['url_address']);
    die;
}else{
    header("Location: login.php");
    die;
}
