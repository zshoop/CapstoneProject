<?php
session_start();
include("autoload.php");

$login = new SignIn();
$profiledata = $login->login_id($_SESSION['userid']);

$game= new Game();
$retrievedData = $game->getGameData($_GET['game']);
$gameData = $retrievedData[0];

$post = new Post();
$posts = $post->getGamePosts($gameData['gameid']);
?>

<html>
<head>
    <link rel="stylesheet" href="Config/mainstyle.css">
    <title>GaByte - Game Info</title>
</head>
<body>
    <?php include("header.php"); ?>
    <section class="section game_section">
        <div class="game_col">
            <h1><?php echo $gameData['title'] ?></h1>
            <img src="<?= $gameData['cover_img'] ?>">
            <h2>Description</h2>
            <p>
                <?php
                if(isset($gameData['description'])){
                    echo $gameData['description'];
                } else {
                    echo "Description of game goes here";
                }
                ?>
            </p>
            <hr>
        </div>
        <div class="posts_col">
            <h1>Posts</h1>
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
                } else{
                    echo "There are no posts :(";
                }
                ?>
            </ul>
        </div>

</body>
</html>