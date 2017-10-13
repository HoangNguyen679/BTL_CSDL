<form method = "post">
<fieldset>
	    <legend>Đăng nhập</legend>
	    	<table>
	    		<tr>
	    			<td>Username</td>
	    			<td><input type="text" name="acc" size="30"></td>
	    		</tr>
	    		<tr>
	    			<td>Password</td>
	    			<td><input type="password" name="pass" size="30"></td>
	    		</tr>
	    		<tr>
	    			<td colspan="2" align="center"> <input type="submit" value="Đăng nhập" name = "lg"></td>
	    		</tr>
	    	</table>
  </fieldset>
 </form>
        <?php
		 session_start();
        // If the submit button has been pressed
		$s="<div id=\"phDIV\"><center>username hoặc password không đúng<br><br></center></div>";
         if (isset($_POST['lg']))
        {
			$username = $_POST["acc"];
			$password = $_POST["pass"];
            $db = pg_connect("host=localhost port=5432 dbname=btl user=postgres password=12345678");  
            $query = "select * from nhan_vien where user_nhanvien = '$username' and password_nhanvien = '$password' ";  
            $result = pg_query($db, $query);  
			$numb_row = pg_num_rows($result);
            $row = pg_fetch_assoc($result);
            if($numb_row == 0) echo $s;
            else
            {
                $_SESSION["name"]=$row[ten_nhanvien];
                $_SESSION['username']=$row[user_nhanvien];
                $_SESSION["addr"]=$row[diachi_nhanvien];
                $_SESSION["phone"]=$row[sdt_nhanvien];
				$_SESSION["id"] = $row[idnv];
                    if($row[isadmin] == 1)
                    {
                        header("location: http://localhost/btl/home_admin.php");
                    }
                    else
                    {
                    header("location: http://localhost/btl/home_nhanvien.php");
                    }
            }
        }
        
        ?>