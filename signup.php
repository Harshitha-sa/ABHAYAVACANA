<?php include('process.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup-as-customer</title>
    <link rel="stylesheet"  type= "text/css" href="signuppage.css">
</head>
<body>

    
    <div>
       
       <div class="signup-wrapper"> 
       <image src="loginimage.svg" width="400" height="400"></image> 
       <form action="signup.php" class="form" method="post">
       <h1>Sign-Up</h1>
       <?php include('errors.php')?>
           <div class="input-group"><label for ="customername">Name</label><input type="text" id="customername" class="customername" name="customer_name" value="<?php echo $customername ?>"/></div> 
            
                <div class="input-group">
                    <label for="customerPassword">Password</label>
                    <input type="password" id="customerPassword" class="customerPassword" name="password" value="<?php echo $customerPassword?>"/>
                </div>
           <div>
               <input id="customerSubmitButton" class="SubmitButton" name="customerSubmitButton" type="submit"/>
               
           </div>
           
        <div><a class="link" href="./home.html">Goto Homepage!</a></div>

        </form> 
        </div>           
        
    </div>
    
</body>
</html>