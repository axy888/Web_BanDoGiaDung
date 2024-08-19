<?php
include_once(__DIR__ . '/../../database/database.php');

class CategoryModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllCategories()
    {
        $query = "SELECT * FROM loai";
        return $this->db->select($query);
    }

    public function getCategoryById($id)
    {
        $query = "SELECT * FROM loai WHERE ma_loai = $id";
        $result = $this->db->select($query);
        return $result[0];
    }

    public function createCategory($ten)
    {
        $query = "INSERT INTO loai(ten_loai) VALUE ('$ten')";
        return $this->db->execute($query);
    }

    public function deleteCategory($id)
    {
        $query0 = "UPDATE loai set da_xoa = 1 where ma_loai = $id";
        $this->db->execute($query0);
        $query = "DELETE FROM loai WHERE ma_loai = $id AND ma_loai NOT IN (SELECT ma_loai FROM sanpham)";
        return $this->db->execute($query);
    }
    public function searchCategory($data){
        $query = "SELECT * FROM loai where ten_loai LIKE '%$data%'";
        return $this->db->select($query);
    }
    public function updateCategory($id, $ten)
    {
        $query = "UPDATE loai SET ten_loai = '$ten' WHERE ma_loai = $id";
        return $this->db->execute($query);
    }
}
?>
