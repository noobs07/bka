<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Berita</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item active">Berita</li>
					</ol>
				</div>
			</div>
		</div>
	</div>

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h2 class="card-title">Daftar Berita</h2>
							<div class="float-right">
								<button class="btn btn-warning btn-sm" onclick="refreshTable()">Refresh</button>
								&nbsp;
								<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#form_modal">Tambah</button>
							</div>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="table" class="table table-bordered table-hover" style="width:100%"></table>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->

				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</section>
</div>a