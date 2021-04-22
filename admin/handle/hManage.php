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
                    $sum = mysqli_fetch_array($conn->selectData('select count(*) as count from quyen'))['count'];
                    echo "( ".($pag+1)." - ".($numShow+$pag)." of $sum results )";
                    return;
                }
                echo $count = ceil(mysqli_fetch_array($conn->selectData('select count(*) as count from quyen'))['count']/$numShow);
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

            if (isset($_GET['update'])) {
                if (isset($_GET['val'])) {
                    $val = explode("-",$_GET['val']);
                }

                if ($val[0]== 'text') {
                    $resUpdate = $conn->executeQuery("update quyen set ten_quyen = '".$val[1]."', mieuta = '".$val[2]."' where id_quyen = '".$val[3]."'");
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
            ORDER by cast(id_quyen as unsigned)
            LIMIT $pag,$numShow";

            if (isset($_GET['search'])) {
                if (isset($_GET['val'])) {
                    $val = explode("-",$_GET['val']);
                }
                if ($val[0] != 'none') {
                    $sql = "SELECT *
                    FROM quyen
                    WHERE " . $val[0] . " like '%" . $val[1] .  "%' 
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
                    $temp = $conn->selectData('select * from chuc_nang');   
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
                    $sum = mysqli_fetch_array($conn->selectData('select count(*) as count from quyen'))['count'];
                    echo "( ".($pag+1)." - ".($numShow+$pag)." of $sum results )";
                    return;
                }
                echo $count = ceil(mysqli_fetch_array($conn->selectData('select count(*) as count from quyen'))['count']/$numShow);
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

            if (isset($_GET['update'])) {
                if (isset($_GET['val'])) {
                    $val = explode("-",$_GET['val']);
                }

                if ($val[0]== 'text') {
                    $resUpdate = $conn->executeQuery("update quyen set ten_quyen = '".$val[1]."', mieuta = '".$val[2]."' where id_quyen = '".$val[3]."'");
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
            ORDER by cast(id_quyen as unsigned)
            LIMIT $pag,$numShow";

            if (isset($_GET['search'])) {
                if (isset($_GET['val'])) {
                    $val = explode("-",$_GET['val']);
                }
                if ($val[0] != 'none') {
                    $sql = "SELECT *
                    FROM quyen
                    WHERE " . $val[0] . " like '%" . $val[1] .  "%' 
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
                    $temp = $conn->selectData('select * from chuc_nang');   
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

        if ($page == 'Manage Employees'){
            $sql = "select * 
                    from admin, nguoi_dung
                    where admin.id_nguoidung = nguoi_dung.id_nguoidung
                    order by cast(admin.id_nguoidung as unsigned)
                    limit 0, 10";
        }

        echo $show;
    }
?>