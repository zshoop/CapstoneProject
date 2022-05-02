<?php
session_start();
include("autoload.php");

$login = new SignIn();
$profiledata = $login->login_id($_SESSION['userid']);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_FILES['prof_img']['name']) && $_FILES['prof_img']['name'] != ""){
        $filename = "uploads/" . $_FILES['prof_img']['name'];
        move_uploaded_file($_FILES['prof_img']['tmp_name'], $filename);

    } else{
        $filename = $profiledata['prof_img'];
    }
    $update = new Update();
    $result = $update->checkData($_SESSION['userid'], $_POST, $filename);
    if($result != ""){
        echo $result;
    } else{
        header("Location: userprofile.php?user=" . $_SESSION['url_address']);
        die;
    }
}
?>
<html>

<head>
    <link rel="stylesheet" href="Config/mainstyle.css">
    <title>GaByte - Settings</title>
</head>

<body>
<?php include("header.php"); ?>
<div class="logbox">

    <div style="font-size: 50px;">Profile Settings</div><br>

    <form method="POST" enctype="multipart/form-data">

        <span style="font-weight: normal; float:left; margin-left: 100px;">Profile Image:</span><br>
        <input value="<?= $profiledata['prof_img'] ?>" type="file" name="prof_img"><br><br>
        <span style="font-weight: normal; float:left; margin-left: 100px;">First Name:</span><br>
        <input value="<?= $profiledata['first_name'] ?>" name="first_name" type="text" class="logtext" placeholder="First Name"><br><br>
        <span style="font-weight: normal; float:left; margin-left: 100px;">Last Name:</span><br>
        <input value="<?= $profiledata['last_name'] ?>" name="last_name" type="text" class="logtext" placeholder="Last Name"><br><br>
        <span style="font-weight: normal; float:left; margin-left: 100px;">Username:</span><br>
        <input value="<?= $profiledata['username'] ?>" name="username" type="text" class="logtext" placeholder="Username"><br><br>
        <span style="font-weight: normal; float:left; margin-left: 100px;">Description:</span><br>
        <textarea name="description" type="text" class="logtext" placeholder="Description"><?= $profiledata['description'] ?></textarea><br><br>
        <span style="font-weight: normal; float:left; margin-left: 100px;">Xbox Name:</span><br>
        <input value="<?= $profiledata['xbox_name'] ?>" name="xbox_name" type="text" class="logtext" placeholder="Xbox Gamertag (Type N/A if Inapplicable)"><br><br> <!-- public url of xbox is http://live.xbox.com/Profile?Gamertag=<name> -->
        <span style="font-weight: normal; float:left; margin-left: 100px;">Playstation Name:</span><br>
        <input value="<?= $profiledata['playstation_name'] ?>" name="playstation_name" type="text" class="logtext" placeholder="Playstation Name (Type N/A if Inapplicable)"><br><br> <!-- public url of playstation is https://psnprofiles.com/<name>-->
        <span style="font-weight: normal; float:left; margin-left: 100px;">Steam Name:</span><br>
        <input value="<?= $profiledata['steam_name'] ?>" name="steam_name" type="text" class="logtext" placeholder="Steam Name (Type N/A if Inapplicable)"><br><br> <!-- public url of steam is https://steamcommunity.com/id/<name>/ -->

        <span style="font-weight: normal; float:left; margin-left: 100px;">Game Style:</span><br>
        <select class="logtext" name="gamestyle">

            <option><?= $profiledata['gamestyle'] ?></option>
            <option>Competitive</option>
            <option>Casual</option>
            <option>Other</option>

        </select>
        <br><br>

        <input type="submit" class="logbutton" value="Update Profile">
        <br><br><br>
    </form>
</div>


</body>


</html>
