
   

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
   <div id = "ctdonhang" class="addForm">
        <div id="form_chitiet" class="form_add">
    <a type="button" id="btna" class="closeForm" href="index.php?ctrl=orderController">X</a>

    <table>
        <thead>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Tổng tiền</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ct_hang as $ct) : ?>
                <tr>
                    <td><?php echo $ct['ma_don']; ?></td>
                    <td><?php echo $ct['ma_sp']; ?></td>
                    <td><?php echo $ct['ten_sp']; ?></td>
                    <td><?php echo $ct['don_gia']; ?></td>
                    <td><?php echo $ct['so_luong']; ?></td>
                    <td><?php echo $ct['tong_tien']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>


    </table>
    <br>
    <div id="tongtien_orderDetail">
    Tổng tiền: <?php echo $tong;?><br>
    </div>
                <br>
                <br>
    <?php
// Kiểm tra biến
if ($trangthai == 1) {
    // Nếu giá trị của biến bằng 1, hiển thị nút 1
    echo '<a class="btn_xacnhan" href="index.php?ctrl=orderController&action=updateOrder&madon=' . $id . '&trangthai=2">Xác nhận đơn hàng</a>';

} elseif ($trangthai == 2) {
    // Nếu giá trị của biến bằng 2, hiển thị nút 2
    echo '<a class="btn_xacnhan" href="index.php?ctrl=orderController&action=updateOrder&madon='.$id.'&trangthai=3">Xác nhận đã giao hàng</a>';
}
?>
<br>
<br>
<br>
</div>
    </div>


    </table>
</body>
</html>