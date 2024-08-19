<?php
include_once("models/permissonModel.php");

class PermissonController{
    private $permissionModel;

    public function __construct(){
        $this->permissionModel = new PermissonModel();
    }
    public function showPermissionList(){
        $permissions = $this->permissionModel->getAllPermisson();
        include_once 'views/permissionView.php';
    }
    public function viewPermissionDetail() {
        if (isset($_GET["per_id"])){
            $id = $_GET["per_id"];
            $chucnangs = $this->permissionModel->getAllChucNang();
            $permissionDetails = $this->permissionModel->getCTPQ_OfCN($id);
            $permissions = $this->permissionModel->getAllPermisson();
            include_once 'views/permissionView.php';
            include_once 'views/ctpqView.php';
        }
    }
    public function viewUpdatePermission() {
        if (isset($_GET['id'])){
            $id = $_GET['id'];
            $quyen = $this->permissionModel->getPermissionByID($id);
            include_once 'views/updatePermission.php';
        }
    }
    public function showAddPermissionForm(){
        include_once 'views/addPermission.php';
        $permissions = $this->permissionModel->getAllPermisson();
        include_once 'views/permissionView.php';
    }
    public function addPermisson(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $ten_quyen = $_POST["tenquyen"];
            $result = $this->permissionModel->addPermisson($ten_quyen);
            if ($result){
                echo "<script>alert('Thêm quyền thành công');</script>";
            }else{
                echo "<script>alert('Thêm quyền không thành công');</script>";
            }
        }
    }
    public function updatePermisson(){
        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            $mq = $_POST["ma_quyen"];
            $tq = $_POST['nd'];
            $kq = $this->permissionModel->updatePermission($mq,$tq);
        }
    }
    public function deletePermission(){
        if (isset($_GET['id'])){
            $id = $_GET['id'];
            $kq = $this->permissionModel->deletePermission($id);
        }
    }
    public function updateDetail(){
        if (isset($_GET['per_id']) and isset($_GET['cn_id'])){
            $per_id = $_GET['per_id'];
            $cn_id = $_GET['cn_id'];
            $them  = $_GET['them'];
            $sua = $_GET['sua'];
            $xoa = $_GET['xoa'];
            $kq = $this->permissionModel->updateDetail($per_id,$cn_id,$them,$sua,$xoa);
        }
    }
}
$action ='index';
if (isset($_GET['action'])){
    $action = $_GET['action'];
}else{
    $action = 'showPermissionList';
}
$permissonController = new PermissonController();
switch ($action){
    case 'index':
        $permissonController->showPermissionList();
        break;
    case 'viewPermissionDetail':
        $permissonController->viewPermissionDetail();
        break;
    case 'showAddPermissionForm':
        $permissonController->showAddPermissionForm();
        break;
    case 'addPermisson':
        $permissonController->addPermisson();
        $permissonController->showPermissionList();
        break;
    case 'viewUpdatePermission':
        $permissonController->viewUpdatePermission();
        $permissonController->showPermissionList();
        break;
    case 'updatePermission':
        $permissonController->updatePermisson();
        $permissonController->showPermissionList();
        break;
    case 'deletePermission':
        $permissonController->deletePermission();
        $permissonController->showPermissionList();
        break;
    case 'updateDetail':
        $permissonController->updateDetail();
        $permissonController->viewPermissionDetail();
        break;

    default:
        $permissonController->showPermissionList();
}
?>