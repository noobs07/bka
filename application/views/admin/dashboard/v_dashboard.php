<div class="content-wrapper">
	<div class="content-header"></div>

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h2 class="card-title">Dashboard</h2>
							<!-- <div class="float-right">
								<button class="btn btn-warning btn-sm">Refresh</button>
								&nbsp;
								<button class="btn btn-success btn-sm">Tambah</button>
							</div> -->
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<h3>Selamat datang!</h3>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->

				</div>
				<!-- /.col -->
			</div>
			<div class="row">
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-info">
						<div class="inner">
							<h3><?= $jumlah_berita ?></h3>

							<p>Jumlah Berita</p>
						</div>
						<div class="icon">
							<i class="ion ion-stats-bars"></i>
						</div>
						<a href="<?= base_url('admin/berita') ?>" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-success">
						<div class="inner">
							<h3><?= $jumlah_event ?></h3>

							<p>Jumlah Event</p>
						</div>
						<div class="icon">
							<i class="ion ion-stats-bars"></i>
						</div>
						<a href="<?= base_url('admin/event') ?>" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-warning">
						<div class="inner">
							<h3><?= $jumlah_bigroot ?></h3>

							<p>Jumlah Bigroot</p>
						</div>
						<div class="icon">
							<i class="ion ion-stats-bars"></i>
						</div>
						<a href="<?= base_url('admin/produk') ?>" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-danger">
						<div class="inner">
							<h3><?= $jumlah_vermont ?></h3>

							<p>Jumlah Vermont</p>
						</div>
						<div class="icon">
							<i class="ion ion-stats-bars"></i>
						</div>
						<a href="<?= base_url('admin/produk') ?>" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</section>


</div>a