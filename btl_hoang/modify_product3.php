<?php
 include ('connect.php');
 session_start();

 $_SESSION['ten_sanpham'] = pg_escape_string($_POST['tensp']);
 $_SESSION['hang_sanpham'] = pg_escape_string($_POST['hangsx']);
 $_SESSION['dongia'] = (int) $_POST['dongia'];


 $query1 = "UPDATE san_pham 
            SET
              ten_sanpham = '".$_SESSION['ten_sanpham']."',
              hang_sanpham = '".$_SESSION['hang_sanpham']."',
              dongia_sanpham = '".$_SESSION['dongia']."'
            WHERE idsp = '".$_SESSION['idsp']."'";
 $result1 = pg_query($query1);

  if(!$result1) {
    echo "Fail!<br/>";
  } else {
    echo "Success!<br/>";
  }

  echo '<center><h1>Product Information</h1>
  <table cellpadding="10" cellspacing="5">
    <tr>
      <th scope="col">IDSP</th>
      <th scope="col">Name</th>
      <th scope="col">Company</th>
      <th scope="col">Price</th>
    </tr>';
    echo "<tr>";
    echo "<td>$_SESSION[idsp]</td>";
    echo "<td>$_SESSION[ten_sanpham]</td>";
    echo "<td>$_SESSION[hang_sanpham]</td>";
    echo "<td>$_SESSION[dongia]</td>";
    echo "</tr>";
    echo "</table></center>";

?>
  <style text="text/css">
  <?php include 'style_prod_info.css'; ?>
  </style>
