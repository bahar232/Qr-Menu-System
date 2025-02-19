<div class="navbar">
	<div class="container">
		<div class="panel-control-left">
			<?php //print_r($_SERVER['REQUEST_URI']); ?>
			<?php if (strpos($_SERVER['REQUEST_URI'], 'product-details.php')) { ?>
			<a href="index.php" style="margin-right: 10px; color: #fff;"><i class="fa fa-arrow-left"></i></a>
			<?php } ?>
			<a href="#" data-activates="slide-out-left" class="sidenav-control-left"><i class="fa fa-bars"></i></a>
		</div>
		<div class="site-title">
			<a href="index.php" class="logo"><h1>Waffel oder Becher</h1></a>
		</div>
		<div class="panel-control-right">
			
			<div style="display: flex;">

				<a href="dildegistir.php?dil=de" style="margin-right: 10px; border-radius: 10px;">
					<img src="img/flag_de.svg" style="width: 28px; height: 28px; border-radius: 10px;">
				</a>
				<a href="dildegistir.php?dil=en" style="border-radius: 10px;">
					<img src="img/flag_en.svg" style="width: 28px; height: 28px; border-radius: 10px;">
				</a>
			</div>

		</div>
	</div>
</div>