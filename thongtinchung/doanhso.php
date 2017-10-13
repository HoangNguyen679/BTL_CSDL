<?php
   $host        = "host=127.0.0.1";
   $port        = "port=5432";
   $dbname      = "dbname=btl";
   $credentials = "user=postgres password=12345678";

   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db){
      echo "Error : Unable to open database\n";
   } else {

   }  
	$sql1 =
		"with nhaphang(idlo, giatri_lo)
		as(
		select idlo, sum(gianhap_lh_sp) as giatri_lo
		from lh_sp
		group by idlo
		)
		select date_part('year',date_trunc('month',ngaynhap_lo)) as year,date_part('month',date_trunc('month',ngaynhap_lo)) as month,sum(giatri_lo) as tien_nhap
		from nhaphang natural join lo_hang
		group by date_trunc('month',ngaynhap_lo);";

	$sql2 =
		"with banra(idhd,giatri_hd)
		as(
		select idhd,sum(soluong_hoadon*dongia_sanpham) as giatri_hd
		from sp_hd,san_pham
		where sp_hd.idsp = san_pham.idsp
		group by idhd
		)
		select date_part('year',date_trunc('month',ngaytao_hoadon)) as year,date_part('month',date_trunc('month',ngaytao_hoadon)) as month,sum(giatri_hd) as tien_ban
		from banra natural join hoa_don
		group by date_trunc('month',ngaytao_hoadon);;";
		
	$ret = pg_query($db, $sql1);
	if(!$ret){
		echo pg_last_error($db);
		exit;
	}
	$ret2 = pg_query($db, $sql2);
	if(!$ret2){
		echo pg_last_error($db);
		exit;
	}
	$arr1 = pg_fetch_all($ret);
	$arr2 = pg_fetch_all($ret2);
	
	$c1=count($arr1);
	$c2=count($arr2);
   pg_close($db);
?>
<html>
<head>
	<title>Vi du the cellpadding va cellspacing trong HTML</title>
	<style> .bang={align = "center"} </style>
</head>
<body>
<table border="1" cellpadding="10" cellspacing="0">
<tr>
<th>Năm</th>
<th>Tháng</th>
<th>Tiền nhập</th>
<th>Tiền bán</th>
<th>Tiền lãi</th>
</tr>
<tr><td rowspan="12" align="center">2015</td>
<td align="center">1</td>
<td align="center"><?php
$n=0; 
for($i=0;$i<$c1;$i++){
	if($arr1[$i]['month']==1) $n=$arr1[$i]['tien_nhap'];
}
echo $n;?>
<td align="center"><?php
$b=0; 
for($i=0;$i<$c2;$i++){
	if($arr2[$i]['month']==1) $b=$arr2[$i]['tien_ban'];
}
echo $b;?>
<td align="center"><?php echo ($b-$n);?>
</tr>


<tr>
<td align="center">2</td>
<td align="center"><?php
$n=0; 
for($i=0;$i<$c1;$i++){
	if($arr1[$i]['month']==2) $n=$arr1[$i]['tien_nhap'];
}
echo $n;?>
<td align="center"><?php
$b=0; 
for($i=0;$i<$c2;$i++){
	if($arr2[$i]['month']==2) $b=$arr2[$i]['tien_ban'];
}
echo $b;?>
<td align="center"><?php echo ($b-$n);?>
</tr>


<tr>
<td align="center">3</td>
<td align="center"><?php
$n=0; 
for($i=0;$i<$c1;$i++){
	if($arr1[$i]['month']==3) $n=$arr1[$i]['tien_nhap'];
}
echo $n;?>
<td align="center"><?php
$b=0; 
for($i=0;$i<$c2;$i++){
	if($arr2[$i]['month']==3) $b=$arr2[$i]['tien_ban'];
}
echo $b;?>
<td align="center"><?php echo ($b-$n);?>
</tr>


<tr>
<td align="center">4</td>
<td align="center"><?php
$n=0; 
for($i=0;$i<$c1;$i++){
	if($arr1[$i]['month']==4) $n=$arr1[$i]['tien_nhap'];
}
echo $n;?>
<td align="center"><?php
$b=0; 
for($i=0;$i<$c2;$i++){
	if($arr2[$i]['month']==4) $b=$arr2[$i]['tien_ban'];
}
echo $b;?>
<td align="center"><?php echo ($b-$n);?>
</tr>


<tr>
<td align="center">5</td>
<td align="center"><?php
$n=0; 
for($i=0;$i<$c1;$i++){
	if($arr1[$i]['month']==5) $n=$arr1[$i]['tien_nhap'];
}
echo $n;?>
<td align="center"><?php
$b=0; 
for($i=0;$i<$c2;$i++){
	if($arr2[$i]['month']==5) $b=$arr2[$i]['tien_ban'];
}
echo $b;?>
<td align="center"><?php echo ($b-$n);?>
</tr>


<tr>
<td align="center">6</td>
<td align="center"><?php
$n=0; 
for($i=0;$i<$c1;$i++){
	if($arr1[$i]['month']==6) $n=$arr1[$i]['tien_nhap'];
}
echo $n;?>
<td align="center"><?php
$b=0; 
for($i=0;$i<$c2;$i++){
	if($arr2[$i]['month']==6) $b=$arr2[$i]['tien_ban'];
}
echo $b;?>
<td align="center"><?php echo ($b-$n);?>
</tr>


<tr>
<td align="center">7</td>
<td align="center"><?php
$n=0; 
for($i=0;$i<$c1;$i++){
	if($arr1[$i]['month']==7) $n=$arr1[$i]['tien_nhap'];
}
echo $n;?>
<td align="center"><?php
$b=0; 
for($i=0;$i<$c2;$i++){
	if($arr2[$i]['month']==7) $b=$arr2[$i]['tien_ban'];
}
echo $b;?>
<td align="center"><?php echo ($b-$n);?>
</tr>


<tr>
<td align="center">8</td>
<td align="center"><?php
$n=0; 
for($i=0;$i<$c1;$i++){
	if($arr1[$i]['month']==8) $n=$arr1[$i]['tien_nhap'];
}
echo $n;?>
<td align="center"><?php
$b=0; 
for($i=0;$i<$c2;$i++){
	if($arr2[$i]['month']==8) $b=$arr2[$i]['tien_ban'];
}
echo $b;?>
<td align="center"><?php echo ($b-$n);?>
</tr>


<tr>
<td align="center">9</td>
<td align="center"><?php
$n=0; 
for($i=0;$i<$c1;$i++){
	if($arr1[$i]['month']==9) $n=$arr1[$i]['tien_nhap'];
}
echo $n;?>
<td align="center"><?php
$b=0; 
for($i=0;$i<$c2;$i++){
	if($arr2[$i]['month']==9) $b=$arr2[$i]['tien_ban'];
}
echo $b;?>
<td align="center"><?php echo ($b-$n);?>
</tr>


<tr>
<td align="center">10</td>
<td align="center"><?php
$n=0; 
for($i=0;$i<$c1;$i++){
	if($arr1[$i]['month']==10) $n=$arr1[$i]['tien_nhap'];
}
echo $n;?>
<td align="center"><?php
$b=0; 
for($i=0;$i<$c2;$i++){
	if($arr2[$i]['month']==10) $b=$arr2[$i]['tien_ban'];
}
echo $b;?>
<td align="center"><?php echo ($b-$n);?>
</tr>


<tr>
<td align="center">11</td>
<td align="center"><?php
$n=0; 
for($i=0;$i<$c1;$i++){
	if($arr1[$i]['month']==11) $n=$arr1[$i]['tien_nhap'];
}
echo $n;?>
<td align="center"><?php
$b=0; 
for($i=0;$i<$c2;$i++){
	if($arr2[$i]['month']==11) $b=$arr2[$i]['tien_ban'];
}
echo $b;?>
<td align="center"><?php echo ($b-$n);?>
</tr>


<tr>
<td align="center">12</td>
<td align="center"><?php
$n=0; 
for($i=0;$i<$c1;$i++){
	if($arr1[$i]['month']==12) $n=$arr1[$i]['tien_nhap'];
}
echo $n;?>
<td align="center"><?php
$b=0; 
for($i=0;$i<$c2;$i++){
	if($arr2[$i]['month']==12) $b=$arr2[$i]['tien_ban'];
}
echo $b;?>
<td align="center"><?php echo ($b-$n);?>
</tr>
</table>

</body>
</html>