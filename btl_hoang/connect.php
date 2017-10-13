<?php
  $host        = "host=localhost";
  $port        = "port=5432";
  $dbname      = "dbname=btl";
  $credentials = "user=postgres password=12345678";

   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db)
   {
      die("Không thể kết nối tới CSDL!" . pg_last_error());
   }
 ?>
