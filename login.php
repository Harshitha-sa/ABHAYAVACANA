<?php include('process.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-In</title>
    <link rel="stylesheet"  type= "text/css" href="loginpage.css">
</head>
<body>
    <div class="login-wrapper">
    <image src="loginimage.svg" width="400" height="400"></image>
    <form action="login.php" class="form" method="post">
    <h1>Log in</h1>
        <?php include('errors.php');?>
       <div class="input-group"> <label for="userLoginEmailIdTextBox">
        name
    </label>
    <input type="text" id="userLoginnameTextBox" name="name"/>
    </div>  
    
    <div class="input-group"> <label for="category">
        Category
    </label>
    <input type="text" id="category" name="category"/>
    </div> 

    <div class="input-group">
        <label for="userLoginPasswordTextBox">password</label>
        
        <input type="password" id="userLoginPasswordTextBox" name="password"/> 
    </div>
        <div><input type="submit" id=userLoginSubmitButton name="loginbutton" value="loginbutton" class="loginButton"/></div>
        
        <div><a class="link" href="./signup.php">Create new account ?</a></div>
        <a class="link" href="./home.html">Goto Homepage</a>
    </form>
    </div>  
    
</body>
</html>