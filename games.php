<?php
session_start();
include("autoload.php");

$login = new SignIn();
$profiledata = $login->login_id($_SESSION['userid']);

$game = new Game();
$games = $game->getGames();

?>

<html>
<head>
    <link rel="stylesheet" href="Config/mainstyle.css">
    <title>GaByte - Games</title>
</head>
<body>
    <?php include("header.php"); ?>

    <div class="pageHeader">
        <h1>Games</h1>
    </div>

    <section class="section games_section">
        <div class="games_col">
            <ul>
                <?php
                if($games){
                    foreach($games as $row){
                        include("game.php");
                    }
                }
                ?>
            </ul>
        </div>
    </section>
</body>
</html>
