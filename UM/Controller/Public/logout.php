<?php
    session_start();
    unset($_SESSION['flag']);
    header('location:../../Resources/view/Public/login.php');
    
?>