<html><head><title>Tìm kiếm khách hàng</title>
<link href="style.css" type = "text/css" rel = "stylesheet" />
</head>
<body>

<form method = "POST">
	<input type = "text" name = "searchbox"/> 
	<input type = "radio" name = "search_with" value = "ID" checked />ID <input type = "radio" name = "search_with" value = "ten" /> Tên
	<input type = "submit" value = "Search" name = "search" />
	<br />
</form>
<?php
require_once("C:\\xampp\htdocs\btl\connect.php");
if(isset($_POST['search'])){
	$check = $_POST['search_with'];
	if($check === 'ID'){
		$id = (int)$_POST['searchbox'];
		if($id == "") print "Không được để trống hoặc nhập chữ";
		else{
			$query = pg_query($db, "select * from khach_hang where idkh = $id");
			$num = pg_num_rows($query);
			if($num == 0) echo "Khong tim thay du lieu";
			else{
					$row = pg_fetch_array($query);
?>
					<table border = "1px"  width = "1000px"  bordercolor = black align = center >
						<tr bgcolor = #3ab4a6 align = center valign>
							<td>Mã KH</td>
							<td>Họ Tên</td>
							<td>Số điện thoại</td>
							<td>Email</td>
							<td>Địa chỉ</td>
							<td>Giới tính</td>
						</tr>
						<tr align = left valign>
							<td><?php echo $row[0] ?></td>
							<td><?php echo $row[1] ?></td>
							<td><?php echo $row[2] ?></td>
							<td><?php echo $row[3] ?></td>
							<td><?php echo $row[4] ?></td>
							<td><?php echo $row[5] ?></td>
						</tr>
						</table>
<?php				
				}
			}
	}
	else{
		//echo "case 2";
		$ten = $_POST['searchbox'];
		if($ten == "") print "Không được để trống";
		else{
			$query = pg_query($db, "select * from khach_hang where ten_khachhang like '%$ten%' ");
			$num = pg_num_rows($query);
			if($num == 0) echo "Khong tim thay du lieu";
			else{
?>
				<table border = "1px"  width = "1000px"  bordercolor = black align = center >
					<tr bgcolor = #3ab4a6 align = center valign>
						<td>Mã KH</td>
						<td>Họ Tên</td>
						<td>Số điện thoại</td>
						<td>Email</td>
						<td>Địa chỉ</td>
						<td>Giới tính</td>
					</tr>
					<?php
					while($row = pg_fetch_array($query)) 
						{
					?>	
					<tr align = left valign>
						<td><?php echo $row[0] ?></td>
						<td><?php echo $row[1] ?></td>
						<td><?php echo $row[2] ?></td>
						<td><?php echo $row[3] ?></td>
						<td><?php echo $row[4] ?></td>
						<td><?php echo $row[5] ?></td>
					</tr>
						<?php } ?>
				</table>
<?php
						
				}
			}
}
}
?>
</body>
</html>