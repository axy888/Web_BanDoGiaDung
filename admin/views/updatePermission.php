<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật nhà cung cấp</title>
</head>

<body>
    
<div class="addForm">
    <form id="form_updatePer" class="form_add" action="index.php?ctrl=permissionController&action=updatePermission" method="POST">
    <h2>Cập nhật quyền</h2>
    <a type="button" id="" class="closeForm btnaUpdate" href="index.php?ctrl=permissionController">X</a>
        <label for="ma_quyen">Mã quyền: <?php echo $quyen['ma_quyen'];?></label>
        <input type="hidden" name="ma_quyen" value = "<?php echo $quyen['ma_quyen'];?>" id=""><br>
        <label for="nd">Tên quyền: </label>
        <input type="text" name="nd" id="" value="<?php echo $quyen['ten_quyen'];?>" required><br>
        <br>
        <br>
        <button class="btn_in_form" type="submit" name='btn_capnhat'>Cập nhật</button>
    </form>
    </div>
</body>

</html>
