<?php
	include 'includes/header.php';
?>

	<!-- banner starts -->
	<section id="inner-banner">
		<img src="img/banner1.jpg" alt="Banner1" class="img-responsive">
	</section>
	<!-- banner starts -->

	<!-- Inner content starts -->

	<!-- Inner content ends -->
		<div class="container">
			<div class="row aboutPage">

				<div class="col-xs-12 col-sm-6 col-md-6">
					<h1>Contact Us</h1>
					<p>Address</p>
					<p>Phone No: 9445656066</p>
					<p>Email ID: octoseafoods@gmail.com</p>
				</div>

				<div class="col-xs-12 col-sm-6 col-md-6">
					<h1>Share us your feedback</h1>
					<p id="successMsg" class="hide"></p>
					<p id="errorMsg" class="hide"></p>
					<form role="form">
					    <div class="form-group">
					      <label for="usr">Name:</label>
					      <input type="text" class="form-control" id="name" required>
					    </div>
					    <div class="form-group">
					      <label for="usr">Email ID:</label>
					      <input type="email" class="form-control" id="email">
					    </div>
					    <div class="form-group">
					      <label for="usr">Phone No:</label>
					      <input type="number" class="form-control" id="phone" required>
					    </div>
					    <div class="form-group">
						  <label for="comment">Comment:</label>
						  <textarea class="form-control" rows="4" id="comment" required></textarea>
						</div>
						<button type="button" onclick="contact.sendFeedback();" class="btn btn-primary">Submit</button>
					 </form>

				</div>

			</div>
		</div>

	<!-- footer starts -->
	<footer>
		<hr class="visible-xs"></hr>
		<div class="container">
			<div class="row top-footer">
				<div class="col-xs-12 col-sm-4 col-md-4">
					<div class="footer-order">
						<h3 class="footer-heading text-center">How to place order</h3>
						<p class="text-center">Order online - <span class="red">Octopus</span> <br>
						Call for order <br>
						<span class="red">94456 56066</span> - Chennai only</p>
					</div>
				</div>
				<div class="col-xs-12 col-sm-8 col-md-8">
					<h3 class="footer-heading">About Us</h3>
					<p>We are a Chennai based sea food suppliers providing quality sea foods at affordable price at your door step. We offer weekly discounts and surprise gifts for our customers while delivering the orders. We also take hotels, restaurant and party orders (bulk orders only). Place your orders and experience the real taste of sea food without delay.</p>
				</div>
			</div>

			<div class="row footer-bottom col-md-12">
				<span class="copyright">@ 2016 copyright octopus sea food</span>
				<span class="pull-right">
					<a href="#"><img src="img/facebook.png" alt="Facebook"></a>
					<a href="#"><img src="img/twitter.png" alt="Twitter"></a>
					<a href="#"><img src="img/linkedin.png" alt="Linkedin"></a>
				</span>
			</div>
		</div>
	</footer>
	<!-- footer ends -->

<?php
	include 'includes/login.php';
	include 'includes/register.php';
	include 'includes/footer.php';
?>
