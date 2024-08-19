<?php
require_once(__DIR__."/../../database/database.php");

class PermissonModel{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function getAllPermisson(){
        $query = "SELECT * from quyen";
        return $this->db->select($query);
    }
    public function getPermissionByID($id){
        $sql = "SELECT * FROM quyen where ma_quyen = $id";
        $kq = $this->db->select($sql);
        return $kq[0];
    }
    public function getAllChucNang(){
        $query = "SELECT * from chucnang";
        return $this->db->select($query);
    }
    // public function getCTPQ_OfCN($ma_quyen){
    //     $query = "SELECT * FROM ct_phan_quyen WHERE ma_quyen = $ma_quyen";
    //     return $this->db->select($query);
    // }
    public function getCTPQ_OfCN($ma_quyen){
        $query = "SELECT cq.ma_quyen, cq.ma_cn, cn.noi_dung, them, sua, xoa FROM ct_phan_quyen cq join quyen q on cq.ma_quyen = q.ma_quyen join chucnang cn on cq.ma_cn = cn.ma_cn where cq.ma_quyen = $ma_quyen";
        return $this->db->select($query);
    }
    public function addPermisson($ten_quyen){
        $query = "INSERT INTO quyen(ten_quyen) value('$ten_quyen')";
        $kq = $this->db->execute($query);
        $sql0 = "SELECT * FROM quyen ORDER BY ma_quyen DESC LIMIT 1 ";
        $kq = $this->db->select($sql0);
        $mq = $kq[0]['ma_quyen'];
        for ($ma_cn = 1;$ma_cn<=10;$ma_cn++){
            $sql = "INSERT INTO ct_phan_quyen(ma_cn,ma_quyen,them,sua,xoa) value($ma_cn,$mq,0,0,0)";
            $kq = $this->db->execute($sql);
        }
        return $kq;
    }
    public function deletePermission($ma_quyen){
        $query = "DELETE FROM quyen WHERE ma_quyen = $ma_quyen and ma_quyen != 1 and ma_quyen NOT IN (SELECT ma_quyen FROM taikhoan);";
        $result = $this->db->execute($query);
        if($result){
            $query2 = "DELETE FROM ct_phan_quyen where  ma_quyen = $ma_quyen and ma_quyen !=1";
            return $this->db->execute($query2);
        }
        return false;
    }
    public function updatePermission($maquyen,$ten_quyen){
        $sql = "UPDATE quyen set ten_quyen = '$ten_quyen' where ma_quyen = '$maquyen' AND ma_quyen != 1";
        return $this->db->execute($sql);
    }
    public function updateDetail($ma_quyen, $ma_cn,$them,$sua,$xoa){
        $sql = "UPDATE ct_phan_quyen set them = $them, sua = $sua, xoa = $xoa where ma_quyen = $ma_quyen  and ma_cn = $ma_cn and ma_cn != 9";
        return $this->db->execute($sql);
    }
    public function getChucNangOfQuyen($ma_quyen){
        $sql = "SELECT * from ct_phan_quyen where ma_quyen = $ma_quyen";
        return $this->db->select($sql);
    }
    public function getQuyenOfUsername($username){
        $sql = "SELECT * from taikhoan where username LIKE '$username%'";
        $kq = $this->db->select($sql);
        return $kq[0];
    }
}
?>