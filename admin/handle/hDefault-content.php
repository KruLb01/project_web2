<?php
    include('../templates/connectData.php');
    $conn = new connectData('');
    $sql = '';
    $res = '';

    if (isset($_GET['cid'])) {
        $cid = $_GET['cid'];
        $pos = ($cid - 1 ) * 10;
        $sql = "select * from khach_hang, nguoi_dung where khach_hang.id_nguoidung = nguoi_dung.id_nguoidung limit $pos, 10";
        
        $list = $conn->selectData($sql);
        $res = "                        
        <tr style='border:none'>
            <th>Id Customers</th>
            <th>Name Customers</th>
            <th>Address Customers</th>
            <th>Phone Customers</th>
            <th>Email Customers</th>
        </tr>";

        while ($line=mysqli_fetch_array($list)) {
            $res .= "
            <tr>
                <td>".$line['id_nguoidung']."</td>
                <td>".$line['ho_ten']."</td>
                <td>".$line['dia_chi']."</td>
                <td>".$line['so_dien_thoai']."</td>
                <td>".$line['email']."</td>
            </tr>";
        }
        echo $res;
    }

    if (isset($_GET['uid'])) {
        $uid = $_GET['uid'];
        $pos = ($uid - 1 ) * 10;
        $sql = "select * from admin, nguoi_dung where admin.id_nguoidung = nguoi_dung.id_nguoidung limit $pos, 10";
        
        $list = $conn->selectData($sql);
        $res = "                        
        <tr style='border:none'>
            <th>Id Users</th>
            <th>Name Users</th>
        </tr>";

        while ($line=mysqli_fetch_array($list)) {
            $res .= "
            <tr>
                <td>".$line['id_nguoidung']."</td>
                <td>".$line['ho_ten']."</td>
            </tr>";
        }
        echo $res;
    }
?>