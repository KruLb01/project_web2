<?php
    include('./connectData.php');
    $conn = new connectData();
    
    // $res = $conn->selectData();

    $listCustomers = $conn->selectData('select * from khach_hang, nguoi_dung where khach_hang.id_nguoidung = nguoi_dung.id_nguoidung');
    $listUsers = $conn->selectData('select * from admin');
    $listProducts = $conn->selectData('select * from nhom_san_pham');
    $listSales = $conn->selectData('select * from sale');

    $countCustomers = mysqli_num_rows($listCustomers);
    $countUsers = mysqli_num_rows($listUsers);
    $countProducts = mysqli_num_rows($listProducts);
    $countSales = mysqli_num_rows($listSales);


?>




<span>Welcome back : <?php echo $_SESSION['user']['permission'] . ' ' . $_SESSION['user']['name'] ?></span>
            <div class="dashboard-content-box-container disable-copy">
                <div class="dashboard-content-box">
                    <i class="fas fa-users" style='background-color:#f3e354'></i>
                    <div class="dashboard-content-box-item">
                        <span>Total Customers</span>
                        <span><?php echo $countCustomers ?> people</span>
                    </div>
                </div>
                <div class="dashboard-content-box">
                    <i class="fas fa-user-tie" style='background:#81f354'></i>
                    <div class="dashboard-content-box-item">
                        <span>Total Users</span>
                        <span><?php echo $countUsers ?> people</span>
                    </div>
                </div>
                <div class="dashboard-content-box">
                    <i class="fas fa-cubes"></i>
                    <div class="dashboard-content-box-item">
                        <span>Total Products</span>
                        <span><?php echo $countProducts ?> products</span>
                    </div>
                </div>
                <div class="dashboard-content-box">
                    <i class="fas fa-money-bill" style='background:#e054f3'></i>
                    <div class="dashboard-content-box-item">
                        <span>Total Sale Actived</span>
                        <span><?php echo $countSales ?> sales</span>
                    </div>
                </div>
            </div>

            <div class="dashboard-content-table-container">
                <div class="dashboard-content-table" style='width:100%' id='customers'>
                    <div class="dashboard-content-table-header disable-copy">
                        <span>Customers List</span>
                    </div>
                    <table class="dashboard-content-table-item">
                        <tr style='border:none'>
                            <th>Id Customers</th>
                            <th>Name Customers</th>
                            <th>Address Customers</th>
                            <th>Phone Customers</th>
                            <th>Email Customers</th>
                        </tr>
                        <tr>
                            <td>Customer </td>
                            <td>David Heros</td>
                            <td>on the earth</td>
                            <td>09876r67688989087</td>
                            <td>Actived</td>
                        </tr>
                        <tr>
                            <td>Customer </td>
                            <td>David Heros</td>
                            <td>on the earth</td>
                            <td>09876r67688989087</td>
                            <td>Actived</td>
                        </tr>
                        <tr>
                            <td>Customer </td>
                            <td>David Heros</td>
                            <td>on the earth</td>
                            <td>09876r67688989087</td>
                            <td>Actived</td>
                        </tr>
                        <tr>
                            <td>Customer </td>
                            <td>David Heros</td>
                            <td>on the earth</td>
                            <td>09876r67688989087</td>
                            <td>Actived</td>
                        </tr>
                    </table>
                    <div class="dashboard-content-table-pagination disable-copy">
                        <div class="dashboard-content-table-pagination-btn">
                            <span class='disable' style='border-top-left-radius: 5px;border-bottom-left-radius: 5px;'>Previous</span>
                            <span>1</span>
                            <span>2</span>
                            <span>3</span>
                            <span>...</span>
                            <span>7</span>
                            <span style='border-top-right-radius: 5px;border-bottom-right-radius: 5px;'>Next</span>
                        </div>
                    </div>
                </div>
                <div class="dashboard-content-table" style='width:48%' id='users'>
                    <div class="dashboard-content-table-header">
                        <span>Users List</span>
                    </div>
                </div>
                <div class="dashboard-content-table" style='width:48%' id='sales'>
                    <div class="dashboard-content-table-header">
                        <span>Sales List</span>
                    </div>
                </div>
                <div class="dashboard-content-table" style='width:100%' id='products'>
                    <div class="dashboard-content-table-header">
                        <span>Products List</span>
                    </div>
                </div>
            </div>