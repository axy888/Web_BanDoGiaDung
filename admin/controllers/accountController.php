<?php
include("models/accountModel.php");

class AccountController{
    private $accountModel;

    public function __construct(){
        $this->accountModel = new AccountModel();
    }
    public function showAccountList(){
        $accounts = $this->accountModel->getAllAccount();
        $permissions = $this->accountModel->getAllPermisson();
        include 'views/accountView.php';
    }

    public function addAccount()
    {
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['txtUsername'];
            $ma_quyen=$_POST['ma_quyen'];
            $loaind=null;
            if($ma_quyen==2)
            {
                $loaind='KH';
            }
            else $loaind='NV';
            $password=$_POST['txtPassword'];
            $hoten=$_POST['txtHoTen'];
            $sdt=$_POST['txtSdt'];
            $email=$_POST['txtEmail'];
            $diachi=$_POST['txtDiaChi'];
            $kq1=$_POST['ketqua'];
            if($kq1==1)
            {
                $checkID = $this->accountModel->checkMaKH($username);
                if($checkID)
                {
                    echo'<script>alert("username đã tồn tại")</script>';
                }
                else 
                {
                    $result = $this->accountModel->addAccount($username,$ma_quyen,$password,$hoten,$sdt,$email,$diachi,$loaind);
        
                    if ($result) 
                    {
                        echo'<script>alert("thêm tài khoản thành công")</script>';
                        // echo json_encode(array('status' => 1));
                    } else
                        echo'<script>alert("thêm tài khoản thất bại")</script>';
                        // echo json_encode(array('status' =>0));   
                }

            }
            else {
                echo'<script>alert("thêm tài khoản thất bại")</script>';
                // echo json_encode(array('status' =>0));
            }
        }
    }

    public function searchAccount()
    {
        $item = $_GET['search'];
        $field = $_GET['field'];
        $startdate = $_GET['startdate'];
        $enddate = $_GET['enddate'];
        $accounts = $this->accountModel->findAccountByFieldAndDateRange($field, $item, $startdate, $enddate);
        include_once 'views/accountView.php';
    }

    public function updateAccount()
    {
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') 
        {
            $username = $_POST['txtUsernameUpdate'];
            $ma_quyen=$_POST['ma_quyen'];
            $trang_thai = $_POST['trangthai'];
            $result = $this->accountModel->updateAccount($username,$ma_quyen,$trang_thai);
        
                    if ($result) 
                    {
                        echo'<script>alert("sửa tài khoản thành công")</script>';
                        // echo json_encode(array('status' => 1));
                    } else
                        echo'<script>alert("sửa tài khoản thất bại")</script>';
                        // echo json_encode(array('status' =>0));   
                

            }
            
    }
}
$action ='index';
if (isset($_GET['action'])){
    $action = $_GET['action'];
}else{
    $action = 'showAccountList';
}
$accountController = new AccountController();
switch ($action){
    case 'index':
        $accountController->showAccountList();
        break;
    case 'addAccount':
        $accountController->addAccount();
        // $accountController->showAccountList();
        break;
    case 'searchAccount':
        $accountController->searchAccount();
        // $accountController->showAccountList();
        break;
    case 'updateAccount':
        $accountController->updateAccount();
        $accountController->showAccountList();
        break;
    
    default:
        $accountController->showAccountList();
}
?>