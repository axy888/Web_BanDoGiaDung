<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đồ gia dụng</title>
    <link rel="stylesheet" href="../css/dangnhap.css">
    <script src="../js/dangnhap2.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="icon" href="../admin/images/DOVODUNG.png" type="image/png" sizes="32x32">
</head>
<body>
<div id="dangnhap">
    <form action="dangnhap.php?chon=xulydangnhap&action=dangnhap" method="POST" id="formDangnhap">
        <label for="makh">Tên đăng nhập: </label>
        <input type="text" id="makh" name="txtMakh">
        <label for="password">Mật khẩu: </label>
        <input type="password" id="password" name="txtPassword">
        
        <a href="dangky.php">Đăng ký ngay</a>
        <input type="submit" value="Đăng nhập" id="btnDangnhap">
       <a href="http://localhost/DoVoDung/trangchu.php"> <input type="button" value="Hủy" id="btnHuy"></a>
    </form>
</div>

<script>
    
$(document).ready(function () {
$("#formDangnhap").submit(function(event) {
    event.preventDefault();
    $.ajax({
    url: "ajax.php?chon=xulydangnhap&action=dangnhap", // Thay thế bằng URL đăng ký thực tế
    method: "POST",
    data: $(this).serialize(),
    // dataType: 'json',
    success: function(response) {
        console.log(response)
        var jsonResponse = JSON.parse(response);
        //chuyển đổi chuỗi JSON nhận được từ máy chủ thành một đối tượng JavaScript
        if (jsonResponse.status == 1) {
            alert("Đăng nhập thành công!");
            window.location.href = "http://localhost/DoVoDung/trangchu.php";
            // Chuyển hướng đến trang chủ hoặc trang hồ sơ người dùng
        } 
        else if (jsonResponse.status == 2){
            alert("Đăng nhập thành công!");
            window.location.href = "http://localhost/DoVoDung/admin/";
        }
        else if((jsonResponse.status == 3))
        {
            alert("Tài khoản hiện đang bị khóa!");
        }
        else alert(jsonResponse.message);
    },
    error: function(xhr, status, error){
        alert("loi: "+error)
    }
    });
});
})
</script>
</body>
</html>