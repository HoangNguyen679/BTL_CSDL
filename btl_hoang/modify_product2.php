<?php
 include ('connect.php');
 session_start();

 if(!is_numeric($_POST['idsp']))
 {
   echo "<center><h2>The syntax is WRONG! <br/></h2></center>";
   header('Refresh: 1; modify_product1.php');
   exit;
 }

 $_SESSION['idsp'] = (int) $_POST['idsp'];
 $query1 = "SELECT * FROM san_pham WHERE idsp = '".$_SESSION['idsp']."'";
 $result1 = pg_query($query1);
 $row1 = pg_fetch_row($result1);

 if($row1) {
   echo '<center><h2>THÔNG TIN SẢN PHẨM</h2>
   <table cellpadding="10" cellspacing="5">
     <tr>
       <th scope="col">IDSP</th>
       <th scope="col">TÊN</th>
       <th scope="col">HÃNG</th>
       <th scope="col">GIÁ</th>
     </tr>';
    echo "<tr>";
    echo "<td>$row1[0]</td>";
    echo "<td>$row1[1]</td>";
    echo "<td>$row1[2]</td>";
    echo "<td>$row1[3]</td>";
    echo "</tr>";

    echo '<form action = "modify_product3.php" method="POST">';
    echo "<tr>";
    echo "<td>$row1[0]</td>";
    echo '<td><input type="text" name="tensp" id="tensp"
               required="required"></td>';
    echo '<td><input type="text" name="hangsx" id="hangsx"
               required="required"></td>';
    echo '<td><input type="text" name="dongia" id="dongia"
               required="required"></td>';
    echo "</tr>";

    echo "</table></center>";

    echo '<center><p class="medium">Chắc bạn muốn sửa chứ ?<br/></p>';
    echo '<input type="submit" value="Yes" />
           </form>
           <form action = "">
            <input type="submit" value="No" />
           </form>
           </center>';
 } else {
  echo '<center><h2>NOTICE !</h2><br/>
        Do you want to add new product ?<br/><br/>
        <form action = "add_product1.php">
          <input type="submit" value="Yes" />
        </form>
        <form action = "">
          <input type="submit" value="No" />
        </form>
        </center>';
 }

 ?>

 <style text="text/css">
 <?php include 'style_prod_info.css'; ?>
 </style>
