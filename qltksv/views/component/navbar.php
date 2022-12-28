<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="../../css/navbar_style.css">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}
.active {
  background-color: #04AA6D;
  color: white;
}
.navbar {
  overflow: hidden;
  background-color: #333; 
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.subnav {
  float: left;
  overflow: hidden;
}

.subnav .subnavbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .subnav:hover .subnavbtn {
  background-color: #555;
}

.subnav-content {
  display: none;
  position: absolute;
  left: 0;
  background-color: #454545;
  width: 100%;
  z-index: 1;
}

.subnav-content a {
  float: left;
  color: white;
  text-decoration: none;
}

.subnav-content a:hover {
  background-color: #eee;
  color: black;
}

.subnav:hover .subnav-content {
  display: block;
}
/* Create a right-aligned (split) link inside the navigation bar */
.navbar a.split {
  float: right;
  background-color:#ee2c2c;
  color: white;
}

</style>
</head>
<body>
	<div class="navbar">
		<a class="active" href="home.php"><i class="fa fa-fw fa-home"></i>Home</a>
		
		<div class="subnav">
			<button class="subnavbtn">Account <i class="fa fa-caret-down"></i></button>
			<div class="subnav-content">
				<a href="../account/danhsachtaikhoan.php">Danh sách tài khoản</a>
				<a href="../account/themtaikhoan.php">Tạo tài khoản</a>
				<a href="../acount/suataikhoan.php">Sửa thông tin</a>
				<a href="../account/xoataikhoan.php">Xóa tài khoản</a>
			</div>
		</div> 
		<div class="subnav">
			<button class="subnavbtn">Class <i class="fa fa-caret-down"></i></button>
			<div class="subnav-content">
				<a href="../class/danhsachlop.php">Danh sách lớp</a>
				<a href="../class/themlop.php">Thêm lớp</a>
				<a href="../class/sualop.php">Sửa thông tin</a> 
				<a href="../class/xoalop.php">Xóa lớp</a>
			</div>
		</div> 
		<div class="subnav">
			<button class="subnavbtn">Students <i class="fa fa-caret-down"></i></button>
			<div class="subnav-content">
				<a href="../student/danhsachsinhvien.php">Danh sách sinh viên</a>
				<a href="../student/themsinhvien.php">Thêm sinh viên</a>
				<a href="../student/suasinhvien.php">Sửa thông tin</a>
				<a href="../student/xoasinhvien.php">Xóa sinh viên</a>
			</div>
		</div>
		<div class="subnav">
			<a href="../danhsachthongke.php">Stastic</a>
			
		</div>
		<a class="split" onclick="document.getElementById('id01').style.display='block'">Log out</a>
	</div>

	<div id="id01" class="modal">
		<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
		<form class="modal-content" action="/action_page.php">
			<div class="container">
				<h1>LOG OUT</h1>
				<p>Are you sure you want to log out your account?</p>

				<div class="clearfix">
					<button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
					<a href="../../auth/logout.php"><button  type="button"  class="deletebtn">Log out</button></a>
					
				</div>
			</div>
		</form>
	</div>

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
