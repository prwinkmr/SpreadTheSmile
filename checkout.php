<?php
	include_once("assets/contributor_manager.php");
	if (! isset($_SESSION['cart']) || $_SESSION['cart'] == -1) {
		header('Location: cart.php');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Spread The Smile</title>
		<link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
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
						<li><a href="cart.php">Home</a></li>
						<li><a href="donationhistory.php">Donation History</a></li>
						<li><a href="aboutus.html">About Us</a></li>
						<li><a href="contactus.html">Contact Us</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li>
							<form action="assets/sign_out.php" method="POST" class="navbar-form navbar-right">
								<button type="submit" class="btn btn-danger btn-sm">Sign Out</button>
							</form>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="container">
			<div id="checkout">
				<h3>Schedule Pickup</h3>
				<hr>
				<form action="assets/check_out.php" method="POST">
					<label for="full_name">Full Name</label>
					<input type="text" name="full_name" placeholder="Eg: Pravin Gupta" required="">
					<div id="mnum">
						<label for="mobile">Phone Number</label>
						<input type="tel" name="mobile" placeholder="Eg: 9876543210" required="" pattern= "^\d{10}$" maxlength="10">
					</div>
					<div id="pcode">
						<label for="pincode">Pincode</label>
						<input type="tel" name="pincode" placeholder="Eg: 700102" required="" pattern= "^\d{6}$" maxlength="6">
					</div>
					<label for="flat_number">Flat & House Number</label>
					<input type="text" name="flat_number" placeholder="Eg: D-31, BC-126" required="">
					<label for="street_address">Street Address</label>
					<input type="text" name="street_address" placeholder="Colony / Street / Locality" required="">
					<div id="city_name">
						<label for="city">City</label>
						<input type="text" name="city" value="Kolkata" readonly="" required="">
					</div>
					<div id="state_name">
						<label for="state">State</label>
						<input type="text" name="state" value="West Bengal" readonly="" required="">
					</div>
					<div id="pickup_date">
						<label for="p_date">Pickup Date</label>
						<input type="date" name="p_date" required="">
					</div>
					<div id="pickup_time">
						<label for="p_time">Pickup Time Slot</label>
						<select name="p_time" required="">
							<option value="1">7 AM - 9 AM</option>
							<option value="2">9 AM - 11 AM</option>
							<option value="3">11 AM - 1 PM</option>
							<option value="4">1 PM - 3 PM</option>
							<option value="5">3 PM - 5 PM</option>
							<option value="6">5 PM - 7 PM</option>
							<option value="7">7 PM - 9 PM</option>
						</select>
					</div>
					<center>
						<button type="submit" value="donate">DONATE <span class="glyphicon glyphicon-heart" aria-hidden="true"></span></button>
					</center>
				</form>
			</div>
		</div>
		<div id="push" style="height: 100px;"></div>
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
	    <script type="text/javascript" src="script.js"></script>
	</body>
</html>