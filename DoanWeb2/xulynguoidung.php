<?php
    session_start();
    include 'ConnectionDB.php';
    $con = new ConnectionDB('');
    if(isset($_POST['user_act']))
    {
        $user_act = $_POST['user_act'];
        switch ($user_act)
        {
            case "update":
            {
                $id_nguoidung = $_SESSION['id_nguoidung'];
                $addr = $_POST['address'];
                $other_info = $_POST['other-info'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $sql = "Update nguoi_dung,khach_hang"
                      ." set nguoi_dung.mat_khau='$password',"
                      ." nguoi_dung.email='$email',"
                      ." khach_hang.dia_chi='$addr',"
                      ." khach_hang.thong_tin_khac='$other_info'"
                      ." where nguoi_dung.id_nguoidung=khach_hang.id_nguoidung"
                      ." and nguoi_dung.id_nguoidung='$id_nguoidung'";
                if($con->preparedExecuteDatabase($sql))
                {
                    $data = array("address" => $addr,"other-info" => $other_info,"email" => $email,"password" => $password,"msg"=>'');
                    echo json_encode($data);
                }
                else{
                    $data = array("msg" => 'Lỗi khi cập nhật thông tin');
                    echo json_encode($data);
                }
            }
            break;
        }
    }

