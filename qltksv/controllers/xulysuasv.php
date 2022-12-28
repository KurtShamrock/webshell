<?php 
	include '../models/connectdb.php';
	$name = isset($_POST['hoten'])?$_POST['hoten']:'';
	$address = isset($_POST['quequan'])?$_POST['quequan']:'';
	$number = isset($_POST['sdt'])?$_POST['sdt']:'';
	$classid = isset($_POST['malop'])?$_POST['malop']:'';
	$img_old = isset($_POST['img_old'])?$_POST['img_old']:'';
	$id = (isset($_POST['id']))?$_POST['id']:"0";
	//upload ảnh
	$duongdan = "http://localhost:80/qltksv/";
	$target_dir = "../uploads/";
	$target_dir_1="uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	  if($check !== false) {
	    //echo "File is an image - " . $check["mime"] . ".";
	    $uploadOk = 1;
	  } else {
	    //echo "File is not an image.";
	    $uploadOk = 0;
	  }
	}

	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 500000) {
	  //echo "Sorry, your file is too large.";
	  $uploadOk = 0;
	}

	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	  //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	  $uploadOk = 0;
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	  //echo "Sorry, your file was not uploaded.";
	  $avatar = $img_old;
	// if everything is ok, try to upload file
	} else {
		$temp = explode(".", $_FILES["fileToUpload"]["name"]);
		$newfilename = $id . '-'.round(microtime(true)). '.' . end($temp);
		$tmp=$conn->query("select avatar from student where studentcode='$id'");;

	  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir.$newfilename)) {
	  	echo '<script type = "text/javascript">';
		echo 'alert("The file has been uploaded.")';
		echo '</script>';
		$data = explode("/", $tmp->fetch_assoc()['avatar']);
		unlink('../'.$data[4].'/'.$data[5]);
	  } else {
	  	echo '<script type = "text/javascript">';
		echo 'alert("Sorry, there was an error uploading your file.")';
		echo '</script>';
	  }
	  $avatar = $duongdan.$target_dir_1.htmlspecialchars( $newfilename);
	}

	if ($id > 0){

		$sql = "UPDATE student
		SET name= '$name', hometown='$address', phone='$number', classid='$classid', avatar='$avatar' WHERE studentcode='".$id."'";

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
	header("Location: ../views/student/danhsachsinhvien.php");
 ?>