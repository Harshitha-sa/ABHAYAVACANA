
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adminstyle.css"></link>
    <title>Admin Page</title>
</head>
<body>
    
<h1>WELCOME ADMIN</h1>
<P>CURRENT STOCK STATUS:</P>
<?php 

$host="localhost:3307";
$link=mysqli_connect("localhost:3307","root","","pharmacy");
if (!$link) {
    echo "<p>Could not connect to the server '" . $host . "'</p>\n";
    echo mysql_error();
}else{
    // echo "<p>Successfully connected to the server '" . $host . "'</p>\n";
}
$sql="SELECT product_name,quantity FROM stocks;";
$result=$link->query($sql);

echo "<div class= 'ImageWithTable'>";
echo "<image src=\"adminproducts.svg\" width=\"400\" height=\"400\"></image>";          
echo "<div class='align'><div class='table-wrapper'><table border='1'>";
if($result-> num_rows >0){
    echo "<tr><th> Product_names</th><th>Quantity</th></tr>";
    while($row=$result->fetch_assoc() ){

        
        echo "<tr><td> ".$row["product_name"]."</td>";
        echo "<td> ".$row["quantity"]."</td></tr>";
        


    }

   echo "</table></div></div></div>";
}else{
    echo " 0 result";
}

echo "<br>";
$customers_sql="SELECT name FROM customers;";
$customer_result=$link->query($customers_sql);
echo "<p>REGISTERED CUSTOMERS:</p>";
echo "<div class= 'ImageWithTable'>";
echo "<image src=\"adminusers.svg\" width=\"400\" height=\"400\"></image>";      

echo "<div class='align'><div class='table-wrapper'><table border='1'>";
if($customer_result-> num_rows >0){
    echo "<th> Names</th>";
    while($row=$customer_result->fetch_assoc() ){

        
        echo "<tr><td> ".$row["name"]."</td></tr>";
        


    }

   echo "</table></div></div></div>";
}else{
    echo " 0 result";
}


?>


</body>
</html>


