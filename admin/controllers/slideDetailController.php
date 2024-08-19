<?php
include_once("models/SlideDetailModel.php");
class SlideDetailController{
    private $sdModel;

    public function __construct(){
        $this->sdModel = new SlideModel();
    }
    public function viewSlideDetail(){
        if (isset($_GET['id'])){
            $id= $_GET['id'];
            $slideDetails = $this->sdModel->getSlideDetailByID($id);
            include_once('views/slideDetailView.php');
        }
    }
}
$action ='index';

if (isset($_GET['action'])){
    $action = $_GET['action'];
}else{
    $action = 'viewSlideDetail';
}
$sdController = new SlideDetailController();
switch ($action){
    case 'index':
        $sdController->viewSlideDetail();
        break;
    default:
        $sdController->viewSlideDetail();
}

?>