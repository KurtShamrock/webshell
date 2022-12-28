<?php 
	include '../models/connectdb.php';
	$masv = isset($_POST['id'])?$_POST['id']:'';
	$username = isset($_POST['username'])?$_POST['username']:'';
	$psw = isset($_POST['psw'])?$_POST['psw']:'';
	$confirmpsw = isset($_POST['psw-repeat'])?$_POST['psw-repeat']:'';

	$checkusername = "SELECT * FROM account WHERE username = '".$username."' ";
	$resultcheck = $conn->query($checkusername);

	$checkmasv = "SELECT * FROM student WHERE studentcode = '".$masv."'  ";
	$resultmasv = $conn->query($checkmasv);
	if($resultmasv->num_rows == 0){
		echo '<script type = "text/javascript">';
		echo 'alert("Không tồn tại mã sinh viên.")';
		echo '</script>';
	}
	else if ($resultcheck->num_rows  > 0) {
		echo '<script type = "text/javascript">';
		echo 'alert("Username đã được sử dụng.")';
		echo '</script>';
	}else if ($psw != $confirmpsw) {
		echo '<script type = "text/javascript">';
		echo 'alert("Mật khẩu không giống nhau")';
		echo '</script>';
	}else{
		$sql = "INSERT INTO account (id, username, password, studentcode) VALUES (null, '".$username."','".$psw."','".$masv."')";
		$result = $conn->query($sql);
		if ($result) {
			echo '<script type = "text/javascript">';
			echo 'alert("Đăng ký tài khoản thành công")';
			echo '</script>';
		}else {
			echo '<script type = "text/javascript">';
			echo 'alert("Đăng ký tài khoản thất bại.")';
			echo '</script>';
		}
	}
			include '../views/account/danhsachtaikhoan.php';




 ?>