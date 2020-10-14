<!DOCTYPE html>
<html lang="en">
<head>
	<title>PT BINTANG ANUGERAH UTAMA</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="<?= base_url('assets/front/css/open-iconic-bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/front/css/animate.css') ?>">
	
	<link rel="stylesheet" href="<?= base_url('assets/front/css/owl.carousel.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/front/css/owl.theme.default.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/front/css/magnific-popup.css') ?>">

	<link rel="stylesheet" href="<?= base_url('assets/front/css/aos.css') ?>">

	<link rel="stylesheet" href="<?= base_url('assets/front/css/ionicons.min.css') ?>">
	
	<link rel="stylesheet" href="<?= base_url('assets/front/css/flaticon.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/front/css/icomoon.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/front/css/style.css') ?>">
</head>
<body>
	<nav>
		<div id="logo"><img src="<?= base_url('assets/front/images/logo2.png') ?>"></div>

		<label for="drop" class="toggle">Menu</label>
		<input type="checkbox" id="drop" />
		<ul class="menu">
			<li><a href="<?=base_url()?>">Home</a></li>
			<li><a href="<?=base_url('home/profile')?>">Profile</a></li>
			<li>
				<!-- First Tier Drop Down -->
				<label for="drop-1" class="toggle">Produk</label>
				<a href="#">Produk</a>
				<input type="checkbox" id="drop-1"/>
				<ul>
					<li><a href="<?=base_url('home/produk')?>">Bigroot</a></li>
					<li><a href="<?=base_url('home/produk')?>">Vermont</a></li>
				</ul> 

			</li>
			
			<li><a href="<?=base_url('home/news')?>">News</a></li>
			<li>
				<!-- First Tier Drop Down -->
				<label for="drop-2" class="toggle">How To</label>
				<a href="#">How To</a>
				<input type="checkbox" id="drop-2"/>
				<ul>
					<li><a href="<?=base_url('home/howtouse')?>">How to Use</a></li>
					<li><a href="<?=base_url('home/howtoreseller')?>">How to be Reseller</a></li>
				</ul> 
			</li>
		</ul>
	</nav>
	<!-- END nav -->