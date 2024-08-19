<?php
require_once("../database/database.php");

class DangkyModel{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function checkMaKH($makh)
    {
        $query = "SELECT COUNT(*) as count FROM nguoidung WHERE ma_nd = '$makh'";
        $result = $this->db->select($query);
        return $result[0]['count'] > 0;
    }

    public function addUser($makh,$username,$sdt,$diachi,$email,$password,$currentDateTime)
    {
        $hashedPassword = md5($password);
        $strNguoidung="INSERT INTO nguoidung(ma_nd,ten,sdt,diachi,email) 
        VALUE ('$makh','$username','$sdt','$diachi','$email')";
        $strTaiKhoan="INSERT INTO taikhoan(username,password,ngay_tao) 
        VALUE ('$makh','$hashedPassword','$currentDateTime')";
         $result = $this->db->execute($strNguoidung);
         $result2 = $this->db->execute($strTaiKhoan);
         if($result && $result2)
         {
            return $result;
         }
    }

    public function findUserByUserNameAndPass($makh,$password)
    {
        $hashedPassword = md5($password);
        $strTaiKhoan = "SELECT * FROM taikhoan WHERE username = '$makh' AND password = '$hashedPassword'";
        $result = $this->db->select($strTaiKhoan);
        if ($result && count($result) >0) {
            return $result[0]; // Trả về dữ liệu người dùng nếu tìm thấy
        } else {
            return null;
        }
    }

    public function findNguoiDungByUserName($makh)
    {
        $strNguoiDung = "SELECT * FROM nguoidung WHERE ma_nd = '$makh'";
        $result = $this->db->select($strNguoiDung);
        if ($result && count($result)>0) {
            return $result[0]; // Trả về dữ liệu người dùng nếu tìm thấy
        } else {
            return null;
        }
    }

    public function updateNguoiDung($makh,$username,$diachi,$sdt,$email)
    {
        $strNguoidung="UPDATE nguoidung SET ten = '$username', sdt = '$sdt', diachi = '$diachi', email = '$email' WHERE ma_nd = '$makh'";
        $result = $this->db->execute($strNguoidung);
        if($result)
         {
            return $result;
         }
    }

    public function updatePassword($makh,$newpassword)
    {
        $hashedPassword = md5($newpassword);
        $strTaiKhoan="UPDATE taikhoan SET password = '$newpassword' WHERE username = '$makh'";
        $result = $this->db->execute($strTaiKhoan);
        if($result)
         {
            return $result;
         }
    }

}
?>