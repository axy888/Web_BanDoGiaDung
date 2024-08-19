<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm chi tiết phiếu nhập</title>
</head>

<body>

    <h2>Thêm chi tiết phiếu nhập</h2>

    <form action="index.php?ctrl=importController&action=addImportDetail" method="post">
<h3>Chi tiết phiếu</h3>

<!-- Mục nhập chi tiết cho từng mặt hàng -->
<div id="chi-tiet">
    <div class="hang">
        
        <label for="ma_phieu_1">Phiếu nhập:</label>    
        <?php echo $id; ?>
        <br>
        <label for="ma_sp_1">Chọn sản phẩm:</label>
        <select name="ma_sp_1" required>
            <?php foreach ($products as $product) : ?>
                <option value="<?php echo $product['ma_sp']; ?>"><?php echo $product['ten_sp']; ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        

        <label for="so_luong_1">Số lượng:</label>
        <input type="number" name="so_luong_1" required>
        <br>
        <label for="gia_nhap_1">Giá nhập:</label>
        <input type="number" step="0.01" name="gia_nhap_1" required>
        <br>
        <br>

    </div>
</div>
<button type="submit">Lưu chi tiết phiếu nhập kho</button>
</form>

</body>

</html>