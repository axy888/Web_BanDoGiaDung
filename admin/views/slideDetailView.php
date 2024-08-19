
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <title>Thông tin người dùng</title>
</head>

<body>


    <div class="addForm">
    <div class="form_add" id="form_slidedetail">

    <h2>Danh sách sản phẩm trong slide</h2>
    <a type="button" id="closeslide"  class="closeForm btnaUpdate" href="index.php?ctrl=slideController">X</a>
    <form id="addslidedetailform" action="index.php" method="POST">
        <input type="hidden" name="maslide" id="" value="<?php echo $id; ?>">
        <label for="masp">Nhập mã sản phẩm: </label>
        <input type="text" name="masp" id="" required>
        <button id="btnslide" class="btn_in_form" type="submit">Thêm sản phẩm vào slide</button>
        <br>
        <br>
    </form>

    <table>
        <thead>
            <tr>
                <th>Mã slide</th>
                <th>Mã sp</th>
                <th>Thao tác</th>
            </tr>
        </thead>

<tbody>


        <?php foreach ($slideDetails as $slideDetail) : ?>
            <tr>
                <td><?php echo $slideDetail['slide_id']; ?></td>
                <td><?php echo $slideDetail['ma_sp']; ?></td>
                <td>
                    <a href="index.php?ctrl=slideController&action=deleteProductInSlide&idxoa=<?php echo $slideDetail['slide_id']; ?>&maspxoa=<?php echo $slideDetail['ma_sp']; ?>">
                    Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
            
    </div>
    </div>
</body>
<script>
    $('form#addslidedetailform').submit(function (event) {
    event.preventDefault();

    const maslideValue = $('[name="maslide"]').val();
    const maspValue = $('[name="masp"]').val();
    // Make the AJAX request
    $.ajax({
        url: 'index.php?ctrl=slideController&action=addSlideDetail', // Adjust the actual URL
        method: 'POST',
        data: { maslide: maslideValue, masp: maspValue },
        // dataType: 'json', // Expect JSON response
        success: function (response) {
            var error = response.match(/Sản phẩm đã tồn tại trong slide/);
            var success = response.match(/Thêm sản phẩm vào slide thành công/);
            var notexist = response.match(/Không tồn tại mã sản phẩm này/);
            if (success){
                alert("Thêm sản phẩm vào slide thành công");
            }else if(error){
                alert("Sản phẩm đã tồn tại trong slide");
            }else{
                alert("Không tồn tại mã sản phẩm này");
            }
        },
        error: function (xhr, status, error) {
            console.error('AJAX request failed:', error);
        }
    });
});

</script>
</html>
