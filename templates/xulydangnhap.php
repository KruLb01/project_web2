<?php
    include 'ConnectionDB.php';
    if(isset($_POST['username']) && isset($_POST['password']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $conn = new ConnectionDB('');
        $sql = "select * from nguoi_dung, khach_hang where nguoi_dung.id_nguoidung = khach_hang.id_nguoidung and nguoi_dung.tai_khoan = '$username'";        
        $res = $conn->preparedSelect($sql);
        if($res!==null){
            // session_start();
            // $row = mysqli_fetch_array($conn->preparedSelect($sql));
            // $_SESSION['id_nguoidung'] = $row[0];
            // $_SESSION['hoten'] = $row[1];

            $check = false;

            while ($row = mysqli_fetch_array($res)) {
                if (md5($password)==$row['mat_khau']) {
                    $check = true;
                    session_start();
                    $_SESSION['customer']['id'] = $row['id_nguoidung'];
                    $_SESSION['customer']['ho_ten'] = $row['ho_ten'];
                    $_SESSION['customer']['email'] = $row['email'];
                    $_SESSION['customer']['sdt'] = $row['so_dien_thoai'];
                    $_SESSION['customer']['dia_chi'] = $row['dia_chi'];
                    $_SESSION['customer']['thongtin_khac'] = $row['thong_tin_khac'];

                    echo 'success';
                    break;
                }
            }

            if (!$check) echo 'failed';
        }
        else
        {
            // $data['passedLogin']=false;
            // echo json_encode($data);
            echo 'failed';
        }
    }
?>
