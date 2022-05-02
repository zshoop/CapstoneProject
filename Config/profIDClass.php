<?php
class ProfID{
    public function getProf($url_address){
        $query = "SELECT * FROM users WHERE url_address = '$url_address' limit 1";
        $db = new Connection();
        $data = $db->read($query);
        return $data;
    }
}