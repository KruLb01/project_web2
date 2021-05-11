<?php
    if(isset($_GET['page'])) {
        $page = $_GET['page'];
        if (isset($_GET['num'])) $numShow = $_GET['num'];
        if (isset($_GET['pag'])) $pag = ($_GET['pag']-1) * $numShow;

        include('../templates/connectData.php');
        $conn = new connectData('');
        $sql =  '';
        $show = '';

        
        if ($page == 'Manage Permission'){


            if (isset($_GET['numPag'])) {
                $numPag = $_GET['numPag'];
                if (isset($_GET['textShow'])) {
                    $sum = mysqli_fetch_array($conn->selectData('select count(*) as count from quyen where id_quyen != "customer"'))['count'];
                    echo "( ".($pag+1)." - ".($numShow+$pag)." of $sum results )";
                    return;
                }
                echo $count = ceil(mysqli_fetch_array($conn->selectData('select count(*) as count from quyen where id_quyen != "customer"'))['count']/$numShow);
                return;
            }

            if (isset($_GET['idView'])) {
                $id = $_GET['idView'];
                $idRes = $conn->selectData("SELECT chuc_nang.ten_chucnang as i
                                FROM chuc_nang, chitiet_quyen_chucnang, quyen 
                                WHERE chuc_nang.id_chucnang = chitiet_quyen_chucnang.id_chucnang 
                                and chitiet_quyen_chucnang.id_quyen = quyen.id_quyen
                                AND chitiet_quyen_chucnang.id_quyen = '$id'");
                while ($line = mysqli_fetch_array($idRes)) echo $line['i'].'/';
                return;
            }

            if (isset($_GET['add'])) {
                if (isset($_GET['valCB'])) {
                    $valCB = explode("-",$_GET['valCB']);
                }
                if (isset($_GET['valText'])) {
                    $valText = explode("-",$_GET['valText']);
                }
                $resAdd = $conn->executeQuery("insert into quyen(id_quyen, ten_quyen, mieuta) values('".$valText[0]."', N'".$valText[1]."', N'".$valText[2]."')");
                for ($i = 0; $i < sizeof($valCB); $i ++) {
                    $resAdd = $conn->executeQuery("insert into chitiet_quyen_chucnang(id_quyen, id_chucnang) values('".$valText[0]."', '".$valCB[$i]."')");
                }
                echo $resAdd;
                return;
            }

            if (isset($_GET['update'])) {
                if (isset($_GET['val'])) {
                    $val = explode("-",$_GET['val']);
                }

                if ($val[0]== 'text') {
                    $resUpdate = $conn->executeQuery("update quyen set ten_quyen = '".$val[2]."', mieuta = '".$val[3]."' where id_quyen = '".$val[1]."'");
                    echo $resUpdate;
                    return;
                }
                if ($val[0]== 'checkbox') {
                    if ($val[2]=='insert') {
                        $resUpdate = $conn->executeQuery("INSERT INTO `chitiet_quyen_chucnang`(`id_quyen`, `id_chucnang`) 
                        VALUES ('".$val[3]."',(SELECT chuc_nang.id_chucnang FROM chuc_nang WHERE chuc_nang.ten_chucnang = '".$val[1]."'))");
                    } else if ($val[2]=='delete') {
                        $resUpdate = $conn->executeQuery("DELETE FROM `chitiet_quyen_chucnang` 
                        WHERE id_quyen = '".$val[3]."' and id_chucnang = (SELECT id_chucnang FROM chuc_nang WHERE ten_chucnang = '".$val[1]."')");
                    }
                    echo $resUpdate;
                    return;
                }
                if ($val[0]=='delete') {
                    $resUpdate = $conn->executeQuery("delete from quyen where id_quyen = '".$val[1]."'");
                    $resUpdate = $conn->executeQuery("delete from chitiet_quyen_chucnang where id_quyen = '".$val[1]."'");
                    echo $resUpdate;
                    return;
                }
            }
            
            $sql = "SELECT *
            FROM quyen
            WHERE id_quyen != 'customer' 
            ORDER by ";
            if (isset($_GET['title'])&&isset($_GET['sort'])&&$_GET['title']!="") {
                $title = $_GET['title'];
                $sort = $_GET['sort'];
                if ($title=="Id Permission") {
                    $sql .= "cast(id_quyen as unsigned) $sort ";
                } else if ($title=="Name Permission") {
                    $sql .= "ten_quyen $sort ";
                } else if ($title=="Note Permission") {
                    $sql .= "mieuta $sort ";
                } else if ($title=="Quantity of Accounts") {
                    $sql .= "so_luong $sort ";
                }
            } else $sql .= "cast(id_quyen as unsigned) ";
            $sql .= " LIMIT $pag,$numShow";

            if (isset($_GET['search'])) {
                if (isset($_GET['val'])) {
                    $val = explode("-",$_GET['val']);
                }
                if ($val[0] != 'none') {
                    $sql = "SELECT *
                    FROM quyen
                    WHERE " . $val[0] . " like '%" . $val[1] .  "%' 
                    and id_quyen != 'customer'
                    ORDER by cast(id_quyen as unsigned)
                    LIMIT $pag,$numShow";
                }
            }

            $res = $conn->selectData($sql);
            $show = "
            <tr>
                <th>Id Permission</th>
                <th>Name Permission</th>
                <th>Note Permission</th>
                <th>Quantity of Accounts</th>
                <th>Action</th>
            </tr>
            ";

            if (isset($_GET['popUp'])) {
                $show = '';
                while($line=mysqli_fetch_array($res)) {
                    $show .= "
                    <div class='dashboard-manage-pop-up'>
                        <div class='dashboard-manage-pop-up-items'>
                            <i class='fas fa-times dm-pop-up-close-btn'></i>
                            <div class='dashboard-manage-pop-up-info'>
                                <span>Id Permission : <input type='text' class='disable' value='".$line['id_quyen']."'></span>
                                <span>Name Permission : <input type='text' class='dm-can-del' placeholder='".$line['ten_quyen']."'></span>
                                <span>Note Permission : <input type='text' class='dm-can-del' placeholder='".$line['mieuta']."'></span>
                                <div class='dm-pop-up-btn disable-copy'>
                                    <span class='dm-pop-up-save-btn'>Save</span>
                                    <span class='dm-pop-up-reset-btn'>Reset</span>
                                </div>
                            </div>
                            <div class='dashboard-manage-pop-up-act'>
                                <span>Set permission : </span>
                                <div class='dashboard-manage-pop-up-act-checkbox'>";
                    $temp = $conn->selectData('select * from chuc_nang order by vi_tri');   
                    while ($tmpLine=mysqli_fetch_array($temp)) {
                        $show .= "<span class='dm-pop-up-cbox";
                        if ((int)$tmpLine['vi_tri']%1000==0) {
                            $show .= " dm-pop-up-main";
                        }
                        $show .= "'><input type=checkbox ";
                        $show .= ">".$tmpLine['ten_chucnang']."</span>";
                    }
                        $show .="</div>
                            </div>
                        </div>
                    </div>
                    ";
                }
                echo $show;
                return;
            }

            $countPos = 0;
            while($line=mysqli_fetch_array($res)) {
                $show .= "
                <tr>
                    <td>".$line['id_quyen']."</td>
                    <td>".$line['ten_quyen']."</td>
                    <td>".$line['mieuta']."</td>
                    <td>".$line['so_luong']."</td>
                    <td>
                        <div class='dashboard-manage-table-action disable-copy' id='action-$countPos'>
                            <ul class='dashboard-manage-table-action-items'>
                                <li>Update</li>
                                <li>Delete</li>
                            </ul>
                        </div>
                    </td>
                </tr>
                ";
                $countPos++;
            }
        }

        if ($page == 'Manage Products'){

            if (isset($_GET['numPag'])) {
                $numPag = $_GET['numPag'];
                if (isset($_GET['textShow'])) {
                    $sum = mysqli_fetch_array($conn->selectData('select count(*) as count from nhom_san_pham'))['count'];
                    echo "( ".($pag+1)." - ".($numShow+$pag)." of $sum results )";
                    return;
                }
                echo $count = ceil(mysqli_fetch_array($conn->selectData('select count(*) as count from nhom_san_pham'))['count']/$numShow);
                return;
            }

            if (isset($_GET['idView'])) {
                $id = $_GET['idView'];
                $idRes = $conn->selectData("SELECT gioi_tinh as i
                                FROM nhom_san_pham
                                WHERE id_nhomsanpham = '$id'");
                while ($line = mysqli_fetch_array($idRes)) echo $line['i'].'/';
                return;
            }

            if (isset($_GET['add'])) {
                if (isset($_GET['valCB'])) {
                    $valCB = explode("-",$_GET['valCB']);
                    $gender = $valCB[0] == true ? 'Male' : 'Female';
                }
                if (isset($_GET['valText'])) {
                    $valText = explode("-",$_GET['valText']);
                }
                $resAdd = $conn->executeQuery("insert into nhom_san_pham(id_nhomsanpham, ten_nhomsanpham, gioi_tinh, mieuta, mau_sanpham)
                                                values('".$valText[0]."', '".$valText[1]."', '$gender', '".$valText[3]."', '".$valText[2]."')");
                echo $resAdd;
                return;
            }

            if (isset($_GET['update'])) {
                if (isset($_GET['val'])) {
                    $val = explode("-",$_GET['val']);
                }

                if ($val[0]== 'text') {
                    $resUpdate = $conn->executeQuery("update nhom_san_pham set ten_nhomsanpham = '".$val[2]."', mau_sanpham = '".$val[3]."', mieuta = '".$val[4]."' where id_nhomsanpham = '".$val[1]."'");
                    echo $resUpdate;
                    return;
                }
                if ($val[0]== 'checkbox') {
                    $statusAccount = $val[1] == 0 ? "'Male'" : "'Female'";
                    $resUpdate = $conn->executeQuery("update nhom_san_pham set gioi_tinh = $statusAccount where id_nhomsanpham = '".$val[2]."'");
                    echo $resUpdate;
                    return;
                }
                if ($val[0]=='delete') {
                    $resUpdate = $conn->executeQuery("delete from nhom_san_pham where id_nhomsanpham = '".$val[1]."'");
                    $resUpdate = $conn->executeQuery("delete from san_pham where id_nhomsanpham = '".$val[1]."'");
                    echo $resUpdate;
                    return;
                }
            }

            $sql = "select * 
                    from nhom_san_pham
                    order by ";
            if (isset($_GET['title'])&&isset($_GET['sort'])&&$_GET['title']!="") {
                $title = $_GET['title'];
                $sort = $_GET['sort'];
                if ($title=="Id Products") {
                    $sql .= "id_nhomsanpham $sort ";
                } else if ($title=="Name Products") {
                    $sql .= "ten_nhomsanpham $sort ";
                } else if ($title=="Gender") {
                    $sql .= "gioi_tinh $sort ";
                } else if ($title=="Star Rated") {
                    $sql .= "sosao_danhgia $sort ";
                } else if ($title=="Buyed") {
                    $sql .= "id_nhomsanpham $sort ";
                }
            } else $sql .= "id_nhomsanpham ";
            $sql .= " limit $pag, $numShow";
            
            if (isset($_GET['search'])) {
                if (isset($_GET['val'])) {
                    $val = explode("-",$_GET['val']);
                }
                if ($val[0] != 'none') {
                    $sql = "SELECT*
                        FROM nhom_san_pham
                        WHERE " . $val[0] . " like '%" . $val[1] .  "%' 
                        ORDER by id_nhomsanpham
                        LIMIT $pag,$numShow";
                }
            }

            $res = $conn->selectData($sql);
            $show = "
            <tr>
                <th>Id Products</th>
                <th>Name Products</th>
                <th>Gender</th>
                <th>Stars Rated</th>
                <th>Buyed</th>
                <th>Action</th>
            </tr>
            ";

            if (isset($_GET['popUp'])) {
                $show = '';
                while($line=mysqli_fetch_array($res)) {
                    $show .= "
                    <div class='dashboard-manage-pop-up'>
                        <div class='dashboard-manage-pop-up-items'>
                            <i class='fas fa-times dm-pop-up-close-btn'></i>
                            <div class='dashboard-manage-pop-up-info'>
                                <span>Id Product : <input type='text' class='disable' value='".$line['id_nhomsanpham']."'></span>
                                <span>Name Product : <input type='text' class='dm-can-del' placeholder='".$line['ten_nhomsanpham']."'></span>
                                <span>Color Product : <input type='text' class='dm-can-del' placeholder='".$line['mau_sanpham']."'></span>
                                <span>Description : <input type='text' class='dm-can-del' placeholder='".$line['mieuta']."'></span>
                                <div class='dm-pop-up-btn disable-copy'>
                                    <span class='dm-pop-up-save-btn'>Save</span>
                                    <span class='dm-pop-up-reset-btn'>Reset</span>
                                </div>
                            </div>";
                    $show .= "
                            <div class='dashboard-manage-pop-up-act'>
                                <span>Gender : </span>
                                <div class='dashboard-manage-pop-up-act-checkbox'>
                                    <span class='dm-pop-up-cbox'><input type=radio value='Male' name='gender'> Male</span>
                                    <span class='dm-pop-up-cbox'><input type=radio value='Female' name='gender'> Female</span>
                                </div>

                            </div>";
               
                        $show .="
                        </div>
                    </div>
                    ";
                }
                echo $show;
                return;
            }
            
            $countPos = 0;
            while($line=mysqli_fetch_array($res)) {
                $gender = '<i class="fas fa-mars" style="color:blue;font-size:24px"></i>';
                if ($line['gioi_tinh'] == 'Female') {
                    $gender = '<i class="fas fa-venus" style="color:pink;font-size:24px"></i>';
                }

                $show .= "
                <tr>
                    <td>".$line['id_nhomsanpham']."</td>
                    <td>".$line['ten_nhomsanpham']."</td>
                    <td>".$gender."</td>
                    <td>".$line['sosao_danhgia']." <i class='fas fa-star' style='color:orange'></i></td>
                    <td>0</td>
                    <td>
                        <div class='dashboard-manage-table-action disable-copy' id='action-$countPos'>
                            <ul class='dashboard-manage-table-action-items'>
                                <li>Update</li>
                                <li>Delete</li>
                            </ul>
                        </div>
                    </td>
                </tr>
                ";
                $countPos++;
            }
        }

        if ($page == 'Manage Employees'){
            if (isset($_GET['numPag'])) {
                $numPag = $_GET['numPag'];
                if (isset($_GET['textShow'])) {
                    $sum = mysqli_fetch_array($conn->selectData('select count(*) as count from admin,nguoi_dung where admin.id_nguoidung=nguoi_dung.id_nguoidung'))['count'];
                    echo "( ".($pag+1)." - ".($numShow+$pag)." of $sum results )";
                    return;
                }
                echo $count = ceil(mysqli_fetch_array($conn->selectData('select count(*) as count from admin,nguoi_dung where admin.id_nguoidung=nguoi_dung.id_nguoidung'))['count']/$numShow);
                return;
            }

            if (isset($_GET['idView'])) {
                $id = $_GET['idView'];
                $idRes = mysqli_fetch_array($conn->selectData("SELECT tinh_trang_taikhoan as i
                                                        FROM nguoi_dung
                                                        WHERE id_nguoidung = '$id'"))['i'] == 0 ? 'Block' : 'Active';
                echo $idRes.'/';
                return;
            }

            if (isset($_GET['add'])) {
                if (isset($_GET['valCB'])) {
                    $valCB = explode("-",$_GET['valCB']);
                }
                if (isset($_GET['valText'])) {
                    $valText = explode("-",$_GET['valText']);
                    $pass = md5($valText[4]);
                }
                $resAdd = $conn->executeQuery("insert into nguoi_dung(id_nguoidung, tai_khoan, mat_khau, email, so_dien_thoai, quyen, tinh_trang_taikhoan) 
                                                values('".$valText[0]."', '".$valText[3]."', '".$pass."', '".$valText[2]."', '".$valText[5]."', '".$valText[6]."', ".$valCB[0].")");
                $resAdd = $conn->executeQuery("insert into admin(id_nguoidung, ho_ten, thong_tin_khac) values('".$valText[0]."', '".$valText[1]."', '')");
                echo $resAdd;
                return;
            }

            if (isset($_GET['update'])) {
                if (isset($_GET['val'])) {
                    $val = explode("-",$_GET['val']);
                }

                if ($val[0]== 'text') {
                    $resUpate = $conn->executeQuery("update admin,nguoi_dung set admin.ho_ten = N'".$val[2]."', nguoi_dung.so_dien_thoai = '".$val[3]."', nguoi_dung.email ='".$val[4]."', nguoi_dung.mat_khau ='".md5($val[5])."', nguoi_dung.quyen = '".$val[7]."' where admin.id_nguoidung = '".$val[1]."' and nguoi_dung.id_nguoidung='".$val[1]."'");
                    echo $resUpate;
                    return;
                }
                if ($val[0]== 'checkbox') {
                    $statusAccount = $val[1] == 0 ? 'true' : 'false';
                    $resUpdate = $conn->executeQuery("update nguoi_dung set tinh_trang_taikhoan = $statusAccount where id_nguoidung = '".$val[2]."'");
                    echo $resUpdate;
                    return;
                }
                if ($val[0]=='delete') {
                    $resUpdate = $conn->executeQuery("delete from admin where id_nguoidung = '".$val[1]."'");
                    $resUpdate = $conn->executeQuery("delete from nguoi_dung where id_nguoidung = '".$val[1]."'");
                    echo $resUpdate;
                    return;
                }
            }    
            
            $sql = "select *
            from admin,nguoi_dung
            where admin.id_nguoidung = nguoi_dung.id_nguoidung 
            ORDER by ";
            if (isset($_GET['title'])&&isset($_GET['sort'])) {
                $title = $_GET['title'];
                $sort = $_GET['sort'];
                if ($title=="") $sql .= "cast(admin.id_nguoidung as unsigned) ";
                if ($title=="Id Employees") {
                    $sql .= "admin.id_nguoidung $sort ";
                } else if ($title=="Name Employees") {
                    $sql .= "ho_ten $sort ";
                } else if ($title=="Phone") {
                    $sql .= "so_dien_thoai $sort ";
                } else if ($title=="Permission") {
                    $sql .= "quyen $sort ";
                }
            }
            else {
                $sql .= "cast(admin.id_nguoidung as unsigned) ";
            }
            $sql .= " LIMIT $pag,$numShow";

            if (isset($_GET['search'])) {
                if (isset($_GET['val'])) {
                    $val = explode("-",$_GET['val']);
                }
                if ($val[0] != 'none') {
                    if ($val[0]=='id_nguoidung'){
                        $sql = "SELECT *
                        FROM admin,nguoi_dung
                        WHERE admin.id_nguoidung=nguoi_dung.id_nguoidung and 
                        nguoi_dung." . $val[0] . " like '%" . $val[1] .  "%' 
                        ORDER by cast(nguoi_dung.id_nguoidung as unsigned)
                        LIMIT $pag,$numShow";
                    } else {
                        $sql = "SELECT *
                        FROM admin,nguoi_dung
                        WHERE admin.id_nguoidung=nguoi_dung.id_nguoidung and 
                        " . $val[0] . " like '%" . $val[1] .  "%' 
                        ORDER by cast(nguoi_dung.id_nguoidung as unsigned)
                        LIMIT $pag,$numShow";
                    }
                }
            }

            // echo $sql;
            // return;
            
            $res = $conn->selectData($sql);
            $show = "
            <tr>
                <th>Id Employees</th>
                <th>Name Employees</th>
                <th>Phone</th>
                <th>Status</th>
                <th>Permission</th>
                <th>Action</th>
            </tr>
            ";

            if (isset($_GET['popUp'])) {
                $show = '';
                while($line=mysqli_fetch_array($res)) {
                    $show .= "
                    <div class='dashboard-manage-pop-up'>
                        <div class='dashboard-manage-pop-up-items'>
                            <i class='fas fa-times dm-pop-up-close-btn'></i>
                            <div class='dashboard-manage-pop-up-info'>
                                <span>Id Employee : <input type='text' class='disable' value='".$line['id_nguoidung']."'></span>
                                <span>Name Employee : <input type='text' class='dm-can-del' placeholder='".$line['ho_ten']."'></span>
                                <span>Phone Employee : <input type='text' class='dm-can-del' placeholder='".$line['so_dien_thoai']."'></span>
                                <span>Email Employee : <input type='text' class='dm-can-del' placeholder='".$line['email']."'></span>
                                <span>Password Employee : <input type='text' class='dm-can-del' placeholder='*****'></span>
                                <span>
                                    Permission Employee :
                                    <select>
                                        ";
                        $res1 = $conn->selectData("select * from quyen where id_quyen = '".$line['quyen']."'");
                        while ($row = mysqli_fetch_array($res1)) {
                            $show .= "<option value='".$row['id_quyen']."'>".$row['ten_quyen']."</option>";
                        }

                        $res2 = $conn->selectData("select * from quyen where id_quyen != 'customer' and id_quyen != '".$line['quyen']."' order by id_quyen");
                        while ($row = mysqli_fetch_array($res2)) {
                            $show .= "<option value='".$row['id_quyen']."'>".$row['ten_quyen']."</option>";
                        }
                        $show .= "
                                    </select>
                                </span>
                                <div class='dm-pop-up-btn disable-copy'>
                                    <span class='dm-pop-up-save-btn'>Save</span>
                                    <span class='dm-pop-up-reset-btn'>Reset</span>
                                </div>
                            </div>";
                    $show .= "
                    <div class='dashboard-manage-pop-up-act'>
                        <span>Set login : </span>
                        <div class='dashboard-manage-pop-up-act-checkbox'>
                            <span class='dm-pop-up-cbox'><input type=radio name='status'> Active</span>
                            <span class='dm-pop-up-cbox'><input type=radio name='status'> Block</span>
                        </div>
                    </div>
                    ";
                    $show .="
                        </div>
                    </div>
                    ";
                }
                echo $show;
                return;
            }

            $countPos = 0;
            while($line=mysqli_fetch_array($res)) {
                $status = $line['tinh_trang_taikhoan'] == true ? 'Activing': 'Blocked';
                $show .= "
                <tr>
                    <td>".$line['id_nguoidung']."</td>
                    <td>".$line['ho_ten']."</td>
                    <td>".$line['so_dien_thoai']."</td>
                    <td>".$status."</td>
                    <td>".$line['quyen']."</td>
                    <td>
                        <div class='dashboard-manage-table-action disable-copy' id='action-$countPos'>
                            <ul class='dashboard-manage-table-action-items'>
                                <li>Update</li>
                                <li>Delete</li>
                            </ul>
                        </div>
                    </td>
                </tr>
                ";
                $countPos++;
            }   
        }

        if ($page == 'Manage Customers'){
            if (isset($_GET['numPag'])) {
                $numPag = $_GET['numPag'];
                if (isset($_GET['textShow'])) {
                    $sum = mysqli_fetch_array($conn->selectData('select count(*) as count from khach_hang,nguoi_dung where khach_hang.id_nguoidung=nguoi_dung.id_nguoidung'))['count'];
                    echo "( ".($pag+1)." - ".($numShow+$pag)." of $sum results )";
                    return;
                }
                echo $count = ceil(mysqli_fetch_array($conn->selectData('select count(*) as count from khach_hang,nguoi_dung where khach_hang.id_nguoidung=nguoi_dung.id_nguoidung'))['count']/$numShow);
                return;
            }

            if (isset($_GET['idView'])) {
                $id = $_GET['idView'];
                $idRes = mysqli_fetch_array($conn->selectData("SELECT tinh_trang_taikhoan as i
                                                        FROM nguoi_dung
                                                        WHERE id_nguoidung = '$id'"))['i'] == 0 ? 'Block' : 'Active';
                echo $idRes.'/';
                return;
            }
            
            if (isset($_GET['add'])) {
                if (isset($_GET['valCB'])) {
                    $valCB = explode("-",$_GET['valCB']);
                }
                if (isset($_GET['valText'])) {
                    $valText = explode("-",$_GET['valText']);
                    $pass = md5($valText[4]);
                }
                $resAdd = $conn->executeQuery("insert into nguoi_dung(id_nguoidung, tai_khoan, mat_khau, email, so_dien_thoai, quyen, tinh_trang_taikhoan) 
                                                values('".$valText[0]."', '".$valText[3]."', '".$pass."', '".$valText[2]."', '".$valText[6]."', 'customer', ".$valCB[0].")");
                $resAdd = $conn->executeQuery("insert into khach_hang(id_nguoidung, ho_ten, dia_chi) values('".$valText[0]."', '".$valText[1]."', '".$valText[5]."')");
                echo $resAdd;
                return;
            }

            if (isset($_GET['update'])) {
                if (isset($_GET['val'])) {
                    $val = explode("-",$_GET['val']);
                }

                if ($val[0]== 'text') {
                    $password=md5($val[4]);
                    $resUpate = $conn->executeQuery("update nguoi_dung,khach_hang set khach_hang.ho_ten = N'".$val[2]."', nguoi_dung.email = '".$val[3]."', nguoi_dung.mat_khau='".$password."', khach_hang.dia_chi='".$val[5]."', nguoi_dung.so_dien_thoai='".$val[6]."' where khach_hang.id_nguoidung = '".$val[1]."' and nguoi_dung.id_nguoidung='".$val[1]."'");
                    echo $resUpate;
                    return;
                }
                if ($val[0]== 'checkbox') {
                    $statusAccount = $val[1] == 0 ? 'true' : 'false';
                    $resUpdate = $conn->executeQuery("update nguoi_dung set tinh_trang_taikhoan = $statusAccount where id_nguoidung = '".$val[2]."'");
                    echo $resUpdate;
                    return;
                }
                if ($val[0]=='delete') {
                    $resUpdate = $conn->executeQuery("delete from nguoi_dung where id_nguoidung = '".$val[1]."'");
                    $resUpdate = $conn->executeQuery("delete from khach_hang where id_nguoidung = '".$val[1]."'");
                    echo $resUpdate;
                    return;
                }
           
                
            }
            
            $sql="select * 
                from khach_hang,nguoi_dung 
                where khach_hang.id_nguoidung = nguoi_dung.id_nguoidung 
                ORDER by ";
            if (isset($_GET['title'])&&isset($_GET['sort'])&&$_GET['title']!="") {
                $title = $_GET['title'];
                $sort = $_GET['sort'];
                if ($title=="Id Customers") {
                    $sql .= "cast(khach_hang.id_nguoidung as unsigned) $sort ";
                } else if ($title=="Name Customers") {
                    $sql .= "ho_ten $sort ";
                } else if ($title=="Address Customers") {
                    $sql .= "dia_chi $sort ";
                } else if ($title=="Phone Number") {
                    $sql .= "so_dien_thoai $sort ";
                }
            } else $sql .= "cast(khach_hang.id_nguoidung as unsigned) ";
            $sql .= " LIMIT $pag,$numShow";
            
            if (isset($_GET['search'])) {
                if (isset($_GET['val'])) {
                    $val = explode("-",$_GET['val']);
                }
                if ($val[0] != 'none') {
                    if ($val[0]=='id_nguoidung'){
                        $sql = "SELECT*
                        FROM khach_hang,nguoi_dung
                        WHERE khach_hang.id_nguoidung=nguoi_dung.id_nguoidung and 
                        nguoi_dung." . $val[0] . " like '%" . $val[1] .  "%' 
                        ORDER by cast(nguoi_dung.id_nguoidung as unsigned)
                        LIMIT $pag,$numShow";
                    } else {
                        $sql = "SELECT*
                        FROM khach_hang,nguoi_dung
                        WHERE khach_hang.id_nguoidung=nguoi_dung.id_nguoidung and 
                        " . $val[0] . " like '%" . $val[1] .  "%' 
                        ORDER by cast(nguoi_dung.id_nguoidung as unsigned)
                        LIMIT $pag,$numShow";
                    }
                }
            }

            $res = $conn->selectData($sql);
            $show = "
            <tr>
                <th>Id Customers</th>
                <th>Name Customers</th>
                <th>Address Customers</th>
                <th>Phone Number</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            ";

            if (isset($_GET['popUp'])) {
                $show = '';
                while($line=mysqli_fetch_array($res)) {
                    $show .= "
                    <div class='dashboard-manage-pop-up'>
                        <div class='dashboard-manage-pop-up-items'>
                            <i class='fas fa-times dm-pop-up-close-btn'></i>
                            <div class='dashboard-manage-pop-up-info'>
                                <span>Id Customer : <input type='text' class='disable' value='".$line['id_nguoidung']."'></span>
                                <span>Name Customer : <input type='text' class='dm-can-del' placeholder='".$line['ho_ten']."'></span>
                                <span>Email Customer : <input type='text' class='dm-can-del' placeholder='".$line['email']."'></span>
                                <span>Password Customer : <input type='text' class='dm-can-del' placeholder='*****'></span>
                                <span>Address Customer : <input type='text' class='dm-can-del' placeholder='".$line['dia_chi']."'></span>
                                <span>Phone number Customer : <input type='text' class='dm-can-del' placeholder='".$line['so_dien_thoai']."'></span>
                                <div class='dm-pop-up-btn disable-copy'>
                                    <span class='dm-pop-up-save-btn'>Save</span>
                                    <span class='dm-pop-up-reset-btn'>Reset</span>
                                </div>
                            </div>";
                        $show .=  "
                            <div class='dashboard-manage-pop-up-act'>
                                <span>Set permission : </span>
                                <div class='dashboard-manage-pop-up-act-checkbox'>
                                    <span class='dm-pop-up-cbox'><input type=radio name='status'> Active</span>
                                    <span class='dm-pop-up-cbox'><input type=radio name='status'> Block</span>
                                </div>
                            </div>";
                        $show .="
                        </div>
                    </div>
                    ";
                }
                echo $show;
                return;
            }

            $countPos = 0;
            while($line=mysqli_fetch_array($res)) {
                $status = $line['tinh_trang_taikhoan'] == true ? 'Activing': 'Blocked';
                $show .= "
                <tr>
                    <td>".$line['id_nguoidung']."</td>
                    <td>".$line['ho_ten']."</td>
                    <td>".$line['dia_chi']."</td>
                    <td>".$line['so_dien_thoai']."</td>
                    <td>".$status."</td>
                    <td>
                        <div class='dashboard-manage-table-action disable-copy' id='action-$countPos'>
                            <ul class='dashboard-manage-table-action-items'>
                                <li>Update</li>
                                <li>Delete</li>
                            </ul>
                        </div>
                    </td>
                </tr>
                ";
                $countPos++;
            }
        }

        if ($page == "Manage Import") {
            if (isset($_GET['numPag'])) {
                $numPag = $_GET['numPag'];
                if (isset($_GET['textShow'])) {
                    $sum = mysqli_fetch_array($conn->selectData('select count(*) as count from phieu_nhap'))['count'];
                    echo "( ".($pag+1)." - ".($numShow+$pag)." of $sum results )";
                    return;
                }
                echo $count = ceil(mysqli_fetch_array($conn->selectData('select count(*) as count from phieu_nhap'))['count']/$numShow);
                return;
            }
            if (isset($_GET['popUp']) && isset($_GET['clickPos'])) {
                $click = $_GET['clickPos'];
                $show = '';
                $res = $conn->selectData("select * from chitiet_phieunhap where id_phieunhap ='".$click."'");

                $sum = 0;

                $show = "
                    <span id='dm-popup-title'>View details of $click</span>
                    <i class='fas fa-times dm-pop-up-close-btn'></i>
                    <div class='dm-details-content'>
                    <table class='dm-details-content-items'>
                    <tr>
                        <th>Name Products</th>
                        <th>Size</th>
                        <th>Quantity</th>
                        <th>Cost</th>
                        <th>Total</th>
                    </tr>
                ";
                while ($line = mysqli_fetch_array($res)) {
                    $so_luong = (int) $line['so_luong'];
                    $gia_nhap = (int) $line['gia_nhap'];
                    $total = $so_luong * $gia_nhap;
                    $sum += $total;

                    $name = mysqli_fetch_array($conn->selectData("select ten_nhomsanpham from nhom_san_pham where id_nhomsanpham = ( SELECT id_nhomsanpham FROM san_pham WHERE id_sanpham = '".$line['id_sanpham']."' )"))['ten_nhomsanpham'];
                    $size = mysqli_fetch_array($conn->selectData("select size from san_pham where id_sanpham = '".$line['id_sanpham']."'"))['size'];

                    $show .= "
                    <tr>
                        <td>$name</td>
                        <td>$size</td>
                        <td>".number_format($so_luong)."</td>
                        <td>".number_format($gia_nhap)." VNĐ</td>
                        <td>".number_format($total)." VNĐ</td>
                    </tr>
                    ";
                }
                $sql = "select id_nhanviennhap, id_nhacungcap from phieu_nhap where id_phieunhap ='$click'";
                
                $nv = mysqli_fetch_array($conn->selectData($sql))['id_nhanviennhap'];
                $ncc = mysqli_fetch_array($conn->selectData($sql))['id_nhacungcap'];

                $show .= "
                    </table>
                    </div>
                    <div class='dm-details-more'>
                        <div class='dm-d-left'>
                            <span>Id importer: $nv</span>
                            <span>Id provider: $ncc</span>
                        </div>
                        <div class='dm-d-right'>
                            <span>Total: ".number_format($sum)." VNĐ</span>
                        </div>
                    </div>
                ";
                echo $show;
                return;
            }
            if (isset($_GET['popUp'])) return;


            $sql="select *
            from phieu_nhap
            ORDER by ";
            if (isset($_GET['title'])&&isset($_GET['sort'])&&$_GET['title']!="") {
                $title = $_GET['title'];
                $sort = $_GET['sort'];
                if ($title=="Id Imports") {
                    $sql .= "id_phieunhap $sort ";
                } else if ($title=="Id Importers") {
                    $sql .= "id_nhanviennhap $sort ";
                } else if ($title=="Id Providers") {
                    $sql .= "id_nhacungcap $sort ";
                } else if ($title=="Date") {
                    $sql .= "ngay_nhap $sort ";
                } else if ($title=="Total") {
                    $sql .= "tong_gia_nhap $sort ";
                }
            } else $sql .= "ngay_nhap desc ";
            $sql .= " LIMIT $pag,$numShow";

            if (isset($_GET['search'])) {
                if (isset($_GET['val'])) {
                    $val = explode("-",$_GET['val']);
                }
                if ($val[0] != 'none') {
                    if ($val[0]=='ngay_nhap') {
                        if (count($val)==4) $val[1] = $val[3] . "-" . $val[2] . "-" . $val[1];
                        if (count($val)==3) $val[1] = $val[2] . "-" . $val[1];
                    }
                    $sql = "SELECT*
                    FROM phieu_nhap
                    WHERE " . $val[0] . " like '%" . $val[1] .  "%' 
                    ORDER by ngay_nhap desc
                    LIMIT $pag,$numShow";
                }
            }

            $res = $conn->selectData($sql);
            $show = "
            <tr>
                <th>Id Imports</th>
                <th>Id Importers</th>
                <th>Id Providers</th>
                <th>Date</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
            ";

            $countPos = 0;
            while($line=mysqli_fetch_array($res)) {
                $date = explode('-',$line['ngay_nhap']);
                $timeConvert = mktime(0,0,0,(int)$date[1],(int)$date[2],(int)$date[0]);
                $time = date("M d, Y", $timeConvert);
                $show .= "
                <tr>
                    <td>".$line['id_phieunhap']."</td>
                    <td>".$line['id_nhanviennhap']."</td>
                    <td>".$line['id_nhacungcap']."</td>
                    <td>".$time."</td>
                    <td>".number_format((int)$line['tong_gia_nhap'])." VNĐ</td>
                    <td>
                        <div class='dashboard-manage-table-action disable-copy' id='action-$countPos'>
                            <ul class='dashboard-manage-table-action-items'>
                                <li>Details</li>
                                <li>Delete</li>
                            </ul>
                        </div>
                    </td>
                </tr>
                ";
                $countPos++;
            }
        }

        if ($page == 'Track Invoice') {
            if (isset($_GET['numPag'])) {
                $numPag = $_GET['numPag'];
                if (isset($_GET['textShow'])) {
                    $sum = mysqli_fetch_array($conn->selectData('select count(*) as count from hoa_don'))['count'];
                    echo "( ".($pag+1)." - ".($numShow+$pag)." of $sum results )";
                    return;
                }
                echo $count = ceil(mysqli_fetch_array($conn->selectData('select count(*) as count from hoa_don'))['count']/$numShow);
                return;
            }

            if (isset($_GET['popUp']) && isset($_GET['clickPos'])) {
                $click = $_GET['clickPos'];
                $show = '';
                $res = $conn->selectData("select * from chitiet_hoadon where id_hoadon ='".$click."'");

                $sum = 0;

                $show = "
                    <span id='dm-popup-title'>View details of $click</span>
                    <i class='fas fa-times dm-pop-up-close-btn'></i>
                    <div class='dm-details-content'>
                    <table class='dm-details-content-items'>
                    <tr>
                        <th>Name Products</th>
                        <th>Size</th>
                        <th>Quantity</th>
                        <th>Cost</th>
                        <th>Total</th>
                    </tr>
                ";
                while ($line = mysqli_fetch_array($res)) {
                    $so_luong = (int) $line['so_luong'];
                    $gia_nhap = (int) $line['gia'];
                    $total = $so_luong * $gia_nhap;
                    $sum += $total;

                    $name = mysqli_fetch_array($conn->selectData("select ten_nhomsanpham from nhom_san_pham where id_nhomsanpham = ( SELECT id_nhomsanpham FROM san_pham WHERE id_sanpham = '".$line['id_sanpham']."' )"))['ten_nhomsanpham'];
                    $size = mysqli_fetch_array($conn->selectData("select size from san_pham where id_sanpham = '".$line['id_sanpham']."'"))['size'];

                    $show .= "
                    <tr>
                        <td>$name</td>
                        <td>$size</td>
                        <td>".number_format($so_luong)."</td>
                        <td>".number_format($gia_nhap)." VNĐ</td>
                        <td>".number_format($total)." VNĐ</td>
                    </tr>
                    ";
                }
                $sql = "select id_nguoidung, id_nhanvienban from hoa_don where id_hoadon ='$click'";
                
                $nv = mysqli_fetch_array($conn->selectData($sql))['id_nguoidung'];
                $ncc = mysqli_fetch_array($conn->selectData($sql))['id_nhanvienban'];

                $show .= "
                    </table>
                    </div>
                    <div class='dm-details-more'>
                        <div class='dm-d-left'>
                            <span>Id customer: $nv</span>
                            <span>Id seller: $ncc</span>
                        </div>
                        <div class='dm-d-right'>
                            <span>Total: ".number_format($sum)." VNĐ</span>
                        </div>
                    </div>
                ";
                echo $show;
                return;
            }
            if (isset($_GET['popUp'])) return;

            $sql="select *
            from hoa_don
            ORDER by ngay_mua desc
            LIMIT $pag,$numShow";

            if (isset($_GET['search'])) {
                if (isset($_GET['val'])) {
                    $val = explode("-",$_GET['val']);
                }
                if ($val[0] != 'none') {
                    if ($val[0]=='ngay_mua') {
                        if (count($val)==4) $val[1] = $val[3] . "-" . $val[2] . "-" . $val[1];
                        if (count($val)==3) $val[1] = $val[2] . "-" . $val[1];
                    }
                    $sql = "SELECT*
                    FROM hoa_don
                    WHERE " . $val[0] . " like '%" . $val[1] .  "%' 
                    ORDER by ngay_mua desc
                    LIMIT $pag,$numShow";
                }
            }

            $res = $conn->selectData($sql);
            $show = "
            <tr>
                <th>Id Invoices</th>
                <th>Id Customers</th>
                <th>Id Sellers</th>
                <th>Date</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
            ";

            $countPos = 0;
            while($line=mysqli_fetch_array($res)) {
                $date = explode('-',$line['ngay_mua']);
                $timeConvert = mktime(0,0,0,(int)$date[1],(int)$date[2],(int)$date[0]);
                $time = date("M d, Y", $timeConvert);
                $show .= "
                <tr>
                    <td>".$line['id_hoadon']."</td>
                    <td>".$line['id_nguoidung']."</td>
                    <td>".$line['id_nhanvienban']."</td>
                    <td>".$time."</td>
                    <td>".number_format((int)$line['tong_gia'])." VNĐ</td>
                    <td>
                        <div class='dashboard-manage-table-action disable-copy' id='action-$countPos'>
                            <ul class='dashboard-manage-table-action-items'>
                                <li>Details</li>
                                <li>Delete</li>
                            </ul>
                        </div>
                    </td>
                </tr>
                ";
                $countPos++;
            }
        }

        if ($page == 'Manage cProducts') {
            if (isset($_GET['numPag'])) {
                $numPag = $_GET['numPag'];
                if (isset($_GET['textShow'])) {
                    $sum = mysqli_fetch_array($conn->selectData('select count(*) as count from san_pham'))['count'];
                    echo "( ".($pag+1)." - ".($numShow+$pag)." of $sum results )";
                    return;
                }
                echo $count = ceil(mysqli_fetch_array($conn->selectData('select count(*) as count from san_pham'))['count']/$numShow);
                return;
            }

            if (isset($_GET['popUp']) && isset($_GET['clickPos'])) {
                $click = $_GET['clickPos'];
                $nameInput = explode("&",$click)[0];
                $sizeInput = explode("&",$click)[1];
                $show = '';
                $res = $conn->selectData("select * from san_pham 
                                where id_nhomsanpham = (select id_nhomsanpham from nhom_san_pham where ten_nhomsanpham = N'$nameInput')
                                and size = $sizeInput");

                $show = "
                    <span id='dm-popup-title'>View details of $nameInput size $sizeInput</span>
                    <i class='fas fa-times dm-pop-up-close-btn'></i>
                    <div class='dm-details-content'>
                    <table class='dm-details-content-items'>
                    <tr>
                        <th>Name Products</th>
                        <th>Size</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Save</th>
                    </tr>
                ";
                while ($line = mysqli_fetch_array($res)) {
                    $so_luong = (int) $line['so_luong'];
                    $gia_sanpham = (int) $line['gia_sanpham'];
                    
                    $show .= "
                    <tr>
                        <td>$nameInput</td>
                        <td>$sizeInput</td>
                        <td><input type='text' name='quantity' value='".number_format($so_luong)."'></td>
                        <td><input type='text' name='price' value='".number_format($gia_sanpham)." VNĐ'></td>
                        <td><button class=save-btn>Save</button></td>
                    </tr>
                    ";
                }
                $show .= "
                    </table>
                    </div>
                ";
                echo $show;
                return;
            }
            if (isset($_GET['popUp'])) return;
            
            if (isset($_GET['add'])) {
                // if (isset($_GET['valCB'])) {
                //     $valCB = explode("-",$_GET['valCB']);
                // }
                if (isset($_GET['valText'])) {
                    $valText = explode("-",$_GET['valText']);
                }
                $resAdd = $conn->executeQuery("insert into san_pham(id_sanpham, id_nhomsanpham, size, gia_sanpham, so_luong) values('".$valText[0]."', (select id_nhomsanpham from nhom_san_pham where ten_nhomsanpham = N'".$valText[1]."'), '".$valText[2]."', '".$valText[4]."', '".$valText[3]."')");
                echo $resAdd;
                return;
            }

            if (isset($_GET['update'])) {
                if (isset($_GET['val'])) {
                    $val = explode("-",$_GET['val']);
                }

                if ($val[0]== 'text') {
                    $resUpdate = $conn->executeQuery("update san_pham set so_luong = '".$val[3]."', gia_sanpham = '".$val[4]."' where id_nhomsanpham = (select id_nhomsanpham from nhom_san_pham where ten_nhomsanpham = '".$val[1]."') and size = '".$val[2]."'");
                    echo $resUpdate;
                    return;
                }
                if ($val[0]=='delete') {
                    $resUpdate = $conn->executeQuery("delete from san_pham where id_nhomsanpham = (select id_nhomsanpham from nhom_san_pham where ten_nhomsanpham = '".$val[1]."') and size = '".$val[2]."'");
                    echo $resUpdate;
                    return;
                }
            }
            

            $sql="select *
            from nhom_san_pham, san_pham
            where nhom_san_pham.id_nhomsanpham = san_pham.id_nhomsanpham
            ORDER by ";
            if (isset($_GET['title'])&&isset($_GET['sort'])&&$_GET['title']!="") {
                $title = $_GET['title'];
                $sort = $_GET['sort'];
                if ($title=="Size") {
                    $sql .= "size $sort ";
                } else if ($title=="Name Products") {
                    $sql .= "ten_nhomsanpham $sort ";
                } else if ($title=="Price") {
                    $sql .= "gia_sanpham $sort ";
                } else if ($title=="In stock") {
                    $sql .= "so_luong $sort ";
                }
            } else $sql .= "ten_nhomsanpham, size asc ";
            $sql .= " LIMIT $pag,$numShow";

            if (isset($_GET['search'])) {
                if (isset($_GET['val'])) {
                    $val = explode("-",$_GET['val']);
                }
                if ($val[0] != 'none') {
                    if ($val[0] == 'ten_nhomsanpham') {
                        $sql = "select *
                        from nhom_san_pham, san_pham
                        where nhom_san_pham.id_nhomsanpham = san_pham.id_nhomsanpham
                        and nhom_san_pham.ten_nhomsanpham LIKE '%".$val[1]."%'
                        ORDER by ten_nhomsanpham, size asc
                        LIMIT $pag,$numShow";
                    }
                    else {
                        $sql = "SELECT*
                        from nhom_san_pham, san_pham
                        where nhom_san_pham.id_nhomsanpham = san_pham.id_nhomsanpham
                        and " . $val[0] . " like '%" . $val[1] .  "%' 
                        ORDER by ten_nhomsanpham, size asc
                        LIMIT $pag,$numShow";
                    }
                }
            }

            $res = $conn->selectData($sql);
            $show = "
            <tr>
                <th>Name Products</th>
                <th>Size</th>
                <th>Price</th>
                <th>In stock</th>
                <th>Action</th>
            </tr>
            ";

            $countPos = 0;
            while($line=mysqli_fetch_array($res)) {
                $show .= "
                <tr>
                    <td>".$line['ten_nhomsanpham']."</td>
                    <td>".$line['size']."</td>
                    <td>".$line['gia_sanpham']."</td>
                    <td>".$line['so_luong']."</td>
                    <td>
                        <div class='dashboard-manage-table-action disable-copy' id='action-$countPos'>
                            <ul class='dashboard-manage-table-action-items'>
                                <li>Details</li>
                                <li>Delete</li>
                            </ul>
                        </div>
                    </td>
                </tr>
                ";
                $countPos++;
            }
        }

        if ($page == "Manage Providers") {
            if (isset($_GET['numPag'])) {
                $numPag = $_GET['numPag'];
                if (isset($_GET['textShow'])) {
                    $sum = mysqli_fetch_array($conn->selectData('select count(*) as count from nha_cung_cap'))['count'];
                    echo "( ".($pag+1)." - ".($numShow+$pag)." of $sum results )";
                    return;
                }
                echo $count = ceil(mysqli_fetch_array($conn->selectData('select count(*) as count from nha_cung_cap'))['count']/$numShow);
                return;
            }

            if (isset($_GET['popUp']) && isset($_GET['clickPos'])) {
                $click = $_GET['clickPos'];
                $idInput = explode("&",$click)[0];
                $nameInput = explode("&",$click)[1];
                $addressInput = explode("&",$click)[2];
                $show = '';
                $res = $conn->selectData("select * from nha_cung_cap 
                                where id_nhacungcap = '$idInput'");

                $show = "
                    <span id='dm-popup-title'>View details of $nameInput</span>
                    <i class='fas fa-times dm-pop-up-close-btn'></i>
                    <div class='dm-details-content'>
                    <table class='dm-details-content-items'>
                    <tr>
                        <th>Id Provider</th>
                        <th>Name Provider</th>
                        <th>Address Provider</th>
                        <th>Save</th>
                    </tr>
                ";
                while ($line = mysqli_fetch_array($res)) {
                    $show .= "
                    <tr>
                        <td>$idInput</td>
                        <td><input type='text' name='name' value='$nameInput'></td>
                        <td><input type='text' name='address' value='$addressInput'></td>
                        <td><button class=save-btn>Save</button></td>
                    </tr>
                    ";
                }
                $show .= "
                    </table>
                    </div>
                ";
                echo $show;
                return;
            }
            if (isset($_GET['popUp'])) return;

            if (isset($_GET['add'])) {
                if (isset($_GET['valText'])) {
                    $valText = explode("-",$_GET['valText']);
                }
                $resAdd = $conn->executeQuery("insert into nha_cung_cap(id_nhacungcap, ten_nhacungcap, diachi_nhacungcap) values('".$valText[0]."', '".$valText[1]."', '".$valText[2]."')");
                echo $resAdd;
                return;
            }

            if (isset($_GET['update'])) {
                if (isset($_GET['val'])) {
                    $val = explode("-",$_GET['val']);
                }

                if ($val[0]== 'text') {
                    $resUpdate = $conn->executeQuery("update nha_cung_cap set ten_nhacungcap = N'".$val[2]."', diachi_nhacungcap = N'".$val[3]."' where id_nhacungcap = '".$val[1]."'");
                    echo $resUpdate;
                    return;
                }
                if ($val[0]=='delete') {
                    $resUpdate = $conn->executeQuery("delete from nha_cung_cap where id_nhacungcap = '".$val[1]."'");
                    echo $resUpdate;
                    return;
                }
            }

            $sql="select *
            from nha_cung_cap
            ORDER by ";
            if (isset($_GET['title'])&&isset($_GET['sort'])&&$_GET['title']!="") {
                $title = $_GET['title'];
                $sort = $_GET['sort'];
                if ($title=="Id Providers") {
                    $sql .= "id_nhacungcap $sort ";
                } else if ($title=="Name Providers") {
                    $sql .= "ten_nhacungcap $sort ";
                } else if ($title=="Address Providers") {
                    $sql .= "diachi_nhacungcap $sort ";
                }
            } else $sql .= "id_nhacungcap asc ";
            $sql .= " LIMIT $pag,$numShow";

            if (isset($_GET['search'])) {
                if (isset($_GET['val'])) {
                    $val = explode("-",$_GET['val']);
                }
                if ($val[0] != 'none') {
                    $sql = "select * from nha_cung_cap where ".$val[0]." like '%".$val[1]."%' order by id_nhacungcap limit $pag, $numShow";
                }
            }

            $res = $conn->selectData($sql);
            $show = "
            <tr>
                <th>Id Providers</th>
                <th>Name Providers</th>
                <th>Address Providers</th>
                <th>Action</th>
            </tr>
            ";

            $countPos = 0;
            while($line=mysqli_fetch_array($res)) {
                $show .= "
                <tr>
                    <td>".$line['id_nhacungcap']."</td>
                    <td>".$line['ten_nhacungcap']."</td>
                    <td>".$line['diachi_nhacungcap']."</td>
                    <td>
                        <div class='dashboard-manage-table-action disable-copy' id='action-$countPos'>
                            <ul class='dashboard-manage-table-action-items'>
                                <li>Details</li>
                                <li>Delete</li>
                            </ul>
                        </div>
                    </td>
                </tr>
                ";
                $countPos++;
            }
        }

        echo $show;
    }

?>