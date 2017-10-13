<?php
 include ('connect.php');
 session_start();

 $_SESSION['idsp'] = (int) $_POST['idsp'];
 $query1 = "SELECT * FROM san_pham WHERE idsp = '".$_POST['idsp']."'";
 $result1 = pg_query($query1);
 $row1 = pg_fetch_row($result1);

 if(!$row1) {
   echo "<center><h2>There is no product!</h2></center>";
 } else {
   echo '<center><h2>Product Information</h2>
   <table cellpadding="10" cellspacing="5">
     <tr>
       <th scope="col">IDSP</th>
       <th scope="col">TÊN</th>
       <th scope="col">HÃNG</th>
       <th scope="col">GIÁ</th>
     </tr>
     <tr>';
     echo "<td>$row1[0]</td>";
     echo "<td>$row1[1]</td>";
     echo "<td>$row1[2]</td>";
     echo "<td>$row1[3]</td>";
     echo '</tr>
   </table></center>';

   echo '<center><p class="medium">Bạn có muốn xóa không ?<br/></p>';
   echo '<form action = "del_product3.php">
          <input type="submit" value="CÓ" />
         </form></center>';
 }

 ?>
 <style text="text/css">
 <?php include 'style_prod_info.css'; ?>
 </style>
