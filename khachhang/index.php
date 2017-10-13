<html><head><title>Thông tin khách hàng</title>
<link href="style.css" type = "text/css" rel = "stylesheet" />
</head>
<body>
<?php
	$connect = pg_connect("host=localhost port=5432 dbname=btl user=postgres password=12345678");
?>
<table border = "1px"  width = "1000px"  bordercolor = black align = center>
	<tr bgcolor = #3ab4a6 align = center valign>
		<td>Mã KH</td>
		<td>Họ Tên</td>
		<td>Số điện thoại</td>
		<td>Email</td>
		<td>Địa chỉ</td>
		<td>Giới tính</td>
	</tr>

<?php
$baitren_mottrang = 10;
// Nếu chưa chọn trang để xem. thì ta mặc định người dùng xem đang số 0 .
if ( !isset($_GET['page'] ))
{
    $page = 0 ;
}
else $page = $_GET['page'];
$sodu_lieu = pg_num_rows(pg_query($connect,"SELECT * FROM khach_hang "));
$sotrang = $sodu_lieu/$baitren_mottrang;

$result =pg_query($connect,"SELECT * FROM khach_hang order by idkh LIMIT $baitren_mottrang offset {$page}*$baitren_mottrang ");
?>
<?php
while($row = pg_fetch_array($result)) 
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
<?php
	}
for ( $page = 0; $page <= $sotrang; $page ++ )
{
echo "<a href='index.php?page={$page}'>{$page}</a>";
}
?>
</table>
<br>
<a href = "http://localhost/btl/khachhang/them_khachhang.php">Thêm khách hàng</a>
</body>
</html>