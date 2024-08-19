<div>
<?php
$conn=mysqli_connect("localhost","root","","dvd_household");
$makh= $_POST['txtMakh'];
$password= $_POST['txtPassword'];
$hashedPassword = md5($password);

        
        $strTaiKhoan = "SELECT * FROM taikhoan WHERE username = '$makh' AND password = '$hashedPassword'";
        mysqli_query($conn,"SET NAMES 'utf8'");
        $result= mysqli_query($conn,$strTaiKhoan);
        if ($result && mysqli_num_rows($result) > 0) 
        {
            // Lấy dòng dữ liệu đầu tiên từ kết quả
            $row = mysqli_fetch_assoc($result);
            if($row['ma_quyen']==2)
            {
                session_start();
               
                $_SESSION["nguoidung"] = $makh;
    
                    echo '<script>alert("Đăng nhập thành công!");
                    
                    </script>';
                    echo '<script>setTimeout(function() { window.location.href = "http://localhost/DoVoDung/trangchu.php"; }, 10);</script>';
                    exit;
            }
            if($row['ma_quyen']!=2)
            {
                session_start();
                $_SESSION["nguoidung"] = $makh;
    
                    echo '<script>alert("Đăng nhập thành công!");
                    
                    </script>';
                    
                    echo '<script>setTimeout(function() { window.location.href = "http://localhost/DoVoDung/admin/"; }, 20);</script>';
                    
                    exit;
            }

        }
            else 
           {
               echo "<script>alert('Sai mật khẩu!');</script>";
           }
        // {
        //     echo "<script>alert('Tài khoản không tồn tại trong cơ sở dữ liệu!');</script>";
        // }
        mysqli_close($conn)
?>
</div>

