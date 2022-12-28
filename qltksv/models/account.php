<?php 
	function checkAccount($username,$password){
		$stmt = $conn->prepare("select * from account where username='".$username."' and passowrd='".$password."'")
		$stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$kq=$stmt->fetchAll();
		return $kq;
	}
 ?>