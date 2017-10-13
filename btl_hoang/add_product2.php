<?php
 include ('connect.php');
 session_start();

 if(!is_numeric($_POST['dongia']))
 {
   echo "Price must be a number! <br/>";
   header('Refresh: 1; add_product1.php');
   exit;
 }

 $_SESSION['dongia'] = (int)$_POST['dongia'];
 $_SESSION['ten_sanpham'] = pg_escape_string($_POST['tensp']);
 $_SESSION['hang_sanpham'] = pg_escape_string($_POST['hangsx']);

 $query = "SELECT * FROM san_pham WHERE ten_sanpham = '".$_SESSION['ten_sanpham']."'";
 $result = pg_query($query);
 $row = pg_fetch_row($result);

 if($row)
 {
    $_SESSION['idsp'] = $row[0];

    echo '<center><h2>SẢN PHẨM SẴN CÓ</h2>
    <table cellpadding="10" cellspacing="5">
     <tr>
       <th scope="col">IDSP</th>
       <th scope="col">TÊN</th>
       <th scope="col">HÃNG</th>
       <th scope="col">GIÁ</th>
     </tr>';
    echo "<tr>";
    echo "<td>$row[0]</td>";
    echo "<td>$row[1]</td>";
    echo "<td>$row[2]</td>";
    echo "<td>$row[3]</td>";
    echo "</tr>";
    echo "</table></center>";

    echo '<center><h2>CẬP NHẬT</h2>
    <table cellpadding="10" cellspacing="5">
     <tr>
       <th scope="col">IDSP</th>
       <th scope="col">TÊN</th>
       <th scope="col">HÃNG</th>
       <th scope="col">GIÁ</th>
     </tr>';
    echo "<tr>";
    echo "<td>$row[0]</td>";
    echo "<td>".$_SESSION['ten_sanpham']."</td>";
    echo "<td>".$_SESSION['hang_sanpham'] ."</td>";
    echo "<td>".$_SESSION['dongia']."</td>";
    echo "</tr>";
    echo "</table></center>";

   echo '<center><p class="medium">Bạn có muốn cập nhật ?<br/></p>';
   echo '<form action = "add_product3.php">
          <input type="submit" value="Yes" />
         </form></center>';
 } 
  else if ( !$row ){
  header('Refresh: 0; add_product4.php');
  exit;
 }

 ?>
 <style text="text/css">
 <?php include 'style_prod_info.css'; ?>
 </style>
