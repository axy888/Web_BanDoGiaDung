<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/text.css">
    <link rel="stylesheet" href="css/adminindex.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="../admin/js/searchAjax.js"></script>
    <title>Tài khoản</title>
</head>
<script>
    
function showAddForm() 
{
    var formThem = document.getElementById("addAccount");

    formThem.style.display = 'block';
    // Hoặc thêm các hành động khác ở đây
}

function showUpdateForm(userduocchon,trang_thai,ma_quyen) 
{
    var formThem = document.getElementById("updateAccount");
    var inputUsername = document.getElementById("usernameUpdate");
    var radioHoatDong = document.getElementById("radioHoatDong");
    var radioDaKhoa = document.getElementById("radioDaKhoa");
    var selectQuyen = document.getElementById("quyensua");
    formThem.style.display = 'block';
    inputUsername.value = userduocchon;
    if (trang_thai === "on") {
        radioHoatDong.checked = true;
        radioDaKhoa.checked = false;
    } else {
        radioHoatDong.checked = false;
        radioDaKhoa.checked = true;
    }


    selectQuyen.value = ma_quyen;
    for (var i = 0; i < selectQuyen.options.length; i++) {
        if (selectQuyen.options[i].value === ma_quyen) {
            selectQuyen.options[i].selected = true;
            break;
        }
    }
    
}

function closeform()
{
    const closeFormBtn = document.getElementById('closeForm');
    const myForm = document.getElementById('addAccount');
    console.log(closeFormBtn);
    console.log(myForm);
    myForm.style.display = 'none'; // Ẩn form
}

function closeUpdateform()
{
    const closeFormBtn = document.getElementById('closeUpdateForm');
    const myForm = document.getElementById('updateAccount');
    console.log(closeFormBtn);
    console.log(myForm);
    myForm.style.display = 'none'; // Ẩn form
}

function checkAddform()
{
    var username=document.getElementById("username").value;
    var ma_quyen=document.getElementById("quyen").value;
    var makhRegrex= /^KH\d{5}$/;
    if(ma_quyen==2)
    {
        if(!makhRegrex.test(username))
        {
            alert("Mã khách hàng không đúng định dạng");
            makh.focus()
            document.getElementById("kqInput").value = "0"; // Cập nhật giá trị của kqInput
            return false;
        }
    }
    
    else
    {
        var tenRegrex = /^[a-zA-Z0-9]{6,}$/
        //ít nhất 6 ký tự
        if (username == "") 
        {
            alert("Username không được rỗng");
            username.focus()
            document.getElementById("kqInput").value = "0"; // Cập nhật giá trị của kqInput
                return false;
        }
        if(!tenRegrex.test(username))
        {
            alert("Username không đúng định dạng");
            username.focus()
            document.getElementById("kqInput").value = "0"; // Cập nhật giá trị của kqInput
            return false;
        }
    }

    //mật khẩu ít nhất 6 ký tự, có cả chữ và số
    var password=document.getElementById("password").value
        if (password.trim().length <6) 
        {
            alert("Mật khẩu phải có ít nhất 6 ký tự");
            password.focus()
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
    
         // bao gồm một phần tên người dùng, ký tự @, tên miền và domain
    

    //địa chỉ phải có ít nhất 10 ký tự
    var diachi=document.getElementById("diachi").value
    if (diachi.trim().length <10) 
    {
        alert("Địa chỉ phải có ít nhất 10 ký tự");
        diachi.focus()
        document.getElementById("kqInput").value = "0"; // Cập nhật giá trị của kqInput
        return false;
    }

    //bắt đầu = số 0 kèm theo đó là 9 chữ số khác
    var sdt = document.getElementById("sdt").value;
    var sdtRegres= /^0\d{9}$/
    if (sdt == "") {
      alert("Số điện thoại  không được rỗng");
      sdt.focus()
      document.getElementById("kqInput").value = "0"; // Cập nhật giá trị của kqInput
        return false;
    }
    if(!sdtRegres.test(sdt))
    {
        alert("Số diện thoại không đúng định dạng");
        sdt.focus()
        document.getElementById("kqInput").value = "0"; // Cập nhật giá trị của kqInput
        return false;
    }

    else
    {
        document.getElementById("kqInput").value = "1"; // Cập nhật giá trị của kqInput
    }
}

function clearInputs() 
{
    var inputs = document.querySelectorAll('input');
    inputs.forEach(function(input) 
    {
        input.value = '';
    });
}

$(document).ready(function () {
$("#form_addAccount").submit(function(event) {
      event.preventDefault();
      $.ajax({
        url: "index.php?ctrl=accountController&action=addAccount", // Thay thế bằng URL đăng ký thực tế
        method: "POST",
        data: $(this).serialize(),
        // dataType: 'json',
        success: function(response) {
            var error = response.match(/thêm tài khoản thất bại/);
            var success = response.match(/thêm tài khoản thành công/);
            var trungma=response.match(/username đã tồn tại/);
            //chuyển đổi chuỗi JSON nhận được từ máy chủ thành một đối tượng JavaScript
            if (success) {
                alert("Thêm tài khoản thành công!!!")
                // $(this).hide();
                closeform();
                clearInputs();
          } 
          if(error) 
            alert("Thêm tài khoản thất bại!!!")
        if(trungma)alert("Mã người dùng bị trùng")
        },
        error: function(xhr, status, error){
            alert("loi: ");
        }
      });
    });
})
</script>
<body>
<?php
    include_once ("models/checkChucNangModel.php");
    // Assigning the result to a different variable
    function checkChucNang($ma_cn)
    {
        $model = new CheckChucNangModel();
        $user = $model->getQuyenOfUsername($_SESSION['makh']);
        $quyen = $user['ma_quyen'];
        $cn = $model->getChucNang($quyen, $ma_cn);
        // Tìm tất cả các phần tử có class 'suaSP' và 'xoaSP'
        // và đặt style display thành 'none' nếu phù hợp
        if ($cn['them'] == 0) {
            echo "<script>document.getElementById('themTL').style.display = 'none';</script>";
        }
        if ($cn['sua'] == 0) {
            echo "<script>var suaSPElements = document.getElementsByClassName('suatk'); for(var i = 0; i < suaSPElements.length; i++) { suaSPElements[i].style.display = 'none'; }</script>";
        }
    }
    ?>
<h2>DANH SÁCH TÀI KHOẢN</h2>
    <form action="index.php" method="GET" class="searchAccount">
            <input type="hidden" name="ctrl" value="accountController">
            <input type="hidden" name="action" value="searchAccount">
            Tìm kiếm theo: <select name="field" class="timkiem" id="timkiem">
                <option value="username">Username</option>
                <option value="ma_quyen">Mã quyền</option>
                <option value="trang_thai">Trạng thái</option>
            </select>
            <input type="text" id="search" name="search" placeholder="Nhập tài khoản cần tìm kiếm">
            <label for="startdate">Start: </label>
        <input type="date"  class="startdate" name="startdate" id="">
        <label for="startdate">End: </label>
        <input type="date"  class="enddate" name="enddate" id="">
            <button type="submit">Tìm kiếm</button>


    </form>
        <br>

    <a class="category_add" id ='themTL'  href="#" onclick="showAddForm()">
    <img src="../imgs/plus.png" alt="">Thêm tài khoản</a>

    <!-- Thêm tài khoản -->
    <div class="addForm" id = "addAccount">
        <button type="button" class="positioncAddAccount" id="closeForm" onclick="closeform()">X</button>

        <form class="form_add" id="form_addAccount" action="index.php?ctrl=accountController&action=addAccount" method="post">

            <h2>Thêm tài khoản</h2>
            <label for="username">Username:</label>
            <input type="text" name="txtUsername" id="username"required><br><br>
            <label for="password">Password:</label>
            <input type="password" name="txtPassword" id="password"required><br><br>
            <label for="hoten">Họ tên:</label>
            <input type="text" name="txtHoTen" id="hoten"required><br><br>
            <label for="sdt">Số điện thoại:</label>
            <input type="tel" name="txtSdt" id="sdt"required><br><br>
            <label for="diachi">Địa chỉ:</label>
            <input type="text" name="txtDiaChi" id="diachi"required><br><br>
            <label for="email">Email:</label>
            <input type="email" name="txtEmail" id="email"required><br><br>
            <?php
            echo'
            <label for="ma_quyen">Chọn quyền:</label>
            <select name="ma_quyen" id="quyen"required>';
            foreach ($permissions as $permission) {
                echo '<option value="' . $permission['ma_quyen'] . '">' . $permission['ten_quyen'] . '</option>';
            }
                echo '</select>';
            ?>
            <br>
            <br>
            <input type="hidden" name="ketqua" id="kqInput" value="">
            <button type="submit" onclick="checkAddform()">Thêm tài khoản</button>
    </form>
    </div>

    <!-- Sửa tài khoản -->
     <div class="updateForm" id="updateAccount">
        <button type="button" class="positioncUpdateAccount" id="closeUpdateForm" onclick="closeUpdateform()">X</button>

        <form class="form_update" id="form_updateAccount" action="index.php?ctrl=accountController&action=updateAccount" method="post">

        <h2>Sửa tài khoản</h2>
       
        <label for="username">Username:</label>
        <input type="text" name="txtUsernameUpdate" id="usernameUpdate"readonly value=""><br><br>
        <?php
        echo'
        <label for="ma_quyen">Chọn quyền:</label>
         <select name="ma_quyen" id="quyensua"required>';
         foreach ($permissions as $permission) {
            echo '<option value="' . $permission['ma_quyen'] . '">' . $permission['ten_quyen'] . '</option>';
        }
            echo '</select>';
            // $default_ma_quyen = $permission['ma_quyen'];
        ?>
        <br>
        <br>

            
            Hoạt động<input type="radio" class="trangthai" name="trangthai" id="radioHoatDong" value="on" >&nbsp;
            Đã khóa<input type="radio" name="trangthai" class="trangthai" id="radioDaKhoa" value="off">&nbsp;
            
        
        <input type="hidden" name="ketqua" id="kqInput" value="">
        <button type="submit">Sửa tài khoản</button>
    </form>
    </div> 
    

    <table class="table">
        <thead>
            <tr>
                <th>Username</th>
                <th>Mã quyền</th>
                <th>Password</th>
                <th>Ngày tạo</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($accounts as $account) : ?>
                <tr>
                    <td><?php echo $account['username']; ?></td>
                    <td><?php echo $account['ma_quyen']; ?></td>
                    <td><?php echo $account['password']; ?></td>
                    <td><?php echo $account['ngay_tao']; ?></td>
                    <td><?php echo $account['trang_thai']; ?></td>
                    <td>
                    <?php $userduocchon=$account['username'];?>
                        <a class="suatk" href="#" onclick="showUpdateForm('<?php echo $userduocchon; ?>','<?php echo $account['trang_thai'];?>','<?php echo $account['ma_quyen'];?>')">
                            <img class="update_icon" src="../imgs/pen.png" alt="">
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody> 
    </table>

</body>
<?php checkChucNang(8);?>
</html>
