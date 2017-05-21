<?php  
// user login process, check if user exist and password is correct

// escape email to protect against SQL injection
$email = $mysqli->escape_string($_POST['email']);
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'");

if($result->num_rows == 0){
	// user doesnt exist
	$_SESSION['message'] = 'user with that email doesnt exist!';
	header("Location: error.php");
}
else{
	// user exist
	$user = $result->fetch_assoc();

	if(password_verify($_POST['password'], $user['password'])){
		$_SESSION['email'] = $user['email'];
		$_SESSION['first_name'] = $user['first_name'];
		$_SESSION['last_name'] = $user['last_name'];
		$_SESSION['active'] = $user['active'];


		// this is how we'll know the user is logged in
		$_SESSION['logged_in'] = true;
		header(Location: profile.php);
	}

	else{
		$_SESSION['message'] = 'you have entered wrong password, try again!';
		header('Location: error.php');
	}
}
?>