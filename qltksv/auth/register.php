<?php
session_start();
	if(isset($_SESSION['username']))
	{
		header("Location: ../views/component/home.php");
	}
	else
	if(isset($_POST['signup']))
	{

	include '../models/connectdb.php';
	$masv = isset($_POST['masv'])?$_POST['masv']:'';
	$username = isset($_POST['username'])?$_POST['username']:'';
	$psw = isset($_POST['password'])?$_POST['password']:'';
	

	$checkusername = "SELECT * FROM account WHERE username = '".$username."' ";
	$resultcheck = $conn->query($checkusername);

	$checkmasv = "SELECT * FROM student WHERE studentcode = '".$masv."'  ";
	$resultmasv = $conn->query($checkmasv);
	echo $resultmasv->num_rows;
	if($resultmasv->num_rows < 1){
		echo '<script type = "text/javascript">';
		echo 'alert("Không tồn tại mã sinh viên.")';
		echo '</script>';
	}
	else if ($resultcheck->num_rows  > 0) {
		echo '<script type = "text/javascript">';
		echo 'alert("Username đã được sử dụng.")';
		echo '</script>';
	}else{
		$sql = "INSERT INTO account (id, username, password, studentcode) VALUES (null, '".$username."','".$psw."','".$masv."')";
		$result = $conn->query($sql);
		if ($result) {
			echo '<script type = "text/javascript">';
			echo 'alert("Đăng ký tài khoản thành công")';
			echo '</script>';
			include 'login_form.php';
		}else {
			echo '<script type = "text/javascript">';
			echo 'alert("Đăng ký tài khoản thất bại.")';
			echo '</script>';
		}
	}
	}




 ?>