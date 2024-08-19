<?php
include_once(__DIR__."/../../database/database.php");

class AccountModel{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function getAllAccount(){
        $query = "SELECT * FROM taikhoan";
        return $this->db->select($query);
    }

    public function addAccount($username, $ma_quyen, $password,$hoten,$sdt,$email,$diachi,$loaind){
        $hashedPassword=md5($password);
        $query = "INSERT into taikhoan(username, ma_quyen, password, trang_thai, ngay_tao) value('$username',$ma_quyen,'$hashedPassword','on',CURDATE())";
        $kq = $this->db->execute($query);
        if($kq)
        {
            $query2 = "INSERT into nguoidung(ma_nd, ten,sdt,diachi,email,loai_nd) value('$username','$hoten','$sdt','$diachi','$email','$loaind')";
            return $this->db->execute($query2);
        }
    }
    public function updateAccount($username,$ma_quyen,$tt){
        $sql = "UPDATE taikhoan set ma_quyen = $ma_quyen, trang_thai='$tt' where username = '$username' && username != 'admin'";
        return $this->db->execute($sql);
    }

    public function deleteAccount($username){
        $sql = "UPDATE taikhoan set trang_thai = 'off' where username LIKE '$username%'";
        return $this->db->execute($sql);
    }

    public function getAllPermisson(){
        $query = "SELECT * from quyen";
        return $this->db->select($query);
    }

    public function checkMaKH($makh)
    {
        $query = "SELECT COUNT(*) as count FROM taikhoan WHERE username = '$makh'";
        $result = $this->db->select($query);
        return $result[0]['count'] > 0;
    }

    public function findAccountByFieldAndDateRange($field, $item, $startdate, $enddate)
    {
        // Xây dựng câu truy vấn SQL cơ bản
        $sql = "SELECT * FROM taikhoan WHERE ";
    
        // Thêm điều kiện về trường (field) và mục (item)
        $sql .= "$field LIKE '%$item%'";
    
        // Nếu startdate và enddate không rỗng, thêm điều kiện về ngày tháng
        if (!empty($startdate)) {
            $sql .= " AND ngay_tao >= '$startdate'";
        }
    
        // Nếu enddate không rỗng, thêm điều kiện về ngày tháng kết thúc
        if (!empty($enddate)) {
            $sql .= " AND ngay_tao <= '$enddate'";
        }
        // Thực hiện truy vấn và trả về kết quả
        return $this->db->select($sql);
    }

    
}
?>