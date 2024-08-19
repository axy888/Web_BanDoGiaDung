

<div class="thanhToan-nhapTT">
    <p class="thanhToan-nhapTT-dcnh">Địa chỉ nhận hàng</p>
    <h3 >THÊM ĐỊA CHỈ MỚI :</h3>
    <label class="thanhToan-nhapTT-label" >Tên (*) </label>
    <input type="text" class="thanhToan-nhapTT-input"  id="thanhToan-nhapTT-ten">
    <label class="thanhToan-nhapTT-label">Số điện thoại (*) </label>
    <input type="text" class="thanhToan-nhapTT-input" id="thanhToan-nhapTT-sdt">
    <label class="thanhToan-nhapTT-label" >Tỉnh / Thành phố (*) </label>
    <input type="text" class="thanhToan-nhapTT-input"  id="thanhToan-nhapTT-tinh">
    <label class="thanhToan-nhapTT-label" >Quận / Huyện (*) </label>
    <input type="text" class="thanhToan-nhapTT-input" id="thanhToan-nhapTT-quan">
    <label class="thanhToan-nhapTT-label" >Xã / Phường (*) </label>
    <input type="text" class="thanhToan-nhapTT-input" id="thanhToan-nhapTT-xa">
    <label class="thanhToan-nhapTT-label" >Địa chỉ (*) </label>
    <input type="text" class="thanhToan-nhapTT-input" id="thanhToan-nhapTT-dc">
</div>
<div class="thanhToan-donHang">
    <div class="thanhToan-donHang-title">
        <h3>Sản Phẩm</h3>
        <div class="thanhToan-donHang-title-thaotac">
            <p>Đơn giá</p> 
            <p>Số lượng</p>
            <p>Tổng cộng</p>
            <p>Thao tác</p>
        </div>

    </div>
<?php 
//  session_start();
if(isset($_SESSION['giohang'])){
    $tt=0;
    for($i =0 ;$i<sizeof($_SESSION['giohang']);$i++){
        $TongTien =$_SESSION['giohang'][$i][2]*$_SESSION['giohang'][$i][3];
        $tt=$tt+$TongTien;
?>
<?php
        echo'
        <div class="thanhToan-donHang-thongTin"> 
            <div class="thanhToan-donHang-thongTin-1"> 
                <img src="admin/images/'.$_SESSION['giohang'][$i][0].'" alt="" width="80px" height="80px">
                <p class="inline-p"> '.$_SESSION['giohang'][$i][1].' </p>
                <p  class="inline-p">(Màu Sắc : '.$_SESSION['giohang'][$i][5].' )</p>
            </div>
            <div class="thanhToan-donHang-thongTin-2"> 
                 <p class="inline-p" id="thanhToan-donHang-thongTin-2-dongia"> '.$_SESSION['giohang'][$i][2].' đ</p>
                 <p class="inline-p"> '.$_SESSION['giohang'][$i][3].' </p>
                 <p class="inline-p" id="thanhToan-donHang-thongTin-2-tong"> '.$_SESSION['giohang'][$i][2]*$_SESSION['giohang'][$i][3].' </p>
                 <a href="delcart.php? delMasp='.($i+1).'">Xóa</a>
            </div> 
        </div> 
        ';
    }


    ?>
    <div id="thanhToan-donHang-luuY">
        <p>Lời nhắn :</p>
        <input type="text" placeholder="Lưu ý cho người bán ...." id="thanhToan-donHang-luuY_input">
    </div>
    <?php
}


?>
</div>
<div class="thanhToan-CtThanhToan">
    <div class="thanhToan-CtThanhToan_phuongThuc">
        <div class="thanhToan-CtThanhToan_phuongThuc_p">
            <h4>Phương Thức Thanh Toán</h4>
        </div>
        <div class="thanhToan-CtThanhToan_phuongThuc-option">
            <button id="COD">COD</button>
            <button id="CK">Chuyển khoản ngân hàng</button>
        </div>
        
        
    </div>
    <div id="thanhToan-CtThanhToan_phuongThuc-option_nd">
        <h3 id="thanhToan-CtThanhToan_phuongThuc-option_nd_h3">COD</h3>
        <p id="thanhToan-CtThanhToan_phuongThuc-option_nd_p">Nhận hàng mới thanh toán</p> 
    </div>
    <div class="thanhToan-CtThanhToan_phuongThuc-option_nd-TT">
        <div class="thanhToan-CtThanhToan_phuongThuc-option_nd-TT-text">
            <div class ="thanhToan-CtThanhToan_phuongThuc-option_nd-TT-text-title">
                <p>Tổng cộng :      <?php echo $tt?></p>
                <p>Phí vận chuyển : Miễn phí</p>
                <p>Tổng thanh toán  : <h2 class="thanhToan-CtThanhToan_phuongThuc-option_nd-TT-text-h2" ><?php echo $tt?> đ</h2> </p>
          

            </div>
        </div>
    </div>
    <div class="thanhToan-CtThanhToan_button">
        <div class="thanhToan-CtThanhToan_button-1">
            <button onclick="window.location.href = 'trangchu.php?vtr=slideClientController';">Tiếp Tục Mua Hàng</button>
        </div>
        <div class="thanhToan-CtThanhToan_button-2">
            <button onclick="window.location.href = 'trangchu.php?vtr=slideClientController';">Trở Lại</button>
            <button id="thanhToan-CtThanhToan_button_dh" onclick="muaHang()">Đặt Hàng</button>
        </div>
    </div>

</div>
<Script>
    function muaHang() {
        // Thu thập thông tin từ form
        
        var inputSdt = document.getElementById("thanhToan-nhapTT-sdt");
        var inputTen = document.getElementById("thanhToan-nhapTT-ten");

        var ten = document.getElementById("thanhToan-nhapTT-ten").value;
        var sdt = document.getElementById("thanhToan-nhapTT-sdt").value;
        var tinh = document.getElementById("thanhToan-nhapTT-tinh").value;
        var quan = document.getElementById("thanhToan-nhapTT-quan").value;
        var xa = document.getElementById("thanhToan-nhapTT-xa").value;
        var diaChi = tinh + "-" + quan + "-" + xa + "-" + document.getElementById("thanhToan-nhapTT-dc").value;
        var regex = /^0\d{9}$/;
        var makh = "<?php echo isset($_SESSION['makh']) ? $_SESSION['makh'] : ''; ?>";
        if (makh === '')
        {
            alert("Vui lòng đăng nhập trước khi thanh toán.");
            window.location.href = "http://localhost/DoVoDung/pages/dangnhap.php";
        }
        else if (ten.trim() === "" || sdt.trim() === "" || tinh.trim() === "" || quan.trim() === "" || xa.trim() === "" || diaChi.trim() === "") {
            alert("Vui lòng điền đầy đủ thông tin.");
            inputTen.focus();
            return; 
        }else if (!regex.test(sdt)) {
            alert("Số điện thoại không đúng định dạng.");
            inputSdt.focus();
            return; 
        }else{
                 // Tạo một form ẩn để gửi dữ liệu
                var form = document.createElement("form");
                form.method = "POST";
                form.action = "xuLyDonHang.php"; // Xử lý dữ liệu tại cùng một file PHP

                // Thêm các trường input chứa dữ liệu vào form
                var inputTen = document.createElement("input");
                inputTen.type = "hidden";
                inputTen.name = "ten";
                inputTen.value = ten;
                form.appendChild(inputTen);

                var inputSdt = document.createElement("input");
                inputSdt.type = "hidden";
                inputSdt.name = "sdt";
                inputSdt.value = sdt;
                form.appendChild(inputSdt);

                var inputDiaChi = document.createElement("input");
                inputDiaChi.type = "hidden"; // Nên là inputDiaChi, không phải inputDiaChi
                inputDiaChi.name = "diaChi"; // Nên là inputDiaChi, không phải inputDiaChi
                inputDiaChi.value = diaChi;
                form.appendChild(inputDiaChi);


        
                // Thêm form vào body để gửi request
                document.body.appendChild(form);

                // Gửi request bằng cách submit form
                form.submit();
        }      
}
var COD = document.getElementById('COD');
var Ck = document.getElementById('CK');
var nd_h3 = document.getElementById('thanhToan-CtThanhToan_phuongThuc-option_nd_h3')
var nd_p = document.getElementById('thanhToan-CtThanhToan_phuongThuc-option_nd_p')


COD.classList.add('boder_button');
Ck.classList.add('boder_button-none');
COD.addEventListener('click', function() {
    nd_h3.textContent = "COD"
    nd_p.textContent = "Nhận hàng mới thanh toán"
    COD.classList.add('boder_button');
    CK.classList.remove('boder_button');
    CK.classList.add('boder_button-none');
});


CK.addEventListener('click', function() {
    nd_h3.textContent = "Chuyển khoản ngân hàng"
    nd_p.textContent = "Nội dung chuyển khoản : DOVODUNG"
    CK.classList.add('boder_button');
    COD.classList.remove('boder_button');
    COD.classList.add('boder_button-none');
    

});


</Script>
<script src="./js/huu2.js"></script>