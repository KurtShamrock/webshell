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
	<title>DANH SÁCH LỚP</title>
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
			<div class="jumbotron">
				<p></p>
				<h1 class="display-3" align="CENTER">DANH SÁCH LỚP</h1>
				<hr class="m-y-md">
				<p></p>
			</div>
		</div> 
		<!-- end row jumbotron -->
		<div class="container">
			<div class="col-sm-12">
				<!--  TABLE -->
    <table class="table table-bordered" style="text-align: center">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Tên lớp</th>
      <th scope="col">Mô tả</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
	<?php
		$sql = "select * from class";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
	 ?>
	<tr style="line-height:120px">
    <td><?php echo $row["id"] ?></td>	  
    <td><?php echo $row['classname'] ?></td>	  
    <td><?php echo $row['des'] ?></td>	  
    
    <td>
    <a href="xem.php?id=<?php echo $row["id"] ?>"><button type="button" class="btn btn-primary">Xem</button></a>
    </td>	   	  
  </tr>
	<?php
	 }
    }
	?>
  </tbody>
</table>
			</div>
		</div>
	</div>




</body>
</html>