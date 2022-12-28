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
	<title>DANH SÁCH THỐNG KÊ</title>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
	<?php include '../models/connectdb.php'; ?>
	<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  		<div class="container-fluid">
    		<a class="navbar-brand" href="./component/home.php">
    		HOME</a>
    		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      			<span class="navbar-toggler-icon"></span>
   			</button>
   			<div class="collapse navbar-collapse" id="mynavbar">
     		<ul class="navbar-nav me-auto">
        		<li class="nav-item">
          			<a class="nav-link" href="./danhsachthongke.php">Danh sách thống kê theo sinh viên</a>
        		</li>
        		<li class="nav-item">
          			<a class="nav-link" href="./theolop.php">Danh sách thống kê theo lớp</a>
        		</li>
        		<li class="nav-item">
          			<a class="nav-link" href="./theotk.php">Danh sách thống kê theo tài khoản</a>
        		</li>
      		</ul>
    		</div>
  		</div>
	</nav>
	
	<br>

	
	<div class="container">
		<div class="row">
			<div class="jumbotron">
				<p></p>
				<h1 class="display-3" align="CENTER">DANH SÁCH THỐNG KÊ THEO LỚP</h1>
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
							<th>ID Lớp</th>

							<th>Lớp</th>
							<th>Mã sinh viên</th>

							<th>Họ tên</th>
							<th>Quê quán</th>
							<th>Số điện thoại</th>
							
							<th>Username</th>
							
							
						</tr>
					</thead>
					<tbody align="CENTER">
						<?php 
							$sql = "select c.id,c.classname,s.studentcode,s.name,s.hometown,s.phone,a.username from class c left join student s on c.id=s.classid left join account a on a.studentcode=s.studentcode;";
							$result = $conn->query($sql);
								while ($row = $result->fetch_assoc()) {
							    	echo '<tr>';

							    	echo '<th>'.$row['id'].'</th>';
							    	echo '<th>'.$row['classname'].'</th>';
							    	echo '<th>'.$row['studentcode'].'</th>';

							    	echo '<th>'.$row['name'].'</th>';
							    	echo '<th>'.$row['hometown'].'</th>';
							    	echo '<th>'.$row['phone'].'</th>';
							    	echo '<th>'.$row['username'].'</th>';
							    	
							    	echo '</tr>';
								}
							$conn->close();
						 ?>
					</tbody>
				</table>
			</div>
		</div>
		<br />
    <form method="post" action="../services/export.php?option=<?php echo 'lop' ?>">
     <input type="submit" name="export" class="btn btn-success" value="Export" />
    </form>
	</div>	
</body>
</html>