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
        }
    } else include('default-content.php');
    echo $flag;
?>