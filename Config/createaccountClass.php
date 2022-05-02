<?php

class CreateAccount{

    private $error = "";

    public function checkData($data){
        foreach ($data as $key => $value){
            if(empty($value)){
                $this->error = $this->error . $key . " is blank<br>";
            }

            if($key == "username"){
                if(strstr($value, " ")){
                    $this->error = $this->error . "username cannot contain any spaces<br>";
                }
            }
        }
        if($this->error == ""){
            $this->create_account($data);
        } else{
            return $this->error;
        }
    }

    public function create_account($data){
        $userid = $this->set_userid();
        $first_name = $data['first_name'];
        $last_name = $data['last_name'];
        $username = $data['username'];
        $xbox_name = $data['xbox_name'];
        $playstation_name = $data['playstation_name'];
        $steam_name = $data['steam_name'];
        $gamestyle = $data['gamestyle'];
        $password = $data['password'];
        $url_address = strtolower($username) . $userid;




        $query = "INSERT INTO users (userid, first_name, last_name, username, xbox_name, playstation_name, steam_name, gamestyle, password, url_address) values ('$userid', '$first_name', '$last_name', '$username', '$xbox_name', '$playstation_name', '$steam_name', '$gamestyle', '$password', '$url_address')";

        echo $query;

        $db = new Connection();
        $db->write($query);

        $query2 = "SELECT * FROM users WHERE username = '$username' limit 1";
        $profresults = $db->read($query2);

        if($profresults){
            $row = $profresults[0];
            $_SESSION['userid'] = $row['userid'];
            $_SESSION['url_address'] = $row['url_address'];
        }
    }

    private function set_userid(){
        $rand = rand(4, 19);
        $id = "";
        for($i = 0; $i < $rand; $i++){
            $idrand = rand(0,9);
            $id = $id . $idrand;
        }

        return $id;
    }
}