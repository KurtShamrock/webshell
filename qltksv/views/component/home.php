<?php 
session_start();
	if(!isset($_SESSION['username']))
	{
		header("Location: ./trangchu.php");
	}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>HOME</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../../css/home_style.css">

	<style>
		body{
			background-image: url('../../images/dep.jpg');
			background-repeat: no-repeat;
		}
	</style>
</head>
<body>
	<section class="header">
		<?php  
			
	if(isset($_SESSION['username'])&& $_SESSION['username']){
		 include 'navbar.php';
	}
	else
	{
		header("Location: notfound.html");
	}
	 ?>
		
	</section>
	
</body>
</html>