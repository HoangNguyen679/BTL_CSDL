<?php
  $host        = "host=localhost";
  $port        = "port=5432";
  $dbname      = "dbname=btl";
  $credentials = "user=postgres password=20011996";

   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db)
   {
      echo "Error : Unable to open database\n";
   }
   else
   {
      echo "Opened database successfully <br />";
   }

   $name = pg_escape_string($_POST['name']);
   $email = pg_escape_string($_POST['email']);

   $query = "INSERT INTO khach_hang(idkh,ten_khachhang, email_khachhang,sdt_khachhang)
            VALUES('1','" . $name . "' , '" . $email . "','0978576569')";
   $result = pg_query($query);
   if (!$result) {
        $errormessage = pg_last_error();
        echo "Error with query: " . $errormessage;
        exit();
    }
    printf ("These values were inserted into the database - %s %s \n", $name,$email);
    pg_close();
 ?>
