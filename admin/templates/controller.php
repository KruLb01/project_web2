<?php
    $flag = false;

    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        if ($action == 'logout') {
            session_start();
            unset($_SESSION['user']);
            $flag = true;
        } else if ($action == 'view-info-user') {
            include('view-info-user.php');
        } else if ($action == 'change-password') {
            include('change-password.php');
        } else if ($action == 'manage-permission') {
            include('manage-permission.php');
        } else if ($action == 'manage-products') {
            include('manage-products.php');
        } else if ($action == 'manage-employee') {
            include('manage-employee.php');
        }else if ($action == 'manage-customers') {
            include('manage-customer.php');
        }

    } else include('default-content.php');
    echo $flag;
?>