<?php
	$host='127.0.0.1:3307';
	$conn =mysqli_connect("$host", 'root', '', 'wt_database') ;
					
	if(!$conn){
		echo "connection faileds";
	}else {
		echo "connection scuccesful";
	}
?>