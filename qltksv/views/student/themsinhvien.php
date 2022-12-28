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
	<title>THÊM SINH VIÊN</title>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<style>
		body{
			background-image: url('images/img-3.jpg');
			background-repeat: no-repeat;	
		}
		body background-img{
			z-index: -1;
		}
	</style>
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
                    <a class="nav-link" href="./danhsachsinhvien.php">Danh sách sinh viên</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./themsinhvien.php">Thêm mới</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./suasinhvien.php">Sửa thông tin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./xoasinhvien.php">Xóa</a>
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
 						<h1 class="display-3">THÊM SINH VIÊN</h1>
 						<p class="lead">This is page for adding students. Please enter full the student's information fields. Thanks you!</p>
 						<hr class="m-y-md">
 						<p></p>
 					</div>		
	 		</div>
	 	</div>
	 </div>

	 <div class="container">
	 	<div class="row">
	 		<div class="col-sm-6 offset-3">
	 			<form action="../../controllers/xulythemsv.php" method="POST"  enctype="multipart/form-data">
	 				<fieldset class="form-group">
	 					<label>Tên sinh viên: </label>
	 					<input type="text" class="form-control" name="hoten" id="hoten" placeholder="Nhập tên sinh viên..." required>
	 				</fieldset>
					
					<fieldset class="form-group">
	 					<label>Mã sinh viên: </label>
	 					<input type="text" class="form-control" name="masv" id="quequan" placeholder="Nhập masv..." required>
	 				</fieldset>

	 				<fieldset class="form-group">
	 					<label>Quê quán: </label>
	 					<input type="text" class="form-control" name="quequan" id="quequan" placeholder="Nhập quê quán..." required>
	 				</fieldset>
	 				
	 				<fieldset class="form-group">
	 					<label>Số điện thoại: </label>
	 					<input type="text" class="form-control" name="sdt" id="sdt" placeholder="Nhập số điện thoại..." required>
	 				</fieldset>

	 				<fieldset class="form-group">
	 					<label>Chọn mã lớp: </label>
	 					<select class="form-control" name="malop" id="malop" required>
	 						<?php 
	 						$sql = "SELECT id FROM class";
	 						$result = $conn->query($sql);
	 						while ($row = $result->fetch_assoc()) {
	 						    echo '<option value="'.$row['id'].'">'.$row['id'].'</option>';
	 						}
	 						 ?>
	 					</select>
	 				</fieldset>
	 				
	 				<fieldset class="form-group">
	 					<input type="file" class="form-control-file" name="hinhanh" id="hinhanh" required>
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