<?php
    $user = $_POST['txtusername'];
    $pass = $_POST['txtpassword'];
    $connection = mysqli_connect("localhost","root","","qlydanhmuc");
    $sql = "select * from taikhoan where username='$user' and password='$pass'";
    $result = mysqli_query($connection, $sql);
    if(mysqli_num_rows($result)===1)
    {
        alert("Đăng nhập thành công");
        if(session_id()==='')
        session_start();
        $_SESSION["user"] = $user;
        header("Location: index.php");
    }
    else
    {
        echo 'Sai thông tin đăng nhập';
    }
//Solution 2:    $sql = "select * from taikhoan";
//    $result = mysqli_query($connection, $sql);
//    $passedLogin = false;
//    while ($row = mysqli_fetch_array($result)) {
//        if($row['username'] === $user && $row['password']===$pass)
//        {
//            $passedLogin = true;
//        }
//    }
//    if ($passedLogin) {
//    alert("Đăng nhập thành công");
//    }
//    else alert("Đăng nhập thất bại");
function alert($message)
{
    echo "<script>alert('$message');</script>";
}
