<?php  

include "connect.php";

$user=$_POST['username'];
$pass=$_POST['password'];

if (!empty($user) && !empty($pass)){
	$query = mysqli_query($conn,"SELECT * FROM login where uname = '$user' AND password = '$pass'");
	$num_rows=mysqli_num_rows($query);

	if($num_rows!=0){
		while($row=mysqli_fetch_assoc($query)){
			$dbusername=$row["uname"];  
    		$dbpassword=$row["password"];
    		$dblevel=$row["level"];
		}
			if($user == $dbusername && $pass == $dbpassword && $dblevel = "Admin"){
				session_start();  
    			$_SESSION['sess_user']=$user;  
  
    			/* Redirect browser */
    			//echo "Admin";
    			header("Location: admin.php");
			} else if ($user == $dbusername && $pass == $dbpassword && $dblevel = "User") {
				session_start();  
    			$_SESSION['sess_user']=$user;  
  
    			/* Redirect browser */  
    			echo "User";
    			//header("Location: user.php");
			} else{
				echo "Invalid username or password!"; 
			}

	} else{
		echo "Invalid username or password!";
	}

	
} else {
	echo "All Fields are required";
}


    
?>  