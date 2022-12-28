<?php 
	$host = "localhost";
	$user = "root";
	$pass="";
	$db="lms";
	$conn = new mysqli($host,$user,$pass,$db);
	if($conn->connect_error){
		die("connection fail".$conn->connect_error);
	}else{
		
	}
 ?>