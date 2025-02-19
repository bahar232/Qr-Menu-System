<?php
include 'admin/inc/database.php';
if (!isset($_GET['urun_id']) || empty($_GET['urun_id'])) {
	header('Location: index.php');
	exit;
}

$urunId = $_GET['urun_id'];

$urunSorgu = $db->query("SELECT * FROM urunler WHERE id = '$urunId' LIMIT 1");
if (!$urunSorgu->rowCount()) {
	header('Location: index.php');
	exit;
}

$urunGetir = $urunSorgu->fetch();
$urunKategoriId = $urunGetir['kategori_id'];
$kategoriSorgu = $db->query("SELECT * FROM kategoriler WHERE id = '$urunKategoriId' LIMIT 1");

if (!$kategoriSorgu->rowCount()) {
	header('Location: index.php');
	exit;
}

$kategoriGetir = $kategoriSorgu->fetch();
$kategoriAdi = $kategoriGetir['kategori_adi'];
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="UTF-8">
	<title><?= $urunGetir['urun_adi']; ?> - Site Adı</title>
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
	<div class="panel-control-left">
		<ul id="slide-out-left" class="side-nav collapsible"  data-collapsible="accordion">
			<li>
				<a href="index.html"><i class="fa fa-home"></i>Home</a>
			</li>
			<li>
				<div class="collapsible-header"><i class="fa fa-indent"></i>Categories <span><i class="fa fa-chevron-right"></i></span></div>
				<div class="collapsible-body">
					<ul class="categories-in collapsible"  data-collapsible="accordion">
						<li><a href="categories.html">Categories Page</a></li>
						<li>
							<div class="collapsible-header">Sushi <span><i class="fa fa-chevron-right"></i></span></div>
							<div class="collapsible-body">
								<ul class="side-nav-panel">
									<li><a href="">Sushi Spicy</a></li>
									<li><a href="">Sushi Sweet</a></li>
									<li><a href="">Sushi Tasteful</a></li>
									<li><a href="">Sushi Steady</a></li>
								</ul>
							</div>
						</li>
						<li>
							<div class="collapsible-header">Pizza <span><i class="fa fa-chevron-right"></i></span></div>
							<div class="collapsible-body">
								<ul class="side-nav-panel">
									<li><a href="">Pizza Spicy</a></li>
									<li><a href="">Pizza Sweet</a></li>
									<li><a href="">Pizza Tasteful</a></li>
									<li><a href="">Pizza Steady</a></li>
								</ul>
							</div>
						</li>
						<li>
							<div class="collapsible-header">Food <span><i class="fa fa-chevron-right"></i></span></div>
							<div class="collapsible-body">
								<ul class="side-nav-panel">
									<li><a href="">Food Spicy</a></li>
									<li><a href="">Food Sweet</a></li>
									<li><a href="">Food Tasteful</a></li>
									<li><a href="">Food Steady</a></li>
								</ul>
							</div>
						</li>
						<li>
							<div class="collapsible-header">Drink <span><i class="fa fa-chevron-right"></i></span></div>
							<div class="collapsible-body">
								<ul class="side-nav-panel">
									<li><a href="">Drink Juice</a></li>
									<li><a href="">Drink Coffe</a></li>
									<li><a href="">Drink Milk </a></li>
								</ul>
							</div>
						</li>
					</ul>
				</div>
			</li>
			<li>
				<a href="chef.html"><i class="fa fa-cutlery"></i>Chef</a>
			</li>
			<li>
				<a href="menu-grid.html"><i class="fa fa-th-large"></i>Menu Grid</a>
			</li>
			<li>
				<a href="menu-list.html"><i class="fa fa-list"></i>Menu List</a>
			</li>
			<li>
				<a href="product-details.html"><i class="fa fa-shopping-basket"></i>Product Details</a>
			</li>
			<li>
				<a href="shopping-cart.html"><i class="fa fa-shopping-cart"></i>Shopping Cart</a>
			</li>
			<li>
				<a href="reservation.html"><i class="fa fa-send"></i>Reservation</a>
			</li>
			<li>
				<div class="collapsible-header"><i class="fa fa-rss"></i>Blog <span><i class="fa fa-chevron-right"></i></span></div>
				<div class="collapsible-body">
					<ul class="side-nav-panel">
						<li><a href="blog.html">Blog</a></li>
						<li><a href="blog-single.html">Blog Single</a></li>
					</ul>
				</div>
			</li>
			<li>
				<div class="collapsible-header"><i class="fa fa-file-powerpoint-o"></i>Pages <span><i class="fa fa-chevron-right"></i></span></div>
				<div class="collapsible-body">
					<ul class="side-nav-panel">
						<li><a href="faq.html">Faq</a></li>
						<li><a href="testimonial.html">Testimonial</a></li>
						<li><a href="404.html">404 Page</a></li>
					</ul>
				</div>
			</li>
			<li>
				<a href="contact.html"><i class="fa fa-envelope"></i>Contact Us</a>
			</li>
			<li>
				<a href="login.html"><i class="fa fa-sign-in"></i>Login</a>
			</li>
			<li>
				<a href="register.html"><i class="fa fa-user-plus"></i>Register</a>
			</li>
		</ul>
	</div>
	<!-- end panel control left -->

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

	<!-- product details -->
	<div class="product-details app-pages app-section">
		<div class="container">
			<div class="entry">
				<div class="row">
					<div id="choose1" class="col s12">
						<img src="admin/dist/img/urunler/<?= $urunGetir['urun_gorsel_1']; ?>" alt="">
					</div>
					<div id="choose2" class="col s12">
						<img src="admin/dist/img/urunler/<?= $urunGetir['urun_gorsel_2']; ?>" alt="">
					</div>
					<div id="choose3" class="col s12">
						<img src="admin/dist/img/urunler/<?= $urunGetir['urun_gorsel_3']; ?>" alt="">
					</div>
					<div class="col s12">
						<ul class="tabs">
							<li class="tab col s4">
								<a href="#choose1">
									<img src="admin/dist/img/urunler/<?= $urunGetir['urun_gorsel_1']; ?>" alt="">
								</a>
							</li>
							<li class="tab col s4">
								<a href="#choose2">
									<img src="admin/dist/img/urunler/<?= $urunGetir['urun_gorsel_2']; ?>" alt="">
								</a>
							</li>
							<li class="tab col s4">
								<a href="#choose3">
									<img src="admin/dist/img/urunler/<?= $urunGetir['urun_gorsel_3']; ?>" alt="">
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="details">
				<h5><?= $urunGetir['urun_adi']; ?></h5>
				<div class="rating">
                    <span class="active"><i class="fa fa-star"></i></span>
                    <span class="active"><i class="fa fa-star"></i></span>
                    <span class="active"><i class="fa fa-star"></i></span>
                    <span class="active"><i class="fa fa-star"></i></span>
                    <span class=""><i class="fa fa-star"></i></span>
                </div>
                <p>Kategori: <b><?= $kategoriAdi; ?></b></p>
				<div class="price">
					<h5><?= number_format($urunGetir['urun_fiyat'], 2, '.', ''); ?>€</h5>
				</div>
			</div>
			<div class="desc-review">
				<div class="row">
					<div class="col s12">
						<ul class="tabs">
							<li class="tab col s6">
								<a href="#description"><h5>Description</h5></a>
							</li>
							<li class="tab col s6">
								<a href="#review">
									<h5>alerjik nedenler</h5>
								</a>
							</li>
						</ul>
					</div>
					<div id="description" class="col s12">
						<p><?= $urunGetir['urun_aciklama']; ?></p>
					</div>
					<div id="review" class="review col s12">
						<ul>
							<?= $urunGetir['urun_alerjik_nedenler']; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end product details -->
	
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