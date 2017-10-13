<form method = "POST">
	ID Khách Hàng: <input type = "text" name = "idkh"><br>
	Tên Khách Hàng: <input type = "text" name = "name_kh"><br>
	Số điện thoại: <input type = "text" name = "sdt" value = ""><br>
	Email: <input type = "text" name = "email"><br>
	Địa chỉ: <input type = "text" name = "addr"><br>
	Giới tính: <input type = "radio" name = "sex" value = "M"> Nam
			<input type = "radio" name = "sex" value = "F"> Nữ<br>
	<input type = "submit" name = "submit" value = "Sửa dữ liệu">
</form>
<?php 
	require_once("C:\\xampp\htdocs\btl\connect.php");
	if(isset($_POST['submit'])) {
		if($_POST['idkh'] == NULL) print "ID Khách hàng là bắt buộc";
		else {
			$check = pg_query($db, "select * from khach_hang where idkh = '".$_POST['idkh']."'");
			$count = pg_num_rows($check);
			if($count == 0) print "Khách hàng không tồn tại";
			else{
				if ($_POST['name_kh']) $query1 = pg_query($db, "update khach_hang set ten_khachhang = '".$_POST['name_kh']."' where idkh = '".$_POST['idkh']."'");
				if ($_POST['sdt']) $query2 = pg_query($db, "update khach_hang set sdt_khachhang = '".$_POST['sdt']."' where idkh = '".$_POST['idkh']."'");
				if ($_POST['email']) $query3 = pg_query($db, "update khach_hang set email_khachhang = '".$_POST['email']."' where idkh = '".$_POST['idkh']."'");
				if ($_POST['addr']) $query3 = pg_query($db, "update khach_hang set diachi_khachhang = '".$_POST['addr']."' where idkh = '".$_POST['idkh']."'");
				if (isset($_POST['sex'])) $query5 = pg_query($db, "update khach_hang set gioitinh_khachhang = '".$_POST['sex']."' where idkh = '".$_POST['idkh']."'");
				//echo $_POST['sex'];
				print "Sửa dữ liệu thành công";
			}
		}
	}
?>