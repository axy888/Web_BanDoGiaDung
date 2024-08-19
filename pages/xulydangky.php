<div>
<?php
$makh= $_POST['txtMakh'];
$username= $_POST['txtUsername'];
$password= $_POST['txtPassword'];
$confirmpassword= $_POST['txtConfirmpassword'];
$email= $_POST['txtEmail'];
$diachi= $_POST['txtDiachi'];
$sdt= $_POST['txtSdt'];
$currentDateTime = date('Y-m-d');
// echo '<div> HIEN THI bang PHP</div>';
// echo '<div> mã khách hàng' .$makh.'</div><br>';
// echo '<div> username' .$username.'</div><br>';
// echo '<div> password' .$password.'</div><br>';
// echo '<div> confirmpassword' .$confirmpassword.'</div><br>';
$kq=$_POST['ketqua'];
echo $kq;
        if($kq==1)
        {
                $conn=mysqli_connect("localhost","root","","dvd_household");
                $check_query = "SELECT * FROM nguoidung WHERE ma_nd = '$makh'";
                $check_result = mysqli_query($conn, $check_query);
                if(mysqli_num_rows($check_result) > 0) {
                        echo "<script>alert('Mã người dùng đã tồn tại.');</script>";
                }
                else{
                        $strNguoidung="INSERT INTO nguoidung(ma_nd,ten,sdt,diachi,email) 
                        VALUE ('$makh','$username','$sdt','$diachi','$email')";
                        $strTaiKhoan="INSERT INTO taikhoan(username,password,ngay_tao) 
                        VALUE ('$makh','$password','$currentDateTime')";
                        mysqli_query($conn,"SET NAMES 'utf8'");
                        $result= mysqli_query($conn,$strNguoidung);
                        $result2= mysqli_query($conn,$strTaiKhoan);
                        if ($result && $result2) 
                        {
                                echo "<script>alert('Đăng ký thành công!');</script>";
                               
                                echo '<script>setTimeout(function() { window.location.href = "http://localhost/DoVoDung/datTest.php"; }, 20);</script>';
                                exit;
                        } 
                        else 
                        {
                                        echo "<script>alert('Đăng ký không thành công!');</script>";       
                        }
                }
               
               
                mysqli_close($conn);
        }
        // while ($row =mysqli_fetch_array($result))
        // {
        //     for($i=0;$i<mysqli_num_fields($result);$i++)
        //     {
        //         echo $row[$i].""."</br>";
        //     }
        // }

?>
</div>

