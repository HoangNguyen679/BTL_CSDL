<html>
	 <head>
		 <title>THÊM HÓA ĐƠN</title>
		  <link  rel="stylesheet" type="text/css" href="style.css"/>
	 </head>
	 <body >
		 <center class="title">THÊM HÓA ĐƠN</center>
     <form action = "" method="POST">
				 <center>
					 <table cellpadding="10" cellspacing="5">
						 <tr>
							 <th scope="row">ID khách hàng </th>
							 <td><input type="text" name="idkh" id="idkh"
								 required="required" placeholder="Ex: 1001"><br/></td>
						 </tr>
						 <tr>
							 <th scope="row">Số loại sản phẩm </th>
							 <td> <input type="text" name="soloaisp" id="soloaisp"
								 required="required" placeholder="Ex: 1"><br/></td>
						 </tr>
					 </table>
				 </center>
    		<input type="submit" name="submit" value="Done" />
			<input type="reset" value="Reset"/>
 		 </form>

		  <a style="padding-left: 380px;" href="">
				If you is a new customer,click here</a>

	 </body>
</html>
<?php
 include ('connect.php');
 session_start();

 if(isset($_POST['submit']))
 {

 if(!is_numeric($_POST['soloaisp']))
 {
   echo "<center><h2>The syntax is WRONG! <br/></h2></center>";
   header('Refresh: 2; add_bill.php');
   exit;
 }

 $_SESSION['date'] = date('Y-m-d');
 $_SESSION['soloaisp'] = (int) $_POST['soloaisp'];
 $_SESSION['idkh'] = (int) $_POST['idkh'];

 $query1 = "SELECT * FROM khach_hang WHERE idkh = '".$_SESSION['idkh']."' ";
 $result1 = pg_query($query1);
 $row1 = pg_fetch_row($result1);

 if(!$row1){
   echo '<center><h2>NOTICE</h2>';
   echo '<p style="font-size: 150%">';
   echo 'ID Khach hang khong dung </p></center>';
   header('Refresh: 2; add_bill.php');
   exit;

 } 
 else {
   $sample = pg_query("SELECT idhd FROM hoa_don");
   $samplerow = pg_fetch_row($sample);
   if(!$samplerow){
      $_SESSION['idhd'] = 1000;
   } 
   else {
     $result = pg_query("SELECT max(idhd) FROM hoa_don");
     $row = pg_fetch_row($result);
     $_SESSION['idhd'] = (($row[0])/1000 + 1)*1000 ;
   }

	echo '<form action = "add_bill2.php "method = "GET">';
  	echo '<center><h2>List Product</h2>
   			 <table cellpadding="10" cellspacing="5">
   		 <tr>
   		   <th scope="col">IDSP</th>
   		   <th scope="col">Số lượng</th>
   		 </tr>';
  	while ($_SESSION['soloaisp']-- > 0) 
  	{
          echo '<tr>';
          echo '<td><input type = "text" name = "idsp[]"
                  required="required" placeholder = "1101"></td>
                <td><input type = "text" name = "soluong[]"
                  required="required" placeholder = "1"></td>';
          echo '</tr>';
    }
        echo '</table></center>';
        echo '	<input type = "submit" value = "Done">
                </form>';
}
}

?>
<style text="text/css">
<?php include 'style.css'; ?>
</style>
