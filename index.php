<?php
include 'admin/inc/database.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Waffel oder Becher</title>
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
	<style >   body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .cookie-policy {
            display: none;
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: black; /* Sarı renkli arka plan */
            padding: 10px;
            text-align: center;
            z-index: 9999; /* Bildirimi diğer içeriğin üstüne yerleştirin */
        }

        .accept-button {
            background-color: #e0b531; /* Turuncu renkli düğme */
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }
        .slider-video {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    z-index: -1; /* Slider içeriğinin önünde kalması için */
}
</style>
</head>
<body>
<div class="cookie-policy" id="cookiePolicy">
        Diese Website verwendet Cookies. Um unsere Cookie-Richtlinien einzusehen, klicken Sie <a href="https://policies.google.com/technologies/cookies?hl=de">hier</a>.

        <button class="accept-button" id="acceptButton">Akzeptieren</button>
    </div>

	<!-- navbar -->
	<?php include 'inc/navbar.php'; ?>
	<!-- end navbar -->

	<!-- panel control left -->
	<div class="panel-control-left">

		<ul id="slide-out-left" class="side-nav collapsible"  data-collapsible="accordion">
			<li>
				<a href="index.php"><i class="fa fa-home"></i>Heim</a>
			</li>
			<li>
				<div class="collapsible-header" ><i class="fa fa-th-large" ></i>Menükarte<span><i class="fa fa-chevron-right"></i></span></div>
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
				<a href="contact.php "><i class="fa fa-envelope"></i>
Kontaktiere uns</a>
			</li>
			
			
			
			
			
		</ul>
	</div>
	<!-- end panel control left -->

	<!-- panel control right -->

	<!-- end panel control right -->
	
	<!-- slider -->
	<div class="slider-slick app-pages">
		<div class="slider-entry">
			
		<img src="img/move.gif" widht="500" height="100" alt="">

			<div class="overlay"></div>
			<div class="caption">
				
			</div>
		</div>
		
		
	
	</div>
	<!-- end slider -->

	<!-- offers -->


	<!-- open hours -->
	
	<!-- end open hours -->
	
	<!-- menu -->
	<div class="menu app-section">
		<div class="container">
			<div class="app-title">
				<h4>Menükarte</h4>
				<ul class="line">
					<li><i class="fa fa-snowflake-o"></i></li>
					<li class="line-center"><i class="fa fa-snowflake-o"></i></li>
					<li><i class="fa fa-snowflake-o"></i></li>
				</ul>
			</div>
			<div class="content">
				<ul class="tabs">
					<?php
					$kategoriler = $db->query("SELECT * FROM kategoriler ORDER BY kategori_adi ASC");
					$kategoriler = $kategoriler->rowCount() > 0 ? $kategoriler->fetchAll() : null;
					?>

					<?php foreach ($kategoriler AS $kategori) { ?>
						<li class="tab">
							<a href="#kategori_<?= $kategori['id']; ?>">
								<?= $kategori['kategori_adi']; ?>
							</a>
						</li>
					<?php } ?>
				</ul>
				
				<?php foreach ($kategoriler AS $kategori) { ?>
				<div id="kategori_<?= $kategori['id']; ?>">
					<div class="row">
						<?php
						$kategoriId = $kategori['id'];
						$urunler = $db->query("SELECT * FROM urunler WHERE kategori_id = '$kategoriId'");
						$urunler = $urunler->rowCount() > 0 ? $urunler->fetchAll() : null;
						?>
						<?php if ($urunler != null) { ?>
						<?php foreach ($urunler AS $urun) { ?>
						<div class="col s6" style="margin-bottom: 10px;">
							<div class="entry">
								<img src="admin/dist/img/urunler/<?= $urun['urun_gorsel_1']; ?>" alt="">
								<h6>
									<a href="product-details.php?urun_id=<?= $urun['id']; ?>"><?= $urun['urun_adi']; ?></a>
								</h6>
								<div class="rating">
									<span class="active"><i class="fa fa-star"></i></span>
									<span class="active"><i class="fa fa-star"></i></span>
									<span class="active"><i class="fa fa-star"></i></span>
									<span class="active"><i class="fa fa-star"></i></span>
									<span class=""><i class="fa fa-star"></i></span>
								</div>
								<div class="price">
									<h5><?= number_format($urun['urun_fiyat'], 2, '.', ''); ?>€</h5>
								</div>
								<a href="product-details.php?urun_id=<?= $urun['id']; ?>">
									<button class="button">review</button>
								</a>
							</div>
						</div>
						<?php } ?>
						<?php } else { ?>
						<h5>Bu kategoride ürün bulunamadı.</h5>
						<?php } ?>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<div class="offers">
		<div class="container">
			<div class="row">
				<div class="col s6">
					<div class="entry">
						<i class="fa fa-cutlery"></i>
						<h5>Meisterköche</h5>
						<p>Mit dem Fachwissen unserer Köche verleihen wir Ihren süßen Momenten Geschmack.</p>
					</div>
				</div>
				<div class="col s6">
					<div class="entry">
						<i class="fa fa-list"></i>
						<h5>Menütypen</h5>
						<p>
						Unsere Menüoptionen, bei denen Sie aus verschiedenen Geschmacksrichtungen wählen können</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col s6">
					<div class="entry">
						<i class="fa fa-coffee"></i>
						<h5>Special Coffees</h5>
						<p>
							
                    Einzigartige Kaffeeerlebnisse: Unsere Spezialkaffees</p>
					</div>
				</div>
				<div class="col s6">
					<div class="entry">
						<i class="fa fa-glass"></i>
						<h5>
Eisgetränke</h5>
						<p>
Eisgetränke eignen sich hervorragend zur Abkühlung</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="open-hours app-section">
		<div class="container">
			<div class="app-title">
				<h4>
Öffnungszeiten</h4>
				<ul class="line">
					<li><i class="fa fa-snowflake-o"></i></li>
					<li class="line-center"><i class="fa fa-snowflake-o"></i></li>
					<li><i class="fa fa-snowflake-o"></i></li>
				</ul>
			</div>
			<div class="entry">
				<h5>Sonntag - Montag</h5>
				<h6>07.00 AM - 12.00 PM</h6>
				<div class="dividing"></div>
				<h5>Montag</h5>
				<h6>24 Stunden geöffnet</h6>
			</div>
		</div>
	</div>
	<!-- end 
	<!-- end menu -->
	
	<!-- testimonial -->
	
	<!-- end testimonial -->
	
	<!-- footer -->
	<footer>
		<div class="container">
			<h6>Finden und folgen Sie uns</h6>
			<ul class="icon-social">
				<li class="facebook"><a href=""><i class="fa fa-facebook"></i></a></li>
				<li class="twitter"><a href=""><i class="fa fa-twitter"></i></a></li>
				
				<li class="instagram"><a href=""><i class="fa fa-instagram"></i></a></li>
				
			</ul>
			<div class="tel-fax-mail">
				<ul>
					<li><span>Tel:</span> 900000002</li>
					<li><span>Fax:</span> 0400000098</li>
					<li><span>Email:</span> info@youremail.com</li>
				</ul>
			</div>
			<div class="ft-bottom">
				<span>Copyright © 2023 Waffel oder Becher </span>
			</div>
		</div>
	</footer>
	<!-- end footer -->
	<script >// Çerez bildirimini göster
function showCookiePolicy() {
    var cookiePolicy = document.getElementById("cookiePolicy");
    cookiePolicy.style.display = "block";
}

// Çerez politikasını kabul ettiğinde çalışacak işlev
function acceptCookies() {
    var cookiePolicy = document.getElementById("cookiePolicy");
    cookiePolicy.style.display = "none";

    // Kullanıcının çerezleri kabul ettiğini kaydedebilirsiniz.
    // Örneğin, bir çerez (cookie) kullanabilirsiniz.
}

// Sayfa yüklendiğinde veya yenilendiğinde bildirimi göster
window.onload = showCookiePolicy;

// Kabul Et düğmesine tıklanınca çerezleri kabul et
document.getElementById("acceptButton").addEventListener("click", acceptCookies);
</script>
	<!-- script -->
	<script src="js/jquery.min.js"></script>
	<script src="js/materialize.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/custom.js"></script>
	
</body>
</html>

