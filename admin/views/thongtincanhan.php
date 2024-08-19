<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="../css/headerGioiThieu.css"> 
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>

<div class="divThongTin">

    <form action="trangchu.php?vtr=thongtinController&action=sua" method="POST" id="formThongTinNguoiDung">
        <h2>CHỈNH SỬA THÔNG TIN CÁ NHÂN</h2>
        <div>
            <label for="name">Tên tài khoản</label>
            <input type="text" id="makh" name="txtMakh" readonly value="<?php echo $_SESSION["nguoidung"]; ?>">
            
            <label for="username">Tên đăng nhập:</label>
            <input type="text" id="username" name="txtUsername" value="<?php echo $_SESSION["ten"]; ?>">
        </div>
        <div>
            <label for="phonenumber">Số điện thoại:</label>
            <input type="tel" id="sdt" name="txtSdt" value="<?php echo $_SESSION["sdt"]; ?>">
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="txtEmail" value="<?php echo $_SESSION["email"]; ?>">
        </div>
        <div>
            <label for="address">Địa chỉ:</label>
            <input type="text" id="diachi" name="txtDiachi" value="<?php echo $_SESSION["diachi"]; ?>">
        </div>
        <input type="hidden" name="ketquasuathongtin" id="kqSuaTT" value="">
        <input style="align-item:right;background-color:rgb(51, 62, 72);padding:0% 2% 0% 2%;color:white;" type="submit" onclick="suathongtin()" value="Lưu" id="btnSaveThongTin2">
    </form>
    <br>
    <form action="trangchu.php?vtr=thongtinController&action=suapass" method="POST" id="formThongTinPassWord">
        <h2>CHỈNH SỬA PASSWORD</h2>
        <div>
            <label for="password">Password cũ:</label>
            <input type="password" id="password" name="txtPassword">
            <br>
            <label for="newpassword">Password mới:</label>
            <input type="password" id="newpassword" name="txtNewPassword">
            <br>
            <label for="confirmpassword">Xác nhận mật khẩu:</label>
            <input type="password" id="confirmpassword" name="txtConfirmPassword">
            <br>
            <input type="hidden" name="ketqua" id="kqInput" value="">
            <input type="hidden" name="passhientai" id="passhientai" value="<?php echo $_SESSION["pass"]; ?>">
        <input style="align-item:right;background-color:rgb(51, 62, 72);padding:0% 2% 0% 2%;color:white;" type="submit" onclick="dangky()" value="Lưu" id="btnSaveThongTin">
        </div>
    </form>
    <div class="order-container">
        <h2>THÔNG TIN ĐƠN HÀNG</h2>

        <?php foreach ($order_list as $order) : ?>
            <?php if ($order['trang_thai'] != 0) : ?>
            <form action="trangchu.php?vtr=thongtinController&action=cancelthongtin" method="POST" id="formThongTinDonHang">
                <label class="mdh" for="password">Mã đơn hàng:</label>
                <input  class="formThongTinDonHang-input"  type="text" name="txtMadon" id="ma_don" value="<?php echo $order['ma_don']; ?>" readonly><br><br><br>
                <?php foreach ($ct_hang[$order['ma_don']] as $ct) : ?>
                    <label for="password">Mã sản phẩm:</label>
                <img src="admin/images/<?php echo $ct['hinh']; ?>" alt="">
                <input class="formThongTinDonHang-input"type="text" name="txtMasp" id="ma_sp" value="<?php echo $ct['ma_sp']; ?>" readonly><br>
                <label for="">Tên sản phẩm:</label>
                <input class="formThongTinDonHang-input"type="text" name="txtTensp" id="ten_sp" value="<?php echo $ct['ten_sp']; ?>" readonly><br>
                <label for="">Đơn giá:</label>
                <input class="formThongTinDonHang-input"type="text" name="txtDongia" id="don_gia" value="<?php echo $ct['don_gia']; ?>" readonly><br>
                <label for="">Số lượng:</label>
                <input class="formThongTinDonHang-input"type="text" name="txtSoluong" id="so_luong" value="<?php echo $ct['so_luong']; ?>" readonly><br><br><br>
                    <?php endforeach; ?>
                
                <label for="password">Ngày đặt:</label>
                <input class="formThongTinDonHang-input formThongTinDonHang-nd"class="formThongTinDonHang-nd" type="text" name="txtNgaydat" id="ngay_dat" value="<?php echo $order['ngay_dat']; ?>"readonly><br>
                <label for="password">Tổng tiền:</label>
                <input class="formThongTinDonHang-input formThongTinDonHang-tt"class="formThongTinDonHang-tt" type="text" name="txtTongtien" id="tong_tien" value="<?php echo $order['tong_tien']; ?> đ"readonly> <br>
                <label for="password">Địa chỉ:</label>
                <input class="formThongTinDonHang-dc" type="text" name="txtDiachi" id="diaChi" value="<?php echo $order['diaChi']; ?>"readonly>   <br>
                <label for="password">Họ và tên:</label>
                <input class="formThongTinDonHang-input"type="text" name="txtHovaTen" id="hovaTen" value="<?php echo $order['hovaTen']; ?>"readonly>   <br>
                <label for="password">Số điện thoại:</label>
                <input id="formThongTinDonHang-input" type="text" name="txtSdt" id="sdt" value="<?php echo $order['sdt']; ?>"readonly> <br>
                <label for="password">Trạng thái:</label>
                <?php 
                    $trang_thai_text = '';
                    switch ($order['trang_thai']) {
                        case 1:
                            $trang_thai_text = 'Chưa xử lý';
                            break;
                        case 2:
                            $trang_thai_text = 'Đang giao hàng';
                            break;
                        case 3:
                            $trang_thai_text = 'Đã giao hàng';
                            break;
                        default:
                            $trang_thai_text = 'Không xác định';
                            break;
                    }
                ?>
               <input  class="formThongTinDonHang-tt formThongTinDonHang-input" type="text" name="txtTrangthai" id="trang_thai" value="<?php echo $trang_thai_text; ?>" readonly><br><br>

                <?php if ($order['trang_thai'] == 1) : ?>
            <input type="submit" value="Hủy" id="btnCancel">
        <?php endif; ?>
            </form>
            <br><br>
            <?php endif; ?>
                <?php endforeach; ?>
    </div>
</div>
    
</body>
<script>
     function dangky()
    {
       
        var username = document.getElementById("username").value;
        var tenRegrex = /^[a-zA-Z0-9]{6,}$/
        //mật khẩu ít nhất 6 ký tự, có cả chữ và số
        if (username == "") 
        {
        alert("Tên đăng nhập không được rỗng");
        username.focus()
        document.getElementById("kqInput").value = "0"; // Cập nhật giá trị của kqInput
            return false;
        }
        if(!tenRegrex.test(username))
        {
            alert("Tên đăng nhập không đúng định dạng");
            username.focus()
            document.getElementById("kqInput").value = "0"; // Cập nhật giá trị của kqInput
            return false;
        }
        var password=document.getElementById("password").value;
        var newpassword=document.getElementById("newpassword").value;
        if (password.trim().length <6) 
        {
            alert("Mật khẩu phải có ít nhất 6 ký tự");
            password.focus()
            document.getElementById("kqInput").value = "0"; // Cập nhật giá trị của kqInput
            return false;
        }
        var passhientai=document.getElementById("passhientai").value;
        console.log(password.trim());
        console.log(passhientai.trim());
        if(password.trim() != passhientai.trim())
        {
            alert("Mật khẩu không đúng");
            password.focus()
            document.getElementById("kqInput").value = "0"; // Cập nhật giá trị của kqInput
            return false;
        }
        if (newpassword.trim().length <6) 
        {
            alert("Mật khẩu phải có ít nhất 6 ký tự");
            newpassword.focus()
            document.getElementById("kqInput").value = "0"; // Cập nhật giá trị của kqInput
            return false;
        }
        var hasLetter = /[a-zA-Z]/.test(password);
        var hasNumber = /\d/.test(password);
        
        if (!hasLetter || !hasNumber) {
            alert("Mật khẩu phải chứa cả ký tự chữ và số");
            password.focus();
            document.getElementById("kqInput").value = "0"; // Cập nhật giá trị của kqInput
            return false;
        }

        var hasLetter = /[a-zA-Z]/.test(newpassword);
        var hasNumber = /\d/.test(newpassword);
        
        if (!hasLetter || !hasNumber) {
            alert("Mật khẩu phải chứa cả ký tự chữ và số");
            password.focus();
            document.getElementById("kqInput").value = "0"; // Cập nhật giá trị của kqInput
            return false;
        }

        //confirm password phải trùng với password
        var confirmpassword=document.getElementById("confirmpassword").value
        if (confirmpassword.trim() != newpassword.trim()) 
        {
            alert("Mật khẩu phải trùng với mật khẩu xác nhận");
            confirmpassword.focus()
            document.getElementById("kqInput").value = "0"; // Cập nhật giá trị của kqInput
            return false;
        }
        
        

        else
        {
            document.getElementById("kqInput").value = "1"; // Cập nhật giá trị của kqInput
            // alert("đăng ký thành công");
        
            // clearInputs();
        }

    }

    function suathongtin()
    {
        var username = document.getElementById("username").value;
        var tenRegrex = /^[a-zA-Z0-9]{6,}$/
        //mật khẩu ít nhất 6 ký tự, có cả chữ và số
    

        //confirm password phải trùng với password
        
        var email = document.getElementById("email").value;
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if(!emailRegex.test(email))
        {
            alert("Email không đúng định dạng");
            email.focus()
            document.getElementById("kqSuaTT").value = "0"; // Cập nhật giá trị của kqInput
            return false;
        }

        //địa chỉ phải có ít nhất 10 ký tự
        var diachi=document.getElementById("diachi").value
        if (diachi.trim().length <10) 
        {
            alert("Địa chỉ phải có ít nhất 10 ký tự");
            diachi.focus()
            document.getElementById("kqSuaTT").value = "0"; // Cập nhật giá trị của kqInput
            return false;
        }

        //bắt đầu = số 0 kèm theo đó là 9 chữ số khác
        var sdt = document.getElementById("sdt").value;
        var sdtRegres= /^0\d{9}$/
        if (sdt == "") {
        alert("Số điện thoại  không được rỗng");
        sdt.focus()
        document.getElementById("kqSuaTT").value = "0"; // Cập nhật giá trị của kqInput
            return false;
        }
        if(!sdtRegres.test(sdt))
        {
            alert("Số diện thoại không đúng định dạng");
            sdt.focus()
            document.getElementById("kqSuaTT").value = "0"; // Cập nhật giá trị của kqInput
            return false;
        }


        else
        {
            document.getElementById("kqSuaTT").value = "1"; // Cập nhật giá trị của kqInput
            // alert("đăng ký thành công");
            // clearInputs();
        }

    }

    $(document).ready(function () {
$("#formThongTinNguoiDung").submit(function(event) {
      event.preventDefault();
      $.ajax({
        url: "trangchu.php?vtr=thongtinController&action=sua", // Thay thế bằng URL đăng ký thực tế
        method: "POST",
        data: $(this).serialize(),
        // dataType: 'json',
        success: function(response) {
            var error = response.match(/Sửa thông tin thất bại/);
            var success = response.match(/Sửa thông tin thành công/);
            //chuyển đổi chuỗi JSON nhận được từ máy chủ thành một đối tượng JavaScript
            if (success) {
                alert("Sửa thành công!")
            // window.location.href = "http://localhost/DoVoDung/pages/dangnhap.php";
            // Chuyển hướng đến trang chủ hoặc trang hồ sơ người dùng
          } if(error)alert("Sửa thất bại!")
          
        },
        error: function(xhr, status, error){
            alert("loi: ");
        }
      });
    });
})

$(document).ready(function () {
$("#formThongTinPassWord").submit(function(event) {
      event.preventDefault();
      $.ajax({
        url: "trangchu.php?vtr=thongtinController&action=suapass", // Thay thế bằng URL đăng ký thực tế
        method: "POST",
        data: $(this).serialize(),
        // dataType: 'json',
        success: function(response) {
            var error = response.match(/Sửa mật khẩu thất bại!/);
            var success = response.match(/Sửa mật khẩu thành công!/);
            //chuyển đổi chuỗi JSON nhận được từ máy chủ thành một đối tượng JavaScript
            if (success) {
                alert("Sửa thành công!")
            // window.location.href = "http://localhost/DoVoDung/pages/dangnhap.php";
            // Chuyển hướng đến trang chủ hoặc trang hồ sơ người dùng
          } if(error)alert("Sửa thất bại!")
          
        },
        error: function(xhr, status, error){
            alert("loi: ");
        }
      });
    });
})
</script>
<script src="./js/huu2.js"></script>
</html>
