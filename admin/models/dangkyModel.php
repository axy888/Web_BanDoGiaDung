<?php
include_once(__DIR__."/../../database/database.php");

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
        $_SESSION["ten"]= $username;
        $_SESSION["sdt"]= $sdt;
        $_SESSION["email"]= $email;
        $_SESSION["diachi"]= $diachi;
        if($result)
         {
            return $result;
         }
    }

    public function updatePassword($makh,$newpassword)
    {
        $hashedPassword = md5($newpassword);
        $strTaiKhoan="UPDATE taikhoan SET password = '$hashedPassword' WHERE username = '$makh'";
        $result = $this->db->execute($strTaiKhoan);
        if($result)
         {
            return $result;
         }
    }

    public function getAllOrders($makh){
        $query = "SELECT * FROM donhang where ma_kh = '$makh'";
        return $this->db->select($query);
    }

    public function getCTDonHang($id) {
        // Giả sử bảng sản phẩm là 'sanpham' và bảng chi tiết đơn hàng là 'ct_donhang'
        $query = "
            SELECT 
                ct_donhang.ma_don AS ma_don,
                ct_donhang.ma_sp AS ma_sp,
                sanpham.ten_sp AS ten_sp, 
                ct_donhang.so_luong AS so_luong,
                sanpham.don_gia AS don_gia,
                sanpham.hinh AS hinh
            FROM 
                ct_donhang
            JOIN 
                sanpham 
            ON 
                ct_donhang.ma_sp = sanpham.ma_sp
            WHERE 
                ct_donhang.ma_don = $id";  // Chỉ lấy dữ liệu cho mã đơn hàng đã cho
    
        return $this->db->select($query);  // Trả về kết quả của truy vấn
    }


    public function updateOrder($ma_don,$tt)
    {
        $strOrder="UPDATE donhang SET trang_thai = '0' WHERE ma_don = '$ma_don'";
        $result = $this->db->execute($strOrder);
        if($result)
         {
            return $result;
         }
    }
}
?>