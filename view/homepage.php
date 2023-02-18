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

<div style="float:left; padding-left:70px;">
<div>
    <h3>
    Query1
    <br>
    Help suppliers find the most appropriate warehouse to store products.
    </h3>

    <form action="index1.php", method="post">
        <button name="Q1" type="submit" style="height:30px;width:90px;font-size: 15px">Run</button>
    </form>
</div>
<div style="padding-top:20px;">
    <h3>
    Query2
    <br>
    Find the most popular type of product by given city and quarter.
    </h3>

    <form action="index2.php", method="post">
        <button name="Q2" type="submit" style="height:30px;width:90px;font-size: 15px">Run</button>
    </form>
</div>
<div style="padding-top:20px;">
    <h3>
    Query3
    <br>
    Find out the top n important customers as loyal members for a supplier.
    </h3>

    <form action="index3.php", method="post">
        <button name="Q3" type="submit" style="height:30px;width:90px;font-size: 15px">Run</button>
    </form>
</div>
</div>

<div style="float:right; padding-right:150px;">
<div>
    <h3>
    Query4
    <br>
    Build a recommendation system for a supplier that can recommend products<br> to its customer that he/she may be interested in.
    </h3>

    <form action="index4.php", method="post">
        <button name="Q4" type="submit" style="height:30px;width:90px;font-size: 15px">Run</button>
    </form>
</div>
<div style="padding-top:20px;">
    <h3>
    Query5
    <br>
    Find out the top n bestsellers of a given supplier.
    </h3>

    <form action="index5.php", method="post">
        <button name="Q5" type="submit" style="height:30px;width:90px;font-size: 15px">Run</button>
    </form>
</div>
<div style="padding-top:20px;">
    <h3>
    Query6
    <br>
    Give the supplier's name then show up the product category it provides.
    </h3>

    <form action="index6.php", method="post">
        <button name="Q6" type="submit" style="height:30px;width:90px;font-size: 15px">Run</button>
    </form>
</div>
<div style="padding-top:20px;">
    <h3>
    Query7
    <br>
    Give the user id, show up the product category he/she buy.
    </h3>

    <form action="index7.php", method="post">
        <button name="Q7" type="submit" style="height:30px;width:90px;font-size: 15px">Run</button>
    </form>
</div>
</div>


<!-- <div style="display:flex;">
  <div style="float:left; padding-left:150px;">
    <h3>
    Query1
    <br>
    Help suppliers find the most appropriate warehouse to store products.
    </h3>
    <img src="Q1.png" width="400" heigh="200" alt="一張圖片">
    <form action="index1.php", method="post">
        <button name="Q1" type="submit" style="height:40px;width:120px;font-size: 20px">Run</button>
    </form>
  </div>
  <div style="float:right; padding-left:150px;">
    <h3>
    Query2
    <br>
    Find the most popular type of product by given city and quarter. 
    </h3>
  
    <form action="index2.php", method="post">
        <button name="Q2" type="submit" style="height:40px;width:120px;font-size: 20px">Run</button>
    </form>
  </div>
</div>
-->
  
</body>
</html>