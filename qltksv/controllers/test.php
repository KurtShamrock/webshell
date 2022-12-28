
 <form action="test.php" method="POST"  enctype="multipart/form-data">
	 				<fieldset class="form-group">
	 					<label>Mã sinh viên: </label>
	 					<input type="text" class="form-control" name="masv" id="quequan" placeholder="Nhập masv..." required>
	 				</fieldset>
	 				<fieldset class="form-group">
	 					<input type="file" class="form-control-file" name="hinhanh" id="hinhanh" >
	 				</fieldset>
	 				 
	 				<fieldset>
	 					<label></label>
	 				</fieldset>
	 		
	 				<button type="submit" id="btn" class="btn btn-outline-primary">Thêm</button>
	 			</form>
	 			<?php 
include '../models/connectdb.php';
	$code = isset($_POST['masv'])?$_POST['masv']:'';
	$rs=$conn->query("select avatar from student where studentcode ='$code'");
	echo $rs->fetch_assoc()['avatar'];

// $sql="select * from student where id='1'";
// $rs = $conn->query($sql);
// $tmp = $rs->fetch_assoc();
// echo $tmp['avatar'];
// echo'<br>';
// $data = explode("/", $tmp['avatar']);
// echo '../'.$data[4].'/'.$data[5];
// 	$temp = explode(".", $_FILES["file"]["name"]);
// $newfilename = round(microtime(true)) . '.' . end($temp);
// move_uploaded_file($_FILES["file"]["tmp_name"], "../img/imageDirectory/" . $newfilename);
 ?>