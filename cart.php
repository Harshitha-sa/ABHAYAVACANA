<?php
    $array_element;
    session_start();
    require_once("CreateDb.php");
    require_once("component.php");
    $db=new CreateDb("pharmacy","stocks");
    if(isset($_POST['remove'])){
        if($_GET['action']=='remove'){
            foreach($_SESSION['cart'] as $key=>$value){
                if($value['product_id']==$_GET['id']){
                    unset($_SESSION['cart'][$key]);
                    echo "<script>alert('Product has been removed...!')</script>";
                    echo "<script>window.location = 'cart.php'</script>";
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <!-- font awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        .check-out{

                display: block;
                left: 20px;
                border:none;
                outline: none;
                background: #7acfd6;
                text-transform: uppercase;
                letter-spacing: 1px;
                padding: 10px 20px;
                border-radius: 5px;
                cursor: pointer;
                        
        }
    </style>
</head>
<body class="bg-light">
    <?php 
    require_once("header.php");
    ?>


<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <h6>My Cart</h6>
                    <hr>
                    <?php 
                    $total=0;
                    if(isset($_SESSION['cart'])){
                        $product_id=array_column($_SESSION['cart'],'product_id');
                        
                    $result=$db->getData();
                    while($row=mysqli_fetch_assoc($result)){
                        foreach($product_id as $id){
                            if($row['id']==$id){
                                cartElement($row['product_image'],$row['product_name'],$row['product_price'],$row['id']);
                                $total=$total+(int)$row['product_price'];
                                
                            }
                        }
                    }
                    }else {
                        echo "<h5>Cart is Empty</h5>";
                    }
                    
                    ?>
            </div>
            </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
        <div class="pt-4">
        <h6>PRICE DETAILS</h6>
        <hr>
        <div class="row price-details">
        <div class="col-md-6">
        <?php
        if(isset($_SESSION['cart'])){
            $count=count($_SESSION['cart']);
            echo "<h6>Price($count items)</h6>";
        }else {
            echo "<h6>Price(0 items)</h6>";
        }
        
        ?>
        <h6>Delivery Charges</h6>
        <hr>
        <h6>Amount Payable</h6>
        </div>
        <div class="col-md-6">
        <h6>
        <?php echo $total;?> 
        <h6 class="text-success">FREE</h6>
        <hr>
        <h6>
        <?php
        echo $total;
        ?>
        </h6>
        </h6>
        </div>
        </div>
        </div>
    </div>  
</div>
</div>

<form action="customerView.php">
<div><input type="submit" id=userLoginSubmitButton name="check-out" value="check-out" class="check-out"/></div>  
</form>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>   
</body>
</html>