<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HKP Store - View info customer</title>
    <LINK REL="SHORTCUT ICON" HREF="../static/img/logo/favicon.ico">
    <script src="../static/js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../static/css/style.css">
    <link rel="stylesheet" href="../static/css/all.css">
</head>
<body>
    <?php
        include('header.php');
        echo $_SESSION['customer']['id'];
    ?>
    <div class="view-info-cus">
        <span id='view-info-cus-title'>View information</span>
        <form id='form-user'>
            <span>Username: <input type="text" name='username'></span>
            <span class="error"></span>
            <span>Email: <input type="text" name='email'></span>
            <span class="error"></span>
            <span>Phone: <input type="text" name='phone'></span>
            <span class="error"></span>
            <span>Address: <input type="text" name='address'></span>
            <span class="error"></span>
            <span>Other information: <input type="text" name='other'></span>
            <button id='submit-btn'>Submit</button>
        </form>
    </div>
</body>
</html>

<script>
    console.log($('#form-user').serialize());
</script>