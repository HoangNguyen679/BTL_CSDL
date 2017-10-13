<?php
 include ('connect.php');
 session_start();

 $query1 = "DELETE FROM san_pham WHERE idsp = ".$_SESSION['idsp'].";";
 $result1 = pg_query($query1);
 if(!$result1){
   echo "Fail!";
 } else {
   echo "<center><h2>Success!</he></center>";
 }

 ?>
