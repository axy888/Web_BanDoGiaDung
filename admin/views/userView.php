<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="../admin/js/searchAjax.js"></script>
    <title>Thông tin người dùng</title>
</head>

<body>

    <h2>DANH SÁCH NGƯỜI DÙNG</h2>
    <form action="index.php" method="GET" class="searchUser">
            <input type="hidden" name="ctrl" value="userController">
            <input type="hidden" name="action" value="searchUser">
            Tìm kiếm theo: <select name="field" class="timkiem" id="timkiem">
                <option value="ma_nd">Mã người dùng</option>
                <option value="ten">Họ và tên</option>
                <option value="sdt">Số điện thoại</option>
                <option value="diachi">Địa chỉ</option>
                <option value="email">Email</option>
                <option value="loai_nd">Loại người dùng</option>
                <option value="trangthai">Trạng thái</option>
            </select>
            <input type="text" id="search" name="search" placeholder="Nhập user cần tìm kiếm">
            <button type="submit">Tìm kiếm</button>


    </form>

    <table>
        <thead>
            <tr>
                <th>Mã người dùng</th>
                <th >Loại người dùng</th>
                <th>Họ tên</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ nhận hàng</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td ><?php echo $user['ma_nd']; ?></td>
                    <td ><?php echo $user['loai_nd']; ?></td>
                    <td><?php echo $user['ten']; ?></td>
                    <td ><?php echo $user['sdt']; ?></td>
                    <td><?php echo $user['diachi']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>

        

    </table>

</body>

</html>
