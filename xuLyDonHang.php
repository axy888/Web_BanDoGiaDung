<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="css/headerGioiThieu.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="css/trangchu.css">
</head>
<body>
    <div class="veTrangChu">
            <div class="veTrangChu-body">
                <img src="imgs/shipper.png" alt="">
                <p>Cảm ơn bạn đã đặt hàng tại shop DOVODUNG ^.^</p>
                <p>Chúc bạn có một ngày tốt lành !</p>
                <a href="trangchu.php"><button>Quay Về Trang Chủ</button></a>
            </div>
    </div>
</body>
<?php 
require("pages/headerGioiThieu.php");
include(__DIR__ . '/database/database.php');
$db = new Database();

// Trong class XuLyDonHang
class XuLyDonHang {
    public function addDonHang($db)
    {
        $tt=0;
        if(isset($_SESSION['giohang'])){
            $tt=0;
            for($i =0 ;$i<sizeof($_SESSION['giohang']);$i++){
                $TongTien =$_SESSION['giohang'][$i][2]*$_SESSION['giohang'][$i][3];
                $tt=$tt+$TongTien;
            }
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ma_kh = $_SESSION['makh'];
            $trangThai = 1;
            $ngay_dat = date("Y-m-d H:i:s");    
            $tong_tien = $tt;
            $dc = $_POST['diaChi'];
            $ten = $_POST['ten'];
            $sdt = $_POST['sdt'];
            $query = "INSERT INTO donhang (ma_kh,trang_thai,ngay_dat,tong_tien,diaChi,hovaTen,sdt) VALUES ('$ma_kh','$trangThai','$ngay_dat','$tong_tien','$dc','$ten','$sdt')";
           
            $result = $db->execute($query);
            $lastInsertedId = $db->getLastInsertedId(); // lấy id cuối cùng được thêm
            if ($lastInsertedId) {
                foreach ($_SESSION['giohang'] as $item) {
                    $id_san_pham = $item[4];
                    $so_luong = $item[3];
                    $gia = $item[2];
                    
                    $queryChiTiet = "INSERT INTO ct_donhang(ma_don,ma_sp, so_luong) VALUES ('$lastInsertedId', '$id_san_pham', '$so_luong')";
                    $db->execute($queryChiTiet);
                }
            }
            // Thực hiện truy vấn để thêm đơn hàng vào cơ sở dữ liệu
            unset($_SESSION['giohang']);
        }
    }
}



// Sử dụng phương thức addDonHang bên ngoài lớp
$xulydonhang = new XuLyDonHang();
$xulydonhang->addDonHang($db);
require("pages/bodyGioiThieu.php");
require("pages/footerGioiThieu.php");
?>
