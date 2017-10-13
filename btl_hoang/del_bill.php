<html>
	 <head>
		 <title>XÓA HÓA ĐƠN</title>
		 <link  rel="stylesheet" type="text/css" href="style.css"/>
	 </head>
	 <body >
		 	 <center class="title">XÓA HÓA ĐƠN</center>
     	<form action = "" method="POST">
				<center>
					<table cellpadding="10" cellspacing="5">
						<tr>
							<th scope="row">ID Hóa Đơn: </th>
							<td><input type="text" name="idhd" id="idhd"
								required="required" placeholder="Ex: 1000"><br/></td>
						</tr>
					</table>
				</center>
			 <input type="submit" name="submit" value="Done"/>
			 <input type="reset" value="Reset"/>
 		 </form>
	 </body>
</html>
<?php
 include ('connect.php');
 session_start();
if(isset($_POST['submit']))
{
 if(!is_numeric($_POST['idhd']))
 {
   echo "<center><h2>The syntax is WRONG! <br/></h2></center>";
   header('Refresh: 1; del_bill.php');
   exit;
 }

 $_SESSION['idhd'] = (int) $_POST['idhd'];
 $query1 = "SELECT * FROM hoa_don WHERE idhd = '".$_SESSION['idhd']."'";
 $result1 = pg_query($query1);
 $row1 = pg_fetch_row($result1);

 if(!$row1) 
 {
   echo '<center><h2>NOTICE</h2>';
   echo '<p style="font-size: 150%">';
   echo 'Không có hóa đơn khả dụng!<br /></p></center>';
 } 
 else {
	 $query2 = "WITH tmp AS (
		 					SELECT idsp,idlo,soluong_hoadon
							FROM sp_hd
							WHERE idhd = '".$_SESSION['idhd']."' )
							SELECT *
							FROM tmp NATURAL JOIN san_pham";
	 $result2 = pg_query($query2);

   echo '<center><h1>Thông tin hóa đơn</h1>';
   echo '
   <table cellpadding="" cellspacing="">
     <tr>
       <th scope="col">IDHD</th>
       <th scope="col">ID Nhân viên</th>
       <th scope="col">ID Khách hàng</th>
       <th scope="col">Ngày nhập</th>
     </tr>
     <tr>';
     echo "<td>$row1[0]</td>";
     echo "<td>$row1[1]</td>";
     echo "<td>$row1[2]</td>";
     echo "<td>$row1[3]</td>";
     echo '</tr>
    </table>';

    echo '
    <table cellpadding="" cellspacing="">
      <tr>
        <th scope="col">ID Sản phẩm</th>
        <th scope="col">ID Lô</th>
        <th scope="col">Tên</th>
        <th scope="col">Hãng</th>
        <th scope="col">Giá</th>
        <th scope="col">Số lượng</th>
      </tr>';

	 while ($row2 = pg_fetch_row($result2)) {
     echo '<tr>';
     echo "<td>$row2[0]</td>";
     echo "<td>$row2[1]</td>";
     echo "<td>$row2[3]</td>";
     echo "<td>$row2[4]</td>";
     echo "<td>$row2[5]</td>";
     echo "<td>$row2[2]</td>";
     echo '</tr>';
	 }
   echo '</table>';
   echo "Do you want to delete ?";
   echo '<form action = "del_bill2.php">
          <input type="submit" value="Yes" />
         </form>
         <form action = "">
          <input type="submit" value="No" />
         </form>
         </center>';
 }
}
 
 ?>
 <style text="text/css">
 <?php include 'style_prod_info.css'; ?>
 </style>
