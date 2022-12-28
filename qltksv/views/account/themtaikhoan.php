<?php session_start(); ?>
<?php  
			
	if(isset($_SESSION['username'])&& $_SESSION['username']){
		 
	}
	else
	{
		header("Location: ../component/notfound.html");
	}
	 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TẠO TÀI KHOẢN</title>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
	<?php include '../../models/connectdb.php'; ?>
	<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  		<div class="container-fluid">
    		<a class="navbar-brand" href="../component/home.php">
    		HOME</a>
    		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      			<span class="navbar-toggler-icon"></span>
   			</button>
   			<div class="collapse navbar-collapse" id="mynavbar">
     		<ul class="navbar-nav me-auto">
        		<li class="nav-item">
          			<a class="nav-link" href="./danhsachtaikhoan.php">Danh sách tài khoản</a>
        		</li>
        		<li class="nav-item">
          			<a class="nav-link" href="./themtaikhoan.php">Thêm tài khoản</a>
        		</li>
        		<li class="nav-item">
          			<a class="nav-link" href="./suataikhoan.php">Sửa thông tin</a>
        		</li>
        		<li class="nav-item">
          			<a class="nav-link" href="./xoataikhoan.php">Xóa tài khoản</a>
        		</li>
      		</ul>
    		</div>
  		</div>
	</nav>

	<div class="container">
	 	<div class="row">
	 		<div class="col-sm-12">
 					<div class="jumbotron">
 						<p></p>
 						<h1 class="display-3">TẠO TÀI KHOẢN</h1>
 						<p class="lead">This is page for create account. Please enter full the account's information fields. Thanks you!</p>
 						<hr class="m-y-md">
 						<p></p>
 					</div>		
	 		</div>
	 	</div>
	 </div>

	 <div class="container">
	 	<div class="row">
	 		<div class="col-sm-6 offset-3">
	 			<form action="../../controllers/xulydangky.php" method="POST" enctype="multipart">
	 				<fieldset class="form-group">
	 					<label>Mã sinh viên: </label>
	 					<input type="text" class="form-control" name="id" placeholder="Nhập mã sinh viên..." required>
	 				</fieldset>

	 				<fieldset class="form-group">
	 					<label>Username: </label>
	 					<input type="text" class="form-control" name="username" placeholder="Nhập username..." required>
	 				</fieldset>
	 				
	 				<fieldset class="form-group">
	 					<label>Password: </label>
	 					<input type="password" class="form-control" name="psw" placeholder="Nhập password..." required>
	 				</fieldset>

	 				<fieldset class="form-group">
	 					<label>Confirm password: </label>
	 					<input type="password" class="form-control" name="psw-repeat" placeholder="Xác nhận password..." required>
	 				</fieldset>

	 				<fieldset>
	 					<label></label>
	 				</fieldset>
	 		
	 				<button type="submit" id="btn" class="btn btn-outline-primary">Tạo tài khoản</button>
	 			</form>
	 		</div>
	 	</div>
	 </div>
</body>
</html>