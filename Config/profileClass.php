<?php

class Profile{
    public function getProfile($id){
        $id = addslashes($id);
        $db = new Connection();
        $query = "SELECT * FROM users WHERE userid = $id LIMIT 1";
        return $db->read($query);
    }

    public function getUser($id){
        $db = new Connection();
        $query = "SELECT * FROM users WHERE userid = '$id' limit 1";
        $data = $db->read($query);

        if($data){
            return $data[0];
        } else{
            return false;
        }
    }
}