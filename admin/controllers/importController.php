<?php
include_once("models/importModel.php");

class ImportController{
    private $importModel;

    public function __construct(){
        $this->importModel = new ImportModel();
    }
    public function showImportList(){
        $products = $this->importModel->getAllProductSelect();
        $suppliers = $this->importModel->getAllSupplierSelect();
        $importList = $this->importModel->getAllImportReceipt();
        include_once 'views/importView.php';
    }

    public function addImport()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ma_ncc = $_POST['ma_ncc'];
            $nguoiNhap = $_POST['nguoiNhap'];
            $result = $this->importModel->addImport($ma_ncc, $nguoiNhap);
            if ($result) {
               header("Location: index.php?ctrl=importController&action=showAddImportView");
            } else {
                echo "Thêm phiếu nhập không thành công.";
            }
        }
    }
    public function addImportDetail()
    {
            // Lấy thông tin chi tiết đơn nhập hàng từ form
            if ($_SERVER['REQUEST_METHOD'] == 'POST')
            {

                $ma_phieu=$_POST['ma_phieu_1'];
                $tt=$_POST['txtTrangthai'];
            $details = [];
            $i = 1;
            while (isset($_POST['ma_sp_' . $i])) {
                $detail['ma_sp'] = $_POST['ma_sp_' . $i];
                $detail['so_luong'] = $_POST['so_luong_' . $i];
                $detail['don_gia'] = $_POST['gia_nhap_' . $i];
                $details[] = $detail;
                $i++;
            }

            $result = $this->importModel->addImportDetail($ma_phieu,$details);

            if ($result) {
                header("Location: index.php?ctrl=importController&action=showImportDetail&id=$ma_phieu&tt=$tt");
            } else {
                echo "Thêm phiếu nhập kho không thành công.";
            }
        }
        }
    

    // public function showAddImportForm()
    // {
    //     $products = $this->importModel->getAllProductSelect();
    //     $suppliers = $this->importModel->getAllSupplierSelect();
    //     $importList = $this->importModel->getAllImportReceipt();
    //     include 'views/importView.php';
    // }

    public function showUpdateImportForm()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $suppliers = $this->importModel->getAllSupplierSelect();
            $importList = $this->importModel->getImportById($id);
            $nhacungcap=$this->importModel->getSupplyById($importList['ma_ncc']);
            include_once 'views/updateImport.php';
        }
    }

    public function updateImport()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ma_phieu = $_POST['txtMaphieuUpdate'];
            $ma_sp = $_POST['ma_spUpdate'];
            $so_luong = $_POST['txtSlUpdate'];
            $don_gia = $_POST['txtDongiaUpdate'];
            $so_luong_cu = $_POST['txtSlCu'];
            $don_gia_cu = $_POST['txtDongiaCu'];
            $result = $this->importModel->updateImport($ma_phieu, $ma_sp, $so_luong, $don_gia,$so_luong_cu,$don_gia_cu);

            if ($result) {
                echo "Cập nhật phiếu nhập kho thành công!";
            } else {
                echo "Cập nhật phiếu nhập kho không thành công.";
            }
        }
    }

    public function viewImportDetail()
    {
        $products = $this->importModel->getAllProductSelect();
        $suppliers = $this->importModel->getAllSupplierSelect();
        $importList = $this->importModel->getAllImportReceipt();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $tt= $_GET['tt'];
            $importdetaillist = $this->importModel->getImportDetailById($id);
            include_once 'views/ImportViewDetail.php';
        }
    }

    public function changeLock()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') 
        {
            $id=$_POST['ma_phieu'];
           $tt=1;
            $products = $this->importModel->getAllProductSelect();
            $suppliers = $this->importModel->getAllSupplierSelect();
            $importList = $this->importModel->getAllImportReceipt();
            $statusUpdate = $this->importModel->updateStatus($id,$tt);
            $importdetaillist = $this->importModel->getImportDetailById($id);
            include_once 'views/ImportViewDetail.php';
        }
    }

    public function deleteImportDetail()
    {
        if (isset($_GET['id'])) 
        {
            $id = $_GET['id'];
            $masp = $_GET['masp'];
            $sl = $_GET['sl'];
            $dg = $_GET['dg'];
            $deleteImportDetail = $this->importModel->deleteImportDetail($id,$masp,$sl,$dg);
        }
    }

    public function searchImport()
    {
        $item = $_GET['search'];
        $field = $_GET['field'];
        $startdate = $_GET['startdate'];
        $enddate = $_GET['enddate'];
        $giafrom = $_GET['giafrom'];
        $giato = $_GET['giato'];
        $importList = $this->importModel->findImportByFieldAndDateRange($field, $item, $startdate, $enddate,$giafrom,$giato);
        include_once 'views/importView.php';
    }

    public function searchImportDetail()
    {
        $item = $_GET['search'];
        $field = $_GET['field'];
        $soluongfrom = $_GET['soluongfrom'];
        $soluongto = $_GET['soluongto'];
        $giafrom = $_GET['giafrom'];
        $giato = $_GET['giato'];
        $importdetaillist = $this->importModel->findImportDetailByFieldAndDateRange($field, $item, $soluongfrom, $soluongto,$giafrom,$giato);
        include_once 'views/ImportViewDetail.php';
    }

    // public function showAddImportDetail()
    // {
    //     $products = $this->importModel->getAllProductSelect();
    //     $suppliers = $this->importModel->getAllSupplierSelect();
    //     $importList = $this->importModel->getAllImportReceipt();
    //     if (isset($_GET['id'])) {
    //         $id = $_GET['id'];
    //     }
    //     include 'views/addImportViewDetail.php';
    // }
}
$action ='index';
if (isset($_GET['action'])){
    $action = $_GET['action'];
}else{
    $action = 'showImportList';
}
$importController = new ImportController();
switch ($action){
    case 'index':
        $importController->showImportList();
        break;
 
    case 'showImportDetail':
        $importController->viewImportDetail();
        break;
    case 'addImportDetail':
        $importController->addImportDetail();
        break;
    case 'addImport':
        $importController->addImport();
        break;
    case 'updateImport':
        $importController->updateImport();
        $importController->viewImportDetail();
        break;
    case 'changelock':
        $importController->changeLock();
        $importController->viewImportDetail();
        break;
    case 'deleteImportDetail':
        $importController->deleteImportDetail();
        $importController->viewImportDetail();
        break;
    case 'searchImport':
        $importController->searchImport();
        break;
    case 'searchImportDetail':
        $importController->searchImportDetail();
        break;
    default:
        $importController->showImportList();
}
?>