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
Query5
<br>
Find out the top n bestsellers of a given supplier. 
</h3>
<?php
setcookie('number','5');
?>
  <form action="searchQ5.php", method="post">
    <input name="name" placeholder="supplier name" type="text">
    <button type="submit">search</button>
  </form>
</div>
</body>
</html>