<?php

class Post{

    private $error = "";

    public function createPost($userid, $data){
        if(!empty($data['description'])){
            $gameid = $data['game'][0]['gameid'];
            $description = addslashes($data['description']);
            $needed = $data['needed'];
            $postid = $this->set_postid();

            $query = "INSERT INTO posts (userid, postid, description, needed, gameid) VALUES ('$userid', '$postid', '$description', '$needed', '$gameid')";
            $db = new Connection();
            $db->write($query);

        } else {
            $this->error .= "There was an error";
        }

        return $this->error;
    }

    private function set_postid(){
        $rand = rand(4, 19);
        $id = "";
        for($i = 0; $i < $rand; $i++){
            $idrand = rand(0,9);
            $id = $id . $idrand;
        }

        return $id;
    }

    public function getPosts($userid){
        $query = "SELECT * FROM posts WHERE userid = '$userid' ORDER BY id DESC";
        $db = new Connection();
        $data = $db->read($query);

        if($data){
            return $data;
        } else{
            return false;
        }
    }

    public function getAllPosts(){
        $query = "SELECT * FROM posts ORDER BY date DESC";
        $db = new Connection();
        $data = $db->read($query);
        return $data;
    }

    public function getGamePosts($gameid){
        $query = "SELECT * FROM posts WHERE gameid = '$gameid' ORDER BY date DESC";
        $db = new Connection();
        $data = $db->read($query);
        return $data;
    }

    public function interested($postid, $userid){
        $db = new Connection();
        $query = "SELECT interested FROM interested WHERE postid = '$postid' LIMIT 1";
        $results = $db->read($query);

        if(is_array($results)){
            $interested = json_decode($results[0]['interested'], true);

            $interestedUsers = array_column($interested, "userid");

            if(!in_array($userid, $interestedUsers)){
                $array["userid"] = $userid;
                $interested[] = $array;
                $interested_s = json_encode($interested);
                $query = "UPDATE interested SET interested = '$interested_s' WHERE postid = '$postid' LIMIT 1";
                $db->write($query);

                $query = "UPDATE posts SET interested = interested + 1 WHERE postid = '$postid' LIMIT 1";
                $db = new Connection();
                $db->write($query);
            } else{
                $key = array_search($userid, $interestedUsers);
                unset($interested[$key]);

                $interested_s = json_encode($interested);
                $query = "UPDATE interested SET interested = '$interested_s' WHERE postid = '$postid' LIMIT 1";
                $db->write($query);

                $query = "UPDATE posts SET interested = interested - 1 WHERE postid = '$postid' LIMIT 1";
                $db = new Connection();
                $db->write($query);
            }


        }else{
            $array["userid"] = $userid;
            $nested[] = $array;
            $interested = json_encode($nested);
            $query = "INSERT INTO interested (postid, interested) VALUES ('$postid', '$interested')";
            $db->write($query);

            $query = "UPDATE posts SET interested = interested + 1 WHERE postid = '$postid' LIMIT 1";
            $db = new Connection();
            $db->write($query);
        }
    }

    public function getInterested($id){
        $db = new Connection();

        $query = "SELECT interested FROM interested WHERE postid = '$id' LIMIT 1";
        $results = $db->read($query);

        if(is_array($results)) {
            $interested = json_decode($results[0]['interested'], true);
            return $interested;
        }
    }

    public function deletePost($id){
        $db = new Connection();
        $query = "DELETE FROM posts WHERE postid = '$id'";
        $db->write($query);
    }
}