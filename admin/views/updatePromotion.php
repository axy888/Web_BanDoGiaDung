<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Cập nhật khuyến mãi</h2>
    <form action="index.php?ctrl=promotionController&action=updatePromotion" method="POST">
        <label for="ma_km">Mã khuyến mãi: <?php echo $km['ma_khuyen_mai']; ?></label><br>
        <input type="hidden" name="ma_km" value = '<?php echo $km['ma_khuyen_mai']; ?>'>
        <label for="ngay_bd">Ngày bắt đầu: </label>
        <input type="date" name="ngay_bd" value="<?php echo $km['ngay_bat_dau']; ?>" id="" required><br>
        <label for="pt_giam">Phần trăm giảm</label>
        <input type="number" name="pt_giam" value = '<?php echo $km['phan_tram_giam']; ?>' id="" required> % <br>
        <label for="ngay_kt">Ngày kết thúc: </label>
        <input type="date" name="ngay_kt" id="" value = '<?php echo $km['ngay_ket_thuc']; ?>' required><br>
        <label for="ghi_chu">Ghi chú: </label>
        <input type="text" name="ghi_chu" id="" value = '<?php echo $km['ghi_chu']; ?>' required><br>
        
        <button type='submit'>Sửa</button>
    </form>
</body>
</html>