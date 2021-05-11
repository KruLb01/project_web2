<?php
    if(isset($_GET['page']) && $_GET['page'] && isset($_GET['items_per_page']) && $_GET['items_per_page']){
        $page = $_GET['page'];
        include 'ConnectionDB.php';
        $con = new ConnectionDB('');
        $items_per_page = $_GET['items_per_page'];
        $from = ($page-1)*$items_per_page;
        $sql = "SELECT nhom_san_pham.id_nhomsanpham,nhom_san_pham.ten_nhomsanpham,b.hinh,gioi_tinh,"
                . "mau_sanpham from nhom_san_pham, (select id_nhomhinh,hinh from hinh_nhomsanpham) AS b "
                . "where nhom_san_pham.id_nhomsanpham = b.id_nhomhinh "
                . "group by nhom_san_pham.id_nhomsanpham "
                . "limit $items_per_page offset $from"; 
        $result = $con->preparedSelect($sql);
        if($result!==null)
        {
            while($row = mysqli_fetch_array($result)){
                echo '<li class="prod-item">
                    <div class="prod-image">
                        <a href="chitietsanpham.php?id_nhomsp='.$row[0].'"><img src="data:image/png;base64,'.base64_encode($row[2]).'"/></a>
                            <div class="prod-image-logo">
                                <img src="images/logos/logo-ngang-trans.png"/>
                            </div> 
                    </div>
                    <div class="prod-name">
                        <h4>'.$row[1].'</h4>
                    </div>
                    <div class="prod-info">
                        <div class="prod-gender">
                            <span>Giới tính: '.$row[3].'</span>
                        </div>
                        <div class="prod-color">
                            <span>Màu: '.$row[4].'</span>
                        </div>
                    </div>
                    <div class="prod-detailbtn">
                        <button onclick="location.href='.("'chitietsanpham.php?id_nhomsp=$row[0]'").'" class="btn btn-dark">Xem chi tiết</button>
                    </div>
                </li>';
            }
        }
    }
