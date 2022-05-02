<?php

class SignIn{

    private $error = "";

    public function checkData($data){
        $username = $data['username'];
        $password = $data['password'];

        $query = "SELECT * FROM users WHERE username = '$username' limit 1";

        echo $query;

        $db = new Connection();
        $result = $db->read($query);

        if($result){
            $row = $result[0];

            if($password == $row['password']){

                $_SESSION['userid'] = $row['userid'];
                $_SESSION['url_address'] = $row['url_address'];

            } else{
                $this->error = $this->error . "Password is incorrect<br>";
            }
        } else{
            $this->error = $this->error . "Username is incorrect<br>";
        }
        return $this->error;
    }

    public function login_id($id){
        $db = new Connection();
        $query = "SELECT * FROM users WHERE userid = $id limit 1";

        $result = $db->read($query);

        if($result){
            $user_info = $result[0];
            return $user_info;
        }else{
            header("Location: " . ROOT . "login");
            die;
        }
    }


}