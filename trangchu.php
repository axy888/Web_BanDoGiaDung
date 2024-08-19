<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DoVoDung</title>
    <link rel="stylesheet" href="css/headerGioiThieu.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="icon" href="admin/images/DOVODUNG.png" type="image/png" sizes="32x32">

    <link rel="stylesheet" href="css/trangchu.css">
    <link rel="stylesheet" href="css/dangnhap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/ajax.js"></script>
</head>
<body>

<?php

    require("pages/headerGioiThieu.php");
    if (isset($_GET['ctrl'])) {
        $ctrl = $_GET['ctrl'];
        include 'pages/' . $ctrl . '.php';
    }elseif (isset($_GET['vtr'])) {
        $vtr = $_GET['vtr'];
        include __DIR__.'/admin/controllers/' . $vtr . '.php'; 
    }else
        require("pages/bodyGioiThieu.php");
    require("pages/footerGioiThieu.php");
    ?>
    

<!-- <script src="./js/gioiThieu.js"></script> -->
<script src="./js/huu2.js"></script>
<script src="./js/huu8.js"></script>


</body>
</html>
