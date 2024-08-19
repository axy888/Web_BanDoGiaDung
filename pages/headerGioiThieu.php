<meta charset="UTF-8">
<?php 
    session_start();
    if(!isset($_SESSION['giohang'])) $_SESSION['giohang']=[];
    #lấy dữ liệu 

    if(isset($_POST['addcart'])&&($_POST['addcart'])){
        $hinh =$_POST['hinh'];
        $tensp =$_POST['tensp'];
        $dongia=$_POST['dongia'];
        $sl=$_POST['soluong'];
        $ma_sp=$_POST['ma_sp'];
        $mau_sac=$_POST['mau_sac'];
        $soluong=1;
        if(isset($sl)){
            $soluong=$sl;
        }
        $tmp=0;
        for($i =0 ;$i < sizeof($_SESSION['giohang']); $i++){
            if($tensp == $_SESSION['giohang'][$i][1]){
                $tmp=+1;
                $soLuongNew = $soluong+$_SESSION['giohang'][$i][3];
                $_SESSION['giohang'][$i][3]=$soLuongNew;
                break;
            }
        }
        if($tmp == 0){
            $sp = [$hinh,$tensp,$dongia,$soluong,$ma_sp,$mau_sac];
            $_SESSION['giohang'][]= $sp;
        }
        // print_r($_SESSION['giohang']);
        // session_unset();
        echo "<script>
        window.location.href = '{$_SERVER['REQUEST_URI']}';
        alert('Đã thêm vào giỏ hàng !!');
        </script>";
        // header("Location: {$_SERVER['REQUEST_URI']}");
        exit();
    }
    

    function showGioHang(){

        if(isset($_SESSION['giohang']) && is_array($_SESSION['giohang']) && !empty($_SESSION['giohang']))
        {
            $tt =0;
            echo'<p id="sp-daThem">Sản Phẩm Đã Thêm</p>';
            for($i=0; $i < sizeof($_SESSION['giohang']); $i++){
                $tongTien =$_SESSION['giohang'][$i][2]*$_SESSION['giohang'][$i][3];
                $tt=$tt+$tongTien;
                echo'    
                    <div id="list_shopping-product">
                        <div class="image-container">
                            <img src="admin/images/'.$_SESSION['giohang'][$i][0].'" alt="" width="50px" height="50px" id="list_shopping-product-img">
                            <div id="list_shopping-product-h4">
                                <h4 id="list_shopping-product-tensp">'.$_SESSION['giohang'][$i][1].'</h4>
                            </div>
                            <div id="list_shopping-product-gsl">
                                <p id="list_shopping-product-gia">'.$_SESSION['giohang'][$i][2].'x'.$_SESSION['giohang'][$i][3].'</p>
                            </div>
                        </div>
                        <div class="text-container">
                            <div id="list_shopping-product-mau">
                                <p >Màu : '.$_SESSION['giohang'][$i][5].' </p>
                            </div>
                            <div id="list_shopping-product-xoa">
                              <a href="delcart.php? delMasp='.($i+1).'">Xóa</a>
                            </div>  
                        </div>   
                    </div>
                ';
            }
            echo'
            <div id="list_shopping-thanhToan">
                <div id="list_shopping-thanhToan-text">
                    <p>Tổng Cộng : </p>
                    <p  id="list_shopping-thanhToan-text-tong">'.$tt.'đ</p>
                </div>
                    <a href="trangchu.php?ctrl=thanhToan"><button id="list_shopping-thanhToan-button" >Thanh Toán</button></a>
            </div>
            ';

        }else {
                echo'
                     <div id="list_shopping-product>
                        <div id="list_shopping-no" style="text-align: center;">
                            <img src="imgs/no-cart.png" alt="" width="350px" height="170px">
                            <h3>Chưa có sản phẩm</h3>
                         </div>
                     </div>
                ';       
        }
    }


    
    

?>
<div id="headerGioiThieu">
    <div id="header_nav">
        <ul id="header_nav_left">
            <li>Tải Ứng Dụng DOVODU - Bên bạn mỗi ngày</li>
            <li><img src="imgs/phone.png" alt=""class="icon_header" id="sdt1">0989924341</li>
            <li><img src="imgs/email.png" alt="" class="icon_header"id="email1">KietKhung@gmail.com</li>
        </ul>
        <ul id="header_nav_right">
            <li><img src="imgs/bell.png" alt="" class="icon_header">Tin Tức</li>
            <li><img src="imgs/question.png" alt="" class="icon_header"> Liên Hệ</li>
            <?php if(isset($_SESSION["nguoidung"])) { ?>
                <li id="ttcn"><a href="trangchu.php?vtr=thongtinController"><img src="imgs/account.png" alt="" class="icon_header"> Thông tin cá nhân</a></li>
                <li id="dx"><a href="pages/logout.php">Đăng xuất</a></li>
            <?php } else { ?>
                <li id="dk"><a href="http://localhost/DoVoDung/pages/dangky.php">Đăng Ký</a></li>
                <li id="dn"><a href="http://localhost/DoVoDung/pages/dangnhap.php">Đăng Nhập</a></li>
            <?php } ?>
</ul>
    </div>
    <div id="header_search">
        <div id="header_search_logo">
           <a href="trangchu.php?vtr=slideClientController"><img src="imgs/DOVODUNG.png" alt="" id="logo_web" ></a> 
        </div>
            <div id="header_search_icon">
                <div id ="header_search_icon-wrap">
                    <form action="trangchu.php?vtr=timKiem" method="GET">
                        <input type="text" id ="search_input" placeholder="Tìm Kiếm...." name="textTimKiem">
                            <!-- <div id="history_search">
                                <h3>Lịch sử tìm kiếm</h3>
                                <ul>

                                </ul>
                            </div> -->
                        </div>
                        
                        <ul id="header_search_label-options">
                            <li id="header_search_label-options-items">
                                Toàn bộ cửa hàng
                                <img src="imgs/check.png" alt="">
                            </li>
                        </ul>
                        <button id="header_search_icon_button" type="submit" name="btn" value="timKiem" ><img src="imgs/search.png" alt=""></button>
                        <input type="hidden" name="vtr" value="timKiem">
                    </form>    
            </div>
        <div id="header_search_cartShopping">
                <img src="imgs/shopping-cart.png" alt="" id="logo_shopping">
            <div id="list_shopping">
                    <?php 
                        showGioHang();
                    ?>
            </div>
        </div>  
    </div>

    <div id="oTrong">
            <a href="trangchu.php?vtr=slideClientController" id="oTrong_a_trangChu">Trang chủ</a>
            <p id="oTrong_a_p1">></p>
            <a href="trangchu.php?ctrl=VeChungToi" id="oTrong_a_VCT">Về chúng tôi</a>
            <p id="oTrong_a_p2">></p>
            <p href="#" id="oTrong_a_rand">Giới thiệu</p>
    </div>
    <!-- <div id="alert">
        <div id="process"></div>
        <img src="imgs/done.png" alt="">
        <span>Bạn đã cập nhật giỏ hàng thành công !</span>
    </div> -->

</div>