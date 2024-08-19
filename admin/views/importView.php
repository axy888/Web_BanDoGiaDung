<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="../admin/js/searchAjax.js"></script>
    <title>Phiếu nhập hàng</title>
</head>

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
            echo "<script>document.getElementById('thempn').style.display = 'none';</script>";
        }
    }
    ?>
    <h2>DANH SÁCH PHIẾU NHẬP HÀNG</h2>

    <form action="index.php" method="GET" class="searchImport">
            <input type="hidden" name="ctrl" value="importController">
            <input type="hidden" name="action" value="searchImport">
            Tìm kiếm theo: <select name="field" class="timkiem" id="timkiem">
                <option value="ma_phieu">Mã phiếu nhập</option>
                <option value="ma_ncc">Mã nhà cung cấp</option>
                <option value="tennv">Nhân viên</option>
            </select>
            <input type="text" id="search" name="search" placeholder="Nhập phiếu cần tìm">
            <label for="startdate">Start: </label>
        <input type="date"  class="startdate" name="startdate" id="">
        <label for="startdate">End: </label>
        <input type="date"  class="enddate" name="enddate" id="">
        <br><br>
        <label for="giafrom">Giá từ: </label>
        <input type="text"  class="giafrom" name="giafrom" id="">
        <label for="giato">đến: </label>
        <input type="text"  class="giato" name="giato" id="">
            <button type="submit">Tìm kiếm</button>
    </form>
        <br>

    <a id ="thempn" class="category_add" href="index.php?ctrl=importController&action=showAddImportView">
    <img src="../imgs/plus.png" alt="">Thêm phiếu nhập hàng</a>
    <br>
    <?php
    
    if(isset($_GET['action']))
    {
        if($_GET['action']=='showAddImportView')
     {
         echo '
         <div  class="addForm" id = "addImp">
         <form id="form_addImp" class="form_add" action="index.php?ctrl=importController&action=addImport" method="post">

         <a type="button" id="btnaImp" class="closeForm" href="index.php?ctrl=importController">X</a>
         <h2>Thêm phiếu nhập mới</h2>
         <br>
         <label for="ma_ncc">Chọn nhà cung cấp:</label>
         <select name="ma_ncc" required>';

         foreach ($suppliers as $supplier) {
            echo '<option value="' . $supplier['ma_ncc'] . '">' . $supplier['ten_ncc'] . '</option>';
        }
        echo '</select>
         <br>
         <br>
         <label for="nguoiNhap">Người  nhập:</label>
         <input type="text" name="nguoiNhap" value="'.$_SESSION["ten"].'" readonly style="border: none;">
         <br>
         <br>
         <button class="btn_in_form" type="submit">Lưu phiếu nhập kho</button>
     </form>
     </div>';
     }
    }
    ?>
    <table>
        <thead>
            <tr>
                <th >Mã phiếu nhập</th>
                <th>Mã nhà cung cấp</th>
                <th>Ngày nhập</th>
                <th>Nhân viên nhập hàng</th>
                <th>Tổng tiền</th>
                <th>Thao tác</th>
            </tr>
        </thead>

        <tbody>


            <?php foreach ($importList as $import) : ?>
                <tr>
                    <td><?php echo $import['ma_phieu']; ?></td>
                    <td><?php echo $import['ma_ncc']; ?></td>
                    <td><?php echo $import['ngayNhap']; ?></td>
                    <td><?php echo $import['nguoiNhap']; ?></td>
                    <td><?php echo $import['tong_tien']; ?></td>
                    
                    <td>
                        
                        
                        <a href="index.php?ctrl=importController&action=showImportDetail&id=<?php echo $import['ma_phieu']; ?>&tt=<?php echo $import['trang_thai'];?>">
                            <img class="detail_icon" src="../imgs/info.png" alt="">
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
<?php checkChucNang(5);?>
</html>
