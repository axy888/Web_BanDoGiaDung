<?php
include_once ("models/statsModel.php");


class statsController
{
    private $statsModel;

    public function __construct(){
        $this->statsModel = new statsModel();
    }
    public function showStats(){
        $stats = $this->statsModel->getStats();
        $statsDate = $this->statsModel->getStatsByDate();
        include_once 'views/statsView.php';
    }
    public function searchStats(){
        $data = $_GET['thongkenam'];
        $stats = $this->statsModel->getStats();
        $statsDate = $this->statsModel->getStatsByDate();
        $yearstats = $this->statsModel->getStatsByYear($data);
        include_once "views/statsView.php";
    }

}

$action = 'index';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else{
    $action = 'showStats';
}
$statsController = new statsController();
switch ($action) {
    case 'index':
        $statsController->showStats();
        break;
    
    case 'searchStats':
        $statsController->searchStats();

    default:
        $statsController->showStats();
}
