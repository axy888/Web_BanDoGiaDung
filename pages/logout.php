<?php
session_start();
session_destroy();
header("Location: http://localhost/DoVoDung/trangchu.php"); // Redirect to the login page or any other page
exit();
?>