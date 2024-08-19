<?php
include_once("models/orderModel.php");

class OrderController{
    private $orderModel;

    public function __construct(){
        $this->orderModel = new OrderModel();
    }
    public function showOrderList(){
        $order_list = $this->orderModel->getAllOrders();
        include_once 'views/orderView.php';
    }
    public function showCTDonHang(){
        $id = $_GET['id'];
        $ct_hang = $this->orderModel->getCTDonHang($id);
        $tong = 0;
        $don=$this->orderModel->getOrderByID($id);
        $trangthai = $don['trang_thai'];
        foreach ($ct_hang as &$item) {
            // Tính tổng tiền bằng cách nhân số lượng với đơn giá
            $item['tong_tien'] = $item['so_luong'] * $item['don_gia'];
            $tong += $item['tong_tien'];
        }
        include_once 'views/orderDetail.php';
    }
    public function updateOrder(){
        $orderID = $_GET['madon'];
        $trangthai = $_GET['trangthai'];
        if ($trangthai == 2){ //Nếu trạng thái cần cập nhật là đang giao hàng thì mới kiểm tra.
            $chitiet = $this->orderModel->getOrderDetail($orderID);
            foreach ($chitiet as $ct){
                $sp = $this->orderModel->getProductByID($ct['ma_sp']);
                $ct_ct = $this->orderModel->getOrderSPDetail($orderID,$sp['ma_sp']);
                if ($sp['so_luong'] < $ct_ct['so_luong']){
                    echo '<script>alert("Sản phẩm ' .$sp['ma_sp'].' không đủ số lượng!")</script>';
                    return;
                }
            }
            $this->orderModel->updateProductQuantity($orderID);
        }
        $this->orderModel->updateOrderStatus($orderID,$trangthai);
        echo '<script>alert("Cập nhật trạng thái đơn hàng thành công!")</script>';
    }
    public function searchOrder(){
        $data = $_GET['data'];
        $field = $_GET['field'];
        $status=$_GET['status'];
        $startdate = $_GET['startdate'];
        $enddate = $_GET['enddate'];
        $startprice = $_GET['startprice'];
        $endprice = $_GET['endprice'];
        $order_list = $this->orderModel->searchOrder($status,$startdate,$enddate);
        include_once 'views/orderView.php';
    }
}
$action ='index';
if (isset($_GET['action'])){
    $action = $_GET['action'];
}else{
    $action = 'showOrderList';
}
$orderController = new OrderController();
switch ($action){
    case 'index':
        $orderController->showOrderList();
        break;
    case 'searchOrder':
        $orderController->searchOrder();
        break;
    case 'showCTDonHang':
        $orderController->showCTDonHang();
        break;
    case 'updateOrder':
        $orderController->updateOrder();
        $orderController->showOrderList();
        break;
    default:
        $orderController->showOrderList();
}
?>