<?php
require_once(__DIR__."/../../database/database.php");

class CheckChucNangModel{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function getPermissionByID($id){
        $sql = "SELECT * FROM quyen where ma_quyen = $id";
        $kq = $this->db->select($sql);
        return $kq[0];
    }

    public function getChucNangOfQuyen($ma_quyen){
        $sql = "SELECT * from ct_phan_quyen where ma_quyen = $ma_quyen";
        return $this->db->select($sql);
    }
    public function getQuyenOfUsername($username){
        $sql = "SELECT * from taikhoan where username = '$username'";
        $kq = $this->db->select($sql);
        return $kq[0];
    }
    public function getChucNang($ma_quyen,$ma_cn){
        $sql = "SELECT * FROM ct_phan_quyen where ma_quyen = $ma_quyen and ma_cn = $ma_cn ";
        $kq = $this->db->select($sql);
        return $kq[0];
    }
  
}
?>