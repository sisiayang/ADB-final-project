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
<?php
setcookie('number','7');
?>
  <form action="searchQ7.php", method="post">
    <input name="name" placeholder="user id" type="text">
    <button type="submit">search</button>
  </form>
</div>
</body>
</html>