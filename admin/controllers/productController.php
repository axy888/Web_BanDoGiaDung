<?php
include_once "models/productModel.php" ;
class ProductController
{
    private $productModel;
    private $productlist;
    private $categoryModel;
    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->productlist = $this->productModel->getAllProducts();
    }
    public function getList(){
        return $this->productlist;
    }
    public function showProductList()
    {   
        
        $products = $this->productModel->getAllProducts();
        $categories = $this->productModel->getListCategory();
        foreach ($products as $key => $product) {
            if ($product["trang_thai"] == "off"){
                unset($products[$key]);
            }
        }
        include_once 'views/productView.php';
    }
    public function getProductByID($id){
        foreach($this->productlist as $product){
            if($product['ma_sp'] == $id){
                return $product;
            }
        }
    }
    public function showAddProductView()
    {
        $categories = $this->productModel->getListCategory();
        include_once 'views/addProductView.php';
    }

    public function addProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten = $_POST['ten'];
            $iddanhmuc = $_POST['id_danh_muc'];
            echo $iddanhmuc = $_POST['id_danh_muc'];
            $anh = $_POST['anh'];
            $gia = $_POST['gia'];
            $mota=$_POST['mota'];
            $mausac= $_POST['mausac'];
            $xuatxu=$_POST['xuatxu'];
            $thuonghieu=$_POST['thuonghieu'];

            $result = $this->productModel->addProduct($iddanhmuc,$ten,$gia,$mota,$mausac,$xuatxu,$thuonghieu,$anh);

            if ($result) {
                echo "Thêm sản phẩm thành công!";
            } else {
                echo "Thêm sản phẩm không thành công.";
            }
        }
    }

    public function deleteProduct()
    {
        if (isset($_GET['id'])) {
            $productID = $_GET['id'];
            $result = $this->productModel->deleteProduct($productID);
        }
    }

    public function showUpdateProductForm()
    {
        if (isset($_GET['id'])) {
            $product_id = $_GET['id'];
            $categories = $this->productModel->getListCategory();
            $product = $this->productModel->getProductByID($product_id);
            include_once 'views/updateProduct.php';
        }
    }
    public function searchProducts(){
        
        $item = $_GET['search'];
        $field = $_GET['field'];
        
        $products = $this->productModel->findProductByField($field,$item);
        foreach ($products as $key => $product) {
            if ($product["trang_thai"] == "off"){
                unset($products[$key]);
            }
        }
        include_once 'views/productView.php';
    }
    public function updateProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $product_id = $_POST['ma_sp'];
            $sp = $this->productModel->getProductByID($product_id);
            $the_loai = $_POST['the_loai'];
            $ten_sp = $_POST['ten_sp'];
            $don_gia = $_POST['don_gia'];
            $mo_ta = $_POST['mo_ta'];
            $mau_sac = $_POST['mau_sac'];
            $thuong_hieu = $_POST['thuong_hieu'];
            $xuat_xu = $_POST['xuat_xu'];
            $hinh = $_POST['hinh'];
            if ($hinh == ""){
                $hinh = $sp['hinh'];
            }
            $result = $this->productModel->updateProduct($product_id,$the_loai,$ten_sp,$don_gia,$mo_ta,$mau_sac,$xuat_xu,$thuong_hieu,$hinh);

            if ($result) {
                echo "<script>alert('Cập nhật thành công!');</script>";
            } else {
                echo "<script>alert('Cập nhật không thành công!');</script>";
            }
        }
    }
}

$action = 'index';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'showProductList';
}

$productController = new ProductController();
switch ($action) {
    case 'index':
        $productController->showProductList();
        break;
    case 'viewAddProduct':
        $productController->showAddProductView();
        break;
    case 'addProduct':
        $productController->addProduct();
        break;
    case 'deleteProduct':
        $productController->deleteProduct();
        break;
    case 'showUpdateProductForm':
        $productController->showUpdateProductForm();
        break;
    case 'updateProduct':
        $productController->updateProduct();
        $productController->showProductList();
        break;
    case 'searchProducts':
        $productController->searchProducts();
    default:
        $productController->showProductList();
}
?>
