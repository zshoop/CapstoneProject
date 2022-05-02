<li>
    <a href="userprofile.php?user=<?= $userData['url_address'] ?>"><h3><?php echo $userData['username']; ?></h3></a>
    <a href="gameinfo.php?game=<?= $gameData[0]['url_address'] ?>"><h4><?php echo $gameData[0]['title'] ?></h4></a>
    <h4>Players Wanted: <?php echo $row['needed'] ?></h4>
    <p><?php echo $row['description']?></p>
    <br>
    <a href="interested.php?post=<?= $row['postid'] ?>" style="text-align: right;"><h4>I'm Interested</h4></a>
        <?php
//        $post = new Post();
//        $interestedP = $post->getInterested($row['postid']);
//        if(is_array($interestedP)){
//            if(in_array($_SESSION['userid'], $interestedP)){
//                echo "<h4>I'm No Longer Interested!</h4>";
//            } else{
//                echo "<h4>I'm Interested!</h4>";
//            }
//        }
        ?>
    <?php
    $post = new Post();
    $interestedP = false;
    if($row['interested'] > 0){
        echo "<p style='text-align: right;'>Interested People:</p>";
        $interestedP = $post->getInterested($row['postid']);
        if(is_array($interestedP)){
            $user = new Profile();
            foreach($interestedP as $person){
                $data = $user->getUser($person['userid']);
                echo "<a href='userprofile.php?user=" . $data['url_address'] . "'><p style='text-align: right;'>" . $data['username'] . "</p></a>";
            }
        }
    }
    ?>
    <?php
    if($userData['userid'] == $_SESSION['userid']){
        echo "<a href='deletepost.php?post=" . $row['postid'] . "'><input type='submit' class='deletebutton' value='Delete'></a>";
    }

    ?>
</li>
<br>