<?php
?>

<header class="header">

    <a href="homepage.php">GaByte</a>
    <ul class="headercontent">
        <li><a href="homepage.php">All Posts</a></li>
        <li><a href="games.php">Games</a></li>
        <li><a href="userprofile.php?user=<?= $_SESSION['url_address']; ?>">Profile</a></li>
        <li><a href="settings.php">Settings</a></li>
        <li><a href="logout.php">Log Out</a></li>
    </ul>

</header>
