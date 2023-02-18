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
Query5
<br>
Find out the top n bestsellers of a given supplier. 
</h3>
<form action="searchQ5.php", method="post">
    <input name="name" placeholder="supplier name" type="text">
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

echo "<br><br><table border='1' style='width: 30%;'>
<tr>
  <th>Product</th>
  <th>num</th>
</tr>";

$c = 0;
for($i=0; $i<count($arr); $i++){
    if($c % 2 == 0){
        echo "<td align='center' valign='middle'>".$arr[$i]."</td>";
    }
    else{
        echo "<td align='center' valign='middle'>".$arr[$i]."</td></tr>";
    }
    $c += 1;
}
unset($_COOKIE['number']);

?>
</div>
</body>
</html>