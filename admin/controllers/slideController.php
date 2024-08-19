<?php
include_once("models/slideModel.php");
class SlideController{
    private $slideModel;

    public function __construct(){
        $this->slideModel = new SlideModel();
    }
    public function showSlideList(){
        $slides = $this->slideModel->getAllSlide();
        include_once 'views/slideView.php';
    }
    public function viewSlideDetail(){
        if (isset($_GET['id'])){
            $id = $_GET['id'];
            $slideDetails = $this->slideModel->getSlideDetailByID($id);
            $sanphams = $this->slideModel->getDSSP();

            include_once("views/slideDetailView.php");

        }
    }
    public function addSlideDetail()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['maslide'];
        $masp = $_POST['masp'];

        // Sanitize input values (e.g., use prepared statements)

        $slideDetails = $this->slideModel->getSlideDetailByID($id);
        $allsp = $this->slideModel->getAllSP();
        foreach($allsp as $sp){
            if ($sp['ma_sp'] == $masp){
                foreach ($slideDetails as $slideDetail) {
                    if ($slideDetail['slide_id'] === $id && $slideDetail['ma_sp'] === $masp) {
                        // Existing product found
                        echo'<script>alert("Sản phẩm đã tồn tại trong slide")</script>';
                        return; // Exit early
                    }
                }
                $result = $this->slideModel->addSlideDetail($id,$masp);
                if ($result){
                    echo'<script>alert("Thêm sản phẩm vào slide thành công")</script>';
                    return;
                }
            }
        }
        echo'<script>alert("Không tồn tại mã sản phẩm này")</script>';
        
        // Save the data to the database (if not already existing)
        // ...

        // Return a success response if data saved

    }
    
    }
    public function deleteProductInSlide(){
        $id = $_GET['idxoa'];
        $masp = $_GET['maspxoa'];

        $this->slideModel->deleteSlideDetail($id,$masp);
    }
    public function deleteSlide(){
        $id = $_GET['slidexoa'];
        $this->slideModel->deleteSlide($id);

    }
    public function addSlide (){
        $slidename = $_POST['tenslide'];
        $this->slideModel->addSlide($slidename);
    }

}
$action ='index';

if (isset($_GET['action'])){
    $action = $_GET['action'];
}else{
    $action = 'showSlideList';
}
$slideController = new SlideController();
switch ($action){
    case 'index':
        $slideController->showSlideList();
        break;
    case 'showSlideList':
        $slideController->showSlideList();
        break;
    case 'viewSlideDetail':
        $slideController->viewSlideDetail();
        $slideController->showSlideList();
        break;
    case 'addSlideDetail':
        $slideController->addSlideDetail();
        
        break;
    case 'deleteProductInSlide':
        $slideController->deleteProductInSlide();
        $slideController->showSlideList();
        break;
    case 'deleteSlide':
        $slideController->deleteSlide();
        $slideController->showSlideList();
        break;
    case 'addSlide':
        $slideController->addSlide();
        $slideController->showSlideList();
        break;
    default:
        $slideController->showSlideList();
}

?>