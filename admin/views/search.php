<link rel="stylesheet" href="css/trangchu.css">
<div class="ctSlide">
    <div class="ctSlide_danhMuc">
            <h4>DANH MỤC</h4>
        <?php if(isset($_GET['maLoai'])){
            $maLoai =$_GET['maLoai'] ;
        }else{
            $maLoai = "TatCaSanPham";
        }
        ?>  
        <?php if(isset($_GET['maLoai'])) { ?>
            <a href="trangchu.php?vtr=slideClientController&action=DetaiSlidel"  class="ctSlide_danhMuc-ten" >Tất cả sản phẩm </a>
        <?php } else { ?>
            <a href="trangchu.php?vtr=slideClientController&action=DetaiSlidel"  class="ctSlide_danhMuc-ten" id="ctSlide_danhMuc-tenClick" >Tất cả sản phẩm </a>
        <?php }?>
        <?php foreach($Loai as $l): ?>
            <?php if($maLoai == $l['ma_loai']) { ?>
                <a href="trangchu.php?vtr=slideClientController&action=DetaiSlidel&maLoai=<?php echo $l['ma_loai'] ?>" class="ctSlide_danhMuc-ten" id="ctSlide_danhMuc-tenClick"><?php echo $l['ten_loai'] ?></a>
            <?php } else { ?>
                <a href="trangchu.php?vtr=slideClientController&action=DetaiSlidel&maLoai=<?php echo $l['ma_loai'] ?>" class="ctSlide_danhMuc-ten"><?php echo $l['ten_loai'] ?></a>
            <?php }?>
        <?php endforeach; ?>  
    </div>
    <?php  
            if(isset($_GET['textTimKiem'])){
                $tuKhoa = $_GET['textTimKiem'];
            }
            ?>
            
    <div class="ctSlide_DsSanPham" >
    <p class="slTimKiem"><img src="imgs/kqTimKiem.png" alt="">Có <?php echo $Sl ?> Kết quả tìm kiếm cho từ khóa '<?php echo $tuKhoa ?>'</p>
    <div class="ctSlide_DsSanPham-chuyenTrang">
            <?php
                if(isset($_GET["page"]) && is_numeric($_GET["page"])) {
                    $current_page = $_GET["page"];
                    } else {
                        $current_page = 1; 
                    };
            ?>
            <?php  for($i=1 ; $i<=$TotalPage; $i++): 
                ?>
                <?php if($i != $current_page) :?>
                    <div class="ctSlide_DsSanPham-chuyenTrang-a">
                        <a  href="trangchu.php?textTimKiem=<?php echo $tuKhoa ?>&btn=timKiem&vtr=timKiem&page=<?php echo $i ?>"><?php echo $i ?></a>
                    </div>
                <?php else:?>
                    <div class="ctSlide_DsSanPham-chuyenTrang-a1">
                        <a   href="trangchu.php?textTimKiem=<?php echo $tuKhoa ?>&btn=timKiem&vtr=timKiem&page=<?php echo $i ?>"><?php echo $i ?></a>
                    </div>
                    <?php endif;?>
            <?php endfor?>
        </div>
    <div id="list_sp_phantrang" style="width: 900px; height: 561px; display:flex;flex-wrap: wrap;flex-direction:row;">
        <?php foreach($searchs as $s): ?>
            <a href="product_detail.php?ma_sp=<?php echo $s['ma_sp'] ?>" class="ctSlide_DsSanPham_sanPham">
                   <img src="admin/images/<?php echo $s['hinh'] ?>" alt="" class="ctSlide_DsSanPham_sanPham-img">
                   <p class="ctSlide_DsSanPham_sanPham-tenSp"><?php echo $s['ten_sp']?></p>
                   <p class="ctSlide_DsSanPham_sanPham-donGia"><?php echo $s['don_gia']?>&nbsp;đ</p>
            </a>
        <?php endforeach; ?>
        
    </div>
    </div>
</div>
<?php 


?>