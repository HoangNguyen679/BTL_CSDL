<html>
	 <head>
		 <title>XÓA SẢN PHẨM</title>
		 <link  rel="stylesheet" type="text/css" href="style.css"/>
	 </head>
	 <body >
		 	 <center class="title">XÓA SẢN PHẨM</center>
     	<form action = "del_product2.php" method="post">
				<center>
					<table cellpadding="10" cellspacing="5">
						<tr>
							<th scope="row">ID SẢN PHẨM: </th>
							<td><input type="text" name="idsp" id="idsp"
								required="required" placeholder="Ex: 1101"><br/></td>
						</tr>
					</table>
				</center>
			 <input type="submit" value="Done"/>
			 <input type="reset" value="Reset"/>
 		 </form>
	 </body>
</html>
