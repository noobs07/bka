<div class="modal fade" id="form_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel" id="title">
					Form Banner
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
					<div class="row">
						<div class="form-group col-6">
							<label for="judul">
								Judul
							</label>
							<input type="text" class="form-control" id="judul" name="judul" required />
						</div>
						<div class="form-group col-6">
							<label for="file">
								Cover
							</label>
							<div class="custom-file">
								<input type="file" class="form-control" id="file" name="file" accept="image/png,image/jpeg"/>
							</div>
						</div>
						<div class="form-group col-12">
							<label for="deskripsi">
								Deskripsi
							</label>
							<textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
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

<script type="text/javascript">
	Dropzone.autoDiscover = false;

	let table = null;
	const form_modal = $('#form_modal');
	const delete_modal = $('#delete_modal');
	const input_delete_id = $('#delete_id');
	const input_id = $('#id');

	const input_judul = $('#judul')
	const input_deskripsi = $('#deskripsi').summernote({
		height: 100,
		dialogsInBody: true,
		callbacks: {
			onImageUpload: function(files) {
				uploadSummernote('#deskripsi', files[0], 'banner')
			},
		}
	})
	const input_file = $('#file');

	function editRow(id){
		$.ajax({
			url: '<?= base_url('api/'.$module.'/one') ?>',
			data: {id:id},
			type: 'GET',
			beforeSend: function (xhr, settings){
			},
			success: function(response){
				input_id.val(response['id_banner'])
				input_judul.val(response['judul'])
				input_deskripsi.summernote('code',response['deskripsi'])
				// input_file.val(response['cover'])
			},
			error: function(error){
			}
		});
	}

	form_modal.on('hidden.bs.modal', function(e) {
		input_id.val('')
		input_judul.val('')
		input_deskripsi.summernote('code','')
		input_file.val('')
	});

	$('#save_form').submit(function(event) {
		event.preventDefault();
		var formData = new FormData();
		formData.append('judul', input_judul.val());
		formData.append('deskripsi', input_deskripsi.val());
		formData.append('file', input_file[0].files[0]);
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
		table.ajax.reload(null, false);
	}

	toggleActive = (e,id) => {
		const btn = $(e);
		const icon = btn.find('i');
		const is_shown = ((btn.data('is_shown') == '0') ? '1' : '0');
		$.ajax({
			type: 'POST',
			url: "<?php echo base_url('api/'.$module.'/toggle/') ?>",
			data: {id: id, is_shown: is_shown},
			success: (response)=>{
				if (response) {
					btn.data('is_shown', is_shown);
					if (is_shown=='1') {
						btn.removeClass('btn-secondary');
						btn.addClass('btn-success');
						icon.removeClass('fa-toggle-off');
						icon.addClass('fa-toggle-on');
					} else {
						btn.removeClass('btn-success');
						btn.addClass('btn-secondary');
						icon.removeClass('fa-toggle-on');
						icon.addClass('fa-toggle-off');
					}
				}
			},
			error: (error) => {
				toastr.error(error.status + ' ' + error.statusText)
			},
			fail: (reason)=>{
			},
			dataType: 'json'
		});
	}

	$(document).ready( function () {
		table = $('#table').DataTable({
			'responsive': true,
			'processing': true,
			'serverSide': true,
			'ajax': '<?= base_url('api/banner/all') ?>',
			'columns': [
			{title: 'ID',data: 'id_banner'},
			{title: 'Judul',data: 'judul'},
			{title: 'Deskripsi',data: 'deskripsi'},
			{title: 'Cover',data: 'cover'},
			{title: 'Aksi',data: 'id_banner'},
			],
			'columnDefs': [
			{
				'render': function (data, type, row) {
					return `<img onerror="imgError(this)" src='${row.cover}' style='width:100px' />`;
				},
				'targets': 3
			},
			{
				'render': function (data, type, row) {
					let shownBtn = 
					`<button type="button" class="m-btn btn btn-success" data-is_shown=${row.is_shown} onclick="toggleActive(this,${row.id_banner})">
					<i class="fa fa-toggle-on"></i>
					</button>`;

					if (row.is_shown=='0') {
						shownBtn = 
						`<button type="button" class="m-btn btn btn-secondary" data-is_shown=${row.is_shown} onclick="toggleActive(this,${row.id_banner})">
						<i class="fa fa-toggle-off"></i>
						</button>`;
					}
					return `
					<div class="btn-group btn-group-sm" role="group" aria-label="First group">
					${shownBtn}
					<button class="btn btn-warning" onclick="editRow(${row.id_banner})" data-toggle="modal" data-target="#form_modal"><i class="fa fa-edit"></i></button>
					<button class="btn btn-danger" onclick="deleteRow(${row.id_banner})" data-toggle="modal" data-target="#delete_modal"><i class="fa fa-trash"></i></button>
					</div>`;
				},
				'targets': 4
			},
			],
		});

		$('#refresh_btn').click(()=>{
			table.ajax.reload(null, false);
		});

	});
</script>
