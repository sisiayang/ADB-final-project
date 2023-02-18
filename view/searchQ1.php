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
</div>
<div style="padding-left:70px; padding-right:150px;">
<hr>
<h3>
  Query1
  <br>
    Help suppliers find the most appropriate warehouse to store products.
  </h3>

    <form action="searchQ1.php", method="post">
    <input name="name" placeholder="supplier name" type="text">
    <input name="start" type="date">
    <input name="end" type="date">
    <button type="submit">search</button>
  </form>  
  
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
  echo "<br>";

    $supplier_name = $_POST["name"];
    $start_time = $_POST["start"];
    $end_time = $_POST["end"];
    echo "<h3>" . $supplier_name."   ";
    echo "from '" . $start_time . "' to '".$end_time . "'</h3>";
  $sql = <<<EOF
  select c.orderid, c.createtime, c.address, c.warehouse, c.location
    from (
      select o.orderid, o.address, o.warehouse, o.createtime, w.location, ST_Distance(a.geo, w.geo) as distance
      from orders o, supplier s, warehouse w, address a 
      where s."name" like '%$supplier_name%' and s.id = o.sid and o.warehouse = w.warehouse and a.address = o.address and o.createtime > '$start_time' and o.createtime < '$end_time'
    ) as c
    where (c.orderid, c.distance) in (
      select b.orderid, min(distance)
      from (
        select o.orderid, ST_Distance(a.geo, w.geo) as distance
        from orders o, supplier s, warehouse w, address a 
        where s."name" like '%$supplier_name%' and s.id = o.sid and o.warehouse = w.warehouse and a.address = o.address
      ) as b
      group by b.orderid
    )
    order by c.createtime 
    limit 30;
EOF;


  $ret = pg_query($db, $sql);
  if (!$ret) {
    echo pg_last_error($db);
  }

  echo "<table border='1' style='width: 70%;'>
<tr>
  <th>order id</th>
  <th>create time</th>
  <th>address</th>
  <th>warehouse</th>
  <th>recommended location</th>
</tr>";

  while($row = pg_fetch_row($ret)){
    echo "<tr><td align='center' valign='middle'>".$row[0]."</td>";
    echo "<td align='center' valign='middle'>".$row[1]."</td>";
    echo "<td align='center' valign='middle'>".$row[2]."</td>";
    echo "<td align='center' valign='middle'>".$row[3]."</td>";
    echo "<td align='center' valign='middle'>".$row[4]."</td></tr>";
    
  }
  pg_close($db);
?>
</div>
</body>
</html>