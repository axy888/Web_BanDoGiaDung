<?php
include_once("models/userModel.php");

class UserController{
    private $userModel;

    public function __construct(){
        $this->userModel = new UserModel();
    }
    public function showUserList(){
        $users = $this->userModel->getAllUser();
        include_once 'views/userView.php';
    }

    public function searchUser()
    {
        $item = $_GET['search'];
        $field = $_GET['field'];
        $users = $this->userModel->findUserByField($field, $item);
        include_once 'views/userView.php';
    }
}
$action ='index';
if (isset($_GET['action'])){
    $action = $_GET['action'];
}else{
    $action = 'showUserList';
}
$userController = new UserController();
switch ($action){
    case 'index':
        $userController->showUserList();
        break;
    case 'searchUser':
        $userController->searchUser();
        break;
    default:
        $userController->showUserList();
}
?>