<form method = "POST">
	ID Khách Hàng: <input type = "text" name = "idkh"><br>
	<input type = "submit" name = "submit" value = "Xóa">
</form>
<?php 
	if(isset($_POST['submit']){
		if($_POST['idkh'] == NULL) print "Phải điền ID khách hàng cần xóa" 
	}
?>