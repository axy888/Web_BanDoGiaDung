<?php
include_once(__DIR__."/../../database/database.php");

class UserModel{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function getAllUser(){
        $query = "SELECT * FROM nguoidung";
        return $this->db->select($query);
    }

    public function findUserByField($field,$data){
        $sql = "SELECT * FROM nguoidung WHERE $field like '%$data%'";
        return $this->db->select($sql);
    }

}
?>