<?php
include_once(__DIR__."/../../database/database.php");

class SlideModel{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function getAllSlide(){
        $query = "SELECT * FROM slide";
        return $this->db->select($query);
    }
    public function getAllSlideDetail(){
        $query = "SELECT * FROM slidedetail";
        return $this->db->select($query);
    }
    public function getSlideDetailByID($id){
        $query = "SELECT * FROM slidedetail WHERE slide_id = $id";
        return $this->db->select($query);
    }
    public function getDSSP(){
        $sql = "SELECT * FROM sanpham";
        return $this->db->select($sql);
    }
    public function addSlide($slidename){
        $sql = "INSERT INTO slide(slidename) value ('$slidename')";
        return $this->db->execute($sql);
    }
    public function addSlideDetail($slideID, $productID){
        $sql = "INSERT INTO slidedetail(slide_id,ma_sp) value($slideID,$productID)";
        return $this->db->execute($sql);
    }
    public function getAllSP(){
        $sql = "SELECT * from sanpham where trang_thai LIKE 'on'";
        return $this->db->select($sql);
    }
    public function deleteSlideDetail($slideid, $ma_sp){
        $sql = "DELETE FROM slidedetail where slide_id = $slideid and ma_sp = $ma_sp";
        return $this->db->execute($sql);
    }
    public function deleteSlide($slideid){
        $sql1 = "DELETE FROM slide where slideid = $slideid";
        $sql2 = "DELETE FROM slidedetail where slide_id = $slideid";
        $this->db->execute($sql1);
        $this->db->execute($sql2);
    }
}
?>