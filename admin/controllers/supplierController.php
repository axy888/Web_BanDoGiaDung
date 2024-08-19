<?php
include_once 'models/supplierModel.php';

class SupplierController {
    private $supplierModel;

    public function __construct(){
        $this->supplierModel = new SupplierModel();

    }
    public function showSupplierList(){
        $suppliers = $this->supplierModel->getAllSuppliers();
        include_once 'views/supplierView.php';
    
    }
    public function showAddSupplierForm(){
        include_once 'views/addSupplier.php';
    }
    public function addSupplier(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $ten = $_POST['ten'];
            $diachi = $_POST['diachi'];
            $sdt = $_POST['sdt'];
            $email = $_POST['email'];

            $result = $this->supplierModel->addSupplier($ten, $diachi, $sdt, $email);
            if ($result) {
                echo "<script>alert('Thêm thành công!');</script>";
            } else {
                echo "<script>alert('Thêm không thành công!');</script>";
            }
        }
    }
    public function showEditSupplierForm(){
        if (isset($_GET['id'])){
            $id = $_GET['id'];
            $supplier = $this->supplierModel->getSupplierById($id);
            include_once "views/updateSupplier.php";
        }
    }
    public function editSupplier(){
        
        if (isset($_POST['btn_capnhat'])){
            $ma_ncc = $_POST['ma_ncc'];
            $ten_ncc = $_POST['ten'];
            $diachi = $_POST['diachi'];
            $sdt = $_POST['sdt'];
            $email = $_POST['email'];
            echo "<script>alert('$ma_ncc $ten_ncc $diachi $sdt $email');</script>";
            $result = $this->supplierModel->updateSupplier($ma_ncc,$ten_ncc,$diachi,$sdt,$email);
            if ($result) {
                echo "<script>alert('Cập nhật thành công!');</script>";
            }
            else{echo "<script>alert('Cập nhật không thành công!');</script>";}
        }
    }
}

$action = 'index';
if (isset($_GET['action'])){
    $action = $_GET['action'];
}
else{
    $action = 'showSupplierList';
}
$supplierController = new SupplierController();
switch($action){
    case 'index':
        $supplierController->showSupplierList();
        break;
    case 'showAddSupplierForm':
        $supplierController->showAddSupplierForm();
        break;
    case 'addSupplier':
        $supplierController->addSupplier();
        break;
    case 'showEditSupplierForm':
        $supplierController->showEditSupplierForm();
        break;
    case 'editSupplier':
        $supplierController->editSupplier();
        break;
    default:
        $supplierController->showSupplierList();
}
?>