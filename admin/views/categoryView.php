<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách danh mục sản phẩm</title>
    <link rel="stylesheet" href="css/text.css">
    <link rel="stylesheet" href="css/adminindex.css">
    <script src="../admin/js/searchAjax.js"></script>

</head>

<script>
function showAddForm() {
    var formThem = document.getElementById("addCategory");

    formThem.style.display = 'block';
    // Hoặc thêm các hành động khác ở đây
}
function closeform(){
    const closeFormBtn = document.getElementById('closeForm');
    const myForm = document.getElementById('addCategory');
    console.log(closeFormBtn);
    console.log(myForm);
    myForm.style.display = 'none'; // Ẩn form
}
</script>
<?php
include_once("models/checkChucNangModel.php");
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
         echo "<script>var suaElements = document.getElementsByClassName('suaTL'); for(var i = 0; i < suaElements.length; i++) { suaElements[i].style.display = 'none'; }</script>";
     }
     if ($cn['xoa'] == 0) {
         echo "<script>var xoaElements = document.getElementsByClassName('xoaTL'); for(var i = 0; i < xoaElements.length; i++) { xoaElements[i].style.display = 'none'; }</script>";
     }
 }
 ?>


<body>
    <h2>DANH SÁCH DANH MỤC SẢN PHẨM</h2>

    <form action="index.php" method="GET" class="searchCategory">
        <input type="hidden" name="ctrl" value="categoryController">
        <input type="hidden" name="action" value="searchCategory">
        <input type="text" id="search" name="search" placeholder="Nhập tên thể loại...">
        <button type="submit">Tìm kiếm</button>
    </form>
    <br>
    <a class="category_add" id ='themTL'  href="#" onclick="showAddForm()">
    <img src="../imgs/plus.png" alt="">Thêm danh mục</a>

    <div class="addForm" id = "addCategory">



    <form class="form_add" id="form_addCate" action="index.php?ctrl=categoryController&action=addCategory" method="post">
    <button type="button" id="positionc" class="closeForm" onclick="closeform()">X</button>
    <h2>Thêm danh mục sản phẩm</h2>
    <label for="ten">Tên danh mục:</label>
    <input type="text" name="ten" required><br><br>

    <button class="btn_in_form" type="submit">Thêm danh mục</button>
    </form>
</div>

<table class="table" >
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category) : ?>
                <?php if ($category['da_xoa'] == 0) : ?>
                <tr>
                    <td><?php echo $category['ma_loai']; ?></td>
                    <td><?php echo $category['ten_loai']; ?></td>
                    <td class="icon_thaotac">
                        <a class ='xoaTL'   href="index.php?ctrl=categoryController&action=deleteCategory&id=<?php echo $category['ma_loai']; ?>" title="Xóa">
                            <img class="del_icon" src="../imgs/delete.png" alt="">
                        </a>
                        <a class = 'suaTL' href="index.php?ctrl=categoryController&action=updateCategoryView&id=<?php echo $category['ma_loai']; ?>" title="Sửa">
                            <img class="update_icon" src="../imgs/pen.png" alt="">
                        </a>
                    </td>
                </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
<?php checkChucNang(11) ?>
</html>
