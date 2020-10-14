<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title><?php echo $title; ?></title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url('assets/admin/plugins/fontawesome-free/css/all.min.css') ?>">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Tempusdominus Bbootstrap 4 -->
	<link rel="stylesheet" href="<?= base_url('assets/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') ?>">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?= base_url('assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
	<!-- JQVMap -->
	<link rel="stylesheet" href="<?= base_url('assets/admin/plugins/jqvmap/jqvmap.min.css') ?>">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url('assets/admin/dist/css/adminlte.min.css') ?>">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="<?= base_url('assets/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="<?= base_url('assets/admin/plugins/daterangepicker/daterangepicker.css') ?>">
	<!-- summernote -->
	<link rel="stylesheet" href="<?= base_url('assets/admin/plugins/summernote/summernote-bs4.css') ?>">
	<!-- datatable -->
	<link rel="stylesheet" href="<?= base_url('assets/admin/plugins/datatables/datatables.min.css'); ?>" type="text/css" />
	<!-- SweetAlert2 -->
	<link rel="stylesheet" href="<?= base_url('assets/admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') ?>">
	<!-- Toastr -->
	<link rel="stylesheet" href="<?= base_url('assets/admin/plugins/toastr/toastr.min.css') ?>">
	<!-- Dropzone -->
	<link rel="stylesheet" href="<?= base_url('assets/admin/plugins/dropzone/dist/dropzone.css') ?>">

	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<script type="text/javascript">
		function imgError(image) {
			image.onerror = "";
			image.src = "<?php echo base_url('assets/admin/not_found.png') ?>";
			return true;
		}
	</script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">

		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
			</ul>

			<!-- Right navbar links -->
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="btn btn-sm btn-danger" href="<?= base_url('admin/auth/logout') ?>" role="button" >
						LOGOUT
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="index3.html" class="brand-link">
				<img src="<?= base_url('assets/admin/logo.jpeg') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
				<span class="brand-text font-weight-light">BKA</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user panel (optional) -->
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="image">
						<img src="<?= base_url('assets/admin/user.jpg') ?>" class="img-circle elevation-2" alt="User Image">
					</div>
					<div class="info">
						<a href="#" class="d-block">Administrator</a>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<li class="nav-header">Master Data</li>
						<li class="nav-item">
							<a href="<?= base_url('admin/dashboard') ?>" class="nav-link <?= ($module=='dashboard') ? 'active' : '' ?>">
								<i class="fas fa-home nav-icon"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('admin/banner') ?>" class="nav-link <?= ($module=='banner') ? 'active' : '' ?>">
								<i class="fas fa-image nav-icon"></i>
								<p>Banner</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('admin/berita') ?>" class="nav-link <?= ($module=='berita') ? 'active' : '' ?>">
								<i class="fas fa-newspaper nav-icon"></i>
								<p>Berita</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('admin/berita') ?>" class="nav-link <?= ($module=='berita') ? 'active' : '' ?>">
								<i class="fas fa-star nav-icon"></i>
								<p>Event</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('admin/ecommerce') ?>" class="nav-link <?= ($module=='ecommerce') ? 'active' : '' ?>">
								<i class="fas fa-store nav-icon"></i>
								<p>Official Store</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('admin/produk') ?>" class="nav-link <?= ($module=='produk') ? 'active' : '' ?>">
								<i class="fas fa-shopping-bag nav-icon"></i>
								<p>Produk</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('admin/reseller') ?>" class="nav-link <?= ($module=='reseller') ? 'active' : '' ?>">
								<i class="fas fa-address-card nav-icon"></i>
								<p>Reseller</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('admin/kontak') ?>" class="nav-link <?= ($module=='kontak') ? 'active' : '' ?>">
								<i class="fas fa-envelope nav-icon"></i>
								<p>Kontak</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('admin/video') ?>" class="nav-link <?= ($module=='video') ? 'active' : '' ?>">
								<i class="fas fa-video nav-icon"></i>
								<p>Video</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('admin/pengaturan') ?>" class="nav-link <?= ($module=='pengaturan') ? 'active' : '' ?>">
								<i class="fas fa-cogs nav-icon"></i>
								<p>Pengaturan</p>
							</a>
						</li>
					</ul>
				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>
