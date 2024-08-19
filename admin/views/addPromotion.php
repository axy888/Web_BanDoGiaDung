<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Thêm khuyến mãi</h2>
    <form action="index.php?ctrl=promotionController&action=addPromotion" method="POST">
        <label for="ma_km">Mã khuyến mãi: </label>
        <input type="text" name="ma_km" id="" required><br>
        <label for="ngay_bd">Ngày bắt đầu: </label>
        <input type="date" name="ngay_bd" id="" required><br>
        <label for="pt_giam">Phần trăm giảm</label>
        <input type="number" name="pt_giam" id="" required> % <br>
        <label for="ngay_kt">Ngày kết thúc: </label>
        <input type="date" name="ngay_kt" id="" required><br>
        <label for="ghi_chu">Ghi chú: </label>
        <input type="text" name="ghi_chu" id="" required><br>
        
        <button type='submit'>Thêm</button>
    </form>
</body>
</html>