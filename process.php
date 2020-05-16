<?php 
session_start();
$customername="";

$customerPassword="";

$errors=array();
$host='localhost:3307';
$db=mysqli_connect("$host",'root','','pharmacy');
if (!$db) {
    echo "<p>Could not connect to the server '" . $host . "'</p>\n";
    echo mysql_error();
}else{
    echo "<p>Successfully connected to the server '" . $host . "'</p>\n";
}
if(isset($_POST['customerSubmitButton'])){
    $customername=mysqli_real_escape_string($db,$_POST['customer_name']);
    $customerPassword=mysqli_real_escape_string($db,$_POST['password']);


    if (empty($customername)) { array_push($errors, "name is required"); }

    if (empty($customerPassword)) { array_push($errors, "Password is required"); }


    $user_check_query = "SELECT * FROM customers WHERE customer_name='$customername' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
  
    if ($user) { 
        if ($user['customer_name'] === $customername) {
         array_push($errors, "User already exists");
        }   
    } 
    if (count($errors) == 0) {
       
  
        $query = "INSERT INTO customers (name, password) 
                  VALUES('$customername', '$customerPassword')";
        mysqli_query($db, $query);
        $_SESSION['customer_name'] = $customername;
        $_SESSION['success'] = "You are now logged in";
        header('location: customerView.php');
    }
}



if(isset($_POST['loginbutton'])){
    $username=mysqli_real_escape_string($db,$_POST['name']);
    $password=mysqli_real_escape_string($db,$_POST['password']);
    $category=mysqli_real_escape_string($db,$_POST['category']);
   
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
    if (empty($category)) {
        array_push($errors, "Category is required");
    }

    if(count($errors)==0){

        if($category=="customer"){
            $query = "SELECT * FROM customers WHERE name='$username' AND password='$password'";
            $results = mysqli_query($db, $query);
            if (mysqli_num_rows($results) == 1) {
                    $_SESSION['customer_name'] = $username;
                    $_SESSION['success'] = "You are now logged in";
                    header('location: customerView.php');
                  }else {
                    array_push($errors, "Wrong username/password combination");
                  }
        }else if($category=="admin"){
            $query = "SELECT * FROM admins WHERE name='$username' AND password='$password'";
            $results = mysqli_query($db, $query);
            if (mysqli_num_rows($results) == 1) {
                    $_SESSION['admin_name'] = $username;
                    $_SESSION['success'] = "You are now logged in";
                    header('location: adminView.php');
                  }else {
                    array_push($errors, "Wrong username/password combination");
                  }
        }
       
    }

}



?>