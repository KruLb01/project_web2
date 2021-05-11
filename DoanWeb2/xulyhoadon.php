<?php
	session_start();
	include 'ConnectionDB.php';
	$con = new ConnectionDB('');
	if(isset($_POST['act']))
	{
		$act = $_POST['act'];
		switch($act)
		{
			case "add":
			{
				$sale_code = $_POST['sale-code'];
				$shipmethod = $_POST['ship_method'];
				$id_nguoidung = $_SESSION['id_nguoidung'];
				$date = date("Y-m-d");
				$total = $_POST['total'];
				$sql = "Insert into hoa_don values ('','$id_nguoidung','','$date','$total','$sale_code')";
				if($con->preparedExecuteDatabase($sql))
				{
					$last_id = mysqli_insert_id($con->getConnection());
					$sql1 = "Update san_pham INNER JOIN gio_hang on san_pham.id_sanpham = gio_hang.id_sanpham"
						   ." set san_pham.so_luong = san_pham.so_luong - gio_hang.so_luong where gio_hang.id_nguoidung='$id_nguoidung'";
					$sql2 = "Insert into chitiet_hoadon\n"
						   ."Select $last_id,gio_hang.id_sanpham,gio_hang.so_luong,gio_hang.so_luong*san_pham.gia_sanpham"
						   ." from gio_hang,san_pham"
						   ." where gio_hang.id_sanpham = san_pham.id_sanpham and gio_hang.id_nguoidung='$id_nguoidung'";
				    $sql3 ="Delete from gio_hang where gio_hang.id_nguoidung='$id_nguoidung'";
					if($con->preparedExecuteDatabase($sql1) && $con->preparedExecuteDatabase($sql2) && $con->preparedExecuteDatabase($sql3))
					{
						$data = array("msg" => "Thêm mới hóa đơn thành công","success" => 1);
						echo json_encode($data);
					}
					else{
						$data = array("msg" => "Lỗi khi thêm mới hóa đơn","success" => 0);
						echo json_encode($data);
					}
				}
				else{
						$data = array("msg" => "Lỗi khi thêm mới hóa đơn","success" => 0);
						echo json_encode($data);
					}
			}
		}
	}