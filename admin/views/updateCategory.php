<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/adminindex.css">
    <title>Cập nhật danh mục sản phẩm</title>
</head>

<body>
<div class="addForm">
    <form id="form_updateCate" class="form_add" action="index.php?ctrl=categoryController&action=updateCategory" method="post">
    <h2>Cập nhật danh mục sản phẩm</h2>
    <a type="button" id="" class="closeForm btnaUpdate" href="index.php?ctrl=categoryController">X</a>
        <input type="hidden" name="category_id" value="<?php echo $category['ma_loai']; ?>">
        <label for="ten">Tên danh mục: </label>
        <input type="text" name="ten_loai" value="<?php echo $category['ten_loai']; ?>" required><br><br>
        <button class="btn_in_form" type="submit">Cập nhật danh mục</button>
    </form>
</div>
</body>

</html>
