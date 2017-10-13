<html>
	 <head>
		 <title>Product Info</title>
	 </head>
	 <body >
     <?php
     include ('connect.php');
     session_start();
     $query = "SELECT * FROM san_pham ORDER BY idsp";
     $result = pg_query($query);

     $sum = pg_query("SELECT count(*) FROM san_pham");
     $tmp = pg_fetch_row($sum);
     $rec_count = $tmp[0];


   	 $rec_limit = 10;
        if( isset($_GET{'page'} ) )
         {
            $page = $_GET{'page'} ;
            $offset = $rec_limit * ($page) ;
         }
         else
         {
            $page = 0;
            $offset = 0;
         }

         $left_rec = $rec_count - (($page+1) * $rec_limit);

         $sql = "SELECT * FROM san_pham LIMIT $rec_limit OFFSET $offset ";
         $result = pg_query($sql);
       

     echo '<center><h2>Product Information</h2>
     <table cellpadding="10" cellspacing="5">
       <tr>
         <th scope="col">IDSP</th>
         <th scope="col">Name</th>
         <th scope="col">Company</th>
         <th scope="col">Price</th>
       </tr>';
      while ($row = pg_fetch_row($result)) {
       echo '<tr>';
       echo "<td>$row[0]</td>";
       echo "<td>$row[1]</td>";
       echo "<td>$row[2]</td>";
       echo "<td>$row[3]</td>";
       echo '</tr>';
     }
     echo '</table></center>';

	$_PHP_SELF = &$_SERVER['PHP_SELF'];
      
       if( $page > 0 && $left_rec > 0 )
         {
            $last = $page - 1;

            echo "<a href=\"$_PHP_SELF?page=$last\">trang trước</a> |";

            $back = $page + 1;
            echo "<a href=\"$_PHP_SELF?page=$back\">trang sau</a>";
         }
         
         else if( $page == 0 )
         {
         	$back = $page + 1;
            echo "<a href=\"$_PHP_SELF?page=$back\">trang sau</a>";
			}
			
         else 
         {
            $last = $page - 1;
            echo "<a href=\"$_PHP_SELF?page=$last\">trang trước</a>";
         }

     ?>
	 </body>
</html>
<style text="text/css">
<?php include 'style_prod_info.css'; ?>
</style>
