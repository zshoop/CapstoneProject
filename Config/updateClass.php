<?php
class Update{
    private $error = "";

    public function checkData($id, $data, $file){
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
            $this->updateProfile($id, $data, $file);
        } else{
            return $this->error;
        }
    }

    public function updateProfile($id, $data, $file){
        $prof_img = $file;
        $first_name = $data['first_name'];
        $last_name = $data['last_name'];
        $username = $data['username'];
        $xbox_name = $data['xbox_name'];
        $playstation_name = $data['playstation_name'];
        $steam_name = $data['steam_name'];
        $gamestyle = $data['gamestyle'];
        $description = $data['description'];

        $query = "UPDATE users SET prof_img = '$prof_img', first_name = '$first_name', last_name = '$last_name', username = '$username', description = '$description',xbox_name = '$xbox_name', playstation_name = '$playstation_name', steam_name = '$steam_name', gamestyle = '$gamestyle' WHERE userid = '$id'";
        $db = new Connection();
        $db->write($query);

    }
}