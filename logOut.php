<?php
    session_start();
    unset($_SESSION['custid']);
    session_destroy();
    header('Location: cust_login.php');
?>