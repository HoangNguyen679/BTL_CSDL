<html>
	 <head>
		 <title>THÊM SẢN PHẨM</title>
		 <link  rel="stylesheet" type="text/css" href="style.css"/>
	 </head>
	 <body >
		 <center class="title">ADD PRODUCT</center>
     <form action = "add_product2.php" method="POST">
			 <center>
				 <table cellpadding="10" cellspacing="5">
					 <tr>
						 <th scope="row">TÊN: </th>
						 <td><input type="text" name="tensp" id="tensp"
							 required="required" placeholder="Ex: iPhone 6"><br/></td>
					 </tr>
					 <tr>
						 <th scope="row">HÃNG: </th>
						 <td><input type="text" name="hangsx" id="hangsx"
							 required="required" placeholder="Ex: Apple"><br/></td>
					 </tr>
					 <tr>
						 <th scope="row">GIÁ: </th>
						 <td><input type="text" name="dongia" id="dongia"
							 required="required" placeholder="Ex: 6000000"><br/></td>
					 </tr>
				 </table>
			 </center>
      		<input type="submit" value="Done"/>
			<input type="reset" value="Reset"/>
 		 </form>
	 </body>
</html>
