<?php

include("autoload.php");


    $first_name = "";
    $last_name = "";
    $username = "";
    $xbox_name = "";
    $playstation_name = "";
    $steam_name = "";
    $gamestyle = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $createaccount = new CreateAccount();

        $result = $createaccount->checkData($_POST);
        if($result != ""){
            echo $result;
        } else{
            header("Location: login.php");
            die;
        }
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $username = $_POST['username'];
        $xbox_name = $_POST['xbox_name'];
        $playstation_name = $_POST['playstation_name'];
        $steam_name = $_POST['steam_name'];
        $gamestyle = $_POST['gamestyle'];

    }


?>

<html>

<head>
    <link rel="stylesheet" href="Config/mainstyle.css">
    <title>GaByte - Sign Up</title>
</head>


<body>

<div class="logbox">

    <div style="font-size: 100px;">GaByte</div>

    Create Your Account<br><br>

    <form method="POST">

        <input value="<?php echo $first_name ?>" name="first_name" type="text" class="logtext" placeholder="First Name"><br><br>
        <input value="<?php echo $last_name ?>" name="last_name" type="text" class="logtext" placeholder="Last Name"><br><br>
        <input value="<?php echo $username ?>" name="username" type="text" class="logtext" placeholder="Username"><br><br>
        <input value="<?php echo $xbox_name ?>" name="xbox_name" type="text" class="logtext" placeholder="Xbox Gamertag (Type NA if Inapplicable)"><br><br> <!-- public url of xbox is http://live.xbox.com/Profile?Gamertag=<name> -->
        <input value="<?php echo $playstation_name ?>" name="playstation_name" type="text" class="logtext" placeholder="Playstation Name (Type NA if Inapplicable)"><br><br> <!-- public url of playstation is https://psnprofiles.com/<name>-->
        <input value="<?php echo $steam_name ?>" name="steam_name" type="text" class="logtext" placeholder="Steam Name (Type NA if Inapplicable)"><br>*Must set steam public url to steam name<br><br> <!-- public url of steam is https://steamcommunity.com/id/<name>/ -->

        <span style="font-weight: normal; float:left; margin-left: 100px;">Game Style:</span><br>
        <select class="logtext" name="gamestyle">

            <option><?php echo $gamestyle ?></option>
            <option>Competitive</option>
            <option>Casual</option>
            <option>Other</option>

        </select>
        <br><br>
        <input value="" name="password" type="password" class="logtext" placeholder="Password"><br><br>
        <input name="passwordagain" type="password" class="logtext" placeholder="Retype Password"><br><br>

        <input type="submit" class="logbutton" value="Sign up">
        <br><br><br>
    </form>
    <a href="login.php" style="color:white">Already Have an Account? Log In Here!</a>

</div>

</body>

</html>
