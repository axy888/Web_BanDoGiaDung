<?php
include_once 'models/promotionModel.php';

class PromotionController {
    private $promotionModel;

    public function __construct(){
        $this->promotionModel = new PromotionModel();

    }
    public function showPromotionList(){
        $promotion_list = $this->promotionModel->getAllPromotion();
        include_once 'views/promotionView.php';
    
    }
    public function viewAddPromotionForm(){
        include_once 'views/addPromotion.php';
    }
    public function deletePromotion(){
        if (isset($_GET['id'])){
            $id = $_GET['id'];
            $kq = $this->promotionModel->deletePromotion($id);
            if ($kq){
                echo "<script>alert('Xóa thành công!');</script>";
            }else{echo "<script>alert('Xóa không thành công!');</script>";}
        }
    }
    public function addPromotion(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $ma_km = $_POST['ma_km'];
            $ngay_bd = $_POST['ngay_bd'];
            $pt_giam = $_POST['pt_giam'];
            $ngay_kt = $_POST['ngay_kt'];
            $ghi_chu = $_POST['ghi_chu'];

            $kq = $this->promotionModel->addPromotion($ma_km,$ngay_bd,$pt_giam,$ngay_kt,$ghi_chu);
            if ($kq){
                echo "<script>alert('Thêm thành công!');</script>";
            }else{
                echo "<script>alert('Thêm thất bại!');</script>";
            }
        }
    }
    public function viewUpdatePromotionForm(){
        if (isset($_GET["id"])){
            $id = $_GET["id"];
            $km= $this->promotionModel->getPromotionByID($id);
            include_once "views/updatePromotion.php";
        }
    }
    public function updatePromotion(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $makm = $_POST['ma_km'];
            $ngay_bd = $_POST['ngay_bd'];
            $pt_giam = $_POST['pt_giam'];
            $ngay_kt = $_POST['ngay_kt'];
            $ghi_chu = $_POST['ghi_chu'];

            $kq = $this->promotionModel->updatePromotion($makm,$ngay_bd,$pt_giam,$ngay_kt,$ghi_chu);
            if ($kq){
                echo "<script>alert('Cập nhật thành công!');</script>";
            }else{echo "<script>alert('Cập nhật không thành công!');</script>";}
        }
    }
}
$action = 'index';
if (isset($_GET['action'])){
    $action = $_GET['action'];
}
else{
    $action = 'showPromotionList';
}
$promotionController = new PromotionController();
switch($action){
    case 'index':
        $promotionController->showPromotionList();
        break;
    case 'showPromotionList':
        $promotionController->showPromotionList();
        break;
    case 'viewAddPromotionForm':
        $promotionController->viewAddPromotionForm();
        break;
    case 'addPromotion':
        $promotionController->addPromotion();
        $promotionController->showPromotionList();
        break;
    case 'deletePromotion':
        $promotionController->deletePromotion();
        $promotionController->showPromotionList();
        break;
    case 'viewUpdatePromotionForm':
        $promotionController->viewUpdatePromotionForm();
        break;
    case 'updatePromotion':
        $promotionController->updatePromotion();
        $promotionController->showPromotionList();
        break;
    default:
        $promotionController->showPromotionList();
}
?>