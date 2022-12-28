<?php session_start(); ?>
<?php  
			
	if(isset($_SESSION['username'])&& $_SESSION['username']){
		 
	}
	else
	{
		header("Location: ../../component/notfound.html");
	}
	 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>XÓA LỚP HỌC</title>
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
					<h1 class="display-3">XÓA LỚP HỌC</h1>
					<p class="lead">Bạn hãy nhập chính xác mã lớp học hoặc tên lớp học để xóa. Thanks you!</p>
					<hr class="m-y-md">
					<p></p>
				</div>		
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-sm-6 offset-3">
				<form class="d-flex" action="xoalop.php" method="POST" enctype="multipart">
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
						<form action="xulyxoalop.php" method="POST" enctype="multipart/form-data">
							<fieldset class="form-group">
								<label for="exampleInputEmail1">Mã lớp học:</label>
								<input name="malop" type="text"  class="form-control"  value="<?= $row['id'] ?>" readonly>
							</fieldset>

							<fieldset class="form-group">
								<label for="exampleInputEmail1">Tên lớp học:</label>
								<input name="tenlop" type="text"  class="form-control" placeholder="Nhập tên lớp học..." value="<?= $row['classname'] ?>" readonly>
							</fieldset>

							<fieldset class="form-group">
								<label for="exampleInputPassword1">Mô tả:</label>
								<input name="mota" type="text" class="form-control" placeholder="Nhập mô tả..." value="<?= $row['des'] ?>" readonly>
							</fieldset>

							<fieldset>
								<label></label>
							</fieldset>

							<a  onclick="document.getElementById('id01').style.display='block'" class="btn btn-outline-danger">Xóa</a>

								<div id="id01" class="modal">
								  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
								  <form class="modal-content" action="../../controllers/xulyxoalop.php">
								    <div class="container">
								      <h1>Delete Alert</h1>
								      <p>Are you sure you want to delete?</p>

								      <div class="clearfix">
								        <button type="button" class="cancelbtn">Cancel</button>
										<button  type="submit"  class="deletebtn">Delete</button>
								        
								      </div>
										<input type="hidden" name="id" value="<?= $row['id'] ?>">
								      

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