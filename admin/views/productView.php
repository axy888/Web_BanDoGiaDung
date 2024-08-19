<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/adminindex.css">

    <script src="../admin/js/searchAjax.js"></script>
    <title>Danh sách sản phẩm</title>
</head>
<script>
function showAddForm() {
    var formThem = document.getElementById("addProduct");

    formThem.style.display = 'block';
    // Hoặc thêm các hành động khác ở đây
}
function closeform(){
    const closeFormBtn = document.getElementById('closeForm');
    const myForm = document.getElementById('addProduct');
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
            echo "<script>var suaSPElements = document.getElementsByClassName('suaSP'); for(var i = 0; i < suaSPElements.length; i++) { suaSPElements[i].style.display = 'none'; }</script>";
        }
        if ($cn['xoa'] == 0) {
            echo "<script>var xoaSPElements = document.getElementsByClassName('xoaSP'); for(var i = 0; i < xoaSPElements.length; i++) { xoaSPElements[i].style.display = 'none'; }</script>";
        }
    }
    ?>


    <h2>DANH SÁCH SẢN PHẨM</h2>


    <form action="index.php" method="GET" class="search-form">
        <input type="hidden" name="ctrl" value="productController">
        <input type="hidden" name="action" value="searchProducts">
        Tìm kiếm theo: <select name="field" class="timkiem" id="timkiem">
            <option value="ma_sp">Mã sản phẩm</option>
            <option value="ma_loai">Mã loại</option>
            <option value="ten_sp">Tên sản phẩm</option>
            <option value="don_gia">Đơn giá</option>
            <option value="mo_ta">Mô tả</option>
        </select>
        <input type="text" id="search" name="search" placeholder="Nhập tên sản phẩm cần tìm kiếm">
        <button type="submit">Tìm kiếm</button>


    </form>
    <!-- <input type="text" name="txtTimKiem" id="timsp" placeholder="Nhập tìm kiếm..."><br> -->
    <br>
    <a class="category_add" id = 'themSP' href="#" onclick="showAddForm()">
    <img src="../imgs/plus.png" alt="">Thêm sản phẩm</a>
    <div  class="addForm" id = 'addProduct' style="display: none;">
        
        
        <form class="form_add" id="form_addPro" action="index.php?ctrl=productController&action=addProduct" method="POST">
        <button type="button" id="close2" class="closeForm" onclick="closeform()">X</button>
        <h2>Thêm sản phẩm</h2><br>
            <label for="ten">Tên sản phẩm: </label>
            <input type="text" name = "ten" required><br><br>
            <label for="id_danh_muc">Chọn danh mục: </label>
            <select name="id_danh_muc" id="" required>
                <?php
                foreach($categories as $category){
                    if ($category['da_xoa'] == 0)
                        echo '<option value="' . $category['ma_loai'] . '">' . $category['ten_loai'] . '</option>';
                }
                ?>
            </select><br><br>
            <label for="anh">Hình ảnh: </label>
            <input type="file" id="anh" name = 'anh' accept="images/*"><br>
            <br>
            <label for="gia">Giá: </label>
            <input type="number" name="gia" required><br>
            <label for="mota">Mô tả: </label>
            <br>
            <textarea name="mota" id="" rows="5"></textarea>
            <br><br><br><br><br>
            <label for="mausac">Màu sắc: </label>
            <input type="text" name="mausac" id=""><br><br>
            <label for="xuatxu">Xuất xứ: </label>
            <input type="text" name="xuatxu" id=""><br><br>
            <label for="thuonghieu">Thương hiệu: </label>
            <input type="text" name="thuonghieu" id=""><br>
            <button id="btnAddPro" class="btn_in_form" type='submit'>Thêm sản phẩm</button>
        </form>
    </div>

    <table id="pro_table">
        <thead>
            <tr>

                <th>Mã sản phẩm</th>
                <th>Mã loại</th>
                <th>Tên sản phẩm</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Mô tả</th>
                <th>Màu sắc</th>
                <th>Xuất xứ</th>
                <th>Thương hiệu</th>
                <th>Hình</th>
                <th>Thao tác</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?php echo $product['ma_sp']; ?></td>
                    <td><?php echo $product['ma_loai']; ?></td>
                    <td><?php echo $product['ten_sp']; ?></td>
                    <td><?php echo $product['don_gia']; ?></td>
                    <td><?php echo $product['so_luong']; ?></td>
                    <td><?php echo $product['mo_ta']; ?></td>
                    <td><?php echo $product['mau_sac']; ?></td>
                    <td><?php echo $product['xuat_xu']; ?></td>
                    <td><?php echo $product['thuong_hieu']; ?></td>
                    <td><?php echo '<img width = "100px" height="100px" src="images\\' . $product["hinh"] . '" alt="">'; ?>
                    </td>
                    <td>

                        <a class='xoaSP'
                            href="index.php?ctrl=productController&action=deleteProduct&id=<?php echo $product['ma_sp']; ?>">
                            <img class="del_icon" src="../imgs/delete.png" alt="">
                        </a>
                        <a class='suaSP'
                            href="index.php?ctrl=productController&action=showUpdateProductForm&id=<?php echo $product['ma_sp']; ?>">
                            <img class="update_icon" src="../imgs/pen.png" alt="">
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            
        </tbody>

    </table>
    

    

</body>
<?php
checkChucNang(1);
?>
</html>