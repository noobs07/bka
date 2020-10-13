<div class="modal fade" id="form_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel" id="title">
					Form Ecommerce
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
							<label for="nama">
								Nama Ecommerce
							</label>
							<input type="text" class="form-control" id="nama" name="nama" required />
						</div>
						<div class="form-group col-6">
							<label for="file">
								Icon
							</label>
							<div class="custom-file">
								<input type="file" class="form-control" id="file" name="file" accept="image/png,image/jpeg"/>
							</div>
						</div>
						<div class="form-group col-12">
							<label for="link">
								Link
							</label>
							<input type="text" class="form-control" id="link" name="link" required />
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

	const input_nama = $('#nama')
	const input_link = $('#link')
	const input_file = $('#file')

	function editRow(id){
		$.ajax({
			url: '<?= base_url('api/'.$module.'/one') ?>',
			data: {id:id},
			type: 'GET',
			beforeSend: function (xhr, settings){
			},
			success: function(response){
				input_id.val(response['id_ecommerce'])
				input_nama.val(response['nama'])
				input_link.val(response['link'])
				// input_file.val(response['icon'])
			},
			error: function(error){
			}
		});
	}

	form_modal.on('hidden.bs.modal', function(e) {
		input_id.val('')
		input_nama.val('')
		input_link.val('')
		input_file.val('')
	});

	$('#save_form').submit(function(event) {
		event.preventDefault();
		var formData = new FormData();
		formData.append('nama', input_nama.val());
		formData.append('link', input_link.val());
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

	$(document).ready( function () {
		table = $('#table').DataTable({
			'responsive': true,
			'processing': true,
			'serverSide': true,
			'ajax': '<?= base_url('api/ecommerce/all') ?>',
			'columns': [
			{title: 'ID',data: 'id_ecommerce'},
			{title: 'Nama',data: 'nama'},
			{title: 'Link',data: 'link'},
			{title: 'Icon',data: 'icon'},
			{title: 'Aksi',data: 'id_ecommerce'},
			],
			'columnDefs': [
			{
				'render': function (data, type, row) {
					return `<img onerror="imgError(this)" src='${row.icon}' style='width:100px' />`;
				},
				'targets': 3
			},
			{
				'render': function (data, type, row) {
					return `
					<div class="btn-group btn-group-sm" role="group" aria-label="First group">
					<button class="btn btn-warning" onclick="editRow(${row.id_ecommerce})" data-toggle="modal" data-target="#form_modal"><i class="fa fa-edit"></i></button>
					<button class="btn btn-danger" onclick="deleteRow(${row.id_ecommerce})" data-toggle="modal" data-target="#delete_modal"><i class="fa fa-trash"></i></button>
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

