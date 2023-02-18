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
Query3
<br>
Find out the top n important customers as loyal members for a supplier.
</h3>
<form action="searchQ3.php", method="post">
    <input name="name" placeholder="supplier name" type="text">
    <button type="submit">search</button>
  </form>
</div>
<div style="padding-left:70px; padding-right:150px;">
<?php
$name = $_POST["name"];
$number = $_COOKIE['number'];

exec('python C:\xampp\htdocs\xampp\neo_data.py '.$number." ".$name, $arr);
// echo json_encode($arr);

echo "<h3>".$name."</h3>";

echo "<table border='1' style='width: 40%;'>
<tr>
  <th>top</th>
  <th>num of order</th>
  <th>user id</th>
</tr>";

$c = 0;
for($i=0; $i<count($arr); $i++){
    if($c % 2 == 0){
        echo "<tr><td align='center' valign='middle'>".($c/2+1)."</td>";
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