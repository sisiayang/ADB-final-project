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
</body>
</html>