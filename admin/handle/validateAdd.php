<?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        if (isset($_GET['id'])) $id = $_GET['id'];

        include('../templates/connectData.php');
        $conn = new connectData('');

        if ($page == 'employee') {
            $res = $conn->selectData("select * from admin, nguoi_dung 
                                    where admin.id_nguoidung = nguoi_dung.id_nguoidung
                                    and admin.id_nguoidung = '$id'");
        }

        if ($page == 'customer') {
            $res = $conn->selectData("select * from khach_hang, nguoi_dung 
                                    where khach_hang.id_nguoidung = nguoi_dung.id_nguoidung
                                    and khach_hang.id_nguoidung = '$id'");
        }

        if ($page == 'permission') {
            $res = $conn->selectData("select * from quyen
                                    where id_quyen = '$id'");
        }

        if ($page == 'product') {
            $res = $conn->selectData("select * from nhom_san_pham
                                    where id_nhomsanpham = '$id'");
        }

        if (mysqli_num_rows($res)!=0) {
            echo 'Error';
        } else echo 'Continue';
    }
?>