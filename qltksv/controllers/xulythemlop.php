<?php 
	$classid = isset($_POST['malop'])?$_POST['malop']:'';
	$classname = isset($_POST['tenlop'])?$_POST['tenlop']:'';
	$des = isset($_POST['mota'])?$_POST['mota']:'';

	$sql = "INSERT INTO class VALUES (null, '".$classname."', '".$des."')";
	include '../models/connectdb.php';
	$result = $conn->query($sql);
	if($result){
		echo '<script type = "text/javascript">';
		echo 'alert("Thêm lớp thành công!")';
		echo '</script>';
		include '../views/class/danhsachlop.php';
	}else{
		echo '<script type = "text/javascript">';
		echo 'alert("Thêm lớp thất bại!")';
		echo '</script>';
		include '../views/class/themlop.php';
	}







 ?>