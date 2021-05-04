<?php 
// mk là 1
if(isset($_GET['username']) && isset($_GET['email']) && $_GET['phone'] && $_GET['address'] && $_GET['other'] ){
    include('ConnectionDB.php');
    $conn = new ConnectionDB('');
    session_start();


    $name = $_GET['username'];
    $mail = $_GET['email'];
    $tel = $_GET['phone'];
    $add = $_GET['address'];
    $oth = $_GET['other'];
    

    $sql = "UPDATE khach_hang SET ho_ten = N'$name' , dia_chi = N'$add' , thong_tin_khac = N'$oth' WHERE id_nguoidung = '".$_SESSION['customer']['id'] ."'";
   
    
    $ketqua = $conn->executesql($sql);
    if($ketqua == true){
         $sql = "UPDATE nguoi_dung SET so_dien_thoai = '$tel' , email = '$mail' WHERE id_nguoidung = '".$_SESSION['customer']['id'] ."'";
         $ketqua = $conn->executesql($sql);
         if($ketqua == true){
            $_SESSION['customer']['ho_ten'] =  $name;
            $_SESSION['customer']['email'] = $mail;
            $_SESSION['customer']['sdt'] = $tel;
            $_SESSION['customer']['dia_chi'] = $add;
            $_SESSION['customer']['thongtin_khac'] = $oth;
             echo 'true';
         }else{
             echo 'false';
         }
    }else{
        echo 'false';
    }
}

if(isset($_POST['old-pass']) && isset($_POST['new-pass'])){
    include('ConnectionDB.php');
    $conn = new ConnectionDB('');
    session_start();
    
    $old_pass = $_POST['old-pass'];
    $new_pass = md5($_POST['new-pass']);


    $sql = " SELECT mat_khau FROM nguoi_dung WHERE id_nguoidung = '".$_SESSION['customer']['id'] ."'";
    $ketqua = mysqli_fetch_array($conn->preparedSelect($sql))['mat_khau'];

   if($ketqua == md5($old_pass)){
       $sql = "UPDATE nguoi_dung SET mat_khau = '$new_pass' WHERE id_nguoidung = '".$_SESSION['customer']['id'] ."'";
        $chay_lenh = $conn->executesql($sql);
        if($chay_lenh == true ){
            echo 'true';
        }else{
            echo 'false';
        }
   }else{
       echo 'óc chó';
   }

}
?>