<?php 
	include '../models/connectdb.php';
	$id = isset($_POST['id'])?$_POST['id']:'';
	$sql = "DELETE FROM class WHERE id = '$id' ";
	if($conn -> query($sql)){
		echo '<script type = "text/javascript">';
		echo 'alert("Xóa thành công!")';
		echo '</script>';
		include '../views/class/danhsachlop.php';
	}else{
		echo '<script type = "text/javascript">';
		echo 'alert("Xóa không thành công!")';
		echo '</script>';
		include '../views/class/xoalop.php';
	}


 ?>