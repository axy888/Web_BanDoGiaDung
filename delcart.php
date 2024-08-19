<?php

session_start();
    if(isset($_SESSION['giohang'])){
        if(isset($_GET['delMasp'])&& $_GET['delMasp']>0){
            array_splice($_SESSION['giohang'],$_GET['delMasp']-1,1);
            header("Location: {$_SERVER['HTTP_REFERER']}");
        }
            if (empty($_SESSION['giohang'])) {
                header("Location: trangchu.php?vtr=slideClientController"); // Chuyển hướng đến trang kahcs
            }
        }
    
?>
