<?php 
  session_start(); 
   
  if (!isset($_SESSION['customer_name'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['customer_name']);
  	header("location: login.php");
  }
  $nameitseems=$_SESSION['customer_name'];
?>



<?php


$array_element;
require_once("CreateDb.php");
require_once('component.php');

$database= new CreateDb("pharmacy","stocks");

if(isset($_POST['add'])){
    
    if(isset($_SESSION['cart'])){
            $item_array_id=array_column($_SESSION['cart'],"product_id");
            // print_r($item_array_id);
            // print_r($_SESSION['cart']);
            if(in_array($_POST['product_id'],$item_array_id)){
                echo "<script>alert('Product is already added in the cart...!')</script>";
                echo "<script>window.location='customerView.php'</script>";
            }else {
                $count=count($_SESSION['cart']);
                $item_array=array(
                    'product_id' => $_POST['product_id']
                );
                $_SESSION['cart'][$count]= $item_array;
                // $array_element=$item_array;
                
            }
    }else{
        $item_array = array(
            'product_id' => $_POST['product_id']
        );
        $_SESSION['cart'][0]=$item_array;
        // $array_element=$item_array;
    }
    $host='localhost:3307';
    $db=mysqli_connect("$host",'root','','pharmacy');
    if (!$db) {
        echo "<p>Could not connect to the server '" . $host . "'</p>\n";
        echo mysql_error();
    }else{
        echo "<p>Successfully connected to the server '" . $host . "'</p>\n";
    }
    // $ids= "SELECT id FROM customers WHERE name='$nameitseems';";
    // $string_array_element="";
    // $string_array_element=implode("",$array_element);
    // $query="INSERT INTO arrays(customer_id,array) VALUES('$ids','$string_array_element');";    
    // mysqli_query($db, $query);
    // $_SESSION['success'] = "You are in db";
}

?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Home Page</title>
    <!-- font awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="customerstyle.css"></link>
   
</head>
<body>
<?php
require_once("header.php");
?>
    
    
 
    <?php if(isset($_SESSION['success'])) : ?>
    <h3>
        <?php
        echo $_SESSION['success'];
        unset($_SESSION['success']);
        ?>
    </h3>
    <?php endif ?>
    

    <?php  if (isset($_SESSION['customer_name'])) : ?>
        <div class="welcomeclass">
    	<p class="username"><image src="welcomeimage.svg" width="400" height="400"></image> <strong><?php echo $_SESSION['customer_name']; ?></strong></p>
        </div>
        <p class="pa"> <a href="customerView.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
    <p class="pa">Products Avaialable:</p>
    <div class="container">
        <div class="row text-center py-5">
       <?php
      $result=$database->getData();
      while($row= mysqli_fetch_assoc($result)){
          component($row['product_name'],$row['product_price'],$row['product_image'],$row['id']);
      }
       ?>
         </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>   
</body>
</html>

        