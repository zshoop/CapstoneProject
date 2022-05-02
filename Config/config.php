<?php



class Connection{
    private $host = "localhost";
    private $username = "root";
    private $password = "root";
    private $db = "capstone_db";

    function connect(){
        $connection = mysqli_connect($this->host, $this->username, $this->password, $this->db);
        return $connection;
    }

    function read($query){
        $conn = $this->connect();
        $result = mysqli_query($conn, $query);

        if(!$result){
            return false;
        } else{
            $data = false;
            while($row = mysqli_fetch_assoc($result)){
                $data[] = $row;
            }
            return $data;
        }

    }

    function write($query){
        $conn = $this->connect();
        $result = mysqli_query($conn, $query);

    }
}
