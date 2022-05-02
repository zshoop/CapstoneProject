<?php
session_start();
include("autoload.php");


$username = "";
$password = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $login = new SignIn();
    $result = $login->checkData($_POST);
    if($result != ""){
        echo $result;
    } else{
        header("Location: userprofile.php?user=" . $_SESSION['url_address']);
        die;
    }
    $username = $_POST['username'];
    $password = $_POST['password'];

}


?>

<html>

    <head>
        <link rel="stylesheet" href="Config/mainstyle.css">
        <title>GaByte - Log In</title>
    </head>

    <body>
    <div class="logbox">

        <div style="font-size: 100px;">GaByte</div>

        <form method="POST">
            Log In<br><br>

            <input name="username" value="<?php echo $username ?>" type="text" class="logtext" placeholder="Username"><br><br>
            <input name="password" value="" type="password" class="logtext" placeholder="Password"><br><br>

            <input type="submit" class="logbutton" value="Log in">
            <br><br><br>

        </form>
        <a href="createaccount.php" style="color: white">Don't Have an Account? Sign Up Here!</a>
    </div>
    </body>

</html>
