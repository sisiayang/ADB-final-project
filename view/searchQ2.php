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
Query2
<br>
Find the most popular type of product by given city and quarter. 
</h3>
  <form action="searchQ2.php", method="post">
    <input name="name" placeholder="city name" type="text">
    <input name="quater" type="radio" value="Q1">Q1
    <input name="quater" type="radio" value="Q2">Q2
    <input name="quater" type="radio" value="Q3">Q3
    <input name="quater" type="radio" value="Q4">Q4
    <button type="submit">search</button>
  </form>  
</div> 
<div style="padding-left:70px; padding-right:150px;">
<?php
  $host        = "host=127.0.0.1";
  $port        = "port=5432";
  $dbname      = "dbname=final_project";
  $credentials = "user=postgres password=1234";

  $db = pg_connect( "$host $port $dbname $credentials"  );
  if(!$db){
     echo "Error : Unable to open database
";
  }
  echo "<br><br>";

    $city_name = $_POST["name"];
    $q = $_POST["quater"];
    echo "<h3>" . $city_name."   ";
    echo " for " . $q."</h3>";
  $sql1 = <<<EOF
    SELECT o.q as Quater, class, count(class) as num_of_class
    FROM orders as o
    JOIN main_sku ON o.product_id = main_sku.product_id 
    WHERE city = '$city_name' and q = '$q'
    GROUP BY o.city, o.q, class ORDER BY num_of_class DESC LIMIT 3;
EOF;
$ret1 = pg_query($db, $sql1);
  if (!$ret1) {
    echo pg_last_error($db);
  }

  echo "<table border='1' style='width: 30%;'>
<tr>
  <th>Top</th>
  <th>category</th>
  <th>number of order</th>
</tr>";
$i = 1;
while($row = pg_fetch_row($ret1)){
    echo "<tr><td align='center' valign='middle'>".$i."</td>";
    $sql2 = <<<EOF
        SELECT * FROM keyword where class_id = '$row[1]';
    EOF;
    $ret2 = pg_query($db, $sql2);
    if (!$ret2) {
        echo pg_last_error($db);
    }
    while ($row2 = pg_fetch_row($ret2)) {
      echo "<td align='center' valign='middle'>".$row2[1] .", ".$row2[2].", ".$row2[3]."</td>";
    }
    echo "<td align='center' valign='middle'>".$row[2]."</td>";
    $i += 1;
  }
  pg_close($db);
?>
</div>
</body>
</html>