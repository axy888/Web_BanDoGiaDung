<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý khuyến mãi</title>
</head>

<body>

    <h2>DANH SÁCH KHUYẾN MÃI</h2>

    <a href="index.php?ctrl=promotionController&action=viewAddPromotionForm">Thêm khuyến mãi</a>
    
    <table>
        <thead>
            <tr>
                <th>Mã khuyến mãi</th>
                <th>Ngày bắt đầu</th>
                <th>Phần trăm giảm</th>
                <th>Ngày kết thúc</th>
                <th>Ghi chú</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($promotion_list as $promotion) : ?>
                <?php if ($promotion['da_xoa'] == 0) : ?>
                <tr>
                    <td><?php echo $promotion['ma_khuyen_mai']; ?></td>
                    <td><?php echo $promotion['ngay_bat_dau']; ?></td>
                    <td><?php echo $promotion['phan_tram_giam']; ?></td>
                    <td><?php echo $promotion['ngay_ket_thuc']; ?></td>
                    <td><?php echo $promotion['ghi_chu']; ?></td>
                    
                    <td>
                        
                        <a href="index.php?ctrl=promotionController&action=deletePromotion&id=<?php echo $promotion['ma_khuyen_mai']; ?>">
                            <img class="del_icon" src="../imgs/delete.png" alt="">
                        </a>
                        <a href="index.php?ctrl=promotionController&action=viewUpdatePromotionForm&id=<?php echo $promotion['ma_khuyen_mai']; ?>">
                            <img class="update_icon" src="../imgs/pen.png" alt="">
                        </a>
                    </td>
                </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>



    </table>

</body>

</html>
