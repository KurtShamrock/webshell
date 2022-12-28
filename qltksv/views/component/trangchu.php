<?php 
	session_start();
	if(isset($_SESSION['username']))
	{
		header("Location: home.php");
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TRANG CHỦ</title>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="../../css/trangchu_style.css">

	<style>
	body{
		background-image: url('../../images/rose.jpg');
		background-repeat: no-repeat;
		background-size: cover;
	}
	</style>
</head>
<body>
		<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
			<div class="container-fluid">
				<a class="navbar-brand" href="trangchu.php">
					QLSV
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="mynavbar">
					<ul class="navbar-nav me-auto">
						<li class="nav-item">
							<a class="nav-link" href="javascript:void(0)">Student</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="javascript:void(0)">Class</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="javascript:void(0)">Account</a>
						</li>
					</ul>
						<div class="d-flex">
							<a href="../../auth/login_form.php">
								<button class="btn btn-outline-primary" type="button">Login</button>
							</a>
							<a href="../../auth/register_form.php">
								<button class="btn btn-outline-primary" type="button">Register</button>
							</a>
						</div> 
	
				</div>
			</div>
		</nav>
		

		



		






</body>
</html>