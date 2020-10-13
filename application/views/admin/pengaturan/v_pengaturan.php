<div class="content-wrapper">
	<div class="content-header"></div>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h2 class="card-title">Pengaturan</h2>
							<div class="float-right">
								<button class="btn btn-warning btn-sm" onclick="refreshPengaturan()" id="refresh_btn">Refresh</button>
								&nbsp;
								<button class="btn btn-primary btn-sm" onclick="editPengaturan()" id="edit_btn">Edit</button>
								&nbsp;
								<button class="btn btn-success btn-sm" onclick="simpanPengaturan()" style="display: none" id="simpan_btn">Simpan</button>
							</div>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<ul class="nav nav-tabs mb-2" id="form-tab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="profil-tab" data-toggle="pill" href="#profil" role="tab" aria-controls="profil" aria-selected="true">Siapa kami</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="promo-tab" data-toggle="pill" href="#promo" role="tab" aria-controls="promo" aria-selected="false">Promo</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="kontak-tab" data-toggle="pill" href="#kontak" role="tab" aria-controls="kontak" aria-selected="false">Kontak kami</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="reseller-tab" data-toggle="pill" href="#reseller" role="tab" aria-controls="reseller" aria-selected="false">Reseller Rule</a>
								</li>
							</ul>
							<div class="tab-content" id="custom-content-below-tabContent">
								<div class="tab-pane fade show active" id="profil" role="tabpanel" aria-labelledby="profil-tab">
									<div class="row">
										<div class="col-12" style="display: none;">
											<div class="form-group">
												<label for="gambar_profil">
													Gambar
												</label>
												<input type="file" class="form-control" id="gambar_profil" name="gambar_profil" required style="display: none;" />
												<img src="" style="width: 100px" />
											</div>
										</div>
										<div class="col-12">
											<div class="form-group">
												<label for="profil_input">
													Profil
												</label>
												<input type="hidden" name="id" id="id" value="" />
												<textarea class="form-control" id="profil_input" name="profil_input" style="display: none;"></textarea>
												<p id="profil_text">Loading ...</p>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="promo" role="tabpanel" aria-labelledby="promo-tab">
									<div class="col-12">
										<div class="form-group">
											<label for="promo_input">
												Promo
											</label>
											<textarea class="form-control" id="promo_input" name="promo_input" style="display: none;"></textarea>
											<p id="promo_text">Loading ...</p>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="kontak" role="tabpanel" aria-labelledby="kontak-tab">
									<div class="col-12">
										<div class="form-group">
											<label for="alamat_input">
												Alamat
											</label>
											<textarea class="form-control" id="alamat_input" name="alamat_input" style="display: none;"></textarea>
											<p id="alamat_text">Loading ...</p>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label for="twitter_input">
												Twitter
											</label>
											<textarea class="form-control" id="twitter_input" name="twitter_input" style="display: none;"></textarea>
											<p id="twitter_text">Loading ...</p>
										</div>
										<div class="form-group">
											<label for="facebook_input">
												Facebook
											</label>
											<textarea class="form-control" id="facebook_input" name="facebook_input" style="display: none;"></textarea>
											<p id="facebook_text">Loading ...</p>
										</div>
										<div class="form-group">
											<label for="instagram_input">
												Instagram
											</label>
											<textarea class="form-control" id="instagram_input" name="instagram_input" style="display: none;"></textarea>
											<p id="instagram_text">Loading ...</p>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="reseller" role="tabpanel" aria-labelledby="reseller-tab">
									<div class="col-12">
										<div class="form-group">
											<label for="reseller_rule_input">
												Reseller Rule
											</label>
											<textarea class="form-control" id="reseller_rule_input" name="reseller_rule_input" style="display: none;"></textarea>
											<p id="reseller_rule_text">Loading ...</p>
										</div>
									</div>
								</div>
							</div>
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