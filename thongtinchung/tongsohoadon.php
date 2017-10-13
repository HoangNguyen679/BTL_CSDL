<html><head><title>Thống Kê Hóa Đơn</title>
<link href="style.css" type = "text/css" rel = "stylesheet" />
</head>
<body>
	<form method = "POST">
		<select name = "choice">
			<option value = "day" selected>Hôm nay</option>
			<option value = "week">Tuần này</option>
			<option value = "month">Tháng này</option>
		</select>
		<input type = "submit" value = "Thống Kê" name = "submit" />
	</form>

<?php 
	require_once("C:\\xampp\htdocs\btl\connect.php");
	if(isset($_POST['submit'])){
		$choice = $_POST['choice'];
		//echo $choice;
		if($choice == "day"){
			$query = pg_query($db, "with tmp as(
				select idhd from hoa_don where ngaytao_hoadon = current_date
				)
				select * from hoa_don
				where idhd in (select * from tmp)");
			$num = pg_num_rows($query);
			if($num == 0){
				echo "Chưa có hóa đơn nào được lập ngày hôm nay";
			}
			else{
				echo "Tổng số: ", $num;
			?>
				<table border = "1px"  width = "1000px"  bordercolor = black align = center >
					<tr bgcolor = #3ab4a6 align = center valign>
						<td>ID HĐ</td>
						<td>ID NV</td>
						<td>ID KH</td>
						<td>Ngày tạo</td>
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
						<td><?php echo $row[3] ?></td>
						<td><?php echo $row[4] ?></td>
					</tr>
						<?php } ?>
				</table>
				<?php
			}
		}
		else if($choice == "week"){
			//echo "week";
			$query = pg_query($db, "with tmp as(
										select idhd 
										from hoa_don 
										where extract(week from ngaytao_hoadon) = extract(week from current_date)  and extract(year from ngaytao_hoadon) = extract(year from current_date)
										)
									select * from hoa_don
									where idhd in (select * from tmp);");
			$num = pg_num_rows($query);
			if($num == 0){
				echo "Không có hóa đơn được lập trong tuần này";
			}
			else{
				echo "Tổng số: ", $num, "<br>";
				?>
				<table border = "1px"  width = "1000px"  bordercolor = black align = center >
					<tr bgcolor = #3ab4a6 align = center valign>
						<td>ID HĐ</td>
						<td>ID NV</td>
						<td>ID KH</td>
						<td>Ngày tạo</td>
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
						<td><?php echo $row[3] ?></td>
						<td><?php echo $row[4] ?></td>
					</tr>
						<?php } ?>
				</table>
				<?php
			}
		}
		else{
			//echo "month";
			$query = pg_query($db, "with tmp as(
										select idhd 
										from hoa_don 
										where extract(month from ngaytao_hoadon) = extract(month from current_date)  and extract(year from ngaytao_hoadon) = extract(year from current_date)
										)
									select * from hoa_don
									where idhd in (select * from tmp);");
			$num = pg_num_rows($query);
			if($num == 0){
				echo "Không có hóa đơn được lập trong tháng này";
			}
			else{
				echo "Tổng số: ", $num, "<br>";
				?>
				<table border = "1px"  width = "1000px"  bordercolor = black align = center >
					<tr bgcolor = #3ab4a6 align = center valign>
						<td>ID HĐ</td>
						<td>ID NV</td>
						<td>ID KH</td>
						<td>Ngày tạo</td>
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
						<td><?php echo $row[3] ?></td>
						<td><?php echo $row[4] ?></td>
					</tr>
						<?php } ?>
				</table>
				<?php
			}
		}	
	}
?>	
</body>
</html>