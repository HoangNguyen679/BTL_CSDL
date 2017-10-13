<html>
	 <head>
		 <title>Search</title>
		 <link  rel="stylesheet" type="text/css" href="style.css"/>
	 </head>
	 <body >
		 <center class="title">SEARCH BILL ID</center>
     <form action = "" method="POST">
			 <center>
 				<table cellpadding="10" cellspacing="5">
 					<tr>
 						<th scope="row">Bill ID: </th>
 						<td><input type="text" name="idhd" id="idhd"
 							required="required" placeholder="Ex: 1000"><br/></td>
 					</tr>
 				</table>
 			</center>
 		 <input type="submit" name="submit" value="Search"/>
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
   header('Refresh: 2; search_bill.php');
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
   echo 'There no bill!<br /></p></center>';
 } 
 else {
	 $query = "SELECT * FROM hoa_don WHERE idhd = '".$_SESSION['idhd']."'";
	 $result = pg_query($query);
	 $hd_info = pg_fetch_row($result);

	 $query2 ="WITH tmp AS (
		 					SELECT idsp,soluong_hoadon
							FROM sp_hd
							WHERE idhd = '".$_SESSION['idhd']."' )
							SELECT * FROM tmp natural join san_pham;";
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
     echo "<td>$hd_info[0]</td>";
     echo "<td>$hd_info[1]</td>";
     echo "<td>$hd_info[2]</td>";
     echo "<td>$hd_info[3]</td>";
     echo '</tr>
    </table>';

    echo '
    <table cellpadding="10" cellspacing="5">
      <tr>
        <th scope="col">IDSP</th>
        <th scope="col">Name</th>
        <th scope="col">Company</th>
        <th scope="col">Price</th>
        <th scope="col">Amount</th>
      </tr>';
      while($row2 = pg_fetch_row($result2)){
      echo '<tr>';
      echo "<td>$row2[0]</td>";
      echo "<td>$row2[2]</td>";
      echo "<td>$row2[3]</td>";
      echo "<td>$row2[4]</td>";
      echo "<td>$row2[1]</td>";
      echo '</tr>';
  }
    echo '</table></center>';
 }
}

 ?>
 <style text="text/css">
 <?php include 'style_prod_info.css'; ?>
 </style>
