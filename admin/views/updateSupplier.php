<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật nhà cung cấp</title>
</head>

<body>

    <div class="addForm">
    <form id="form_updateSup" class="form_add" action="index.php?ctrl=supplierController&action=editSupplier" method="POST">
    <h2>Cập nhật nhà cung cấp</h2>
    <a type="button" id="" class="closeForm btnaUpdate" href="index.php?ctrl=supplierController">X</a>
        <input type="hidden" name="ma_ncc" value="<?php echo $supplier['ma_ncc']; ?>">
        <br>
        <label for="ten">Tên nhà cung cấp: </label>
        <input type="text" name="ten" value="<?php echo $supplier['ten_ncc']; ?>" required><br>
        <br>
        <label for="diachi">Địa chỉ: </label>
        <input type="text" name="diachi" value="<?php echo $supplier['dia_chi']; ?>" required><br>
        <br>
        <label for="sdt">Số điện thoại</label>
        <input type="number" name="sdt" value="<?php echo $supplier['sdt']; ?>" required><br>
        <br>
        <label for="email">Email: </label>
        <input type="text" name="email" value="<?php echo $supplier['email']; ?>" required><br>
        <br>
        <br>
        <button class="btn_in_form" type="submit" name='btn_capnhat'>Cập nhật</button>
    </form>
    </div>
</body>

</html>
