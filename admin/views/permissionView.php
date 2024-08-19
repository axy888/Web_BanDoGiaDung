<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phân quyền</title>
</head>
<script>
function showAddForm() {
    var formThem = document.getElementById("addPermission");

    formThem.style.display = 'block';
    // Hoặc thêm các hành động khác ở đây
}
function closeform(){
    const closeFormBtn = document.getElementById('closeForm');
    const myForm = document.getElementById('addPermission');
    console.log(closeFormBtn);
    console.log(myForm);
    myForm.style.display = 'none'; // Ẩn form
}
</script>
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
            echo "<script>document.getElementById('themquyen').style.display = 'none';</script>";
        }
        if ($cn['sua'] == 0) {
            echo "<script>var suaSPElements = document.getElementsByClassName('suaquyen'); for(var i = 0; i < suaSPElements.length; i++) { suaSPElements[i].style.display = 'none'; }</script>";
        }
        if ($cn['xoa'] == 0) {
            echo "<script>var xoaSPElements = document.getElementsByClassName('xoaquyen'); for(var i = 0; i < xoaSPElements.length; i++) { xoaSPElements[i].style.display = 'none'; }</script>";
        }
    }
    ?>
    <h2>DANH SÁCH QUYỀN</h2>

    <a id="themquyen" class="category_add" href="#"  onclick="showAddForm()">
    <img src="../imgs/plus.png" alt="">Thêm quyền</a>
    <div  class="addForm" id = "addPermission" style="display: none;">
        
        <form class="form_add" id="form_addPer" action="index.php?ctrl=permissionController&action=addPermisson" method="POST">
        <button type="button" id="close2" class="closeForm" onclick="closeform()">X</button>
        <h2>Thêm quyền mới</h2>
            <label for="tenquyen">Tên quyền: </label>
            <input type="text" name="tenquyen" required>
            <br>
            <button id="btnAddPer" class="btn_in_form" type="submit">Thêm quyền</button>
        </form>
    </div>
    <table>
        <thead>
            <tr>
                <th>Mã quyền</th>
                <th>Tên quyền</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($permissions as $permission) : ?>
                <?php if ($permission['ma_quyen'] != 2) :?>
                <tr>
                    <td><?php echo $permission['ma_quyen']; ?></td>
                    <td><?php echo $permission['ten_quyen']; ?></td>
                    
                    <td>
                        
                        <a class="xoaquyen" href="index.php?ctrl=permissionController&action=deletePermission&id=<?php echo $permission['ma_quyen']; ?>">
                            <img class="del_icon" src="../imgs/delete.png" alt="">
                        </a>
                        <a class="suaquyen" href="index.php?ctrl=permissionController&action=viewUpdatePermission&id=<?php echo $permission['ma_quyen']; ?>">
                            <img class="update_icon" src="../imgs/pen.png" alt="">
                        </a>
                        <a class="suaquyen" href="index.php?ctrl=permissionController&action=viewPermissionDetail&per_id=<?php echo $permission["ma_quyen"] ?>" >
                            <img class="detail_icon" src="../imgs/info.png" alt="">
                        </a>
                    </td>
                </tr>
            <?php endif;?>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
<?php checkChucNang(9)?>
</html>
