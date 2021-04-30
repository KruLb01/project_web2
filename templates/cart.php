<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../static/css/style.css">
</head>
<body>
    <div class="cart-container">
        <div class="cart">
            <div class="cart-title">
                <span>Cart</span>
            </div>
            <div class="cart-content">
                <table>
                    <tr>
                        <th>Order</th>
                        <th>Img Product</th>
                        <th>Name Product</th>
                        <th>Size</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                    <?php 
                    include('connectData.php');
                    $conn = new connectData();

                    $sql = "SELECT ten_nhomsanpham, size, gio_hang.so_luong as sl, gia_sanpham,nhom_san_pham.id_nhomsanpham as id, san_pham.id_sanpham as id_sp
                    FROM gio_hang, san_pham, nhom_san_pham
                    WHERE gio_hang.id_sanpham = san_pham.id_sanpham
                    AND san_pham.id_nhomsanpham = nhom_san_pham.id_nhomsanpham";

                    $ketqua = $conn->selectData($sql);
                    $i = 1;
                    $sum = 0;
                    // dùng mảng để lưu thanh toán
                    $arr = array();



                    while($row = mysqli_fetch_array($ketqua)){
                        array_push($arr, array($row['id_sp'], $row['sl'], $row['gia_sanpham']));

                        $sum += (int)$row['gia_sanpham'] * (int) $row['sl'];
                        $kq2 = mysqli_fetch_array($conn->selectData("SELECT link_hinhanh FROM hinh_nhomsanpham,hinh_anh
                        WHERE hinh_nhomsanpham.id_hinh = hinh_anh.id_hinhanh AND id_nhomsanpham = '".$row['id']."' limit 0,1"))['link_hinhanh'];
                        echo "<tr>
                            <td>".$i++."</td>
                            <td><img src='../$kq2' style='width:50px;height:50px'></td>
                            <td>".$row['ten_nhomsanpham']."</td>
                            <td>".$row['size']."</td>
                            <td>".$row['sl']."</td>
                            <td>".$row['gia_sanpham']."</td>
                        </tr>";
                    }            
                   ?>
                </table>
            </div>
            <div class="cart-total">
                <span>Total: <?php echo $sum ?></span>
            </div>
            <div class="cart-purchase">
                <button id="purchase-btn" onclick="Purchase()">Purchase</button>
            </div>
        </div>
    </div>
</body>
</html>

<script>
    function Purchase(){
        location.href = '?action=purchase'; 
        // key là action 
        // value purchase

    }
</script>

<?php 
if(isset($_GET['action'])){
    $action=$_GET['action'];
    if($action == 'purchase' ){
        // print_r($arr);
        $id_invoice = uniqid("hd-",true);
        $id_user = ''; // $_SESSION['id'] 
        // index ; login ; xu ly dang nhap ;; connect db
        $date = date('Y-m-d');
        // tong gia = $sum

        $res = $conn->executeQuery("insert into hoa_don(id_hoadon, id_nguoidung, ngay_mua, tong_gia, id_sale)
                        values ('$id_invoice','$id_user','$date', $sum, '')");

        if ($res) {
            echo('Thanh toan thanh cong');
        }
    }
}
?>