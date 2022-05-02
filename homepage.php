<?php
session_start();
include("autoload.php");

$login = new SignIn();
$profiledata = $login->login_id($_SESSION['userid']);

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $post = new Post();
    $id = $_SESSION['userid'];
    $game = new Game();
    $gameid = $game->getGameid($_POST['game']);
    $_POST['game'] = $gameid;
    $post->createPost($id, $_POST);

}

$game = new Game();
$games = $game->getGames();

$post = new Post();
$posts = $post->getAllPosts();

?>

<html>

<head>
    <link rel="stylesheet" href="Config/mainstyle.css">
    <title>GaByte - Feed</title>
</head>
<body>
    <?php include("header.php"); ?>
    <h1 style="font-size: clamp(60px, 8vw, 150px); width: 50px; height: 50px; margin-top: 50px; margin-left: 25%;">All Recent Posts</h1>
<br><br><br><br><br><br><br><br>
    <section class="section posts_section">
        <div class="posts_col">
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
        </div>
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

    </section>
</body>
</html>
