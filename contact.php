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
	<!-- panel control left -->
	
	<!-- end panel control left -->

	<!-- panel control right -->
	
	</div>
	<!-- end panel control right -->
	
	<!-- contact-->
	<div class="contact app-pages app-section">
		<div class="container" >
			<div class="pages-title">
				<h3>Contact Us</h3>
			</div>
			<form action="#" method="POST">
				<input type="text" placeholder="Name" name="Name">
				<input type="email" placeholder="Email" name="Email">
				<input type="number" placeholder="Telepon" name="Telepon">
				<input type="text" placeholder="Konu" name="Konu">
				<textarea cols="20" rows="10" placeholder="Your Message" name="YourMessage"></textarea>
				<button class="button" name="button">Submit</button>
			</form>
		</div>
	</div>
	
<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=kafe', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // POST isteğinden gelen verileri alın
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $telefon = $_POST['Telepon'];
    $konu = $_POST['Konu'];
    $mesaj = $_POST['YourMessage'];

    // Verileri veritabanına eklemek için bir SQL sorgusu oluşturun
    $sql = "INSERT INTO iletisim (isim, email, telefon, konu, mesaj) VALUES (:name, :email, :telefon, :konu, :mesaj)";
    $stmt = $db->prepare($sql);

    // Verileri sorguya bağlayın
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telefon', $telefon);
    $stmt->bindParam(':konu', $konu);
    $stmt->bindParam(':mesaj', $mesaj);

    // Sorguyu çalıştırın
    if ($stmt->execute()) {
        echo "Veri başarıyla eklendi.";
    } else {
        echo "Veri eklenirken hata oluştu.";
    }
} catch (PDOException $e) {
    echo 'Hata: ' . $e->getMessage();
}
?>



	<!-- end contact -->
	
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