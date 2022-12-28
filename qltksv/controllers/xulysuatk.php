<?php 
	$username = isset($_POST['uname'])?$_POST['uname']:'';
	$psw = isset($_POST['psw'])?$_POST['psw']:'';
	$confirm_psw = isset($_POST['confirm-psw'])?$_POST['confirm-psw']:'';
	$id = isset($_POST['id'])?$_POST['id']:'';

	include './models/connectdb.php';
	
	if ($psw != $confirm_psw) {
		echo '<script type = "text/javascript">';
		echo 'alert("Mật khẩu không giống nhau")';
		echo '</script>';
		include '../views/account/suataikhoan.php';
	}else{
		$sql = "UPDATE account SET password = '$psw' WHERE id = '$id'";
		$result = $conn->query($sql);
		if ($result) {
			echo '<script type = "text/javascript">';
			echo 'alert("Sửa tài khoản thành công")';
			echo '</script>';
			include '../views/account/danhsachtaikhoan.php';
		}else {
			echo '<script type = "text/javascript">';
			echo 'alert("Sửa tài khoản thất bại.")';
			echo '</script>';
			include '../views/account/suataikhoan.php';
		}
	}




 ?>