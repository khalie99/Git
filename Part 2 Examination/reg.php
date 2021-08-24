<?php
include "connect.php";

$user=$_POST['username'];
$pass=$_POST['password'];
$cpass=$_POST['password_confirm'];
$lvl=$_POST['level'];

if (!empty($user) && !empty($pass) && !empty($cpass) && !empty($lvl)){
	$query = mysqli_query($conn,"SELECT * FROM login where uname = '$user'");
	$num_rows=mysqli_num_rows($query);
	if($num_rows == 0){
		if ($pass == $cpass) {
			$sql = mysqli_query($conn,"INSERT INTO login (uname, password, level) VALUES('$user', '$pass', '$lvl')");
			header("Location: admin.php");
		}else{
			header("Location: register.php");
		}
	}else{
		header("Location: register.php");
	}
}


?>