<?php
    $masv = $_GET['masv'];
    $hoten = $_GET['hoten'];
    $email = $_GET['email'];
    $sdt = $_GET['sodienthoai'];
    $connection = mysqli_connect("localhost","root","");
    mysqli_select_db($connection, "qlydanhmuc");
    $strQuery = "insert into sinhvien(masv,hotensv,email,sodienthoai) values ('$masv','$hoten','$email','$sdt')";
    $result = mysqli_query($connection, $strQuery);
    if($result)
    {
        echo 'Dang ky thanh cong';
    }
    else
    {
        die(mysqli_error($connection));
    }


