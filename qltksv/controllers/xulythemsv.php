	<?php 
	$name = isset($_POST['hoten'])?$_POST['hoten']:'';
	$code = isset($_POST['masv'])?$_POST['masv']:'';
	$address = isset($_POST['quequan'])?$_POST['quequan']:'';
	$number = isset($_POST['sdt'])?$_POST['sdt']:'';
	$classid = isset($_POST['malop'])?$_POST['malop']:'';
	$img = isset($_POST['hinhanh'])?$_POST['hinhanh']:'';
	//upload ảnh
	$duongdan = "http://localhost:80/qltksv/";
	$target_dir = "../uploads/";
	$target_dir_1="uploads/";
	$target_file = $target_dir . basename($_FILES["hinhanh"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	  $check = getimagesize($_FILES["hinhanh"]["tmp_name"]);
	  if($check !== false) {
	    //echo "File is an image - " . $check["mime"] . ".";
	    $uploadOk = 1;
	  } else {
	    //echo "File is not an image.";
	    $uploadOk = 0;
	  }
	}

	// Check file size
	if ($_FILES["hinhanh"]["size"] > 500000) {
	  //echo "Sorry, your file is too large.";
	  $uploadOk = 0;
	}

	// // Allow certain file formats
	// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	// && $imageFileType != "gif" ) {
	//   //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	//   $uploadOk = 0;
	// }

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	  //echo "Sorry, your file was not uploaded.";
	  echo '<script type = "text/javascript">';
		echo 'alert("The file cannot upload.")';
		echo '</script>';
	// if everything is ok, try to upload file
	} else {
		$temp = explode(".", $_FILES["hinhanh"]["name"]);
		$newfilename = $code . '-'.round(microtime(true)). '.' . end($temp);
	  if (move_uploaded_file($_FILES["hinhanh"]["tmp_name"], $target_dir.$newfilename)) {
	  	echo '<script type = "text/javascript">';
		echo 'alert("The file has been uploaded.")';
		echo '</script>';
	  } else {
	  	echo '<script type = "text/javascript">';
		echo 'alert("Sorry, there was an error uploading your file.")';
		echo '</script>';
	  }
	  $avatar = $duongdan.$target_dir_1.htmlspecialchars($newfilename);
	}

	$sql = "INSERT INTO student VALUES (NULL,'$code' ,'$name', '$number', '$avatar', '$address','$classid')";
	$checkmasv = "SELECT * FROM student WHERE studentcode = '".$code."'  ";
	include '../models/connectdb.php';
	$resultmasv = $conn->query($checkmasv);
	if($resultmasv->num_rows>0)
		{
		echo '<script type = "text/javascript">';
		echo 'alert("Mã sinh viên đã tồn tại!")';
		echo '</script>';
		header("Location: ../views/student/themsinhvien.php");

		}
	else if ($conn->query($sql)) {
		echo '<script type = "text/javascript">';
		echo 'alert("Thêm sinh viên thành công!")';
		echo '</script>';
		header("Location: ../views/student/danhsachsinhvien.php");
			} else {
		echo '<script type = "text/javascript">';
		echo 'alert("Thêm sinh viên không thành công thành công!")';
		echo '</script>';
		header("Location: ../views/student/themsinhvien.php");
			}

	// if($resultmasv->num_rows<1)
	// 	{
	// 	}
	// 	else
	// 	{
		
	// 	
	// 	}
	
 ?>

