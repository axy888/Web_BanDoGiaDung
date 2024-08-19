<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="../css/headerGioiThieu.css"> 
</head>
<body>
<?php
session_start();
?>
<div class="divThongTin">

    <form action="thongtincanhan.php?chon=suathongtin&action=sua" method="POST" id="formThongTin">
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
            <input type="text" id="address" name="txtDiachi" value="<?php echo $_SESSION["diachi"]; ?>">
        </div>
        
        <input type="submit" value="Lưu" id="btnSaveThongTin">
    </form>
</div>
    
</body>
</html>
