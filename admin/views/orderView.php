<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý đơn hàng</title>
    <script src="../admin/js/searchAjax.js"></script>

</head>

<body>


    <h2>Danh sách đơn hàng</h2>
    <form action="index.php" id="timdonhang" class = "timdonhang" method="GET">
        Trạng thái: 
        All<input type="radio" class="trangthai" name="trangthai" id="" value="all" checked>&nbsp;
        Chưa xử lý<input type="radio" class="trangthai" name="trangthai" id="" value="1">&nbsp;
        Đang giao hàng<input type="radio" name="trangthai" class="trangthai" id="" value="2">&nbsp;
        Đã giao hàng <input type="radio" name="trangthai" class="trangthai" id="" value="3">&nbsp;
        Đã hủy <input type="radio" name="trangthai" class="trangthai" id="" value="0">
        
        <label for="startdate">Start: </label>
        <input type="date"  class="startdate" name="startdate" id="">
        <label for="startdate">End: </label>
        <input type="date"  class="enddate" name="enddate" id="">
        <button type="submit">Tìm kiếm</button>
    </form>

    <table id = "bangdonhang">
        <thead >
            <tr>
                <th style="text-align:center;">Mã đơn hàng</th>
                <th style="text-align:center;">Mã khách hàng</th>
                <th style="text-align:center;">Trạng thái</th>
                <th style="text-align:center;">Ngày đặt hàng</th>
                <th style="text-align:center;">Họ tên người nhận</th>
                <th style="text-align:center;">Số điện thoại</th>
                <th style="text-align:center;">Địa chỉ</th>
                <th style="text-align:center;">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($order_list as $order) : ?>
                <tr>

                    <td style="text-align:center;"><?php echo $order['ma_don']; ?></td>
                    <td style="text-align:center;"><?php echo $order['ma_kh']; ?></td>
                    <?php if ($order['trang_thai'] == 1){
                        echo '<td>Chưa xử lý</td>';
                    }elseif($order['trang_thai'] == 2){
                        echo '<td>Đang giao hàng</td>';
                    }elseif($order['trang_thai'] == 3){
                        echo '<td>Đã giao hàng</td>';
                    }else{
                        echo '<td>Đã hủy đơn</td>';
                    }
                    ?>
                    <td><?php echo $order['ngay_dat']; ?></td>
                    <td style="text-align:center;"><?php echo $order['hovaTen']; ?></td>
                    <td style="text-align:center;"><?php echo $order['sdt']; ?></td>
                    <td><?php echo $order['diaChi']; ?></td>
                    <td style="text-align:center;">
                    <a  id="viewOrderDetails" href="index.php?ctrl=orderController&action=showCTDonHang&id=<?php echo $order['ma_don']; ?>">

    <img class="update_icon" src="../imgs/pen.png" alt="Xem chi tiết đơn hàng"></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>
