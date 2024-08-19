<?php
include_once(__DIR__."/../../database/database.php");
class LoginController{
    private $db;
    public function __construct(){
        $this->db = new Database();
    }

}
?>