<?php
 include ('connect.php');
 session_start();


 if(isset($_POST['idsp']) && $_POST['idsp']!=null){
	   $result = pg_query("SELECT * FROM san_pham WHERE idsp = ".$_POST['idsp']);
   }
   else if(isset($_POST['ten_sp']) && $_POST['ten_sp']!=null){
	   $result = pg_query("SELECT * FROM san_pham WHERE ten_sanpham LIKE '%".$_POST['ten_sp']."%'");
   }
   else if(isset($_POST['hang_sp']) && $_POST['hang_sp']!=null){
	   $result = pg_query("SELECT * FROM san_pham WHERE hang_sanpham LIKE '%".$_POST['hang_sp']."%'");
   }
   else if(isset($_POST['gia']) && $_POST['gia']!=null){
	   $result = pg_query("SELECT * FROM san_pham WHERE dongia_sanpham = ".$_POST['gia']);
   }
   else {
   		$result = pg_query("SELECT * FROM san_pham ORDER BY idsp LIMIT 10");
   }

   

   echo 
   '<center><h2>THÔNG TIN SẢN PHẨM</h2>
   	<table cellpadding="10" cellspacing="5">
     <tr>
       <th scope="col">IDSP</th>
       <th scope="col">TÊN</th>
       <th scope="col">HÃNG</th>
       <th scope="col">GÍA</th>
       <th scope="col"></th>
     </tr>';
     echo '<form method="POST" action = "">
     
     <tr>
     	<td> <input type="text" name="idsp"> </td>
		<td> <input type="text" name="ten_sp"> </td>
		<td> <input type="text" name="hang_sp"> </td>
		<td> <input type="text" name="gia"> </td>
		<td> <input type="submit" name="submit" value="Search"></td>
	 </tr>
	 </form>';				
     while($row = pg_fetch_row($result)){
     echo "<tr>";
     echo "<td>$row[0]</td>";
     echo "<td>$row[1]</td>";
     echo "<td>$row[2]</td>";
     echo "<td>$row[3]</td>";
     echo "<td></td>";
     echo "</tr>";
 }
     echo '</table></center>';
   
?>

<style text="text/css">
<?php include 'style_prod_info.css'; ?>
</style>
