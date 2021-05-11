    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Table Khách hàng</title>
    </head>
    <body>
        <?php 
        if(isset($_POST['hoten'])){
            $con = mysqli_connect("localhost","root","");
            if(!$con){
                die('Could not database' .mysqli_error($con));
            }
            mysqli_select_db($con,"do_an_web2-1");
            $sql = "INSERT INTO khach_hang(`ho_ten`,`dia_chi`,`thong_tin_khac`)
            VALUES('$_POST[hoten]','$_POST[diachi]','$_POST[thongtinkhac]')";
            
            if(!mysqli_query($con,$sql))
            {
                die('Error : ' .mysqli_error($con));
            }

            $sql1 = "INSERT INTO  nguoi_dung(`tai_khoan`,`email`,`mat_khau`,`so_dien_thoai`,quyen) 
            VALUES ('$_POST[tendangnhap]','$_POST[email]','$_POST[password]','$_POST[sodienthoai]','customer')";
            
            if(!mysqli_query($con,$sql1)){
                die('Error : ' .mysqli_error($con));
            }
            
            echo 'Đăng ký thành công';
            mysqli_close($con);
        }
        ?>

        <form action="" method="POST">
        Họ tên : <input type="text" name="hoten"/><br/>
        Địa chỉ : <input type="text" name="diachi"/><br/>
        Số điện thoại : <input type="text" name="sodienthoai"/><br/>
        Thông tin khác : <input type="text" name="thongtinkhac"><br/>
        Tên đăng nhập: <input type="text" name="tendangnhap"/><br/>  
        Email : <input type="email" name="email"/><br/>
        Mật khẩu : <input type="password" name="password"/><br/>   
        <input type="submit" value="Đăng ký"/>
        </form>
    </body>
    </html>