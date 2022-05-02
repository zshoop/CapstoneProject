<?php
class Game{
    public function getGameFromPost($gameid){
    $db = new Connection();
    $query = "SELECT * FROM games WHERE gameid = '$gameid'";
    return $db->read($query);
    }

    public function getGames(){
        $db = new Connection();
        $query = "SELECT * FROM games";
        return $db->read($query);
    }

    public function getGameid($id){
        $db = new Connection();
        $query = "SELECT gameid FROM games WHERE title = '$id'";
        return $db->read($query);
    }

    public function getGameData($url_address){
        $query = "SELECT * FROM games WHERE url_address = '$url_address' limit 1";
        $db = new Connection();
        $data = $db->read($query);
        return $data;
    }
}