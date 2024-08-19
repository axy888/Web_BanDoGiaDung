<!DOCTYPE html>
    <html lang="vi">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Thêm phiếu nhập hàng</title>
    </head>

    <body>

        <h2>Thêm phiếu nhập kho</h2>

        <form action="index.php?ctrl=importController&action=addImport" method="post">

            <label for="ma_ncc">Chọn nhà cung cấp:</label>
            <select name="ma_ncc" required>
                <?php foreach ($suppliers as $supplier) : ?>
                    <option value="<?php echo $supplier['ma_ncc']; ?>"><?php echo $supplier['ten_ncc']; ?></option>
                <?php endforeach; ?>
            </select>
            <br>

            <label for="ngayNhap">Ngày nhập kho:</label>
            <input type="date" name="ngayNhap" required>
            <br>

            <label for="nguoiNhap">Người  nhập:</label>
            <input type="text" name="nguoiNhap" required>
            <br>
            <br>
            <button type="submit">Lưu phiếu nhập kho</button>
        </form>

        
    </body>

    </html>