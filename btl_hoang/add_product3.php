<?php
  include ('connect.php');
  session_start();
  $query = "UPDATE san_pham
              SET dongia_sanpham = '".$_SESSION['dongia']."',
                  hang_sanpham = '".$_SESSION['hang_sanpham']."'
              WHERE ten_sanpham = '".$_SESSION['ten_sanpham']."'";
  $result = pg_query($query);
  if(!$result) {
    echo "Update fail!";
  } else {
    echo "Success!";
  }
  echo 
  '<center><h2>THÔNG TIN CẬP NHẬT SẢN PHẨM</h2>
  <table cellpadding="10" cellspacing="5">
    <tr>
      <th scope="col">IDSP</th>
      <th scope="col">Name</th>
      <th scope="col">Company</th>
      <th scope="col">Price</th>
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
