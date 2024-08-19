<?php
include_once(__DIR__."/../../database/database.php");

class PromotionModel{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function getAllPromotion(){
        $query = "SELECT * FROM khuyenmai";
        return $this->db->select($query);
    }
    public function addPromotion($ma_km, $ngay_bat_dau, $phan_tram_giam, $ngay_ket_thuc, $ghi_chu){
        $query = "INSERT INTO khuyenmai(ma_khuyen_mai, ngay_bat_dau, phan_tram_giam, ngay_ket_thuc, ghi_chu,da_xoa) value('$ma_km','$ngay_bat_dau',$phan_tram_giam, '$ngay_ket_thuc','$ghi_chu',0)";
        return $this->db->execute($query);
    }
    public function deletePromotion($ma_km){
        $sql = "UPDATE khuyenmai set da_xoa = 1 where ma_khuyen_mai LIKE '$ma_km%'";
        return $this->db->execute($sql);
    }
    public function getPromotionByID($ma_km){
        $sql = "SELECT * FROM khuyenmai where ma_khuyen_mai LIKE '$ma_km%'";
        $result = $this->db->select($sql);
        return $result[0];
    }
    public function updatePromotion($ma_km, $nbd,$ptg,$nkt,$gc){
        $sql = "UPDATE khuyenmai set ngay_bat_dau = '$nbd', phan_tram_giam = '$ptg', ngay_ket_thuc = '$nkt', ghi_chu = '$gc' where ma_khuyen_mai = '$ma_km'";
        return $this->db->execute($sql);
    }
}
?>