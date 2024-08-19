
<?php

include __DIR__ . "/../models/slideClientModel.php";
class Search
{
    private $searchModel;

    public function __construct()
    {
        $this->searchModel = new slideModel();
    }
    public function Search()
    {
        if(isset($_GET['btn'])){
            $textTimKiem = $_GET['textTimKiem'];
        }else{
            $textTimKiem ='';
        }
        $searchs = $this->searchModel->getSanPhamTimKiem($textTimKiem);
        $Loai = $this->searchModel->getLoai();
        $Sl = $this->searchModel->getSlTimKiem($textTimKiem);
        $TotalPage = $this->searchModel->getPageSanPhamTimKiem($textTimKiem);
        include __DIR__ . "/../views/search.php";
    }
    


}   

$action = 'index';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'Search';
}
$Searchs = new Search();
switch ($action) {
    case 'index':
        $Searchs->Search();
        break;
    default:
        $Searchs->Search();
}

?>
