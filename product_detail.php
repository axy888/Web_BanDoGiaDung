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
<?php
    require("pages/headerGioiThieu.php");
    include(__DIR__ . '/database/database.php');
    $db = new Database();
    if(isset($_GET['ma_sp'])) {
        $product_id = $_GET['ma_sp'];
        $product_details = getProductByID($product_id, $db);
        if($product_details) {
            echo "<form action='' method='post'>";
            echo "<title>". $product_details['ten_sp'] ."</title>";
            echo "<div class='homepage_detail'>";
            echo "<img class='img_detail-main' src='admin/images/" . $product_details['hinh'] . "' alt=''>";
            echo "<h4 class='ten_detailProduct''>" . $product_details['ten_sp'] . "</h4>";
            echo "<p id='gia_detailProduct'>" . $product_details['don_gia'] . " đ</p>";
            echo "<p id='info_detailProduct'>Thông Tin</p>";
            echo "<p id='xemCT_detailProduct'>Xem Chi Tiết</p>";
            echo "<p id='color_detailProduct'>Màu </p>";
            echo "<p id='color'>". $product_details['mau_sac'] ."</p>";
            echo "<input type='hidden' name='hinh' value='". $product_details['hinh'] . "'>";
            echo "<input type='hidden' name='tensp' value='". $product_details['ten_sp'] . "'>";
            echo "<input type='hidden' name='dongia' value='". $product_details['don_gia'] ."'>";
            echo "<input type='hidden' name='mau_sac' value='". $product_details['mau_sac'] . "'>";
            echo "<input type='hidden' name='ma_sp' value='". $product_details['ma_sp'] . "'>";
            echo "<p id='dv_detailProduct'>Xuất Xứ</p>";
            echo "<p id='XuatSu'>". $product_details['xuat_xu'] ."</p>";
            echo "<p id='sl_detailProduct'>Số Lượng </p>";
            echo "<p id='soLuong'>". $product_details['so_luong'] ." Có Sẵn </p>";
            echo "<input type='submit' name='addcart' id='gioHang_detailProduct' value='Thêm Vào Giỏ Hàng'>>";       /*thêm vào giỏ hàng */  
            echo "</form> ";
            // echo "<a href='trangchu.php?ctrl=thanhToan'><button id='muaHang_detailProduct'>Mua Hàng</button></a>";
            
            echo "<div id='minus_plus'>";
            echo "<p id='minus'><img class='img_detail-main' src='imgs/minus.png' alt=''></p>";
            echo "<input id='input_minus-plus' type='text' name='soluong' value='1'>";
            echo "<p id='plus'><img class='img_detail-main' src='imgs/plus1.png' alt=''></p>";
            echo "</div>";
            echo "</div>";

            echo "<div id='detail'>";
            echo "<h4>Thông Số Sản Phẩm</h4>";
            echo "<p>Xuất Xứ </p>"; 
            echo "<div id='detail_xuatXu'>" .$product_details['xuat_xu'] ."</div>";
            echo "<p>Thương Hiệu </p>";
            echo "<div id='detail_thuongHieu'>" .$product_details['thuong_hieu'] ."</div>";
            echo "<p>Mô Tả </p>";
            echo "<div id='detail_moTa'>" .$product_details['mo_ta'] ."</div>";
            echo "</div>";
        } else {
            echo "Product not found";
        }
    } else {
        echo "Product ID not provided";
    }
    function getProductByID($id, $db)
    {
        $query = "SELECT * FROM sanpham WHERE ma_sp = $id";
        $result = $db->select($query);
        return $result[0];
    }
    require("pages/footerGioiThieu.php");
?>
<script src="./js/huu4.js" ></script>
<script src="./js/huu2.js" ></script>
<!-- <script src="./js/detailProduct.js" ></script> -->
</body>
</html>


