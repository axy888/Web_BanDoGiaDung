<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật phiếu nhập kho</title>
</head>

<body>
    <h2>Cập nhật phiếu nhập kho</h2>
    <?php
    if (isset($importList)) {
        ?>
        <form action="index.php?ctrl=importController&action=updateImport" method="post">
            <input type="hidden" name="ma_phieu" value="<?php echo $importList['ma_phieu']; ?>">
            <label for="ma_ncc">Nhà cung cấp:</label>
            <select name="ma_ncc" required>
            <?php foreach ($suppliers as $supplier) : ?>
                <?php $selected = ($supplier['ma_ncc'] == $nhacungcap['ma_ncc']) ? 'selected' : ''; ?>
                <option value="<?php echo $supplier['ma_ncc']; ?>" <?php echo $selected; ?>><?php echo $supplier['ten_ncc']; ?></option>
            <?php endforeach; ?>
            </select>
            <br>

            <label for="ngayNhap">Ngày:</label>
            <input type="date" name="ngayNhap" id="ngayNhap" value="<?php echo $importList['ngayNhap']; ?>" required><br>

            <label for="tong_tien">Tổng tiền:</label>
            <input type="text" name="tong_tien" id="tong_tien" value="<?php echo $importList['tong_tien']; ?>" readonly><br>

            <label for="nguoiNhap">Người nhập:</label>
            <input type="text" name="nguoiNhap" id="nguoiNhap" value="<?php echo $importList['nguoiNhap']; ?>" required><br>

            <button type="submit">Cập nhật</button>
        </form>
    <?php
    } else {
        echo "Không tìm thấy phiếu nhập kho.";
    }
    ?>
</body>

</html>