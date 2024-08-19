<?php
include_once __DIR__ . "/../models/dangkyModel.php";

class DangkyController{

    private $dangkymodel;
    
    public function __construct(){
        $this->dangkymodel = new DangkyModel();
    }

    public function showThongTin()
    {
        $order_list = $this->dangkymodel->getAllOrders($_SESSION["makh"]);
        foreach ($order_list as $order)
        {
            $ma_don=$order['ma_don'];
            $ct_hang[$ma_don]= $this->dangkymodel->getCTDonHang($ma_don);
        }
        include_once __DIR__ . "/../views/thongtincanhan.php";
    }

    public function sua()
    {
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $makh= $_POST['txtMakh'];
            $username= $_POST['txtUsername'];
            $email= $_POST['txtEmail'];
            $diachi= $_POST['txtDiachi'];
            $sdt= $_POST['txtSdt'];
            $kq1=$_POST['ketquasuathongtin'];
            if($kq1==1)
            {
                $sua = $this->dangkymodel->updateNguoiDung($makh,$username,$diachi,$sdt,$email);
                if($sua)
                {
                    echo'<script>alert("Sửa thông tin thành công")</script>'; 
                }
                else 
                echo'<script>alert("Sửa thông tin thất bại")</script>'; 
            }
            else
            echo'<script>alert("Sửa thông tin thất bại")</script>'; 
        }
    }

    public function suapass()
    {
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $password= $_POST['txtPassword'];
            $newpassword= $_POST['txtNewPassword'];
            $confirmpassword= $_POST['txtConfirmPassword'];
            $kq1=$_POST['ketqua'];
            if($kq1==1)
            {
                $suapass = $this->dangkymodel->updatePassword($_SESSION["nguoidung"],$newpassword);
                if($suapass)
                {
                    echo '<script>alert("Sửa mật khẩu thành công!");
                        
                        </script>'; 
                }
                else echo '<script>alert("Sửa mật khẩu thất bại!");
                        
                </script>'; 
            }
            else echo '<script>alert("Sửa mật khẩu thất bại!");
                        
            </script>';
        }
    }

    public function cancelthongtin()
    {
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $ma_don= $_POST['txtMadon'];
            $trang_thai=$_POST['txtTrangthai'];
            $sua = $this->dangkymodel->updateOrder($ma_don,$trang_thai);
            if($sua)
            {
                echo'<script>alert("Hủy đơn thành công")</script>'; 
            }
            else 
            echo'<script>alert("Hủy đơn thất bại")</script>';
        }
    }
}
$action = 'index';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'loginView';
}
$dangkyController = new DangkyController();
switch ($action) {
    case 'loginView':
        $dangkyController->showThongTin();
        break;
    // case 'registerView':
    //     $dangkyController->registerView();
    //     break;
    case 'sua':
        $dangkyController->sua();
        break;
    case 'suapass':
        $dangkyController->suapass();
        break;
    case 'cancelthongtin':
        $dangkyController->cancelthongtin();
        break;
    default:
        $dangkyController->showThongTin();
}
?>