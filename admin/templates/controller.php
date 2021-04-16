<?php
    // session_start();
    $flag = false;

    // include('view-info-user.php');

    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        if ($action == 'logout') {
            unset($_SESSION['user']);
            $flag = true;
        } else if ($action == 'view-info-user') {
            echo '12342345';
            include('view-info-user.php');
        }
    } else include('default-content.php');
    echo $flag;
?>