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
</div>
<div style="padding-left:70px; padding-right:150px;">

<h3>
Query7
<br>
Give the user id, show up the product category he/she buy.
</h3>
<form action="searchQ7.php", method="post">
    <input name="name" placeholder="user id" type="text">
    <button type="submit">search</button>
  </form>
</div>
<div style="padding-left:70px; padding-right:150px;">
<?php
header("Content-Type: text/html;charset=big5");
$name = $_POST["name"];
$number = $_COOKIE['number'];
exec('python C:\xampp\htdocs\xampp\neo_data.py '.$number." ".$name, $arr);
// echo json_encode($arr);
$c = 0;

echo "<h3>User id: ".$name."</h3>";

echo "<table border='1' style='width: 30%;'>
<tr>
  <th>Product</th>
  <th>Quantity</th>
</tr>";


for($i=0; $i<count($arr); $i++){
    if($c % 2 == 0){
        echo "<tr><td align='center' valign='middle'>".$arr[$i]."</td>";
    }
    else{
        echo "<td align='center' valign='middle'>".$arr[$i]."</td></tr>";
    }
    $c += 1;
}
echo "</table>";

unset($_COOKIE['number']);

?>
</div>
</body>
</html>