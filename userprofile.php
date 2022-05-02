<?php
session_start();
include("autoload.php");

$login = new SignIn();
$profiledata = $login->login_id($_SESSION['userid']);

$profID = new ProfID();
$profData = $profID->getProf($_GET['user']);

if(is_array($profData)){
    $profiledata = $profData[0];
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $post = new Post();
    $id = $_SESSION['userid'];
    $game = new Game();
    $gameid = $game->getGameid($_POST['game']);
    $_POST['game'] = $gameid;
    $post->createPost($id, $_POST);

}

$id = $profiledata['userid'];

$game = new Game();
$games = $game->getGames();

$post = new Post();
$posts = $post->getPosts($id);

//print_r($profiledata);

?>

<html>

<head>
    <link rel="stylesheet" href="Config/mainstyle.css">
    <title>GaByte - Profile</title>
</head>

<body>
    <?php include("header.php"); ?>
    <section class="section profile_section">
        <div class="profile_col">
            <h1><?php echo $profiledata['username'] ?></h1>
            <?php

            if(isset($profiledata['xbox_name']) && $profiledata['xbox_name'] != 'NA' && $profiledata['xbox_name'] != 'na'){
                echo "<a href='https://account.xbox.com/en-US/Profile?gamerTag=" . $profiledata['xbox_name'] . "'>Xbox</a>";
            } else{
                echo "";
            }
            if(isset($profiledata['playstation_name']) && $profiledata['playstation_name'] != "NA" && $profiledata['playstation_name'] != "na"){
                echo "<a href='https://psnprofiles.com/" . $profiledata['playstation_name'] . "'>Playstation</a>";
            } else{
                echo "";
            }
            if(isset($profiledata['playstation_name']) && $profiledata['steam_name'] != 'NA' && $profiledata['steam_name'] != 'na'){
                echo "<a href='https://steamcommunity.com/id/" . $profiledata['steam_name'] . "'>Steam</a>";
            } else{
                echo "";
            }

            ?>
            <h3>Play Style: <?= $profiledata['gamestyle'] ?></h3>
            <h2>Description</h2>
            <p>
                <?php
                    if(isset($profiledata['description'])){
                        echo $profiledata['description'];
                    } else {
                        echo "Description of profile goes here";
                    }
                ?>
            </p>
            <hr>
            <h1>Posts</h1>
        </div>
        <div class="profile_col">
            <img src="<?= $profiledata['prof_img'] ?>" alt="Profile Picture">
        </div>
    </section>
    <section class="section posts_section">

        <div class="posts_col">
            <ul>
                <?php
                if($posts){
                    foreach($posts as $row){
                        $user = new Profile();
                        $game = new Game();
                        $gameData = $game->getGameFromPost($row['gameid']);
                        $userData = $user->getUser($row['userid']);
                        include("post.php");
                    }
                }
                ?>
            </ul>
        </div>
        <?php
            if($_GET['user'] == $_SESSION['url_address']){
        ?>
        <div class="postingbox">
            <form method="POST">
                <h1>Create a Post</h1>
                <span style="font-weight: normal; float:left;">Players Needed:</span><br>
                <select class="postingplayers" name="needed">
                    <?php
                    for($i = 1; $i < 101; $i++){
                        echo "<option>" . $i . "</option>";
                    }
                    ?>

                </select><br><br>
                <span style="font-weight: normal; float:left;">Game:</span><br>
                <select class="postinggame" name="game">

                    <option>Please Select the Game</option>
                    <?php
                    if($games){
                        foreach($games as $row){
                            echo "<option>" . $row['title'] . "</option>";
                        }
                    }
                    ?>


                </select><br><br>
                <textarea name="description" value="" type="text" class="postingdescription" placeholder="Description"></textarea><br><br>
                <input type="submit" class="logbutton" value="Post">
            </form>
        </div>
        <?php
            }
        ?>
    </section>
</body>

</html>
