<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật danh mục sản phẩm</title>
</head>

<body>

<div class="addForm">
    <form id="form_updatePro" class="form_add" action="index.php?ctrl=productController&action=updateProduct" method="post">
    <h2>Cập nhật thông tin sản phẩm</h2>
    <a type="button" id="" class="closeForm btnaUpdate" href="index.php?ctrl=productController">X</a>
        <input type="hidden" name="ma_sp" value="<?php echo $product['ma_sp']; ?>">
        <label for="ten">Danh mục: </label>
        <select name="the_loai" id="" required>
        <?php foreach($categories as $category){
            if ($category['da_xoa'] == 0){
            echo '<option value="' . $category['ma_loai'] . '"';
            if ($category['ma_loai'] == $product['ma_loai']){
                echo ' selected';
            }
            echo '>' . $category['ten_loai'] . '</option>';
        }
        }
        ?>
        </select>
        <br><br>
        <label for="ten_sp">Tên sản phẩm: </label>
        <input type="text" name="ten_sp" id="" value="<?php echo $product['ten_sp']?>" required><br><br>
        <label for="don_gia" required>Đơn giá:</label>
        <input type="number" name="don_gia" value="<?php echo $product['don_gia']?>" id="" required><br><br>
        <label for="mo_ta">Mô tả: </label>
        <textarea name="mo_ta" id="" cols="30" rows="10"><?php echo $product['mo_ta']?></textarea>
        <br><br><br><br>
        <label for="">Màu sắc: </label>
        <input type="text" name="mau_sac" value="<?php echo $product['mau_sac']?>" id=""><br><br>
        <label for="thuong_hieu">Thương hiệu: </label>
        <input type="text" name="thuong_hieu" value="<?php echo $product['thuong_hieu']?>" id=""><br><br>
        <label for="xuat_xu">Xuất xứ</label>
        <input type="text" name="xuat_xu" value="<?php echo $product['xuat_xu']?>"  id=""><br><br>
        <label for="hinh">Hình ảnh: </label>
        <input type="file" name="hinh" accept="images/*" id="hinhInput"><br><br>
        <img src="images/<?php echo $product['hinh']?>" id = "hinhPreview"  style="max-width: 100px; max-height: 100px;" alt="">
        <br>
        <br>
        <br>
        <button class="btn_in_form" type="submit">Cập nhật</button>
    </form>
    </div>
    <script>
    document.getElementById('hinhInput').addEventListener('change', function(event) {
        var file = event.target.files[0];
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('hinhPreview').src = e.target.result;
        };
        reader.readAsDataURL(file);
    });
</script>
</body>

</html>
