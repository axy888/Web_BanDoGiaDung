<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
function generateCheckbox($value) {
    if ($value == 1) {
        return '<input type="checkbox" class = "cn" checked>';
    } else {
        return '<input type="checkbox" class = "cn" >';
    }
}
?>
<?php
function getCheckBoxValue($row) {

}
?>
<div class="addForm">
<div id="form_ctpq" class="form_add">
<a type="button" id="" class="closeForm btnaUpdate" href="index.php?ctrl=permissionController">X</a>


    <h2>Chi tiết phân quyền</h2>
    <table>
        <thead>
            <tr>
                <th style="text-align:left;">Mã quyền</th>
                <th style="text-align:left;">Mã chức năng </th>
                <th style="text-align:left;">Quản lý</th>
                <th style="text-align:right;">Thêm</th>
                <th style="text-align:right;">Sửa</th>
                <th style="text-align:right;">Xóa</th>
                <th style="text-align:left;">Thao tác</th>
            </tr>
        </thead>

        <tbody>
        <?php foreach ($permissionDetails as $detail) : ?>


                <tr>
                    <td><?php echo $detail['ma_quyen']; ?></td>
                    <td><?php echo $detail['ma_cn']; ?></td>
                    <td><?php echo $detail['noi_dung']; ?></td>
                    <?php $id_them = 'them_' . $detail['ma_quyen'] . '_' . $detail['ma_cn']; ?>
                    <?php $id_sua = 'sua_' . $detail['ma_quyen'] . '_' . $detail['ma_cn']; ?>
                    <?php $id_xoa = 'xoa_' . $detail['ma_quyen'] . '_' . $detail['ma_cn']; ?>
                    
                    <?php if($detail['them'] == 1) :?>
                        <td><input type="checkbox" id="<?php echo $id_them; ?>" name ="them" class = "them" checked></td>
                    <?php else :?>
                        <td><input type="checkbox" id="<?php echo $id_them; ?>" name ="them" class = "them"></td>
                    <?php endif; ?>
            
                    <?php if($detail['sua'] == 1) :?>
                        <td><input type="checkbox" id="<?php echo $id_sua; ?>" name ="sua" class = "sua" checked></td>
                    <?php else :?>
                        <td><input type="checkbox" id="<?php echo $id_sua; ?>" name ="sua" class = "sua"></td>
                    <?php endif; ?>
            
                    <?php if($detail['xoa'] == 1) :?>
                        <td><input type="checkbox" id="<?php echo $id_xoa; ?>" name ="xoa" class = "xoa" checked></td>
                    <?php else :?>
                        <td><input type="checkbox" id="<?php echo $id_xoa; ?>" name ="xoa" class = "xoa"></td>
                    <?php endif; ?>
                    
                    <td>
                    <a  href="#" onclick="updateDetail(<?php echo $detail['ma_quyen']; ?>, <?php echo $detail['ma_cn']; ?>)">
                    <img  class="del_icon" src="../imgs/updated.png" alt=""></a>
                    </td>
                </tr>

        <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    </div>
    <script>
function updateDetail(ma_quyen, ma_cn) {
    // Lấy giá trị của các checkbox dựa trên id của chúng
    var themCheckbox = document.getElementById('them_' + ma_quyen + '_' + ma_cn);
    var suaCheckbox = document.getElementById('sua_' + ma_quyen + '_' + ma_cn);
    var xoaCheckbox = document.getElementById('xoa_' + ma_quyen + '_' + ma_cn);

    // Khởi tạo giá trị ban đầu của các biến
    var them = themCheckbox.checked ? 1 : 0;
    var sua = suaCheckbox.checked ? 1 : 0;
    var xoa = xoaCheckbox.checked ? 1 : 0;

    // Tạo URL với các giá trị đã cập nhật
    var url = "index.php?ctrl=permissionController&action=updateDetail&per_id=" + ma_quyen +
              "&cn_id=" + ma_cn +
              "&them=" + them +
              "&sua=" + sua +
              "&xoa=" + xoa;

    // Thông báo kiểm tra trước khi chuyển hướng

    // Chuyển hướng đến URL mới
    window.location.href = url;
}

</script>
</body>
</html>