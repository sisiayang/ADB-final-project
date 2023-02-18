<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>phptext</title>
</head>
<body>
<div style="padding-left:70px; padding-right:150px;">
<h1>DB for supplier</h3>
<h3>
We designed a database aiming for providing informative and insightful data mainly for suppliers.
<br>
The whole database would be implemented with PostgreSQL and Neo4j and try to provide information for further business strategies.
</h3>
<hr>
<h3>
Query4
<br>
Build a recommendation system for a supplier that can recommend products to its customer that he/she may be interested in.
</h3>
<form action="searchQ4.php", method="post">
    <input name="supplier" placeholder="supplier name" type="text">
    <input name="customer" placeholder="customer id" type="text">
    <button type="submit">search</button>
  </form>
</div>
<div style="padding-left:70px; padding-right:150px;">
<?php
header("Content-Type: text/html;charset=big5");
$supplier = $_POST["supplier"];
$customer = $_POST["customer"];
$number = $_COOKIE['number'];
exec('python C:\xampp\htdocs\xampp\neo_data.py '.$number." ".$supplier." ".$customer, $arr);
// echo json_encode($arr);

echo "<h3>Recommend to user '".$customer."'</h3>";

echo "<table border='1' style='width: 40%;'>
<tr>
  <th>Product</th>
</tr>";

for($i=0; $i<count($arr); $i++){
    echo "<tr><td align='center' valign='middle'>".$arr[$i]."</td></tr>";
}
?>
</div>
</body>
</html>