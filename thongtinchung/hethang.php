<html><head><title>Các sản phẩm đã hết hàng</title>
<link href="style.css" type = "text/css" rel = "stylesheet" />
</head>
<body>
Tổng số:
<?php 
require_once("C:\\xampp\htdocs\btl\connect.php");
$query = pg_query($db, "with tmp as(
select idsp, sum(conlai) as tong from kho
group by idsp
having sum(conlai) = 0
)
select * from san_pham where idsp in (select idsp from tmp)");
$num = pg_num_rows($query);
echo $num;
?>
<table border = "1px"  width = "1000px"  bordercolor = black align = center >
					<tr bgcolor = #3ab4a6 align = center valign>
						<td>Mã SP</td>
						<td>Tên SP</td>
						<td>Hãng</td>
						<td>Giá Bán</td>
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
					</tr>
						<?php } ?>
</table>
</body>
</html>