<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="css/adminindex.css">

    <!-- <script src="/js/jquery.min.js"></script> -->

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script src="../js/ajax.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- <script src="js/ajax.js"></script> -->
    <script src = "js/xoaDanhMuc.js"></script>
    <link rel="icon" href="images/DOVODUNG.png" type="image/png" sizes="32x32">
    <script src = "js/form.js"></script>



</head>

<body>
    <?php 
    session_start();
    $username = "admin";
    if (isset($_SESSION['makh'])){
        $username = $_SESSION['makh'];
    }else{
        header("Location: http://localhost/DoVoDung/pages/dangnhap.php");
        
        exit;
    }
    include_once(__DIR__ . "/models/loginModel.php");
    $model  = new LoginModel();
    $tai_khoan  = $model->getQuyenOfUsername($username);
    $quyen = $tai_khoan['ma_quyen'];
    $lstChucNang = $model->getChucNangOfQuyen($quyen);
    //Sau khi lay ds quyen cua chuc nang
    function checkAndHideElements($ma_cn, $idCN, $lstChucNang) {
        for ($i = 0; $i < count($lstChucNang); $i++) {
            if ($ma_cn == $lstChucNang[$i]['ma_cn']) {
                if ($lstChucNang[$i]['them'] == 0 && $lstChucNang[$i]['xoa'] == 0 && $lstChucNang[$i]['sua'] == 0) {
                    echo "<script>document.getElementById('$idCN').style.display = 'none';</script>";
                }
                break; // No need to continue checking if found
            }
        }
    }
     
    ?>
    <div id='admin-container'>
        <div id="menu">
        <a href="index.php?ctrl=categoryController">
                    <img class="set_icon" src="../imgs/DOVODUNG.png" alt="">
                </a>
            <ul>



                <li><a id="loadCategory" href="">
                    <img class="menu_icon" src="../imgs/catagory.png" alt="">
                    &nbsp;    
                Danh mục</a></li>

                <li><a id="loadProduct" href="">
                    <img class="menu_icon" src="../imgs/product.png" alt="">
                    &nbsp; 
                Sản phẩm</a></li>

                <li><a id = "ql-ncc" href="">
                    <img class="menu_icon" src="../imgs/supplier.png" alt="">
                    &nbsp; 
                Nhà cung cấp</a></li>

                <li><a id = "ql-dh" href="">
                    <img class="menu_icon" src="../imgs/order-delivery.png" alt="">
                    &nbsp; 
                Đơn hàng</a></li>

                

                <li><a id = "ql-nh" href="">
                    <img class="menu_icon" src="../imgs/add-product.png" alt="">
                    &nbsp; 
                Nhập hàng</a></li>

                <li><a id = "ql-tk" href="">
                    <img class="menu_icon" src="../imgs/account.png" alt="">
                    &nbsp; 
                Tài khoản</a></li>

                <li><a id = "ql-nd" href="">
                    <img class="menu_icon" src="../imgs/group.png" alt="">
                    &nbsp; 
                Người dùng</a></li>

                <li><a id = "ql-q" href="">
                    <img class="menu_icon" src="../imgs/rule.png" alt="">
                    &nbsp; 
                Quyền</a></li>

                <li><a id = "ql-sl" href="">
                    <img class="menu_icon" src="../imgs/slide.png" alt="">
                    &nbsp; 
                Slide</a>

                <li><a id = "ql-thongke" href="">
                    <img class="menu_icon" src="../imgs/chart.png" alt="">
                    &nbsp; 
                Thống kê</a>

                <?php
                checkAndHideElements(11,"loadCategory", $lstChucNang);
                checkAndHideElements(1, "loadProduct", $lstChucNang);
                checkAndHideElements(6,"ql-ncc", $lstChucNang);
                checkAndHideElements(2,"ql-dh", $lstChucNang);
                checkAndHideElements(4,"ql-km", $lstChucNang);
                checkAndHideElements(5,"ql-nh", $lstChucNang);
                checkAndHideElements(8,"ql-tk", $lstChucNang);
                checkAndHideElements(3,"ql-nd", $lstChucNang);
                checkAndHideElements(9,"ql-q", $lstChucNang);
                checkAndHideElements(7,"ql-sl", $lstChucNang);
                checkAndHideElements(10,"ql-thongke", $lstChucNang);
            // Repeat the above line for other menu items
                ?>
                <li><a href="../pages/logout.php">
                <img class="menu_icon" src="../imgs/logout.png" alt="">
                    &nbsp; 
                    Đăng xuất</a></li>
            </ul>
        </div>
    
        <div id="trang-quan-li">
            <?php
            if (isset($_GET['ctrl'])) {
                $ctrl = $_GET['ctrl'];
                include 'controllers/' . $ctrl . '.php';
            }
            ?>
        </div>
    </div>
    
</body>

</html>