<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhà cung cấp</title>
    <link rel="stylesheet" href="css/adminindex.css">
</head>
<script>
function showAddForm() {
    var formThem = document.getElementById("addSupplier");

    formThem.style.display = 'block';
    // Hoặc thêm các hành động khác ở đây
}
function closeform(){
    const closeFormBtn = document.getElementById('closeForm');
    const myForm = document.getElementById('addSupplier');
    console.log(closeFormBtn);
    console.log(myForm);
    myForm.style.display = 'none'; // Ẩn form
}
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
            echo "<script>document.getElementById('themSP').style.display = 'none';</script>";
        }
        if ($cn['sua'] == 0) {
            echo "<script>var suaElements = document.getElementsByClassName('suancc'); for(var i = 0; i < suaElements.length; i++) { suaElements[i].style.display = 'none'; }</script>";
        }
        if ($cn['xoa'] == 0) {
            echo "<script>var xoaElements = document.getElementsByClassName('xoancc'); for(var i = 0; i < xoaElements.length; i++) { xoaElements[i].style.display = 'none'; }</script>";
        }
    }
    ?>
    <h2>DANH SÁCH NHÀ CUNG CẤP</h2>

    <a class="category_add" id = 'themSP' href="#" onclick="showAddForm()">
    <img src="../imgs/plus.png" alt="">Thêm nhà cung cấp</a>
    <div id = "addSupplier" class="addForm">

        <form class="form_add" id="form_addSup" action="index.php?ctrl=supplierController&action=addSupplier" method="post">
            <button type="button" id="closeSupplier"  class="closeForm" onclick="closeform()">X</button>
            <h2>Thêm nhà cung cấp</h2>
            <label for="ten">Tên nhà cung cấp:</label>
            <input type="text" name="ten" required><br>
            <br>
            <label for="diachi">Địa chỉ: </label>
            <input type="text" name = 'diachi' required><br>
            <br>
            <label for="sdt">Số điện thoại: </label>
            <input type="number" name="sdt" required><br>
            <br>
            <label for="email">Email: </label>
            <input type="text" name="email" id=""><br>
            
            <button id="btnAddSup" class="btn_in_form" type="submit">Thêm</button>
        </form>


    </div>
    <table>
        <thead>
            <tr>
                <th>Mã nhà cung cấp</th>
                <th>Tên nhà cung cấp</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($suppliers as $supplier) : ?>
                <tr>
                    <td><?php echo $supplier['ma_ncc']; ?></td>
                    <td><?php echo $supplier['ten_ncc']; ?></td>
                    <td><?php echo $supplier['dia_chi']; ?></td>
                    <td><?php echo $supplier['sdt']; ?></td>
                    <td><?php echo $supplier['email']; ?></td>
                    
                    <td>
                        
                        <a class ="xoancc"  href="index.php?ctrl=supplierController&action=deleteCategory&id=<?php echo $category['ma_loai']; ?>">
                            <img class="del_icon" src="../imgs/delete.png" alt="">
                        </a>
                        <a class="suancc" href="index.php?ctrl=supplierController&action=showEditSupplierForm&id=<?php echo $supplier['ma_ncc']; ?>">
                            <img class="update_icon" src="../imgs/pen.png" alt="">
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>



    </table>

</body>
<?php checkChucNang(6);?>
</html>
