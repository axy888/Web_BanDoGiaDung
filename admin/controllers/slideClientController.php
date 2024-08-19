<meta charset="UTF-8">
<html lang="en">
<?php

include __DIR__ . "/../models/slideClientModel.php";
class slideController
{
    private $slideModel;
    private $slideDetailModel; 

    public function __construct()
    {
        $this->slideModel = new slideModel();
        $this->slideDetailModel = new slideModel();
    }

    public function showSlidelList()
    {
        $slides = $this->slideModel->getAllslide();
        $slideDetails = $this->slideDetailModel->getAllslideDetail();
        include __DIR__ . "/../views/slideClientView.php";
    }
    public function showSlidel()
    {
        $slidesa = $this->slideModel->getSlideProduct();
        include __DIR__ . "/../views/slideClientView.php";
    }
    public function Search()
    {
        $searchs = $this->slideModel->getsanPham();
        include __DIR__ . "/../views/search.php";
    }

    public function showDetailSlidel()
    {
        if(isset($_GET['maSlide'])){
            $ma=$_GET['maSlide'];
        }else{
            $ma=1;
        }
        $maLoai="";
        if(isset($_GET['maLoai'])){
            $maLoai=$_GET['maLoai'];
        }
        if(isset($_POST['page'])){
            $page = $_POST['page'];
        }
        else{
            $page = 1;
        }
        $TotalPageAll =$this->slideModel->getPageAll();
        $TotalPageAllsxBC =$this->slideModel->getPageAllsxBC();
        $SanPham = $this->slideModel->getSP($page);
        $SanPhamandSx = $this->slideModel->getSPandSX();
        $SanPhamandSxTtc = $this->slideModel->getSPandSXttc();
        $SanPhamandSxBanChay = $this->slideModel->getSPandSXBanChay();
        $Loai = $this->slideModel->getLoai();
        $slidetail = $this->slideModel->getSlideDetail($ma);
        $slidetailandSX = $this->slideModel->getSlideDetailandSX($ma);
        $slidetailandSXTtc = $this->slideModel->getSlideDetailandSxTtc($ma);
        $slidetailandSXTbc = $this->slideModel->getSlideDetailandSXbc($ma);
        $TotalPage = $this->slideModel->getPage($ma);
        $TotalPageSxBc = $this->slideModel->getPageSxBc($ma);
        $SanPhambyMaLoai =$this->slideModel->getSPbyMaLoai($maLoai);
        $SanPhambyMaLoaiandSX =$this->slideModel->getSPbyMaLoaiandSx($maLoai);
        $SanPhambyMaLoaiandSXTtc =$this->slideModel->getSPbyMaLoaiandSxTtc($maLoai);
        $SanPhambyMaLoaiandSXTbc =$this->slideModel->getSPbyMaLoaiandSxbc($maLoai);
        $TotalPageByMaLoai = $this->slideModel->getPagebyMaLoai($maLoai);
        $TotalPageByMaLoaiSxBC = $this->slideModel->getPagebyMaLoaiSxBc($maLoai);
        $spGiaCaoXuongThap = $this->slideModel->getSpGiaTuCaoXuongThap();
        include __DIR__ . "/../views/ctSlideHang.php";
    }

}   

$action = 'index';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'showSlidel';
}
$slideController = new slideController();
switch ($action) {
    case 'index':
        $slideController->showSlidel();
        break;
    case 'DetaiSlidel':
        $slideController->showDetailSlidel();
        break;
    default:
        $slideController->showSlidel();
}

?>
