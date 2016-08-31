<?php
	session_start();
?>

<!doctype html>
<html>
<head>
	<title>The Octo Sea Foods</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
	<script src="js/lib/jquery.min.js"></script>
	<script src="js/lib/bootstrap.min.js"></script>
	<script src="js/lib/jquery.bxslider.min.js" type="text/javascript"></script>
	<script src="js/lib/jquery.slicknav.js" type="text/javascript"></script>
	<script src="js/lib/handlebars.js"></script>

	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link href="css/responsive.css" type="text/css" rel="stylesheet" />
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
	<link rel="stylesheet" href="css/jquery.bxslider.css" type="text/css" />
	<link rel="stylesheet" href="css/slicknav.css" type="text/css">
	<link href='https://fonts.googleapis.com/css?family=Bad+Script' rel='stylesheet' type='text/css'>

	<script src="js/contact.js" type="text/javascript"></script>
	<script src="js/login.js" type="text/javascript"></script>
</head>

<body>
	<!-- header starts -->
	<header>
		<div class="container">
			<div class="row">
				<a href="index.php" class="logo col-md-2"><img src="img/logo.png" alt="Logo"></a>

				<div class="header-right pull-right col-md-10">
					<div class="full-width">
						<?php if (!isset($_SESSION['user_id'])) { ?>
							<span class="pull-right lgn" id="lgn_module">
								<button type="button" class="btn btn-success" id="btn_login">Login</button>
								<button type="button" class="btn btn-info" id="btn_register">Register</button>
							</span>
						<?php } ?>

						<span class="pull-right home-delivery">Fish Home Delivery : 94456 56066</span>

					</div>

					<div class="full-width">
						<!--<button type="button" class="btn btn-default order-cart pull-right ">Katla - 2KG</button>-->
						<ul id="menu" class="pull-right">
							<li><a href="index.php">Home</a></li>
							<li><a href="about.php">About Us</a></li>
							<li><a href="services.php">Services</a></li>
							<li><a href="contact.php">Contact US</a></li>
						</ul>
					</div>

				</div>
			</div>
		</div>
	</header>
	<!-- header ends -->