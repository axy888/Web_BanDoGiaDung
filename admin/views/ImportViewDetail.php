<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/text.css">
    <link rel="stylesheet" href="css/adminindex.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="../admin/js/searchAjax.js"></script>
    <title>Chi tiết đơn hàng</title>
    <style>
        

        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>

    <h2>Chi tiết phiếu nhập hàng</h2>

    <form action="index.php" method="GET" class="searchImportDetail">
            <input type="hidden" name="ctrl" value="importController">
            <input type="hidden" name="action" value="searchImportDetail">
            Tìm kiếm theo: <select name="field" class="timkiem" id="timkiem">
                <option value="ma_phieu">Mã phiếu nhập</option>
                <option value="ma_ncc">Mã sản phẩm</option>
            </select>
            <input type="text" id="search" name="search" placeholder="Nhập phiếu cần tìm">
            <label for="soluongfrom">Số lượng từ: </label>
        <input type="number"  class="soluongfrom" name="soluongfrom" id="">
        <label for="soluongto">đến: </label>
        <input type="number"  class="soluongto" name="soluongto" id="">
        <br><br>
        <label for="giafrom">Giá từ: </label>
        <input type="text"  class="giafrom" name="giafrom" id="">
        <label for="giato">đến: </label>
        <input type="text"  class="giato" name="giato" id="">
            <button type="submit">Tìm kiếm</button>
    </form>
        <br>

    <?php if ($tt == 0): ?>
    <a class="category_add" href="index.php?ctrl=importController&action=showImportDetail&id=<?php echo $id; ?>&tt=<?php echo $tt; ?>&action2=showAddImportViewDetail">
    <img src="../imgs/plus.png" alt="">Thêm chi tiết phiếu nhập</a>
    <?php endif; ?>
    
    <?php
        if(isset($_GET['action2']))
        {
            if($_GET['action2']=='showAddImportViewDetail')
         {
            echo '
            <div  class="addForm" id = "addImpView">
            <form id="form_addImpView" class="form_add" action="index.php?ctrl=importController&action=addImportDetail" method="post">';
            echo'
            <a type="button" id="btna" class="closeForm" href="index.php?ctrl=importController&action=showImportDetail&id='.$id.'&tt='.$tt.'">X</a>';

            echo'
            <h2>Chi tiết phiếu</h2>
            <!-- Mục nhập chi tiết cho từng mặt hàng -->
            <div id="chi-tiet">
                <div class="hang">
                    <label for="ma_phieu_1" name="">Phiếu nhập:</label>';
                    echo '<input type="text" name="ma_phieu_1" readonly value="' . $id . '">';
                    echo '<input type="hidden" name="txtTrangthai" readonly value="' . $tt . '">';
                    echo '<br>
                    <br>
                    <label for="ma_sp_1">Chọn sản phẩm:</label>
                    <select name="ma_sp_1" required>';
                    foreach ($products as $product) {
                        echo '<option value="' . $product['ma_sp'] . '">' . $product['ten_sp'] . '</option>';
                    }
                    echo '</select><br>
                    <br>
                    <label for="so_luong_1">Số lượng:</label>
                    <input type="number" name="so_luong_1" required><br>
                    <br>
                    <label for="gia_nhap_1">Giá nhập:</label>
                    <input type="number" step="0.01" name="gia_nhap_1" required><br><br>
                </div>
            </div>
            <button class="btn_in_form" type="submit">Lưu chi tiết phiếu nhập kho</button>
        </form>
        </div>';
         }
        }
    ?>
    </br>
    </br>
    <table>
        <thead>
            <tr>
                <th style="text-align:center;">Mã phiếu nhập </th>
                <th style="text-align:center;">Mã sản phẩm</th>
                <th style="text-align:center;">Số lượng</th>
                <th style="text-align:center;">Đơn giá</th>
                <?php if ($tt == 0): ?>
                <th style="text-align:center;">Thao tác</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($importdetaillist as $importdetail) : ?>
                <tr>
                    <td><?php echo $importdetail['ma_phieu']; ?></td>
                    <td><?php echo $importdetail['ma_sp']; ?></td>
                    <td><?php echo $importdetail['so_luong']; ?></td>
                    <td><?php echo $importdetail['don_gia']; ?></td>
                    <?php if ($tt == 0): ?>
                    <td>

                    <!--Tìm tên sp ứng với mã sp-->
                    <?php foreach ($products as $product): ?>
                        <?php if ($product['ma_sp'] === $importdetail['ma_sp']): ?>
                            <?php $tentam = $product['ten_sp']; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>


                        <a href="index.php?ctrl=importController&action=deleteImportDetail&id=<?php echo $id; ?>&masp=<?php echo $importdetail['ma_sp']; ?>&sl=<?php echo $importdetail['so_luong']; ?>&dg=<?php echo $importdetail['don_gia']; ?>">
                        <img class="del_icon" src="../imgs/delete.png" alt="">
                    </a>
                        <a href="#" onclick="showUpdateForm('<?php echo $importdetail['ma_phieu']; ?>','<?php echo $importdetail['ma_sp'];?>','<?php echo $importdetail['so_luong'];?>','<?php echo $importdetail['don_gia'];?>','<?php echo $tentam;?>')">
                        <img class="update_icon" src="../imgs/pen.png" alt="">
                    </a>
                    </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php
     if ($tt == 0):
            echo '<form id="" class="" action="index.php?ctrl=importController&action=changelock" method="post">';
            echo '
            <input type="hidden" name="changeLock" value="1">
            <input type="hidden" name="ma_phieu" readonly value="' . $id . '">
            <input type ="submit" value="Thay đổi trạng thái">
            </form>';
        endif; 
        ?>

     <!-- Sửa phiếu nhập -->
     <div class="updateForm" id="updateImport">
        <button type="button" class="positioncUpdateImportDetail" id="closeUpdateForm" onclick="closeUpdateform()">X</button>

        <form class="form_update" id="form_updateImportDetail" action="index.php?ctrl=importController&action=updateImport&id=<?php echo $id; ?>&tt=<?php echo $tt; ?>" method="post">

        <h2>Sửa phiếu nhập</h2>
       
        <label for="username">Mã phiếu:</label>
        <input type="text" name="txtMaphieuUpdate" id="MaphieuUpdate"readonly value="<?php echo $id; ?>"><br><br>
        <input type="hidden" name="ma_spUpdate" id="MaspUpdate" value="">
        <label for="username">Tên sản phẩm:</label>
        <input type="text" name="txtTensanpham" id="sanphamUpdate" readonly value=""><br>
        <br>
        <label for="username">Số lượng:</label>
        <input type="text" name="txtSlUpdate" id="slUpdate" value=""><br><br>
        <input type="hidden" name="txtSlCu" id="slCu" value="">
        <label for="username">Đơn giá:</label>
        <input type="text" name="txtDongiaUpdate" id="dongiaUpdate" value=""><br><br>
        <input type="hidden" name="txtDongiaCu" id="dongiaCu" value="">
        
        <input type="hidden" name="ketqua" id="kqInput" value="">
        <button type="submit">Sửa phiếu nhập</button>
    </form>
    </div> 

    <!-- <script>
        function confirmDelete(id) {
            // Sử dụng hàm confirm() để hiển thị hộp thoại xác nhận
            var confirmDelete = confirm("Bạn có chắc chắn muốn xóa kho này?");
            // Nếu người dùng nhấn OK, chuyển hướng đến trang xóa và truyền id
            if (confirmDelete) {
                // window.location.href = "index.php?ctrl=warehouseController&action=deleteWarehouseDetail&id=" + id;
                echo "hi";
            } else {
                // Nếu người dùng nhấn Cancel hoặc không xác nhận xóa, không làm gì cả
                return false;
            }
        }
    </script> -->

    <script>
        function showUpdateForm(ma_phieu,ma_sp,so_luong,don_gia,tentam) 
        {
            var formThem = document.getElementById("updateImport");
            var inputTensp = document.getElementById("sanphamUpdate");
            var inputSL = document.getElementById("slUpdate");
            var inputDG = document.getElementById("dongiaUpdate");
            var inputMasp = document.getElementById("MaspUpdate");
            var inputSLcu = document.getElementById("slCu");
            var inputDGcu = document.getElementById("dongiaCu");
            formThem.style.display = 'block';
            inputSL.value = so_luong;
            inputDG.value = don_gia;
            inputTensp.value = tentam;
            inputMasp.value = ma_sp;
            inputSLcu.value = so_luong;
            inputDGcu.value = don_gia;
            
        }


function closeUpdateform()
{
    const closeFormBtn = document.getElementById('closeUpdateForm');
    const myForm = document.getElementById('updateImport');
    console.log(closeFormBtn);
    console.log(myForm);
    myForm.style.display = 'none'; // Ẩn form
}


    </script>
</body>

</html>