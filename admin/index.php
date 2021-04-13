<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/css/style.css">
    <link rel="stylesheet" href="../static/css/all.css">
    <script src="static/js/script.js"></script>
    <title>Admin Dashboard</title>
</head>
<body>
    <div class="header disable-copy">
        <span>Dashboard</span>
        <i class="fas fa-bars" onclick="minimizeMenubar()"></i>
        <div class="header-user">
            <div class="header-function-user">
                <i class="fas fa-search" style="color: #98b5ff;background-color:#ecf4ff" onclick="showFunctionSearch()"></i>
                <div id="header-search-user-container">
                    <input type="text" id='header-search-user'>
                    <i class="fas fa-times" style="margin-right: 15px;color: red;background-color:rgb(255, 187, 187)"
                    onclick="document.getElementById('header-search-user').value='';document.getElementById('header-search-user-container').style = 'transform: translateY(-90px);transition:1s';"></i>
                </div>
                <i class="fas fa-comments" style="color: rgb(255, 187, 0);background-color:rgb(255, 255, 179)"></i>
                <i class="fas fa-bell" style="margin-right: 15px;color: red;background-color:rgb(255, 187, 187)"></i>
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
                <i class="fas fa-chevron-down"></i>
            </div>
        </div>
    </div>
    <div class="dashboard">
        <div class="menu-dashboard">
            <div class="logo-dashboard">
                <img src="static/images/logo-doc-trans.png" alt="logo-dashboard">
            </div>
            <ul class="dashboard-menu-items">
                <li><a>Menu Items</a></li>
                <li><a>Menu Items</a></li>
                <li><a>Menu Items</a></li>
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