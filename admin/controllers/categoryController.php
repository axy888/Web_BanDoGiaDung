<?php
include_once "models/categoryModel.php" ;

class CategoryController
{
    private $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
    }

    public function showCategoryList()
    {
        $categories = $this->categoryModel->getAllCategories();
        include_once 'views/categoryView.php';
    }


    public function showAddCategoryForm()
    {
        include_once 'views/categoryView.php';
    }


    public function addCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten = $_POST['ten'];
            $result = $this->categoryModel->createCategory($ten);

            if ($result) {
                echo "Thêm danh mục sản phẩm thành công!";
            } else {
                echo "Thêm danh mục sản phẩm không thành công.";
            }
        }
    }

    public function deleteCategory()
    {
        if (isset($_GET['id'])) {
            $category_id = $_GET['id'];
            $result = $this->categoryModel->deleteCategory($category_id);
            if ($result) {
                echo "<script>alert('Đã xóa danh mục này!');</script>";
            }
            else{echo "<script>alert('Tồn tại sản phẩm thuộc loại này, Không thể xóa!');</script>";}
        }
    }

    public function showUpdateCategoryForm()
    {
        if (isset($_GET['id'])) {
            $category_id = $_GET['id'];
            $category = $this->categoryModel->getCategoryById($category_id);
            include_once 'views/updateCategory.php';
        }
    }

    public function updateCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $category_id = $_POST['category_id'];
            $ten = $_POST['ten_loai'];
            $result = $this->categoryModel->updateCategory($category_id, $ten);

            if ($result) {
                echo "<script>alert('Cập nhật thành công!');</script>";
            }
            else{echo "<script>alert('Cập nhật không thành công!');</script>";}
        }
    }
    public function searchCategory(){
        $data = $_GET['search'];
        $categories = $this->categoryModel->searchCategory($data);
        include_once "views/categoryView.php";
    }
}

$action = 'index';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'showCategoryList';
}

$categoryController = new CategoryController();
switch ($action) {
    case 'index':
        $categoryController->showCategoryList();
        break;
    
    case 'addCategory':
        $categoryController->addCategory();
        break;
    case 'deleteCategory':
        $categoryController->deleteCategory();
        $categoryController->showCategoryList();
        break;
    case 'updateCategoryView':
        $categoryController->showUpdateCategoryForm();
        break;
    case 'updateCategory':
        $categoryController->updateCategory();
        break;
    case 'searchCategory':
        $categoryController->searchCategory();
    default:
        $categoryController->showCategoryList();
}
?>
