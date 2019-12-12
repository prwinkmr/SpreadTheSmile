<?php 
	session_start();
	if(isset($_SESSION['id']))
	{
		header('Location: assets/user_manager.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Spread The Smile</title>
	<link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
	<script type="text/javascript" src="lib/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="lib/bootstrap/js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<nav class="navbar navbar-default navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<a href="index.html" class="navbar-brand">SpreadTheSmile</a>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			    </button>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="#">Home</a></li>
					<li><a href="#">About Us</a></li>
					<li><a href="#">Contact Us</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="signup.php">Sign Up<span class="glyphicon glyphicon-user" aria-hidden="true"></span></a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container-fluid">
		<div class="wrap">
			<div class="quotes">
				<h3>"I am only one, but I am one. I cannot do everything, but I can do something. And I will not let what I cannot do interfere with what I can do."<br>	-Edward Everett Hale</h3>
			</div>
		</div>
		<div class="wrap">
			<div id="sign_in">
				<h2>Sign In</h2>
				<form action="assets/sign_in.php" method="POST">
					<label for="username">Username</label>
					<input type="email" name="username" placeholder="pravingupta@gmail.com" required="">
					<label for="password">Password</label>
					<input type="password" name="password" required="">
					<a href="changepassword.php">Forgot Password?</a>
					<button type="submit" value="donate">SIGN IN</button>
					<a href="signup.php">Don't have an Account? <u>Sign Up</u></a>
				</form>
			</div>
		</div>
		<div class="wrap">
			<div class="quotes">
				<h3>"I think people forget that it doesn't take a big donation to help someone, just a lot of little donations."<br>	-Hannah Teter</h3>
			</div>	
		</div>
	</div>
	<div id="push" style="height: 100px"></div>
	<footer>
        <div class="container">
            <p id="footer_data">
                <strong>&#9400; Pro & Bros.</strong>  
            	<a href="https://www.facebook.com/" target="_blank" style="margin-left: 25%;"><img src="img/facebook.png" class="logo"alt="Facebook" height="35" width="35"></a>
            	<a href="https://twitter.com/" target="_blank"><img src="img/twitter.png" class="logo" alt="Twitter" height="35" width="35"></a>
            	<a href="https://instagram.com/" target="_blank"><img src="img/instagram.png" class="logo" alt="Instagram" height="35" width="35"></a>  
            </p>
        </div>
    </footer>
</body>
</html>