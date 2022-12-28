<?php 
	include '../models/connectdb.php';
	$id = isset($_POST['id'])?$_POST['id']:'';
	$getanh="select * from student where studentcode ='$id'";
	$rs= $conn->query($getanh);
	$tmp = $rs->fetch_assoc();
	$data = explode("/", $tmp['avatar']);
	unlink('../'.$data[4].'/'.$data[5]);
	$sql = "DELETE FROM student WHERE studentcode = '$id' ";
	if($conn -> query($sql)){
		echo '<script type = "text/javascript">';
		echo 'alert("Xóa thành công!")';
		echo '</script>';
		header("Location: ../views/student/danhsachsinhvien.php");
	}else{
		echo '<script type = "text/javascript">';
		echo 'alert("Xóa không thành công!")';
		echo '</script>';
	}

 ?>