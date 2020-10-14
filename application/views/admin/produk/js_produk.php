<div class="modal fade" id="form_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel" id="title">
					Form Produk
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">
						&times;
					</span>
				</button>
			</div>
			<form id="save_form">
				<input type="hidden" name="id" id="id" />
				<div class="modal-body">
					<ul class="nav nav-tabs mb-2" id="form-tab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="information-tab" data-toggle="pill" href="#information" role="tab" aria-controls="information" aria-selected="true">Informasi</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="photo-tab" data-toggle="pill" href="#photo" role="tab" aria-controls="photo" aria-selected="false">Foto</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="about-tab" data-toggle="pill" href="#about" role="tab" aria-controls="about" aria-selected="false">Tentang Produk</a>
						</li>
					</ul>
					<div class="tab-content" id="custom-content-below-tabContent">
						<div class="tab-pane fade show active" id="information" role="tabpanel" aria-labelledby="information-tab">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="nama">
											Nama Produk
										</label>
										<input type="text" class="form-control" id="nama" name="nama" required />
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="jenis">
											Jenis
										</label>
										<select class="form-control" id="jenis" name="jenis" required>
											<option value="1" selected>Bigroot</option>
											<option value="2">Vermont</option>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="bahasa">
											Bahasa
										</label>
										<select class="form-control" id="bahasa" name="bahasa" required>
											<option value="ID" selected>Indonesia</option>
											<option value="EN">Inggris</option>
										</select>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label for="deskripsi">
											Deskripsi
										</label>
										<textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="photo" role="tabpanel" aria-labelledby="photo-tab">
							<div id="files" class="dropzone" style="border: 2px dashed #0087F7;border-radius: 5px;background: white;">
								<div class="dz-message needsclick">
									<h3 class="m-dropzone__msg-title">
										Seret dan lepas file disini atau klik untuk pilih file
									</h3>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="about" role="tabpanel" aria-labelledby="about-tab">
							<div class="col-12">
								<div class="form-group">
									<label for="tentang">
										Tentang Produk
									</label>
									<textarea class="form-control" id="tentang" name="tentang"></textarea>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="reset" class="btn" data-dismiss="modal">
						Batal
					</button>
					<button type="submit" class="btn btn-success">
						Simpan
					</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">
					Hapus data?
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">
						&times;
					</span>
				</button>
			</div>
			<form id="delete_form">
				<input type="hidden" name="id" id="delete_id" />
				<div class="modal-body">
					<p>Anda yakin? data yang akan dihapus tidak akan bisa dikembalikan</p>
				</div>
				<div class="modal-footer">
					<button type="reset" class="btn" data-dismiss="modal">
						Batal
					</button>
					<button type="submit" class="btn btn-danger">
						Yakin, hapus
					</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="photos_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">
					Photos
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">
						&times;
					</span>
				</button>
			</div>
			<div class="modal-body" id="photos-div"></div>
			<div class="modal-footer">
				<button class="btn" data-dismiss="modal">
					Tutup
				</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	Dropzone.autoDiscover = false;

	let table = null;
	const form_modal = $('#form_modal');
	const delete_modal = $('#delete_modal');
	const input_delete_id = $('#delete_id');
	const input_id = $('#id');

	const input_nama = $('#nama')
	const input_deskripsi = $('#deskripsi').summernote({
		height: 100,
		dialogsInBody: true,
		callbacks: {
			onImageUpload: function(files) {
				uploadSummernote('#deskripsi', files[0], 'produk')
			},
		}
	})
	const input_tentang = $('#tentang').summernote({
		height: 100,
		dialogsInBody: true,
		callbacks: {
			onImageUpload: function(files) {
				uploadSummernote('#tentang', files[0], 'produk')
			},
		}
	})
	const input_jenis = $('#jenis')
	const input_bahasa = $('#bahasa')

	const photos_div = $('#photos-div');

	const dropzone = new Dropzone('div#files', { 
		autoProcessQueue: false,
		autoQueue: false,
		addRemoveLinks: true,
		acceptedFiles: 'image/*',
		url: '#',
		init: function() {
			this.on('addedfile', function(file) { $('.dz-progress').remove() });
		}
	});

	function getPhotos(id){
		$.ajax({
			url: '<?= base_url('api/'.$module.'/photos') ?>',
			data: {id:id},
			type: 'GET',
			beforeSend: function (xhr, settings){
			},
			success: function(response){
				photos_div.empty()
				response.forEach(photo=>{
					const img = document.createElement('img');
					img.src = photo['file'].replace(' ', '_').replace('%20', '_')
					img.style.width = '100px'
					// img.onerror = imgError(img)
					img.alt = photo['file'].replace(' ', '_').replace('%20', '_')
					photos_div.append(img)
				})
			},
			error: function(error){
			}
		});
	}

	function editRow(id){
		$.ajax({
			url: '<?= base_url('api/'.$module.'/one') ?>',
			data: {id:id},
			type: 'GET',
			beforeSend: function (xhr, settings){
			},
			success: function(response){
				input_id.val(response['id_produk'])
				input_nama.val(response['nama'])
				input_deskripsi.summernote('code',response['deskripsi'])
				input_tentang.summernote('code',response['tentang'])
				input_jenis.val(response['jenis'])
				input_bahasa.val(response['bahasa'])
			},
			error: function(error){
			}
		});
	}

	form_modal.on('hidden.bs.modal', function(e) {
		input_id.val('')
		input_nama.val('')
		input_jenis.val('1')
		input_bahasa.val('ID')
		input_deskripsi.summernote('code','')
		input_tentang.summernote('code','')
	});

	$('#save_form').submit(function(event) {
		event.preventDefault();
		var formData = new FormData();
		formData.append('nama', input_nama.val());
		formData.append('deskripsi', input_deskripsi.val());
		formData.append('tentang', input_tentang.val());
		formData.append('jenis', input_jenis.val());
		formData.append('bahasa', input_bahasa.val());
		dropzone.files.forEach((item)=>{
			formData.append('file[]', item);
		})
		if (input_id.val()){
			formData.append('id', input_id.val());
		}
		$.ajax({
			url: '<?= base_url('api/'.$module.'/save') ?>',
			data: formData,
			contentType: false,
			processData: false,
			type: 'POST',
			beforeSend: function (xhr, settings){
			},
			success: function(response){
				toastr.success('Berhasil disimpan')
				table.ajax.reload(null, false);
				form_modal.modal('hide');
			},
			error: function(error){
				toastr.error('Gagal disimpan')
			}
		});
	});

	function deleteRow(id){
		input_delete_id.val(id);
	}

	$('#delete_form').submit(function(event) {
		event.preventDefault();
		$.ajax({
			url: '<?= base_url('api/'.$module.'/delete') ?>',
			data: {
				id: input_delete_id.val(),
			},
			type: 'POST',
			success: function(response){
				toastr.success('Berhasil dihapus')
				table.ajax.reload(null, false);
				delete_modal.modal('hide');
			},
			error: function(error){
				toastr.error('Gagal dihapus')
			}
		});
	});

	delete_modal.on('hidden.bs.modal', function(e) {
		input_delete_id.val('');
	});

	function refreshTable() {
		console.log(dropzone.files)
		table.ajax.reload(null, false);
	}

	$(document).ready( function () {
		table = $('#table').DataTable({
			'responsive': true,
			'processing': true,
			'serverSide': true,
			'ajax': '<?= base_url('api/produk/all') ?>',
			'columns': [
			{title: 'ID',data: 'id_produk'},
			{title: 'Nama Produk',data: 'nama'},
			{title: 'Deskripsi',data: 'deskripsi'},
			{title: 'Tentang',data: 'tentang'},
			{title: 'Jenis',data: 'jenis'},
			{title: 'Bahasa',data: 'bahasa'},
			{title: 'Aksi',data: 'id_produk'},
			],
			'columnDefs': [
			{
				'render': function (data, type, row) {
					const d = $(row.deskripsi)
					if (row.deskripsi) { return (d[0].length>50) ? d[0].innerHTML + ' ...' : d[0].innerHTML }
						else { return '-' }
					},
				'targets': 2
			},
			{
				'render': function (data, type, row) {
					const d = $(row.tentang)
					if (row.tentang) { return (d[0].length>50) ? d[0].innerHTML + ' ...' : d[0].innerHTML }
						else { return '-' }
					},
				'targets': 3
			},
			{
				'render': function (data, type, row) {
					if (row.jenis == '1') { return 'Bigroot'} 
						else { return 'Vermont' }
					},
				'targets': 4
			},
			{
				'render': function (data, type, row) {
					return `
					<div class="btn-group btn-group-sm" role="group" aria-label="First group">
					<button class="btn btn-primary" onclick="getPhotos(${row.id_produk})" data-toggle="modal" data-target="#photos_modal"><i class="fa fa-images"></i></button>
					<button class="btn btn-warning" onclick="editRow(${row.id_produk})" data-toggle="modal" data-target="#form_modal"><i class="fa fa-edit"></i></button>
					<button class="btn btn-danger" onclick="deleteRow(${row.id_produk})" data-toggle="modal" data-target="#delete_modal"><i class="fa fa-trash"></i></button>
					</div>`;
				},
				'targets': 6
			},
			],
		});

		$('#refresh_btn').click(()=>{
			table.ajax.reload(null, false);
		});

	});
</script>

