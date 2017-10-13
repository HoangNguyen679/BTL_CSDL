<?php
 include ('connect.php');
 session_start();

 $query1 = "DELETE FROM sp_hd WHERE idhd = $_SESSION[idhd];
            DELETE FROM hoa_don WHERE idhd = $_SESSION[idhd];";
 $result1 = pg_query($query1);
 if(!$result1){
   echo "Fail!";
 } else {
   echo "<center><h1>Success!</h1></center>";
 }

 echo '<a style="font-size:150%;position:fixed;
       bottom: 10px;right: 10px;" href="del_bill1.php" >Back</a>';
 ?>
 <style text="text/css">
 <?php include 'style_prod_info.css'; ?>
 </style>
