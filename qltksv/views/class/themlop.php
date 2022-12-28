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
	<title>THÊM LỚP</title>
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
          			<a class="nav-link" href="./danhsachlop.php">Danh sách lớp</a>
        		</li>
        		<li class="nav-item">
          			<a class="nav-link" href="./themlop.php">Thêm lớp</a>
        		</li>
        		<li class="nav-item">
          			<a class="nav-link" href="./sualop.php">Sửa</a>
        		</li>
        		<li class="nav-item">
          			<a class="nav-link" href="./xoalop.php">Xóa lớp</a>
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
 						<h1 class="display-3">THÊM LỚP HỌC</h1>
 						<p class="lead">This is page for adding classes. Please enter full the class's information fields. Thanks you!</p>
 						<hr class="m-y-md">
 						<p></p>
 					</div>		
	 		</div>
	 	</div>
	 </div>

	 <div class="container">
	 	<div class="row">
	 		<div class="col-sm-6 offset-3">
	 			<form action="../../controllers/xulythemlop.php" method="POST" enctype="multipart">
	 				<fieldset class="form-group">
	 					<label>Mã lớp: </label>
	 					<input type="text" class="form-control" name="malop" placeholder="Nhập mã lớp học..." required>
	 				</fieldset>

	 				<fieldset class="form-group">
	 					<label>Tên lớp: </label>
	 					<input type="text" class="form-control" name="tenlop" placeholder="Nhập tên lớp..." required>
	 				</fieldset>
	 				
	 				<fieldset class="form-group">
	 					<label>Mô tả: </label>
	 					<input type="text" class="form-control" name="mota" placeholder="Nhập mô tả..." required>
	 				</fieldset>

	 				<fieldset>
	 					<label></label>
	 				</fieldset>
	 		
	 				<button type="submit" id="btn" class="btn btn-outline-primary">Thêm</button>
	 			</form>
	 		</div>
	 	</div>
	 </div>



</body>
</html>