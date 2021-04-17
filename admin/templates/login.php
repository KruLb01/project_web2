<?php session_start();
    if (isset($_SESSION['user'])) {
        header("Location: ../index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/css/style.css">
    <LINK REL="SHORTCUT ICON" HREF="../static/images/favicon.ico">
    <title>Login Admin</title>
</head>
<body>
    <div class="login">
        <div class="login-container">
            <div class="logo">
                <img src="../static/images/logo-doc-trans.png" alt="logo">
            </div>

            <div class="content-login">
                <form action='login.php' method='post' onsubmit='return validateLogin()'>
                    <span>Username<input type="text" name='username' value='<?php if(isset($_POST['username'])) echo $_POST['username'] ?>'></span>
                    <span>Password  <input type="password" name='password' value='<?php if(isset($_POST['username'])) echo $_POST['password'] ?>'></span>
                    <a class="error">Error print here</a>
                    <div class="submit-container">
                        <button type='submit'>Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<script>
    function validateLogin() {
        let username = document.getElementsByName("username")[0].value;
        let password = document.getElementsByName("password")[0].value;
        if (username == "" || password == "") {
            document.getElementsByClassName('error')[0].innerHTML = 'Vui lòng nhập vào username và password'
            document.getElementsByClassName('error')[0].style = 'display:block;';
        } else {
            return true;
        }
        return false;
    }
</script>

<?php
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $user = $_POST['username'];
        $pass = md5($_POST['password']);

        echo ($pass);

        include('./connectData.php');
        $conn = new connectData();

        $sql = "select * from nguoi_dung, admin where nguoi_dung.id_nguoidung = admin.id_nguoidung and nguoi_dung.tai_khoan = rtrim('" . $user . "')";
        $res = $conn->selectData($sql);
        while ($row = mysqli_fetch_array($res)) {
            if ($row['tai_khoan'] == $user && $row['mat_khau'] == $pass) {
                echo "<script>
                    document.getElementsByClassName('error')[0].style = 'display:none;
                </script>";
                
                $_SESSION['user']['id'] = $row['id_nguoidung'];
                $_SESSION['user']['username'] = $row['tai_khoan'];
                $_SESSION['user']['pass'] = $row['mat_khau'];
                $_SESSION['user']['email'] = $row['email'];
                $_SESSION['user']['phone'] = $row['so_dien_thoai'];
                $_SESSION['user']['permission'] = strtoupper($row['quyen'][0]) . strtolower(substr($row['quyen'],1));
                $_SESSION['user']['status'] = $row['tinh_trang_taikhoan'];
                $_SESSION['user']['name'] = $row['ho_ten'];
                $_SESSION['user']['other'] = $row['thong_tin_khac'];

                header("Location: ../index.php");
            }
        }
        echo "<script>             
            document.getElementsByClassName('error')[0].innerHTML = 'Tài khoản hoặc mật khẩu không đúng !'
            document.getElementsByClassName('error')[0].style = 'display:block;'; 
        </script>";
    }
?>

