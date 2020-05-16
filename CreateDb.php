<?php
class CreateDb{
    public $servername;
    public $username;
    public $password;
    public $dbname;
    public $tablename;
    public $conn;

    public function __construct(
        $dbname="pharmacy",
        $tablename="stocks",
        $servername='localhost:3307',
        $username='root',
        $password=''
    ){
        $this->dbname=$dbname;
        $this->tablename=$tablename;
        $this->servername=$servername;
        $this->username=$username;
        $this->password=$password;


        $this->conn=mysqli_connect("$servername","$username","$password");
        if(!$this->conn){
            die("connection failed: ".mysql_error());
        }
        $sql="CREATE DATABASE IF NOT EXISTS $dbname";
        if(mysqli_query($this->conn,$sql)){
            $this->conn=mysqli_connect($servername,$username,$password,$dbname);
            $sql="CREATE TABLE IF NOT EXISTS $tablename
            (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            product_name VARCHAR(25) NOT NULL,
            product_price FLOAT,
            product_image VARCHAR(100));";


            if(!mysqli_query($this->conn,$sql)){
                echo "Error creating table:".mysqli_error($this->conn);
            }

        }else{
          return false;  
        }

    }


    public function getData(){
        $sql="SELECT * FROM $this->tablename";
        $result = mysqli_query($this->conn,$sql);
        if(mysqli_num_rows($result)>0){
            return $result;
        }
    }


}

?>