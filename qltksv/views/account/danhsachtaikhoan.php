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
	<title>DANH SÁCH TÀI KHOẢN</title>
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
	<br>

	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<form class="d-flex" action="danhsachtaikhoan.php" method="POST">
        			<input class="form-control me-2" type="text" name="search" placeholder="Nhập mã sinh viên..." required>
        			<button class="btn btn-outline-info" type="submit">Search</button>
      			</form>

      			<div>
					<p></p>
					<hr class="m-y-md">
					<p></p>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="jumbotron">
				<p></p>
				<h1 class="display-3" align="CENTER">DANH SÁCH TÀI KHOẢN</h1>
				<hr class="m-y-md">
				<p></p>
			</div>
		</div> 
		<!-- end row jumbotron -->
		<div class="container">
			<div class="col-sm-12">
				<table class="table table-bordered table-inverse table-hover">
					<thead align="CENTER">
						<tr>
							<th>ID</th>
							<th>Username</th>
							<th>Password</th>
							<th>Mã sinh viên</th>
						</tr>
					</thead>
					<tbody align="CENTER">
						<?php
							if(isset($_POST['search'])){
								$id = isset($_POST['search']);
								$sql = "SELECT * FROM account WHERE studentcode = '".$id."' ";
							}else{
								$sql = "SELECT * FROM account";
							}
							$result = $conn->query($sql);
								while ($row = $result->fetch_assoc()) {
							    	echo '<tr>';
							    	echo '<th>'.$row['id'].'</th>';
							    	echo '<th>'.$row['username'].'</th>';
							    	echo '<th>'.$row['password'].'</th>';
							    	echo '<th>'.$row['studentcode'].'</th>';
							    	echo '</tr>';
								}
							$conn->close();
						 ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>	
</body>
</html>