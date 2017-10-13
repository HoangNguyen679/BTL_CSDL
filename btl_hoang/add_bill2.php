<?php
 include ('connect.php');
 session_start();

  if(isset($_GET['idsp']) && isset($_GET['soluong'])) 
  {
    $i = 1;

    foreach ($_GET['idsp'] as $key => $value) {
      $a = (int)$_GET['idsp'][$key];
      $b = (int)$_GET['soluong'][$key];

      $query1 = "SELECT * FROM san_pham WHERE idsp = $a";
      $result1 = pg_query($query1);
      $row1 = pg_fetch_row($result1);


      if(!$row1) {
          echo '<center><h2>NOTICE</h2>';
          echo '<p style="font-size: 150%">';
     	    echo 'There is no product';
          echo $a;
          echo '!<br /></p></center>';
      }
      else {
        $query2 = "SELECT * FROM kho natural join lo_hang
                   WHERE idsp = $a
                   AND (conlai) > 0
                   AND  ngaynhap_lo = (
     	               SELECT min(ngaynhap_lo)
     	               FROM lo_hang NATURAL JOIN kho
                     WHERE idsp = $a
                     AND (conlai) > 0 )";
        $result2 = pg_query($query2);
        $row2 = pg_fetch_row($result2);
        if(!$row2){
          echo '<center><h2>NOTICE</h2>';
          echo '<p style="font-size: 150%">';
          echo "Product ID : $a has sold out  !<br/>";
          echo '</p></center>';
        } else if ($row2 && ($row2[3] - $b) < 0 ){
          $query21 = "SELECT * FROM kho natural join lo_hang
                     WHERE idsp = $a
                     AND (conlai) > 0
                     AND  ngaynhap_lo > '$row2[4]'
                     LIMIT 1";
          $result21 = pg_query($query21);
          $row21 = pg_fetch_row($result21);
          if(!$row21){
            echo '<center><h2>NOTICE</h2>';
            echo '<p style="font-size: 150%">';
            echo "Product ID : $a has only $row2[3] !<br />";
            echo '</p></center>';
          } else {
            if($i == 1){
              $queryx = "INSERT INTO hoa_don VALUES
                        ( '".$_SESSION['idhd']."','1100','".$_SESSION['idkh']."','".$_SESSION['date']."',0)";
              $resultx = pg_query($queryx);
              $i++;
            }
            $query22 = "INSERT INTO sp_hd VALUES
                            ($a,$row2[0], '".$_SESSION['idhd']."',$row2[3]);";

            $result22 = pg_query($query22);
            $query23 = "INSERT INTO sp_hd VALUES
                          ($a,$row21[0],'".$_SESSION['idhd']."',$b-$row2[3]);";
            $result23 = pg_query($query23);
          }
        } else {
          if($i == 1){
            $queryx = "INSERT INTO hoa_don VALUES
                      ( '".$_SESSION['idhd']."',1100,'".$_SESSION['idkh']."','".$_SESSION['date']."',0)";
            $resultx = pg_query($queryx);
            $i++;
          }

          $query = "INSERT INTO sp_hd VALUES
                     ($a,$row2[0], '".$_SESSION['idhd']."',$b)";
          $result = pg_query($query);
          if(!$result) echo "kh dc";
        }
      }

    }
}

  if($i > 1){
    $query3 ="WITH tmp AS (
               SELECT idsp,soluong_hoadon
               FROM sp_hd
               WHERE idhd = '".$_SESSION['idhd']."' )
               SELECT * FROM tmp natural join san_pham;";
     $result3 = pg_query($query3);

      echo '<center><h1>THÔNG TIN HÓA ĐƠN</h1>
            <p style="font-size=130%;">ID: ';
      echo  $_SESSION['idhd'];
      echo '<br /> Ngay tao: ';
      echo $_SESSION['date'];
      echo '<br/></p>';
      echo '
      <table cellpadding="10" cellspacing="5">
        <tr>
          <th scope="col">IDSP</th>
          <th scope="col">Name</th>
          <th scope="col">Company</th>
          <th scope="col">Price</th>
          <th scope="col">Amount</th>
        </tr>';
        while($row3 = pg_fetch_row($result3)){
        echo '<tr>';
        echo "<td>$row3[0]</td>";
        echo "<td>$row3[2]</td>";
        echo "<td>$row3[3]</td>";
        echo "<td>$row3[4]</td>";
        echo "<td>$row3[1]</td>";
        echo '</tr>';
    }
      echo '</table></center>';
  }

?>
  <style text="text/css">
  <?php include 'style_prod_info.css'; ?>
  </style>
