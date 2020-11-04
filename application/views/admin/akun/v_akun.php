<div class="content-wrapper">
	<div class="content-header"></div>

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-4">
					<div class="card">
						<div class="card-header">
							<h2 class="card-title">Ganti Password</h2>
						</div>
						<div class="card-body">
							<form id="change_form">
								<div class="modal-body">
									<div class="row">
										<div class="form-group col-12">
											<label>Password Lama</label>
											<input type="password" class="form-control" name="old_password" id="old_password" required />
										</div>
										<div class="form-group col-12">
											<label>Password Baru</label>
											<input type="password" class="form-control" name="new_password" id="new_password" required />
										</div>
										<div class="form-group col-12">
											<label>Konfirmasi Password</label>
											<input type="password" class="form-control" name="confirm_password" id="confirm_password" required />
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="reset" class="btn btn-secondary" data-dismiss="modal">
										Batal
									</button>
									<button type="submit" class="btn btn-success" id="save_btn">
										Simpan
									</button>
								</div>
							</form>
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


</div>
