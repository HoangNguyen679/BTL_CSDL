<?php
  include ('connect.php');
  session_start();

  $result = pg_query("SELECT max(idsp) FROM san_pham");
  $row = pg_fetch_row($result);
  $_SESSION['idsp'] = (($row[0] - 101)/1000 + 1)*1000 + 101;
  $query11 = "INSERT INTO san_pham VALUES
               (".$_SESSION['idsp']." ,'".$_SESSION['ten_sanpham']."',
               '".$_SESSION['hang_sanpham']."',".$_SESSION['dongia'].")";
  $result11 = pg_query($query11);

   if(!$result11) {
     echo "Fail!";
   } else {
     echo "Success!<br/>";
   }
echo 
'<center><h1>THÔNG TIN SẢN PHẨM</h1>
<table cellpadding="10" cellspacing="5">
  <tr>
    <th scope="col">IDSP</th>
    <th scope="col">TÊN</th>
    <th scope="col">HÃNG</th>
    <th scope="col">GIÁ</th>
  </tr>';
  echo "<tr>";
  echo "<td>".$_SESSION['idsp']."</td>";
  echo "<td>".$_SESSION['ten_sanpham']."</td>";
  echo "<td>".$_SESSION['hang_sanpham']."</td>";
  echo "<td>".$_SESSION['dongia']."</td>";
  echo "</tr>";
  echo "</table></center>";

?>
<style text="text/css">
<?php include 'style_prod_info.css'; ?>
</style>
