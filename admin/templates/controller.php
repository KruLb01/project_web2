<?php
    session_start();
    $flag = false;
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        if ($action == 'logout') {
            unset($_SESSION['user']);
            $flag = true;
        } else if ($action == '') {
            include('./default-content.php');
        } else if ($action == 'view-info-user') {
            include('./view-info-user.php');
        }
    }
    echo $flag;
?>