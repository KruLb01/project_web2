<?php session_start() ;
    if (!isset($_SESSION['user'])) {
        header("Location: ./templates/login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/css/style.css">
    <link rel="stylesheet" href="../static/css/all.css">
    <LINK REL="SHORTCUT ICON" HREF="./static/images/favicon.ico">
    <script src="static/js/script.js"></script>
    <script src="static/js/jquery-3.6.0.min.js"></script>
    <script>
        $.getScript('./static/js/jquery-script.js', function(data, status, j) {})
    </script>
    <title>Admin Dashboard</title>
</head>
<body onload="setNotification()">
    <!--Header include here-->
    <?php require_once('./templates/header.php') ?>

    <!--Dashboard & Content Area here-->
    <div class="dashboard">
        <div class="menu-dashboard">
            <div class="logo-dashboard">
                <img src="static/images/logo-doc-trans.png" alt="logo-dashboard">
            </div>
            <ul class="dashboard-menu-items">
                <li id='menu-1' onclick="minimizieSubmenu(this.id)"><a class="bold-title"><i class="fas fa-users" style="padding-right: 8px;"></i>Manage Users</a></li>
                <ul class="dashboard-submenu-items" id='submenu-1'>
                    <li><a>Manage Customers</a></li>
                    <li><a>Manage Employees</a></li>
                    <li><a>Analyst User</a></li>
                </ul>
                <li id='menu-2' onclick="minimizieSubmenu(this.id)"><a class="bold-title"><i class="fas fa-cubes" style="padding-right: 8px;"></i>Manage Products</a></li>
                <ul class="dashboard-submenu-items" id='submenu-2'>
                    <li><a>Manage Products</a></li>
                    <li><a>Analyst Products</a></li>
                </ul>
                <li id='menu-3' onclick="minimizieSubmenu(this.id)"><a class="bold-title"><i class="fas fa-receipt" style="padding-right: 10px;padding-left:4px"></i>Manage Revenue</a></li>
                <ul class="dashboard-submenu-items" id='submenu-3'>
                    <li><a>Track invoices</a></li>
                    <li><a>Analyst Profits</a></li>
                    <li><a>Analyst</a></li>
                </ul>
                <li id='menu-4' onclick="minimizieSubmenu(this.id)"><a class="bold-title"><i class="fas fa-money-bill-alt" style="padding-right: 8px;"></i>Manage Sales</a></li>
                <ul class="dashboard-submenu-items" id='submenu-4'>
                    <li><a>Create Sales</a></li>
                    <li><a>Track Sales</a></li>
                    <li><a>Analyst Sales</a></li>
                </ul>
                <li><a class="bold-title"><i class="fas fa-chart-line" style="padding-right: 10px;"></i>Activity</a></li>
                <li><a class="bold-title"><i class="fas fa-mail-bulk" style="padding-right: 8px;"></i>Mail</a></li>
                <li><a class="bold-title"><i class="fas fa-question"  style="padding-right: 14px;"></i>Helps</a></li>
                <li class='logout-btn'><a class="bold-title"><i class="fas fa-sign-out-alt"  style="padding-right: 10px;"></i>Log out</a></li>
                <div class="space"></div>
            </ul>
        </div>

        <div class="content-dashboard">
            <?php include('./templates/controller.php') ?>
        </div>
    </div>
</body>
</html>

<!-- foreach ($_SESSION['user'] as $key=>$val)
{echo $key." ".$val."<br/>";} -->