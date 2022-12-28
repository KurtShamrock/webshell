<?php 
	include '../models/connectdb.php';
	$name = isset($_POST['tenlop'])?$_POST['tenlop']:'';
	$des = isset($_POST['mota'])?$_POST['mota']:'';
	$id = (isset($_POST['id']))?$_POST['id']:"0";
	

	if ($id > 0){
		$sql = "UPDATE class
		SET classname= '$name', des='$des' WHERE id=".$id;

		if ($conn->query($sql) === TRUE) {
			//echo "New record created successfully".'<br>';
		} else {
			//echo "Error: " . $sql . "<br>" . $conn->error;
		}		
	} else {
		// echo '<br> File da ton tai, Sua anh that bai!';
		// echo $id;
	}

	$conn->close();
	header("Location: ../views/class/danhsachlop.php");
 ?>