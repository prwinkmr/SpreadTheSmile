<?php 
	include_once("assets/contributor_manager.php");
	include_once("assets/db_connect.php");
	$contributor_id = $_SESSION['id']; 
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Spread The Smile</title>
		<link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="style.css">
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600" rel="stylesheet">
		<script type="text/javascript" src="lib/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="lib/bootstrap/js/bootstrap.min.js"></script>
		<style type="text/css">
			@media(max-width: 700px){
				body{
					background-image: url(img/background_small.jpg);
				}
			}
		</style>
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
						<li class="nav-item active"><a href="donationhistory.php">Donation History</a></li>
						<li><a href="#">About Us</a></li>
						<li><a href="#">Contact Us</a></li>
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
			<div id="unassigned_tasks" class="row">
				<?php  
					$sql_query = "SELECT `id`, `contributor_id`, `volunteer_id`, `isPicked`, `isDelivered`, DATE_FORMAT(`order_date`,'%b %d %Y') AS `order_date` FROM `orders` WHERE `contributor_id` = '$contributor_id' ORDER BY `isDelivered`, `isPicked`";
					$results  = mysqli_query($connection,$sql_query)  or die ("Error: " . mysqli_error());
					if(mysqli_num_rows($results) === 0)
					{
						$consignment = "<div class='empty_task'><h2>Yet to donate..!!</h2><h3><a href='cart.php'>Click here</a> to donate.</h3></div>";
						echo ($consignment);
					}
					while($row = mysqli_fetch_array($results,MYSQLI_ASSOC))
					{
						$order_id = $row['id'];
						$isDelivered = $row['isDelivered'];
						$order_date = $row['order_date'];
						$sql_query = "SELECT `order_id`, `name`, `phone`, `pincode`, `flat`, `street`,`pickup_time`, DATE_FORMAT(`pickup_date`,'%b %d %Y') AS `pickup_date` FROM `pickup` WHERE `order_id` = '$order_id'";
						$res  = mysqli_query($connection,$sql_query) or die ("Error: " . mysqli_error());
						$pickup = mysqli_fetch_array($res,MYSQLI_ASSOC);
						$consignment = "<div class='tasks'><ul><li>Order Date: " . $order_date . "</li><li>Pickup: " . $pickup['name'] . ", " . $pickup['phone'] . ", " . $pickup['flat'] . ", " . $pickup['street'] .  ", " . $pickup['phone'] . "</li><li>Drops & Items: <ul>";
						$sql_query = "SELECT * FROM `consignments` WHERE `order_id` = '$order_id'";
						$res  = mysqli_query($connection,$sql_query);
						while($data = mysqli_fetch_array($res,MYSQLI_ASSOC))
						{
							$ngo_id = $data['ngo_id'];
							$sql_query = "SELECT `name`,`mobile`,`address` FROM `ngos` WHERE `id` = '$ngo_id'";
							$rslt = mysqli_query($connection,$sql_query);
							$ngo = mysqli_fetch_array($rslt,MYSQLI_ASSOC);
							$consignment .= "<li>";
							$consignment .= $ngo['name'] . ", " . $ngo['mobile'] . ", " . $ngo['address'] . ", " . $data['item'] . " (" . $data['quantity'] . ")";
							$consignment .= "</li>";
						}
						$consignment .= "</ul></li><li>Pickup Date: " . $pickup['pickup_date'] . " (" . $pickup['pickup_time'] . ")</li>";
						if ($isDelivered === 'NO')
						{
							$consignment .= "<li>Delivered: NO</li></ul></div>";
						}
						elseif ($isDelivered === 'YES' || $isDelivered === 'Y') {
							$consignment .= "<li>Delivered: YES</li></ul></div>";
						}
						echo ($consignment);
					}
					mysqli_close($connection);
				?>

			</div>
		</div>
		<div id="push"></div>
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