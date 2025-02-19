<?php
include 'admin/inc/database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Delicious - Cafe & Restaurant Mobile Template</title>
	<meta name="viewport" content="width=device-width, initial-scale=1  maximum-scale=1 user-scalable=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="HandheldFriendly" content="True">
	
	<link rel="shortcut icon" href="img/favicon.png">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/materialize.min.css">
	<link rel="stylesheet" href="css/slick.css">
	<link rel="stylesheet" href="css/slick-theme.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/owl.theme.css">
	<link rel="stylesheet" href="css/owl.transitions.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

	<!-- navbar -->
		<?php include 'inc/navbar.php'; ?>
	<!-- end navbar -->

	<!-- panel control left -->
<!-- panel control left -->
	<div class="panel-control-left">
		<ul id="slide-out-left" class="side-nav collapsible"  data-collapsible="accordion">
			<li>
				<a href="index.php"><i class="fa fa-home"></i>Home</a>
			</li>
			<li>
				<div class="collapsible-header" ><i class="fa fa-th-large" ></i>Menu Card<span><i class="fa fa-chevron-right"></i></span></div>
				<div class="collapsible-body">
					
					<?php
					$kategoriler = $db->query("SELECT * FROM kategoriler ORDER BY kategori_adi ASC");
					$kategoriler = $kategoriler->rowCount() > 0 ? $kategoriler->fetchAll() : null;
					?>

					<?php foreach ($kategoriler AS $kategori) { ?>
						<ul class="categories-in collapsible" >
							<a href="#kategori_<?= $kategori['id']; ?>">
								<?= $kategori['kategori_adi']; ?>
							</a>
						</ul>
					<?php } ?>
					
						
					
				</div>
			</li>
				<li>
				<a href="contact.php "><i class="fa fa-envelope"></i>Contact Us</a>
			</li>
			
			
			
			
			
		</ul>
	</div>

	<!-- panel control right -->
	<div class="panel-control-right">
		<div id="slide-out-right" class="side-nav">
			<div class="row entry">
				<div class="col s4">
					<img src="img/cart1.png" alt="">
				</div>
				<div class="col s6">
					<div class="desc">
						<h6>Food Title</h6>
						<div class="rating">
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
							<span class=""><i class="fa fa-star"></i></span>
						</div>
						<h6><span>$20.00</span></h6>
					</div>
				</div>
				<div class="col s2">
					<div class="action">
						<i class="fa fa-remove"></i>
					</div>
				</div>
			</div>
			<div class="row entry">
				<div class="col s4">
					<img src="img/cart2.png" alt="">
				</div>
				<div class="col s6">
					<div class="desc">
						<h6>Drink Title</h6>
						<div class="rating">
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
							<span class=""><i class="fa fa-star"></i></span>
							<span class=""><i class="fa fa-star"></i></span>
						</div>
						<h6><span>$10.00</span></h6>
					</div>
				</div>
				<div class="col s2">
					<div class="action">
						<i class="fa fa-remove"></i>
					</div>
				</div>
			</div>
			<div class="row price">
				<div class="col s8">
					<h6>Total</h6>
				</div>
				<div class="col s4">
					<h6>$30.00</h6>
				</div>
			</div>
			<ul>
				<li>
					<button class="button">Reservation</button>
				</li>
				<li>
					<button class="button">View Cart</button>
				</li>
			</ul>
		</div>
	</div>
	<!-- end panel control right -->

	<!-- menu-grid -->
	<div class="menu-grid app-pages app-section">
		<div class="container">
			<div class="pages-title">
				<h3>Spesiyel Kahveler</h3>
			</div>
			<div class="row">
				<div class="col s6">
					<div class="entry">
						<img src="img/sushi3.png" alt="">
						<h6><a href="">Espresso Macchiato Tekli</a></h6>
						<div class="rating">
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
							<span class=""><i class="fa fa-star"></i></span>
							<span class=""><i class="fa fa-star"></i></span>
						</div>
						<div class="price">
							<h5>$28</h5>
						</div>
						<button class="button">ADD TO CART</button>
					</div>
				</div>
				<div class="col s6">
					<div class="entry">
						<img src="img/sushi4.png" alt="">
						<h6><a href="">Espresso Macchiato Duble</a></h6>
						<div class="rating">
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
							<span class=""><i class="fa fa-star"></i></span>
						</div>
						<div class="price">
							<h5>$28</h5>
						</div>
						<button class="button">ADD TO CART</button>
					</div>
				</div>
				<div class="col s6">
					<div class="entry">
						<img src="img/sushi4.png" alt="">
						<h6><a href="">Americano Tekli</a></h6>
						<div class="rating">
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
							<span class=""><i class="fa fa-star"></i></span>
						</div>
						<div class="price">
							<h5>$28</h5>
						</div>
						<button class="button">ADD TO CART</button>
					</div>
				</div>
				<div class="col s6">
					<div class="entry">
						<img src="img/sushi4.png" alt="">
						<h6><a href="">Americano Çift Kişilik</a></h6>
						<div class="rating">
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
							<span class=""><i class="fa fa-star"></i></span>
						</div>
						<div class="price">
							<h5>$28</h5>
						</div>
						<button class="button">ADD TO CART</button>
					</div>
				</div>
				<div class="col s6">
					<div class="entry">
						<img src="img/sushi4.png" alt="">
						<h6><a href="">Café Crema Küçük</a></h6>
						<div class="rating">
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
							<span class=""><i class="fa fa-star"></i></span>
						</div>
						<div class="price">
							<h5>$28</h5>
						</div>
						<button class="button">ADD TO CART</button>
					</div>
				</div>
				<div class="col s6">
					<div class="entry">
						<img src="img/sushi4.png" alt="">
						<h6><a href="">Café Crema Büyük</a></h6>
						<div class="rating">
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
							<span class=""><i class="fa fa-star"></i></span>
						</div>
						<div class="price">
							<h5>$28</h5>
						</div>
						<button class="button">ADD TO CART</button>
					</div>
				</div>
				<div class="col s6">
					<div class="entry">
						<img src="img/sushi4.png" alt="">
						<h6><a href="">Kapuçino</a></h6>
						<div class="rating">
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
							<span class=""><i class="fa fa-star"></i></span>
						</div>
						<div class="price">
							<h5>$28</h5>
						</div>
						<button class="button">ADD TO CART</button>
					</div>
				</div>
				<div class="col s6">
					<div class="entry">
						<img src="img/sushi4.png" alt="">
						<h6><a href="">Flat White</a></h6>
						<div class="rating">
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
							<span class=""><i class="fa fa-star"></i></span>
						</div>
						<div class="price">
							<h5>$28</h5>
						</div>
						<button class="button">ADD TO CART</button>
					</div>
				</div>
				<div class="col s6">
					<div class="entry">
						<img src="img/sushi4.png" alt="">
						<h6><a href="">Cafe Latte</a></h6>
						<div class="rating">
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
							<span class=""><i class="fa fa-star"></i></span>
						</div>
						<div class="price">
							<h5>$28</h5>
						</div>
						<button class="button">ADD TO CART</button>
					</div>
				</div>
				<div class="col s6">
					<div class="entry">
						<img src="img/sushi4.png" alt="">
						<h6><a href="">Sütlü Kahve</a></h6>
						<div class="rating">
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
							<span class=""><i class="fa fa-star"></i></span>
						</div>
						<div class="price">
							<h5>$28</h5>
						</div>
						<button class="button">ADD TO CART</button>
					</div>
				</div>
				<div class="col s6">
					<div class="entry">
						<img src="img/sushi4.png" alt="">
						<h6><a href="">Latte Macchiato</a></h6>
						<div class="rating">
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
							<span class=""><i class="fa fa-star"></i></span>
						</div>
						<div class="price">
							<h5>$28</h5>
						</div>
						<button class="button">ADD TO CART</button>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col s6">
					<div class="entry">
						<img src="img/food1.png" alt="">
						<h6><a href="">Food Title</a></h6>
						<div class="rating">
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
							<span class=""><i class="fa fa-star"></i></span>
							<span class=""><i class="fa fa-star"></i></span>
						</div>
						<div class="price">
							<h5>$28</h5>
						</div>
						<button class="button">ADD TO CART</button>
					</div>
				</div>
				<div class="col s6">
					<div class="entry">
						<img src="img/drink1.png" alt="">
						<h6><a href="">Drink Title</a></h6>
						<div class="rating">
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
							<span class=""><i class="fa fa-star"></i></span>
						</div>
						<div class="price">
							<h5>$28</h5>
						</div>
						<button class="button">ADD TO CART</button>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col s6">
					<div class="entry">
						<img src="img/sushi2.png" alt="">
						<h6><a href="">Sushi Title</a></h6>
						<div class="rating">
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
							<span class=""><i class="fa fa-star"></i></span>
						</div>
						<div class="price">
							<h5>$28</h5>
						</div>
						<button class="button">ADD TO CART</button>
					</div>
				</div>
				<div class="col s6">
					<div class="entry">
						<img src="img/pizza2.png" alt="">
						<h6><a href="">Pizza Title</a></h6>
						<div class="rating">
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
						</div>
						<div class="price">
							<h5>$28</h5>
						</div>
						<button class="button">ADD TO CART</button>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col s6">
					<div class="entry">
						<img src="img/food3.png" alt="">
						<h6><a href="">Food Title</a></h6>
						<div class="rating">
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
							<span class=""><i class="fa fa-star"></i></span>
							<span class=""><i class="fa fa-star"></i></span>
						</div>
						<div class="price">
							<h5>$28</h5>
						</div>
						<button class="button">ADD TO CART</button>
					</div>
				</div>
				<div class="col s6">
					<div class="entry">
						<img src="img/drink4.png" alt="">
						<h6><a href="">Drink Title</a></h6>
						<div class="rating">
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
							<span class="active"><i class="fa fa-star"></i></span>
							<span class=""><i class="fa fa-star"></i></span>
						</div>
						<div class="price">
							<h5>$28</h5>
						</div>
						<button class="button">ADD TO CART</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end menu grid -->
	
	<!-- footer -->
	<footer>
		<div class="container">
			<h6>Find & follow us</h6>
			<ul class="icon-social">
				<li class="facebook"><a href=""><i class="fa fa-facebook"></i></a></li>
				<li class="twitter"><a href=""><i class="fa fa-twitter"></i></a></li>
				<li class="google"><a href=""><i class="fa fa-google"></i></a></li>
				<li class="instagram"><a href=""><i class="fa fa-instagram"></i></a></li>
				<li class="rss"><a href=""><i class="fa fa-rss"></i></a></li>
			</ul>
			<div class="tel-fax-mail">
				<ul>
					<li><span>Tel:</span> 900000o02</li>
					<li><span>Fax:</span> 0400000o98</li>
					<li><span>Email:</span> info@youremail.com</li>
				</ul>
			</div>
			<div class="ft-bottom">
				<span>Copyright © 2016 All Rights Reserved </span>
			</div>
		</div>
	</footer>
	<!-- end footer -->
	
	<!-- script -->
	<script src="js/jquery.min.js"></script>
	<script src="js/materialize.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/custom.js"></script>

</body>
</html>