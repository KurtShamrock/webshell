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
	<title>XÓA SINH VIÊN</title>
	<meta charset="UTF-8">
	<title>XÓA THUỐC</title>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<style>
		body{
			background-image: url('images/img-2.jpg');
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
					<h1 class="display-3">XÓA SINH VIÊN</h1>
					<p class="lead">Bạn hãy nhập mã của sinh viên mà bạn muốn xem thông tin trước khi xóa. Vui lòng nhập chính xác mã sinh viên.</p>
					<hr class="m-y-md">
					<p></p>		
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-6 offset-3">
				<form class="d-flex" action="xoasinhvien.php" method="POST" enctype="multipart">
        			<input class="form-control me-2" type="text" name="search" placeholder="Nhập mã sinh viên..." required>
        			<button class="btn btn-outline-warning" type="submit">Search</button>
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
						<form action="../../controllers/xulyxoasv.php" method="POST" enctype="multipart/form-data">
							<fieldset class="form-group">
								<label for="exampleInputEmail1">Mã sinh viên:</label>
								<input name="masv" type="text"  class="form-control"  value="<?= $row['studentcode'] ?>" readonly>
							</fieldset>
							<fieldset class="form-group">
								<label for="exampleInputEmail1">Tên sinh viên:</label>
								<input name="hoten" type="text"  class="form-control" value="<?= $row['name'] ?>" readonly>
							</fieldset>

							<fieldset class="form-group">
								<label for="exampleInputPassword1">Quê quán:</label>
								<input name="quequan" type="text" class="form-control" value="<?= $row['hometown'] ?>" readonly>
							</fieldset>

							<fieldset class="form-group">
									<label for="exampleInputEmail1">Số điện thoại:</label>
									<input name="sdt" type="text" class="form-control" value="<?= $row['phone'] ?>" readonly>
							</fieldset>
							
							<fieldset class="form-group">
									<label for="exampleInputEmail1">Mã lớp:</label>
									<input name="malop" type="text" class="form-control" value="<?= $row['classid'] ?>" readonly>
							</fieldset>
							

								<fieldset class="form-group">
									<label for="exampleInputFile">Hình ảnh:</label> <br>
									<img src="<?= $row['avatar'] ?>" alt="" width="100px" height="100px">
									<input type="hidden" name="img_old" value="<?= $row['avatar'] ?>">
								</fieldset>

								<fieldset>
									<label></label>
								</fieldset>
								<a  onclick="document.getElementById('id01').style.display='block'" class="btn btn-outline-danger">Xóa</a>

								<div id="id01" class="modal">
								  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
								  <form class="modal-content" action="xulyxoasv.php">
								    <div class="container">
								      <h1>Delete Alert</h1>
								      <p>Are you sure you want to delete?</p>

								      <div class="clearfix">
								        <button type="button" class="cancelbtn">Cancel</button>
										<button  type="submit"  class="deletebtn">Delete</button>
								        
								      </div>
								      <input type="hidden" name="id" value="<?= $row['studentcode'] ?>">
								    </div>
								  </form>
								</div>
								
							</form>
							<?php 
						}
					}
					$conn->close();
					?>
			</div>
		</div>
	</div>
	<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Float cancel and delete buttons and add an equal width */
.cancelbtn, .deletebtn {
  float: left;
  width: 50%;
}

/* Add a color to the cancel button */
.cancelbtn {
  background-color: #ccc;
  color: black;
}

/* Add a color to the delete button */
.deletebtn {
  background-color: #f44336;
}

/* Add padding and center-align text to the container */
.container {
  padding: 16px;
  text-align: center;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: #474e5d;
  padding-top: 50px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* Style the horizontal ruler */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
 
/* The Modal Close Button (x) */
.close {
  position: absolute;
  right: 35px;
  top: 15px;
  font-size: 40px;
  font-weight: bold;
  color: #f1f1f1;
}

.close:hover,
.close:focus {
  color: #f44336;
  cursor: pointer;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and delete button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .deletebtn {
     width: 100%;
  }
}
</style>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>
</html>