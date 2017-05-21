<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php  
// main page with two forms: sign up and log in
require 'db.php';
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign Up and Login Form</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="sign up and login form" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- Custom Theme files -->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- //Custom Theme files -->
	<!-- web font -->
	<link href='//fonts.googleapis.com/css?family=Text+Me+One' rel='stylesheet' type='text/css'>
	<!-- //web font -->
	<!-- js -->
	<script src="js/jquery.min.js"></script>
	<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function () {
				$('#horizontalTab').easyResponsiveTabs({
					type: 'default', //Types: default, vertical, accordion           
					width: 'auto', //auto or any width like 600px
					fit: true   // 100% fit in a container
				});
			});
		   </script>
	<!-- //js -->
</head>

<?php  
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST['login'])){
		// user logging in
		require 'login.php';
	}
	elseif(isset($_POST['register'])){
		// user register
		require 'register.php';
	}
}


?>

<body>
	<!-- main -->
	<div class="main">
		<h1>Innovative Login Form</h1> 
		<div class="main-info">
			<div class="sap_tabs">
				<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
					<ul class="resp-tabs-list">
						<li class="resp-tab-item" aria-controls="tab_item-0"><h2><span>Login</span></h2></li>
						<li class="resp-tab-item" aria-controls="tab_item-1"><span>Register</span></li> 
					</ul>	
					<div class="clear"> </div>	
					<div class="resp-tabs-container">
						<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
							<div class="agileits-login">
								<form action="index.php" method="post" autocomplete="off">
									<input type="text" class="email" name="Email" placeholder="Email" required=""/>
									<input type="password" class="password" name="Password" placeholder="Password" required=""/>
									<div class="wthree-text"> 
										<ul> 
											<li>
												<label class="anim">
													<input type="checkbox" class="checkbox">
													<span> Remember me ?</span> 
												</label> 
											</li>
											<li> <a href="#">Forgot password?</a> </li>
										</ul>
										<div class="clear"> </div>
									</div>  
									<div class="w3ls-submit">
										<div class="submit-text">
											<input type="submit" value="LOGIN"> 
										</div>	
									</div>	
								</form>
							</div> 
						</div>
						<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
							<div class="login-top sign-top">
								<div class="agileits-login">
									<form action="#" method="post">
										<input type="text" name="firstname" placeholder="firstname" required="">
										<input type="text" name="lastname" placeholder="lastname" required="">
										<input type="text" class="email" name="Email" placeholder="Email" required=""/>
										<input type="password" class="password" name="password" placeholder="Password" required=""/>	
										<label class="anim">
											<input type="checkbox" class="checkbox">
											<span> I accept the terms of use</span> 
										</label> 
										<div class="w3ls-submit">
											<div class="submit-text">
												<input class="register" type="submit" value="REGISTER">  
											</div>	
										</div>
									</form> 
								</div>  
							</div>
						</div>
					</div>	
				</div>
				<div class="clear"> </div>
			</div>  
		</div>
		<!-- copyright -->
		<div class="copyright">
			<p> © 2016 Innovative Login Form . All rights reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a></p>
		</div>
		<!-- //copyright -->
	</div>	
	<!-- //main --> 
</body>
</html>