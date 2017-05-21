<?php  
// registration process, inserts user into the database 
// and send accounts confirmation email message

// set session variable to be used on profile.php page
$_SESSION ['email'] = $_POST['email'];
$_SESSION ['first_name'] = $_POST['first_name'];
$_SESSION ['last_name'] = $_POST['last_name'];

// escape all $_POST variable to protect against SQL injections
$first_name = $mysqli->escape_string($_POST['firstname']);
$last_name = $mysqli->escape_string($_POST['lastname']);
$email = $mysqli->escape_string($_POST['email']);
$password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
$hash = $mysqli->escape_string(md5(rand(0,1000)));

// check apakah fungsi di atas berkerja atau tidak
echo $password. '<br/>';
echo $hash;
die;

// check if user with that email already exist
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error());

// we know user email exist if the rows returned are more than 0
if($result->num_rows > 0){
	$_SESSION['message'] = 'User with this email already exist';
	header("Location: error.php");
}
else{
	// email doesnt already exist in a database, procedd....
	
	// active is 0 by default (no need to include it here)
	$sql = "INSERT INTO users(first_name, last_name, email, password, hash)" . "VALUES('$first_name','$last_name','$email','$password','$hash')";

	// add user to the database
	if($mysqli->query($sql)){
		// 0 until user active their account with verify.php
		$_SESSION['active'] = 0;
		// so we know the user has logged in
		$_SESSION['logged_in'] = true;
		$_SESSION['message'] = "confirmation link has been sent to $email, please verify your account by clicking on the link in the message!";

		// send registration confirmation link(verify.php)
		$to = $email;
		$subject = 'account verification (clevertechie.com)';
		$message_body = '	

		Hello' .$first_name. ',
		Thank you for signing up!
		Please click this link to active your account:

		http://localhost/login-system/verify.php?email='.$email.'&hash='.$hash;

		mail($to, $subject, $message_body);
		header("Location: profile.php");
	}

	else{
		$_SESSION['message'] = 'Registration failed';
		header("Location: error.php");
	}
}

?>