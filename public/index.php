<?php session_start();
    include_once('../application/action/__autoload.php');
    include_once('../application/action/Function.php');
    include_once('../application/config/config.php');
    include ('../application/view/Header.php');
    if (isset($_GET['id'])) {
        include ('../application/view/Content.php');
    } else {
        // header('location:../application/view/HomePage.php');
        include ('../application/view/HomePage.php');
    }
    include ('../application/view/Footer.php');
?>