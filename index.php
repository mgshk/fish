<?php
	include 'includes/header.php';
?>

	<script src="js/user.js"></script>
	<!-- banner starts -->
	<section id="banner">

		<a href="contact.html" class="banner-top"><img src="img/banner-top.png" alt="BannerTop">
		</a>

		<ul class="bxslider">
			<li><img src="img/banner1.jpg" alt="Banner1" class="img-responsive"></li>
			<li><img src="img/banner1.jpg" alt="Banner1" class="img-responsive"></li>
			<li><img src="img/banner1.jpg" alt="Banner1" class="img-responsive"></li>
			<li><img src="img/banner1.jpg" alt="Banner1" class="img-responsive"></li>
		</ul>
	</section>
	<!-- banner starts -->

	<!-- products starts -->
	<section id="productsList" class="text-center">
		<div class="container">
			<div class="row">
				
				<h3>Hot Sales</h3>
				<div id="tabItems"></div>

				<script id="items" type="text/x-handlebars-template">
					{{#each items}}
						<div class="product">
							<img src="img/{{item_id}}.jpg" alt="{{item_name}}">
							<div class="product-order text-center">
								<p>{{item_name}}</p>
								<h6>Rs {{item_price}} / KG</h6>
							</div>
							<button onclick="user.goProduct('{{item_id}}');">Order Now</button>
						</div>
					{{/each}}
				</script>

				<script id="noRecords" type="text/x-handlebars-template">
			      <h5>{{{msg}}}</h5>
			    </script>
			</div>
		</div>
	</section>
	<!-- products ends -->

	<section id="ord">
		<div class="container">
			<div class="row">
				<h4 class="text-center">Order your favorite fish varieties at one day before and get it delivered Fresh on time</h4>

				<h5 class="text-center">Order online or Call for order <span>94456 56066</span></h5>
			</div>
		</div>
	</section>

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
	?>

	<a href="#" class="scrollToTop"></a>

	<script type="text/javascript">
    $(document).ready(function() {
	    $('.bxslider').bxSlider({
	        auto: true,
	        autoControls: true,
	        speed: 2000,
	        mode: 'fade'
	    });
	
		//Check to see if the window is top if not then display button
		$(window).scroll(function(){
			if ($(this).scrollTop() > 200) {
				$('.scrollToTop').fadeIn();
			} else {
				$('.scrollToTop').fadeOut();
			}
		});
		
		//Click event to scroll to top
		$('.scrollToTop').click(function(){
			$('html, body').animate({scrollTop : 0},800);
			return false;
		});
	});
</script>

<?php
	include 'includes/footer.php';
?>s
