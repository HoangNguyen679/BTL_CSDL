<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>change demo</title>
  <style>
  div {
    color: red;
  }
  </style>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>
 
<select name="sweets">
  <option value = "Chocolate">Chocolate</option>
  <option value = "Candy">Candy</option>
  <option value = "Taffy">Taffy</option>
  <option selected="selected" value = "Caramel">Caramel</option>
  <option value = "Fudge">Fudge</option>
  <option value = "Cookie">Cookie</option>
  <option value = "tets">test</option>
</select>
<div></div>
 
<script>
$( "select" )
  .change(function () {
    var str = "";
    $( "select option:selected" ).each(function() {
      str = $( this ).text();
    });
    $( "div" ).text( str );
  })
  .change();
</script>
<?php echo ?>
 
</body>
</html>
