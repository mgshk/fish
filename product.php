<?php
	include 'includes/header.php';

	if ( ! isset($_SESSION['user_id'])) {
		header("Location: index.php");
	}
?>

	<script src="js/product.js"></script>
	<!-- Inner content starts -->
		<section id="productPage">
			<div class="container">
			<div class="row aboutPage">

				<div class="col-xs-12 col-sm-6 col-md-6">
					<img src="img/banner1.jpg" alt="Banner1" class="img-responsive">
				</div>
				<div id="tabItem"></div>
				<input type="hidden" id="item_id" value="<?php echo $_GET['item_id']; ?>" />
				<script id="item" type="text/x-handlebars-template">
					<div class="col-xs-12 col-sm-6 col-md-6">
						<h1>{{item.item_name}}</h1>
						<p>Rs.{{item.item_price}}/Kg</p>
						<p>Select How many KG&rsquo;s you want
							<select onchange="product.updatePrice(this.value, {{item.item_price}});">
							{{#each item_quantity}}
								<option value="{{this}}">{{this}}</option>
							{{/each}}
							</select>
							KG(S)
						</p>
						<p>Total Amount to Pay: Rs.<span id="price">{{item.item_price}}</span></p>
						<button onclick="product.orderNow({{item.item_id}});">Book for Home Delievery</button>
					</div>
				</script>

				<script id="errorResult" type="text/x-handlebars-template">
			      <h5>{{{msg}}}</h5>
			    </script>

			    <p id="successMsg" class="hide"></p>
				<p id="errorMsg" class="hide"></p>
			</div>
		</div>
		</section>
	<!-- Inner content ends -->

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
