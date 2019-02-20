<?php
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="login";
	$conn=mysqli_connect($servername,$username,$password,$dbname);
	if($conn->connect_error)
	{	
		die("Connectionerror".$conn->connect_error);
	}
	else
	{
		
	}
?>
