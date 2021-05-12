<?php
    include 'ConnectionDB.php';
    $con = new ConnectionDB('');
    $items_per_page = $_GET['items_per_page'];
    $page = $_GET['page'];
    $ma_dongsp = $_GET['ma_dongsp'];
    $tensp = $_GET['ten_sp'];
    $thuonghieu = $_GET['thuonghieu'];
    $from = ($page-1)*$items_per_page;
    $sql = "SELECT nhom_san_pham.id_nhomsanpham from nhom_san_pham,
            (select id_nhomhinh,hinh from hinh_nhomsanpham) AS b,(select id_dongsanpham from dong_san_pham where id_dongsanpham LIKE '%$ma_dongsp%' and thuonghieu_sanpham LIKE '%$thuonghieu%') as c,
            dong_san_pham where nhom_san_pham.id_nhomsanpham = b.id_nhomhinh and 
            nhom_san_pham.id_dongsanpham = dong_san_pham.id_dongsanpham and dong_san_pham.id_dongsanpham = c.id_dongsanpham
            and nhom_san_pham.ten_nhomsanpham LIKE '%$tensp%'
            group by nhom_san_pham.id_nhomsanpham";
    $result = $con->preparedSelect($sql);
    if($items_per_page>0)
    {
        $totalpage=0;
        $totalsp = mysqli_num_rows($result);
        if($totalsp%$items_per_page!==0 && $totalsp>$items_per_page)
        {
            $totalpage=$totalsp/$items_per_page+1;
        }
        else if($totalsp>$items_per_page){
            $totalpage=$totalsp/$items_per_page;
        }
    }
    $sql1 = "SELECT nhom_san_pham.id_nhomsanpham,nhom_san_pham.ten_nhomsanpham,b.hinh,gioi_tinh,
            dong_san_pham.ten_dongsanpham, mau_sanpham from nhom_san_pham,
            (select id_nhomhinh,hinh from hinh_nhomsanpham) AS b,(select id_dongsanpham from dong_san_pham where id_dongsanpham LIKE '%$ma_dongsp%' and thuonghieu_sanpham LIKE '%$thuonghieu%') as c,
            dong_san_pham where nhom_san_pham.id_nhomsanpham = b.id_nhomhinh and 
            nhom_san_pham.id_dongsanpham = dong_san_pham.id_dongsanpham and dong_san_pham.id_dongsanpham = c.id_dongsanpham
            and nhom_san_pham.ten_nhomsanpham LIKE '%$tensp%'
            group by nhom_san_pham.id_nhomsanpham"
          . " limit $items_per_page offset $from"; 
    $result1 = $con->preparedSelect($sql1);
    if($result1!==null)
    {
        echo '<div class="list-prods-square">
            <div class="list-container">
                <ul class="list-prods">';
        while($row = mysqli_fetch_array($result1)){
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
            echo '</ul></div></div>';
            echo '<div class="my-pagination">';
              
                    for($i = 1;$i <= $totalpage; $i++)
                    {
                        echo '<a class="page" href="javascript:void(0)">'.$i.'</a>';
                    }
                echo '</div>';
        }
