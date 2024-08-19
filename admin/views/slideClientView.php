
<?php




// ĐỔ DỮ LIỆU VÀO CÁC SLIDE
    $previous_slide_id=null;
    $slide_names = array(); // tạo mảng lưu slidename
    $ma_sp_array = array(); 
    $button_id = 0;
    foreach($slidesa as $slide) :  
?>

<?php        
        $current_slide_id = $slide['slide_id'];
        $current_spID = $slide['ma_sp'];
        $current_tenSP = $slide['ten_sp'];
        $current_don = $slide['don_gia'];
        $current_img = $slide['hinh'];
        $current_slide_name = $slide['slidename'];
        $current_mauSac = $slide['mau_sac'];

        if($current_slide_id !=$previous_slide_id ) :
            $button_id++;
            if (!empty($ma_sp_array) && isset($slide_names[$previous_slide_id])) :

?>

    <button id="button-left-<?php echo   $button_id ?>" class="bt"><img src="imgs/left-arrow.png" alt=""></button>
    <button id="button-right-<?php echo   $button_id ?>" class="bt"><img src="imgs/right-arrow.png" alt=""></button>
    <a class="link_pro" href="trangchu.php?vtr=slideClientController&action=DetaiSlidel&maSlide=<?php echo $previous_slide_id?>">Xem tất cả ></a>
                    <div class="homepage_item" id="homepage_item-<?php echo $current_slide_id ?>">
                        <p id="slideName"><?php echo $slide_names[$previous_slide_id] ?></p>
                        <?php foreach ($ma_sp_array as $product) : ?>
                            <div class="div_sp">
                                <div class="div_sp_ul">
                                    <!-- <img src="./imgs/shopping-cart.png" alt="" class="imgs-shoppingCart"> -->
                                    <form action="" method="post" id="add-to-cart">
                                        <input type="submit" name="addcart" class="div_sp_ul-button">
                                        <a href="product_detail.php?ma_sp=<?php echo $product['ma_sp'] ?>" id="homepage_item_a">
                                        <?php echo '<img width = "184px" height="195px" src="admin/images/' . $product["hinh"] .'" alt="" id="div_sp_ul-img">' ; ?></td>
                                        <input type="hidden" name="hinh" value="<?php echo $product['hinh']; ?>">
                                        <input type="hidden" name="tensp" value="<?php echo $product['ten_sp']; ?>">
                                        <input type="hidden" name="dongia" value="<?php echo $product['don_gia']; ?>">
                                        <input type="hidden" name="ma_sp" value="<?php echo $product['ma_sp']; ?>">
                                        <input type="hidden" name="mau_sac" value="<?php echo $product['mau_sac']; ?>">
                                        <p class="group_pro" id="div_sp_ul-ten-sp"><?php echo $product['ten_sp']; ?></p>
                                        <p class="group_pro" id="div_sp_ul-p" style="color : red;"><?php echo $product['don_gia']; ?> đ</p>
                                    </form> 
                                </div>
                            </div>
                        </a>
                        <?php endforeach; ?>
                    </div>
        <?php 
            endif;
            $slide_names[$current_slide_id] = $current_slide_name;
            $previous_slide_id = $current_slide_id;
            $ma_sp_array = array();
        endif;
        $ma_sp_array[] = array(
            'ma_sp' => $current_spID,
            'ten_sp' => $current_tenSP,
            'hinh'   => $current_img,
            'don_gia' => $current_don,
            'mau_sac' => $current_mauSac
        );
    endforeach;
    if (!empty($ma_sp_array) && isset($slide_names[$previous_slide_id])) :
        $button_id++;
     
        ?>
    <button id="button-left-<?php echo   $button_id ?>" class="bt"><img src="imgs/left-arrow.png" alt=""></button>
    <button id="button-right-<?php echo   $button_id ?>" class="bt"><img src="imgs/right-arrow.png" alt=""></button>
    <a class="link_pro" href="trangchu.php?vtr=slideClientController&action=DetaiSlidel&maSlide=<?php echo $previous_slide_id?>">Xem tất cả ></a>
        <div class="homepage_item" id="homepage_item-<?php echo $previous_slide_id+1?>">
            <?php foreach ($ma_sp_array as $product) : ?>
            <p id="slideName" class="homepage_item-p"><?php echo $slide_names[$previous_slide_id] ?></p>
            <div class="div_sp" >
                <div class="div_sp_ul">
                    <form action="" method="post">
                        <a href="product_detail.php?ma_sp=<?php echo $product['ma_sp'] ?>" id="homepage_item_a">
                        <input type="submit" name="addcart" class="div_sp_ul-button">
                        <img width="185px" height="184px" src="admin/images/<?php echo $product['hinh']; ?>" alt="" id="div_sp_ul-ten-img">
                        <input type="hidden" name="tensp" value="<?php echo $product['ten_sp']; ?>">
                        <input type="hidden" name="dongia" value="<?php echo $product['don_gia']; ?>">
                        <input type="hidden" name="ma_sp" value="<?php echo $product['ma_sp']; ?>">
                        <p class="group_pro" id="div_sp_ul-ten-sp"><?php echo $product['ten_sp']; ?></p><br>
                        <p class="group_pro" id="div_sp_ul-p" style="color : red;"><?php echo $product['don_gia']; ?> đ</p>
                    </form>
                </div>
            </div>
    </a>
            <?php endforeach; ?>
        </div>
        <?php 
    endif;
?>
<script>
const initSlider = () => {
    const slideButtons = document.querySelectorAll(".bt");
    const div_sp_ul2 = document.getElementById("homepage_item-2");
    const div_sp_ul3 = document.getElementById("homepage_item-3");
    const div_sp_ul4 = document.getElementById("homepage_item-4");
    const div_sp_ul5 = document.getElementById("homepage_item-5");
    const div_sp_ul6 = document.getElementById("homepage_item-6");



    slideButtons.forEach(button => {
    button.addEventListener("click", () => {
        if (button.id === "button-right-2") {
            const direction2 = button.id === "button-right-2" ? 1 : -1;
            const scrollAmount = div_sp_ul2.clientWidth * direction2;
            div_sp_ul2.scrollBy({ left: scrollAmount, behavior: "smooth" });
        } else if (button.id === "button-left-2") {
            const direction2 = button.id === "button-left-2" ? -1 : 1;
            const scrollAmount = div_sp_ul2.clientWidth * direction2;
            div_sp_ul2.scrollBy({ left: scrollAmount, behavior: "smooth" });
        } else if (button.id === "button-right-3") {
            const direction2 = button.id === "button-right-3" ? 1 : -1;
            const scrollAmount = div_sp_ul3.clientWidth * direction2;
            div_sp_ul3.scrollBy({ left: scrollAmount, behavior: "smooth" });
        }else if (button.id === "button-left-3") {
            const direction2 = button.id === "button-left-3" ? -1 : 1;
            const scrollAmount = div_sp_ul3.clientWidth * direction2;
            div_sp_ul3.scrollBy({ left: scrollAmount, behavior: "smooth" });
        }

        if (button.id === "button-right-4") {
            const direction2 = button.id === "button-right-4" ? 1 : -1;
            const scrollAmount = div_sp_ul4.clientWidth * direction2;
            div_sp_ul4.scrollBy({ left: scrollAmount, behavior: "smooth" });
        } else if (button.id === "button-left-4") {
            const direction2 = button.id === "button-left-4" ? -1 : 1;
            const scrollAmount = div_sp_ul2.clientWidth * direction2;
            div_sp_ul4.scrollBy({ left: scrollAmount, behavior: "smooth" });
        } else if (button.id === "button-right-5") {
            const direction2 = button.id === "button-right-5" ? 1 : -1;
            const scrollAmount = div_sp_ul3.clientWidth * direction2;
            div_sp_ul5.scrollBy({ left: scrollAmount, behavior: "smooth" });
        }else if (button.id === "button-left-5") {
            const direction2 = button.id === "button-left-5" ? -1 : 1;
            const scrollAmount = div_sp_ul5.clientWidth * direction2;
            div_sp_ul5.scrollBy({ left: scrollAmount, behavior: "smooth" });
        }else if (button.id === "button-right-6") {
            const direction2 = button.id === "button-right-6" ? 1 : -1;
            const scrollAmount = div_sp_ul3.clientWidth * direction2;
            div_sp_ul6.scrollBy({ left: scrollAmount, behavior: "smooth" });
        }else if (button.id === "button-left-6") {
            const direction2 = button.id === "button-left-6" ? -1 : 1;
            const scrollAmount = div_sp_ul3.clientWidth * direction2;
            div_sp_ul6.scrollBy({ left: scrollAmount, behavior: "smooth" });
        }
    });
});



}

// const buttons = document.querySelectorAll('.div_sp_ul-button');
// var total = 0;
// var sl =1;

// buttons.forEach(function(button, index) {
//     button.addEventListener("click", function(event) {
//         var btnItem = event.currentTarget;
//         var product = btnItem.parentElement;
//         var productImg = product.querySelector('#div_sp_ul-img').src;
//         var productTen = product.querySelector('#div_sp_ul-ten-sp').innerText;
//         var productGia = product.querySelector('#div_sp_ul-p').innerText;
//         // console.log(productImg,productTen,productGia)
//         addcart(productImg,productTen,productGia,index)
        
//     })   
// })


// var cartItems = [];
// function addcart(productImg,productTen,productGia,index){
//     var div = document.createElement("div")
//     div.classList.add("product_lst")
//     var existingItem = cartItems.find(item => item.productTen === productTen);
//     if(existingItem){
//         existingItem.soLuong++;
//     }else{
//         cartItems.push({
//             productImg: productImg,
//             productTen: productTen,
//             productGia: productGia,
//             soLuong: 1
//         });
//     }
//     var total = cartItems.reduce((acc, item) => acc + item.productGia * item.soLuong, 0);
//     var tong = document.querySelector('#list_shopping-thanhToan-text-tong');
//     tong.innerHTML = total;
//     renderCartItems();

// }
// function renderCartItems() {
//     var lst = document.querySelector('#list_shopping-product');

//     lst.innerHTML = "";


//     cartItems.forEach(function(item) {
//         var div = document.createElement("div");
//         div.classList.add("product_lst");

//         var divContent = `
//             <div class="image-container">
//                 <img src="${item.productImg}" alt="" width="50px" height="50px" id="list_shopping-product-img">
//                 <div id="list_shopping-product-h4">
//                     <h4 id="list_shopping-product-tensp">${item.productTen}</h4>
//                 </div>
//                 <div id="list_shopping-product-gsl">
//                     <p id="list_shopping-product-gia">${item.productGia}</p>
//                     <p id="list_shopping-product-soluong">x${item.soLuong}</p>
//                 </div>
//             </div>
//             <div class="text-container">
//                 <div id="list_shopping-product-mau">
//                     <p >Màu</p>
//                 </div>
//                 <div id="list_shopping-product-xoa">
//                     <p >Xóa</p>
//                 </div>
//             </div>`;
//         div.innerHTML = divContent;
//         lst.appendChild(div);
//     });
// }



window.addEventListener("load", initSlider);



</script>





<div id="tintuc">
    <p class="tintuc_title">TIN TỨC</p>
    <ul>
        <li>
            <a href="trangchu.php?ctrl=bodyGioiThieu">
                <img src="./imgs/imgGioiThieu.png" alt="">
                <p class="t1">Giới thiệu</p>
                <p class="t2"></p>
                <p class="t3">Xem thêm</p>
            </a>
        </li>
        <li>
            <a href="trangchu.php?ctrl=chinhSachVanChuyen">
                <img src="./imgs/ChinhSachVanChuyen.png" alt="">
                <p class="t1">Chính sách vận chuyển và giao nhận</p>
                <p class="t2"></p>
                <p class="t3">Xem thêm</p>
            </a>
        </li>
        <li>
            <a href="trangchu.php?ctrl=giaoDichChung">
                <img src="./imgs/giaoDich_max.png" alt="">
                <p class="t1">Thông tin về điều kiện giao dịch chung</p>
                <p class="t2"></p>
                <p class="t3">Xem thêm</p>
            </a>
        </li>
        <li>
            <a href="trangchu.php?ctrl=hdMuaHang">
                <img src="./imgs/hdMuaHang.png" alt="">
                <p class="t1">Hướng dẫn mua hàng</p>
                <p class="t2">Hướng dẫn mua hàng - Thanh toán - Giao hàng với DOVODUNG</p>
                <p class="t3">Xem thêm</p>
            </a>
        </li>
    </ul>
</div>
