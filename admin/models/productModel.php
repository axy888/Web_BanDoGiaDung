<?php
include_once(__DIR__ . '/../../database/database.php');

class ProductModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function getListCategory(){
        $sql = 'SELECT * FROM loai';
        return $this->db->select($sql);
    }
    public function getAllProducts()
    {
        $query = "SELECT * FROM sanpham";
        return $this->db->select($query);
    }

    public function getProductByID($id)
    {
        $query = "SELECT * FROM sanpham WHERE ma_sp = $id";
        $result = $this->db->select($query);
        return $result[0];
    }

    public function addProduct($ma_loai, $ten_sp, $don_gia, $mo_ta, $mau_sac, $xuat_xu, $thuong_hieu, $hinh)
    {
        $query = "INSERT INTO sanpham(ma_loai, ten_sp, don_gia, so_luong, mo_ta, mau_sac, xuat_xu, thuong_hieu, hinh,trang_thai) VALUE ($ma_loai, '$ten_sp', $don_gia, 0, '$mo_ta', '$mau_sac', '$xuat_xu', '$thuong_hieu', '$hinh','on')";
        return $this->db->execute($query);
    }

    public function deleteProduct($id)
    {
        $query = "UPDATE sanpham SET trang_thai = 'off' where ma_sp = $id";
        return $this->db->execute($query);
    }
    public function findProductByField($field,$data){
        $sql = "SELECT * FROM sanpham WHERE $field like '%$data%'";
        return $this->db->select($sql);
    }
    public function updateProduct($id,$maloai, $tensp, $don_gia,$mo_ta, $mau_sac, $xuat_xu, $thuong_hieu,$hinh)
    {
        $query = "UPDATE sanpham SET ma_loai = $maloai , ten_sp = '$tensp', don_gia = $don_gia , mo_ta = '$mo_ta' , mau_sac = '$mau_sac' , thuong_hieu = '$thuong_hieu' , hinh = '$hinh' WHERE ma_sp = $id";
        return $this->db->execute($query);
    }
}
?>
