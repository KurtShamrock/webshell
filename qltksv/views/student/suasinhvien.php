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
	<title>SỬA THÔNG TIN SINH VIÊN</title>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<style>
		body{
			background-image: url('images/img-18.jpg');
			background-repeat: no-repeat;
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
					<h1 class="display-3">SỬA THÔNG TIN SINH VIÊN</h1>
					<p class="lead">Bạn hãy nhập mã của sinh viên mà bạn muốn sửa thông tin. Vui lòng nhập chính xác mã sinh viên.</p>
					<hr class="m-y-md">
					<p></p>		
			</div>
		</div>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-sm-6 offset-3">
				<form class="d-flex" action="suasinhvien.php" method="POST" enctype="multipart">
        			<input class="form-control me-2" type="text" name="search" placeholder="Nhập mã sinh viên..." required>
        			<button class="btn btn-outline-info" type="submit">Search</button>
      			</form>

      			<div>
					<p></p>
					<hr class="m-y-md">
					<p></p>
				</div>

      			<?php 
				$key = (isset($_POST['search']))?$_POST['search']:0;
				// Hien thi
				$sql = "SELECT * FROM student WHERE studentcode = '".$key."'";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
	  				// output data of each row
					while($row = $result->fetch_assoc()) {
						?>
						<form action="../../controllers/xulysuasv.php" method="POST" enctype="multipart/form-data">
							<fieldset class="form-group">
								<label for="exampleInputEmail1">Mã sinh viên:</label>
								<input name="masv" type="text"  class="form-control"  value="<?= $row['studentcode'] ?>" readonly>
							</fieldset>
							<fieldset class="form-group">
								<label for="exampleInputEmail1">Tên sinh viên:</label>
								<input name="hoten" type="text"  class="form-control" placeholder="Nhập họ tên sinh viên" value="<?= $row['name'] ?>">
							</fieldset>

							<fieldset class="form-group">
								<label for="exampleInputPassword1">Quê quán:</label>
								<input name="quequan" type="text" class="form-control" placeholder="Nhập quê quán sinh viên" value="<?= $row['hometown'] ?>">
							</fieldset>

							<fieldset class="form-group">
									<label for="exampleInputEmail1">Số điện thoại:</label>
									<input name="sdt" type="text" class="form-control" placeholder="Nhập số điện thoại" value="<?= $row['phone'] ?>">
							</fieldset>
							
							<fieldset class="form-group">
								<label for="exampleSelect1">Mã lớp:</label>
								<select name="malop" class="form-control" id="eexampleSelect11">
									<?php 
									echo '<option selected="" value="'.$row['classid'].'">'.$row['classid'].'</option>';
									$sql2 = "SELECT id FROM class WHERE id != ".$row['id'];
									$result2 = $conn->query($sql2);
									while ($rows = $result2->fetch_assoc()) {
										echo '<option value="'.$rows['id'].'">'.$rows['id'].'</option>';
									}
									?>
									</select>
								</fieldset>

								<fieldset class="form-group">
									<label for="exampleInputFile">Chọn ảnh:</label> <br>
									<img src="<?= $row['avatar'] ?>" alt="" width="100px" height="100px">
									<input name="fileToUpload" type="file" class="form-control-file" id="exampleInputFile">
									<input type="hidden" name="img_old" value="<?= $row['avatar'] ?>">
								</fieldset>

								<fieldset>
									<label></label>
								</fieldset>
								<button type="submit" class="btn btn-outline-secondary">Sửa thông tin</button>
								<input type="hidden" name="id" value="<?= $row['studentcode'] ?>">
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