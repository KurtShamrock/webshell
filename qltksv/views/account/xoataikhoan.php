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
	<title>XÓA TÀI KHOẢN</title>
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
 						<h1 class="display-3">XÓA TÀI KHOẢN</h1>
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
				<form class="d-flex" action="xoataikhoan.php" method="POST" enctype="multipart">
					<input class="form-control me-2" type="text" name="search" placeholder="Nhập username..." required>
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
				$sql = "SELECT * FROM account WHERE  username = '$key' ";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
	  				// output data of each row
					while($row = $result->fetch_assoc()) {
						?>
						<form action="xoataikhoan.php" method="POST" enctype="multipart/form-data">
							<fieldset class="form-group">
								<label for="exampleInputEmail1">Mã tài khoản:</label>
								<input name="matk" type="text"  class="form-control"  value="<?= $row['id'] ?>" readonly>
							</fieldset>

							<fieldset class="form-group">
								<label for="exampleInputEmail1">Username:</label>
								<input name="username" type="text"  class="form-control"  value="<?= $row['username'] ?>" readonly>
							</fieldset>

							<fieldset class="form-group">
								<label for="exampleInputPassword1">Password:</label>
								<input name="psw" type="text" class="form-control" value="<?= $row['password'] ?>" readonly>
							</fieldset>

							<fieldset class="form-group">
								<label for="exampleInputPassword1">Mã sinh viên:</label>
								<input name="masv" type="text" class="form-control" value="<?= $row['studentcode'] ?>" readonly>
							</fieldset>

							<fieldset>
								<label></label>
							</fieldset>
							<button type="submit" class="btn btn-outline-danger">Xóa</button>
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

	<?php 
	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM account WHERE id = '$id' ";
		if($conn -> query($sql)){
			echo '<script type = "text/javascript">';
			echo 'alert("Xóa thành công!")';
			echo '</script>';
			include 'danhsachtaikhoan.php';
		}else{
			echo '<script type = "text/javascript">';
			echo 'alert("Xóa không thành công!")';
			echo '</script>';
			include 'xoataikhoan.php';
		}
	}
	?>
</body>
</html>