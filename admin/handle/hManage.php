<?php
    if(isset($_GET['page'])) {
        $page = $_GET['page'];
        $numShow = $_GET['num'];
        if (isset($_GET['pag'])) $pag = ($_GET['pag']-1) * $numShow;

        include('../templates/connectData.php');
        $conn = new connectData('');
        $sql =  '';
        $show = '';

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

        if ($page == 'Manage Permission'){
            $sql = "SELECT *
            FROM quyen
            ORDER by cast(id_quyen as unsigned)
            LIMIT $pag,$numShow";

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
            while($line=mysqli_fetch_array($res)) {
                $show .= "
                <tr>
                    <td>".$line['id_quyen']."</td>
                    <td>".$line['ten_quyen']."</td>
                    <td>".$line['mieuta']."</td>
                    <td>".$line['so_luong']."</td>
                    <td><div class='dashboard-manage-table-action'>
                        <ul class='dashboard-manage-table-action-items'>
                            <li>Update</li>
                            <li>Delete</li>
                        </ul>
                    </div></td>
                </tr>
                ";
            }
        }
        echo $show;
    }
?>