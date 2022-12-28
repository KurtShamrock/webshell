<?php 
	session_start();
	if(isset($_SESSION['username']))
	{
		header("Location: ../views/component/home.php");
	}
	else
	{

	if(isset($_POST['login'])){
		include "../models/connectdb.php";

		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql = "select * from account where username='$username' and password='$password'";
		$rs = mysqli_query($conn,$sql);
		if(mysqli_num_rows($rs)>0){
			$_SESSION['username'] = $username;
			header("Location: ../views/component/home.php");
			die();
		}
		else
		{
		echo '<script type = "text/javascript">';
		echo 'alert("Username or password wrong!!")';
		echo '</script>';
		}
	}
	}

 ?>