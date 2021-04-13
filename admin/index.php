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
    <title>Admin Dashboard</title>
</head>
<body onload="setNotification()">
    <div class="header disable-copy">
        <span>Dashboard</span>
        <i class="fas fa-bars" onclick="minimizeMenubar()"></i>
        <div class="header-user">
            <div class="header-function-user">
                <i class="fas fa-search" style="color: #98b5ff;background-color:#ecf4ff" onclick="showFunctionSearch()"></i>
                <!-- <div class="header-notification"></div> -->
                <div id="header-search-user-container">
                    <input type="text" id='header-search-user'>
                    <i class="fas fa-times" style="margin-right: 15px;color: red;background-color:rgb(255, 187, 187)"
                    onclick="document.getElementById('header-search-user').value='';document.getElementById('header-search-user-container').style = 'transform: translateY(-90px);transition:1s';"></i>
                </div>
                <i class="fas fa-comments" style="color: rgb(255, 187, 0);background-color:rgb(255, 255, 179)"></i>
                <div class="header-notification" style="left: 100px;"></div>
                <i class="fas fa-bell" style="margin-right: 15px;color: red;background-color:rgb(255, 187, 187)"></i>
                <div class="header-notification" style="left: 160px;"></div>
                <div class="straight-line"></div>
            </div>
            <div class="avatar">
                <img src="static/images/logo-user.jpg" alt="logo-user">
            </div>
            <div class="header-info-user">
                <span>David Heros</span>
                <span style="color:rgb(184, 184, 184)">Admin</span>
            </div>
            <div class="header-show-user">
                <i class="fas fa-chevron-down" onclick="showDetailUser()"></i>
                <div class="header-detail-user">
                    <ul>
                        <li><a style="margin-left: 0px;">            
                            <div class="header-function-user" style="justify-content: left;">
                                <div class="avatar">
                                    <img src="static/images/logo-user.jpg" alt="logo-user">
                                </div>
                                <div class="header-info-user">
                                    <span>David Heros</span>
                                    <span style="color:rgb(226, 224, 224)">View your information</span>
                                </div>
                            </div>
                        </a></li>
                        <li><a>View me</a></li>
                        <li><a>Setting</a></li>
                        <li><a>Log out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="dashboard">
        <div class="menu-dashboard">
            <div class="logo-dashboard">
                <img src="static/images/logo-doc-trans.png" alt="logo-dashboard">
            </div>
            <ul class="dashboard-menu-items">
                <li><a class="bold-title"><i class="fas fa-users" style="padding-right: 8px;"></i>Manage Users</a></li>
                <div class="straight-long-line"></div>
                <ul class="dashboard-submenu-items">
                    <li><a>Manage Customers</a></li>
                    <li><a>Manage Employees</a></li>
                    <li><a>Analyst User</a></li>
                </ul>
                <li><a class="bold-title"><i class="fas fa-cubes" style="padding-right: 8px;"></i>Manage Products</a></li>
                <div class="straight-long-line"></div>
                <ul class="dashboard-submenu-items">
                    <li><a>Manage Products</a></li>
                    <li><a>Manage :"> </a></li>
                    <li><a>Analyst Products</a></li>
                </ul>
                <li><a class="bold-title"><i class="fas fa-receipt" style="padding-right: 8px;"></i>Manage Revenue</a></li>
                <div class="straight-long-line"></div>
                <ul class="dashboard-submenu-items">
                    <li><a>Track invoices</a></li>
                    <li><a>Analyst Profits</a></li>
                    <li><a>Analyst Products</a></li>
                </ul>
                <li><a>Menu Items</a></li>
                <li><a>Menu Items</a></li>
                <li><a>Menu Items</a></li>
                <li><a>Menu Items</a></li>
                <li><a>Menu Items</a></li>
            </ul>
        </div>

        <div class="content-dashboard">

        </div>
    </div>
</body>
</html>