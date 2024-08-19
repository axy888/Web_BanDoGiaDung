<link rel="stylesheet" href="css/trangchu.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<div class="ctSlide">
    <!-- DANH MỤC -->
    <div class="ctSlide_danhMuc">
        <h4>DANH MỤC</h4>
        <?php if(isset($_GET['maLoai'])){
            $maLoai =$_GET['maLoai'] ;
        }else{
            $maLoai = "TatCaSanPham";
        }
        ?>
        <?php if(!isset($_GET['TatCaSanPham'])) { ?>
            <a href="trangchu.php?vtr=slideClientController&action=DetaiSlidel&TatCaSanPham"  class="ctSlide_danhMuc-ten" >Tất cả sản phẩm </a>
        <?php } else { ?>
            <a href="trangchu.php?vtr=slideClientController&action=DetaiSlidel&TatCaSanPham"  class="ctSlide_danhMuc-ten" id="ctSlide_danhMuc-tenClick" >Tất cả sản phẩm </a>
        <?php }?>
        <?php foreach($Loai as $l): ?>
            <?php if($maLoai == $l['ma_loai']) { ?>
                <a href="trangchu.php?vtr=slideClientController&action=DetaiSlidel&maLoai=<?php echo $l['ma_loai'] ?>" class="ctSlide_danhMuc-ten" id="ctSlide_danhMuc-tenClick"><?php echo $l['ten_loai'] ?></a>
            <?php } else { ?>
                <a href="trangchu.php?vtr=slideClientController&action=DetaiSlidel&maLoai=<?php echo $l['ma_loai'] ?>" class="ctSlide_danhMuc-ten"><?php echo $l['ten_loai'] ?></a>
            <?php }?>
        <?php endforeach; ?>  

    </div>
    <!-- LOAD SẢN PHẨM LÊN -->
    <?php
        // Lấy URL hiện tại
        $currentURL = $_SERVER["REQUEST_URI"];

        // Tạo URL cho trường hợp sắp xếp từ cao tới thấp
        if (strpos($currentURL, 'sx=ctt') === false) {
            if (strpos($currentURL, 'sx=ttc') !== false) {
                // Nếu đã có tham số sx=ttc, thay thế nó bằng sx=ctt
                $newURL = str_replace('sx=ttc', 'sx=ctt', $currentURL);
            }else if(strpos($currentURL, 'sx=bc') !== false) {
                $newURL = str_replace('sx=bc', 'sx=ctt', $currentURL);
            } else {
                // Nếu không có tham số sx=ttc, thêm tham số sx=ctt vào URL
                $newURL = $currentURL . '&sx=ctt';
            }
        } else {
            $newURL = $currentURL;
        }
        
        // Tạo URL cho trường hợp sắp xếp từ thấp tới cao
        if (strpos($currentURL, 'sx=ttc') === false) {
            if (strpos($currentURL, 'sx=ctt') !== false) {
                // Nếu đã có tham số sx=ctt, thay thế nó bằng sx=ttc
                $newURL1 = str_replace('sx=ctt', 'sx=ttc', $currentURL);
            }elseif(strpos($currentURL, 'sx=bc') !== false) {
                $newURL1 = str_replace('sx=bc', 'sx=ttc', $currentURL);
            } else {
                // Nếu không có tham số sx=ctt, thêm tham số sx=ttc vào URL
                $newURL1 = $currentURL . '&sx=ttc';
            }
        } else {
            $newURL1 = $currentURL;
        }
        if (strpos($currentURL, 'sx=bc') === false) {
            if (strpos($currentURL, 'sx=ctt') !== false) {
                // Nếu đã có tham số sx=ctt, thay thế nó bằng sx=ttc
                $newURL2 = str_replace('sx=ctt', 'sx=bc', $currentURL);
            }elseif(strpos($currentURL, 'sx=ttc') !== false) {
                $newURL2 = str_replace('sx=ttc', 'sx=bc', $currentURL);
            }else{
                $newURL2 = $currentURL . '&sx=bc';
            }
        } else {
            $newURL2 = $currentURL;
        }



    ?>


    <div class="ctSlide_DsSanPham">
        <div class="ctSlide_DsSanPham-sx">
            <p>Sắp xếp theo :</p>
            <!-- <a href="" class="ctSlide_DsSanPham-sx-mn">Mới nhất</a> -->
            <?php if(isset($_GET['sx']) && $_GET['sx'] == "bc") { ?>
                    <a href="<?php echo $newURL2; ?>" class="ctSlide_DsSanPham-sx-mn1">Bán Chạy</a>
            <?php } else { ?>
                    <a href="<?php echo $newURL2; ?>" class="ctSlide_DsSanPham-sx-mn">Bán Chạy</a>
            <?php } ?>
            <div class="ctSlide_DsSanPham-sx-select">
                <p>Giá</p>
            </div>
            <div class="ctSlide_DsSanPham-sx-select2">
                <a href="<?php echo $newURL; ?>">Giá từ cao tới thấp</a>
                <a href="<?php echo $newURL1; ?>">Giá từ thấp tới cao</a>
            </div>
 
        </div>

        <div class="ctSlide_DsSanPham-chuyenTrang">
    <?php
           if(isset($_GET["page"]) && is_numeric($_GET["page"])) {
               $current_page = $_GET["page"];
            } else {
                $current_page = 1; 
            };
    ?>
    <?php if(isset($_GET['maSlide']) && isset($_GET['sx']) ) {
               if($_GET['sx'] == "ttc"){
                ?>
                <?php  for($i=1 ; $i<=$TotalPage; $i++): ?>
                    <?php if($i != $current_page) :?>
                        <div class="ctSlide_DsSanPham-chuyenTrang-a">
                                <a  href="trangchu.php?vtr=slideClientController&action=DetaiSlidel&maSlide=<?php echo $_GET['maSlide'] ?>&page=<?php echo $i ?>&sx=ttc"><?php echo $i ?></a>
                        </div>
                        <?php else:?>
                            <div class="ctSlide_DsSanPham-chuyenTrang-a1">
                                <a  href="trangchu.php?vtr=slideClientController&action=DetaiSlidel&maSlide=<?php echo $_GET['maSlide'] ?>&page=<?php echo $i ?>&sx=ttc"><?php echo $i ?></a>
                            </div>
                        <?php endif;?>
                     <?php endfor?>   
               <?php }else if($_GET['sx'] == "bc"){
                ?>
                <?php  for($i=1 ; $i<=$TotalPageSxBc; $i++): ?>
                    <?php if($i != $current_page) :?>
                        <div class="ctSlide_DsSanPham-chuyenTrang-a">
                                <a  href="trangchu.php?vtr=slideClientController&action=DetaiSlidel&maSlide=<?php echo $_GET['maSlide'] ?>&page=<?php echo $i ?>&sx=ttc"><?php echo $i ?></a>
                        </div>
                        <?php else:?>
                            <div class="ctSlide_DsSanPham-chuyenTrang-a1">
                                <a  href="trangchu.php?vtr=slideClientController&action=DetaiSlidel&maSlide=<?php echo $_GET['maSlide'] ?>&page=<?php echo $i ?>&sx=ttc"><?php echo $i ?></a>
                            </div>
                        <?php endif;?>
                     <?php endfor?>   
               <?php }else{?>
        <?php  for($i=1 ; $i<=$TotalPage; $i++): ?>
            <?php if($i != $current_page) :?>
                <div class="ctSlide_DsSanPham-chuyenTrang-a">
                        <a  href="trangchu.php?vtr=slideClientController&action=DetaiSlidel&maSlide=<?php echo $_GET['maSlide'] ?>&page=<?php echo $i ?>&sx=ctt"><?php echo $i ?></a>
                </div>
                <?php else:?>
                    <div class="ctSlide_DsSanPham-chuyenTrang-a1">
                        <a  href="trangchu.php?vtr=slideClientController&action=DetaiSlidel&maSlide=<?php echo $_GET['maSlide'] ?>&page=<?php echo $i ?>&sx=ctt"><?php echo $i ?></a>
                    </div>
            <?php endif;?>
        <?php endfor?>  
        <?php }?> 
    <?php }elseif(isset($_GET['maSlide'])) {?>
        <?php  for($i=1 ; $i<=$TotalPage; $i++): 
            ?>
            <?php if($i != $current_page) :?>
                <div class="ctSlide_DsSanPham-chuyenTrang-a">
                        <a  href="trangchu.php?vtr=slideClientController&action=DetaiSlidel&maSlide=<?php echo $_GET['maSlide'] ?>&page=<?php echo $i ?>"><?php echo $i ?></a>
                </div>
                <?php else:?>
                    <div class="ctSlide_DsSanPham-chuyenTrang-a1">
                        <a  href="trangchu.php?vtr=slideClientController&action=DetaiSlidel&maSlide=<?php echo $_GET['maSlide'] ?>&page=<?php echo $i ?>"><?php echo $i ?></a>
                    </div>
            <?php endif;?>
        <?php endfor?>
    <?php }elseif(isset($_GET['maLoai']) && isset($_GET['sx'] )){ ?> 
        <?php if($_GET['sx'] == "ttc"){
                ?>
                <?php  for($i=1 ; $i<=$TotalPageByMaLoai; $i++): ?>
                    <?php if($i != $current_page) :?>
                        <div class="ctSlide_DsSanPham-chuyenTrang-a">
                                <a  href="trangchu.php?vtr=slideClientController&action=DetaiSlidel&maLoai=<?php echo $_GET['maLoai'] ?>&page=<?php echo $i ?>&sx=ttc"><?php echo $i ?></a>
                        </div>
                        <?php else:?>
                            <div class="ctSlide_DsSanPham-chuyenTrang-a1">
                                <a  href="trangchu.php?vtr=slideClientController&action=DetaiSlidel&maLoai=<?php echo $_GET['maLoai'] ?>&page=<?php echo $i ?>&sx=ttc"><?php echo $i ?></a>
                            </div>
                        <?php endif;?>
                     <?php endfor?>   
               <?php }else if($_GET['sx'] == "bc"){
                ?>
                <?php  for($i=1 ; $i<=$TotalPageByMaLoaiSxBC; $i++): ?>
                    <?php if($i != $current_page) :?>
                        <div class="ctSlide_DsSanPham-chuyenTrang-a">
                                <a  href="trangchu.php?vtr=slideClientController&action=DetaiSlidel&maLoai=<?php echo $_GET['maLoai'] ?>&page=<?php echo $i ?>&sx=ttc"><?php echo $i ?></a>
                        </div>
                        <?php else:?>
                            <div class="ctSlide_DsSanPham-chuyenTrang-a1">
                                <a  href="trangchu.php?vtr=slideClientController&action=DetaiSlidel&maLoai=<?php echo $_GET['maLoai'] ?>&page=<?php echo $i ?>&sx=ttc"><?php echo $i ?></a>
                            </div>
                        <?php endif;?>
                     <?php endfor?>   
               <?php }else{?>
        <?php  for($i=1 ; $i<=$TotalPageByMaLoai; $i++): ?>
            <?php if($i != $current_page) :?>
                <div class="ctSlide_DsSanPham-chuyenTrang-a">
                        <a  href="trangchu.php?vtr=slideClientController&action=DetaiSlidel&maLoai=<?php echo $_GET['maLoai'] ?>&page=<?php echo $i ?>&sx=ctt"><?php echo $i ?></a>
                </div>
                <?php else:?>
                    <div class="ctSlide_DsSanPham-chuyenTrang-a1">
                        <a  href="trangchu.php?vtr=slideClientController&action=DetaiSlidel&maLoai=<?php echo $_GET['maLoai'] ?>&page=<?php echo $i ?>&sx=ctt"><?php echo $i ?></a>
                    </div>
            <?php endif;?>
        <?php endfor?>  
        <?php }?> 
    <?php }elseif(isset($_GET['maLoai'])){  ?>
        <?php  for($i=1 ; $i<=$TotalPageByMaLoai; $i++): 
        ?>
            <?php if($i != $current_page) :?>
                <div class="ctSlide_DsSanPham-chuyenTrang-a">
                        <a  href="trangchu.php?vtr=slideClientController&action=DetaiSlidel&maLoai=<?php echo $_GET['maLoai'] ?>&page=<?php echo $i ?>"><?php echo $i ?></a>
                </div>
                <?php else:?>
                    <div class="ctSlide_DsSanPham-chuyenTrang-a1">
                        <a  href="trangchu.php?vtr=slideClientController&action=DetaiSlidel&maSlide=<?php echo $_GET['maLoai'] ?>&page=<?php echo $i ?>"><?php echo $i ?></a>
                    </div>
            <?php endif;?>
        <?php endfor?>  
    <?php }elseif(isset($_GET['sx'])){ 
            if($_GET['sx'] == "ttc"){
                ?>
                <?php  for($i=1 ; $i<=$TotalPageAll; $i++): ?>
                    <?php if($i != $current_page) :?>
                        <div class="ctSlide_DsSanPham-chuyenTrang-a">
                                <a  href="trangchu.php?vtr=slideClientController&action=DetaiSlidel&TatCaSanPham&page=<?php echo $i ?>&sx=ttc"><?php echo $i ?></a>
                        </div>
                        <?php else:?>
                            <div class="ctSlide_DsSanPham-chuyenTrang-a1">
                                <a  href="trangchu.php?vtr=slideClientController&action=DetaiSlidel&TatCaSanPham&page=<?php echo $i ?>&sx=ttc"><?php echo $i ?></a>
                            </div>
                        <?php endif;?>
                     <?php endfor?>   
               <?php }else if($_GET['sx'] == "bc"){
                ?>
                <?php  for($i=1 ; $i<=$TotalPageAllsxBC; $i++): ?>
                    <?php if($i != $current_page) :?>
                        <div class="ctSlide_DsSanPham-chuyenTrang-a">
                                <a  href="trangchu.php?vtr=slideClientController&action=DetaiSlidel&TatCaSanPham&page=<?php echo $i ?>&sx=bc"><?php echo $i ?></a>
                        </div>
                        <?php else:?>
                            <div class="ctSlide_DsSanPham-chuyenTrang-a1">
                                <a  href="trangchu.php?vtr=slideClientController&action=DetaiSlidel&TatCaSanPham&page=<?php echo $i ?>&sx=bc"><?php echo $i ?></a>
                            </div>
                        <?php endif;?>
                     <?php endfor?>   
               <?php }else{?>
        <?php  for($i=1 ; $i<=$TotalPageAll; $i++): ?>
            <?php if($i != $current_page) :?>
                <div class="ctSlide_DsSanPham-chuyenTrang-a">
                        <a  href="trangchu.php?vtr=slideClientController&action=DetaiSlidel&TatCaSanPham&page=<?php echo $i ?>&sx=ctt"><?php echo $i ?></a>
                </div>
                <?php else:?>
                    <div class="ctSlide_DsSanPham-chuyenTrang-a1">
                        <a  href="trangchu.php?vtr=slideClientController&action=DetaiSlidel&TatCaSanPham&page=<?php echo $i ?>&sx=ctt"><?php echo $i ?></a>
                    </div>
            <?php endif;?>
        <?php endfor?>  
        <?php }?> 
    <?php }else{ ?>
        <?php  for($i=1 ; $i<=$TotalPageAll; $i++): 
        ?>
            <?php if($i != $current_page) :?>
                <div class="ctSlide_DsSanPham-chuyenTrang-a">
                        <a id="<?php echo $i; ?>" data-page="<?php echo $i; ?>" class="phantrang" href=""><?php echo $i ?></a>
                </div>
                <?php else:?>
                    <div class="ctSlide_DsSanPham-chuyenTrang-a1">
                        <a id="<?php echo $i; ?>" data-page="<?php echo $i; ?>" class="phantrang" href=""><?php echo $i ?></a>
                    </div>
            <?php endif;?>
        <?php endfor?>  
    <?php } ?>  

    </div>

        <div id="list_sp_phantrang" style="width: 900px; height: 561px; display:flex;flex-wrap: wrap;flex-direction:row;">
    <?php
        if(isset($_GET['maLoai']) && isset($_GET['sx'])){
            if($_GET['sx'] == 'ttc')
            {
                foreach($SanPhambyMaLoaiandSXTtc as $slide): 
                    ?>  
                        <a href="product_detail.php?ma_sp=<?php echo $slide['ma_sp'] ?>" class="ctSlide_DsSanPham_sanPham">
                           <img src="admin/images/<?php echo $slide['hinh'] ?>" alt="" class="ctSlide_DsSanPham_sanPham-img">
                           <p class="ctSlide_DsSanPham_sanPham-tenSp"><?php echo $slide['ten_sp']?></p>
                           <p class="ctSlide_DsSanPham_sanPham-donGia"><?php echo $slide['don_gia']?>&nbsp;đ</p>
                        </a>
                    <?php  
                    endforeach;
            }else if($_GET['sx'] == 'bc')
            {
                foreach($SanPhambyMaLoaiandSXTbc as $slide): 
                    ?>  
                        <a href="product_detail.php?ma_sp=<?php echo $slide['ma_sp'] ?>" class="ctSlide_DsSanPham_sanPham">
                           <img src="admin/images/<?php echo $slide['hinh'] ?>" alt="" class="ctSlide_DsSanPham_sanPham-img">
                           <p class="ctSlide_DsSanPham_sanPham-tenSp"><?php echo $slide['ten_sp']?></p>
                           <p class="ctSlide_DsSanPham_sanPham-donGia"><?php echo $slide['don_gia']?>&nbsp;đ</p>
                        </a>
                    <?php  
                endforeach;
            }else{
                foreach($SanPhambyMaLoaiandSX as $slide): 
                    ?>  
                        <a href="product_detail.php?ma_sp=<?php echo $slide['ma_sp'] ?>" class="ctSlide_DsSanPham_sanPham">
                           <img src="admin/images/<?php echo $slide['hinh'] ?>" alt="" class="ctSlide_DsSanPham_sanPham-img">
                           <p class="ctSlide_DsSanPham_sanPham-tenSp"><?php echo $slide['ten_sp']?></p>
                           <p class="ctSlide_DsSanPham_sanPham-donGia"><?php echo $slide['don_gia']?>&nbsp;đ</p>
                        </a>
                    <?php  
                    endforeach;
            }
        }elseif(isset($_GET['maLoai'])){ 
                foreach($SanPhambyMaLoai as $slide): 
            ?>  
                <a href="product_detail.php?ma_sp=<?php echo $slide['ma_sp'] ?>" class="ctSlide_DsSanPham_sanPham">
                   <img src="admin/images/<?php echo $slide['hinh'] ?>" alt="" class="ctSlide_DsSanPham_sanPham-img">
                   <p class="ctSlide_DsSanPham_sanPham-tenSp"><?php echo $slide['ten_sp']?></p>
                   <p class="ctSlide_DsSanPham_sanPham-donGia"><?php echo $slide['don_gia']?>&nbsp;đ</p>
                </a>
            <?php  
            endforeach;
        
        }elseif(isset($_GET['maSlide']) && isset($_GET['sx'])) {
            if($_GET['sx'] == 'ttc'){
                $maSlide = $_GET['maSlide'];
                foreach($slidetailandSXTtc as $slide):
                if($slide['slide_id'] == $maSlide){
            ?>  
                <a href="product_detail.php?ma_sp=<?php echo $slide['ma_sp'] ?>" class="ctSlide_DsSanPham_sanPham">
                   <img src="admin/images/<?php echo $slide['hinh'] ?>" alt="" class="ctSlide_DsSanPham_sanPham-img">
                   <p class="ctSlide_DsSanPham_sanPham-tenSp"><?php echo $slide['ten_sp']?></p>
                   <p class="ctSlide_DsSanPham_sanPham-donGia"><?php echo $slide['don_gia']?>&nbsp;đ</p>
                </a>
            <?php
                }
            endforeach;
            }else if($_GET['sx'] == 'bc'){
                $maSlide = $_GET['maSlide'];
                foreach($slidetailandSXTbc as $slide):
                if($slide['slide_id'] == $maSlide){
            ?>  
                <a href="product_detail.php?ma_sp=<?php echo $slide['ma_sp'] ?>" class="ctSlide_DsSanPham_sanPham">
                   <img src="admin/images/<?php echo $slide['hinh'] ?>" alt="" class="ctSlide_DsSanPham_sanPham-img">
                   <p class="ctSlide_DsSanPham_sanPham-tenSp"><?php echo $slide['ten_sp']?></p>
                   <p class="ctSlide_DsSanPham_sanPham-donGia"><?php echo $slide['don_gia']?>&nbsp;đ</p>
                </a>
            <?php
                }
            endforeach;
            }else {
            $maSlide = $_GET['maSlide'];
            foreach($slidetailandSX as $slide):
            if($slide['slide_id'] == $maSlide){
        ?>  
            <a href="product_detail.php?ma_sp=<?php echo $slide['ma_sp'] ?>" class="ctSlide_DsSanPham_sanPham">
               <img src="admin/images/<?php echo $slide['hinh'] ?>" alt="" class="ctSlide_DsSanPham_sanPham-img">
               <p class="ctSlide_DsSanPham_sanPham-tenSp"><?php echo $slide['ten_sp']?></p>
               <p class="ctSlide_DsSanPham_sanPham-donGia"><?php echo $slide['don_gia']?>&nbsp;đ</p>
            </a>
        <?php
            }
        endforeach;
             }
         }elseif(isset($_GET['maSlide'])) {
                $maSlide = $_GET['maSlide'];
                foreach($slidetail as $slide):
                if($slide['slide_id'] == $maSlide){
            ?>  
                <a href="product_detail.php?ma_sp=<?php echo $slide['ma_sp'] ?>" class="ctSlide_DsSanPham_sanPham">
                   <img src="admin/images/<?php echo $slide['hinh'] ?>" alt="" class="ctSlide_DsSanPham_sanPham-img">
                   <p class="ctSlide_DsSanPham_sanPham-tenSp"><?php echo $slide['ten_sp']?></p>
                   <p class="ctSlide_DsSanPham_sanPham-donGia"><?php echo $slide['don_gia']?>&nbsp;đ</p>
                </a>
            <?php
                }
            endforeach;
        }elseif(isset($_GET['sx'])){
            if($_GET['sx'] == 'ttc')
            {
                foreach($SanPhamandSxTtc as $slide): 
                    ?>  
                        <a href="product_detail.php?ma_sp=<?php echo $slide['ma_sp'] ?>" class="ctSlide_DsSanPham_sanPham">
                           <img src="admin/images/<?php echo $slide['hinh'] ?>" alt="" class="ctSlide_DsSanPham_sanPham-img">
                           <p class="ctSlide_DsSanPham_sanPham-tenSp"><?php echo $slide['ten_sp']?></p>
                           <p class="ctSlide_DsSanPham_sanPham-donGia"><?php echo $slide['don_gia']?>&nbsp;đ</p>
                        </a>
                    <?php  
                    endforeach;
            }elseif($_GET['sx'] == 'bc')
                {
                    foreach($SanPhamandSxBanChay as $slide): 
                        ?>  
                            <a href="product_detail.php?ma_sp=<?php echo $slide['ma_sp'] ?>" class="ctSlide_DsSanPham_sanPham">
                               <img src="admin/images/<?php echo $slide['hinh'] ?>" alt="" class="ctSlide_DsSanPham_sanPham-img">
                               <p class="ctSlide_DsSanPham_sanPham-tenSp"><?php echo $slide['ten_sp']?></p>
                               <p class="ctSlide_DsSanPham_sanPham-donGia"><?php echo $slide['don_gia']?>&nbsp;đ</p>
                            </a>
                        <?php  
                        endforeach;
                }else{
            foreach($SanPhamandSx as $s):
                ?>  
                    <a href="product_detail.php?ma_sp=<?php echo $s['ma_sp'] ?>" class="ctSlide_DsSanPham_sanPham">
                       <img src="admin/images/<?php echo $s['hinh'] ?>" alt="" class="ctSlide_DsSanPham_sanPham-img">
                       <p class="ctSlide_DsSanPham_sanPham-tenSp"><?php echo $s['ten_sp']?></p>
                       <p class="ctSlide_DsSanPham_sanPham-donGia"><?php echo $s['don_gia']?>&nbsp;đ</p>
                    </a>
                <?php
                endforeach;
            }
        }else{  
            foreach($SanPham as $s):
            ?>  
                <a href="product_detail.php?ma_sp=<?php echo $s['ma_sp'] ?>" class="ctSlide_DsSanPham_sanPham">
                   <img src="admin/images/<?php echo $s['hinh'] ?>" alt="" class="ctSlide_DsSanPham_sanPham-img">
                   <p class="ctSlide_DsSanPham_sanPham-tenSp"><?php echo $s['ten_sp']?></p>
                   <p class="ctSlide_DsSanPham_sanPham-donGia"><?php echo $s['don_gia']?>&nbsp;đ</p>
                </a>
            <?php
            endforeach;
        }
    ?>
    </div>
<!-- CHUYỂN TRANG-->

    </div>
</div>
<script>
$(document).ready(function() {
    // Gắn sự kiện click vào các thẻ <a> có class pagination
    $('.phantrang').click(function(e) {
        e.preventDefault(); // Ngăn chặn hành động mặc định của thẻ <a>

        // Lấy số trang từ thuộc tính data-page của thẻ <a> được click
        var page = $(this).data('page');

            // Lấy tất cả thẻ a có class "phantrang"
            const paginationLinks = document.querySelectorAll('.phantrang');

// Tắt màu tất cả thẻ a có class "phantrang"
paginationLinks.forEach(link => {
  link.style.color = 'black';
  link.style.backgroundColor = 'white';
});

// Lấy thẻ a có id được chọn
const selectedLink = document.getElementById("" + page + "");

// Nếu thẻ a được chọn tồn tại
if (selectedLink) {
  // Đổi màu thẻ a được chọn
  selectedLink.style.color = 'white';
  selectedLink.style.backgroundColor = 'red';
}

        // Gọi hàm loadData với số trang đã lấy được
        loadData(page);
    });

    // Hàm thực hiện yêu cầu AJAX để tải dữ liệu
    function loadData(page) {
        $.ajax({
            url: 'trangchu.php?vtr=slideClientController&action=DetaiSlidel&TatCaSanPham&page='+page,
            type: 'post',
            data: {page: page},
            success: function(response) {
                const thbleElement = $(response).find('#list_sp_phantrang');
                $('#list_sp_phantrang').html(thbleElement.html());
            },
            error: function(xhr, status, error) {
                // Xử lý khi có lỗi
                console.error(error);
            }
        });
    }




});


</script>

    
 
      


 
 