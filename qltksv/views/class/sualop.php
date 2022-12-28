<?php session_start(); ?>
<?php  
			
	if(isset($_SESSION['username'])&& $_SESSION['username']){
		 
	}
	else
	{
		header("Location: notfound.html");
	}
	 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SỬA LỚP HỌC</title>
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
 						<h1 class="display-3">SỬA THÔNG TIN LỚP HỌC</h1>
 						<p class="lead">Bạn hãy nhập chính xác mã lớp học hoặc tên lớp học để sửa thông tin. Thanks you!</p>
 						<hr class="m-y-md">
 						<p></p>
 					</div>		
	 		</div>
	 	</div>
	 </div>

	<div class="container">
		<div class="row">
			<div class="col-sm-6 offset-3">
				<form class="d-flex" action="sualop.php" method="POST" enctype="multipart">
					<input class="form-control me-2" type="text" name="search" placeholder="Nhập mã hoặc tên lớp học..." required>
					<button class="btn btn-outline-info" type="submit">Search</button>
				</form>

				<div>
					<p></p>
					<hr class="m-y-md">
					<p></p>
				</div>

				<?php 
				$key = (isset($_POST['search']))?$_POST['search']:'';
				// Hien thi
				$sql = "SELECT * FROM class WHERE id ='$key' OR classname = '$key' ";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
	  				// output data of each row
					while($row = $result->fetch_assoc()) {
						?>
						<form action="../../controllers/xulysualop.php" method="POST" enctype="multipart/form-data">
							<fieldset class="form-group">
								<label for="exampleInputEmail1">Mã lớp học:</label>
								<input name="malop" type="text"  class="form-control"  value="<?= $row['id'] ?>" readonly>
							</fieldset>

							<fieldset class="form-group">
								<label for="exampleInputEmail1">Tên lớp học:</label>
								<input name="tenlop" type="text"  class="form-control" placeholder="Nhập tên lớp học..." value="<?= $row['classname'] ?>">
							</fieldset>

							<fieldset class="form-group">
								<label for="exampleInputPassword1">Mô tả:</label>
								<input name="mota" type="text" class="form-control" placeholder="Nhập mô tả..." value="<?= $row['des'] ?>">
							</fieldset>

							<fieldset>
								<label></label>
							</fieldset>
							<button type="submit" class="btn btn-outline-secondary">Sửa</button>
							<input type="hidden" name="id" value="<?= $row['id'] ?>">
						</form>
						<?php 
					}
				}
				$conn->close();
				?>
			</div>
		</div>
	</div>
</body>
</html>