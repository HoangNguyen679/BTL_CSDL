<html><head><title>Tồn kho lâu</title>
<link href="style.css" type = "text/css" rel = "stylesheet" />
</head>
<form method = "post">
Danh sách lô hàng tồn kho hơn
<input type = "text" name = "flag">
tháng<br>
<input type = "submit" value = "Tìm Kiếm" name = "submit">
</form>
<br>Tổng số:
<?php
require_once("C:\\xampp\htdocs\btl\connect.php");
if(isset($_POST['submit']))
{
	$value = $_POST['flag'];
	$query = pg_query($db, "with tmp as(
select idlo, sum(conlai) as Con_lai from kho group by idlo having sum(conlai) > 0
)
select * from lo_hang where ngaynhap_lo < current_date - interval '".$value." month' and idlo in (select idlo from tmp);");
	$num = pg_num_rows($query);
	echo $num;

?>
	<table border = "1px"  width = "1000px"  bordercolor = black align = center >
						<tr bgcolor = #3ab4a6 align = center valign>
							<td>ID Lô</td>
							<td>Ngày nhập</td>
							<td>ID NCC</td>
							<td>Giá trị</td>
						</tr>
						<?php
						while($row = pg_fetch_array($query)) 
							{
						?>	
							<tr align = left valign>
								<td><?php echo $row[0] ?></td>
								<td><?php echo $row[1] ?></td>
								<td><?php echo $row[2] ?></td>
								<td><?php echo $row[3], " đ"?></td>
							</tr>
						<?php
						}
						?>
	</table>
<?php
}
?>