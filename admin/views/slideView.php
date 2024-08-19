
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/adminindex.css">
    <script src="../admin/js/searchAjax.js"></script>
    <title>Thông tin người dùng</title>
</head>

<body>
<?php
    include_once ("models/checkChucNangModel.php");
    // Assigning the result to a different variable
    function checkChucNang($ma_cn)
    {
        $model = new CheckChucNangModel();
        $user = $model->getQuyenOfUsername($_SESSION['makh']);
        $quyen = $user['ma_quyen'];
        $cn = $model->getChucNang($quyen, $ma_cn);
        // Tìm tất cả các phần tử có class 'suaSP' và 'xoaSP'
        // và đặt style display thành 'none' nếu phù hợp
        if ($cn['them'] == 0) {
            echo "<script>document.getElementById('themslide').style.display = 'none';</script>";
        }
        if ($cn['sua'] == 0) {
            echo "<script>var suaSPElements = document.getElementsByClassName('suaslide'); for(var i = 0; i < suaSPElements.length; i++) { suaSPElements[i].style.display = 'none'; }</script>";
        }
        if ($cn['xoa'] == 0) {
            echo "<script>var xoaSPElements = document.getElementsByClassName('xoaslide'); for(var i = 0; i < xoaSPElements.length; i++) { xoaSPElements[i].style.display = 'none'; }</script>";
        }
    }
    ?>
    <h2>DANH SÁCH SLIDE</h2>

    <div id="themslide">
        <form action="index.php?ctrl=slideController&action=addSlide" method = "POST" id="themctslide">
            <label for="tenslide">Tên slide: </label>
            <input type="text" name="tenslide" id="" required>
            <button type="submit">Thêm slide</button>
        </form>
    <div id="messageContainer"></div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Mã slide</th>
                <th>Tiêu đề</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($slides as $slide) : ?>
                <tr>
                    <td><?php echo $slide['slideid']; ?></td>
                    <td><?php echo $slide['slidename']; ?></td>
                    
                    <td>
                        
                        <a class="xoaslide" href="index.php?ctrl=slideController&action=deleteSlide&slidexoa=<?php echo $slide['slideid']; ?>">
                            <img class="del_icon" src="../imgs/delete.png" alt="">
                        </a>
                        <a class="suaslide" href="index.php?ctrl=slideController&action=viewSlideDetail&id=<?php echo $slide['slideid']; ?>">
                            <img class="detail_icon" src="../imgs/info.png" alt="">
                        </a>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
<?php checkChucNang(7);?>
</html>
