<html><head><title>Thêm khách hàng</title>
<link href="style.css" type = "text/css" rel = "stylesheet" />
</head>
<body>
<form method = "POST">
	ID Khách Hàng: <input type = "text" name = "idkh"><br>
	Tên Khách Hàng: <input type = "text" name = "name_kh"><br>
	Số điện thoại: <input type = "text" name = "sdt" value = ""><br>
	Email: <input type = "text" name = "email"><br>
	Địa chỉ: <input type = "text" name = "addr"><br>
	Giới tính: <input type = "radio" name = "sex" value = "M"> Nam
			<input type = "radio" name = "sex" value = "F"> Nữ<br>
	<input type = "submit" id = "smbtt" name = "submit" value = "Thêm dữ liệu">
</form>
<?php 
	require_once("C:\\xampp\htdocs\btl\connect.php");
	if(isset($_POST['submit'])) {
		if($_POST['idkh'] == NULL or $_POST['name_kh'] == NULL or $_POST['sdt'] == NULL or $_POST['email'] == NULL or $_POST['addr'] == NULL or $_POST['sex'] == NULL) print "Phải điền đầy đủ thông tin";
		else {
			$check = pg_query($db, "select * from khach_hang where idkh = '".$_POST['idkh']."'");
			$count = pg_num_rows($check);
			if($count > 0) print "ID khách hàng đã tồn tại";
			else{
				$query = pg_query($db, "insert into khach_hang values (".$_POST['idkh'].",'".$_POST['name_kh']."','".$_POST['sdt']."','".$_POST['email']."','".$_POST['addr']."','".$_POST['sex']."')");
				if($query) print "Thêm dữ liệu thành công";
			}
		}
	}
?>
</body>
</html>