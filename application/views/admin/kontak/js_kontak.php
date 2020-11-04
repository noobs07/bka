<div class="modal fade" id="form_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel" id="title">
					Form Kontak
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
							<label for="email">
								Email
							</label>
							<input type="text" class="form-control" id="email" name="email" required />
						</div>
						<div class="form-group col-12">
							<label for="pesan">
								Pesan
							</label>
							<textarea class="form-control" id="pesan" name="pesan"></textarea>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="reset" class="btn" data-dismiss="modal">
						Batal
					</button>
					<button type="submit" class="btn btn-success"  id="save_btn">
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
					<button type="submit" class="btn btn-danger" id="delete_btn">
						Yakin, hapus
					</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="deskripsi_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">
					Pesan
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">
						&times;
					</span>
				</button>
			</div>
			<div class="modal-body" id="pesan-div"></div>
			<div class="modal-footer">
				<button class="btn" data-dismiss="modal">
					Tutup
				</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

	let table = null
	const save_btn = $('#save_btn')
	const delete_btn = $('#delete_btn')
	const form_modal = $('#form_modal')
	const delete_modal = $('#delete_modal')
	const input_delete_id = $('#delete_id')
	const input_id = $('#id')

	const input_email = $('#email')
	const input_pesan = $('#pesan').summernote({
		height: 100,
		dialogsInBody: true,
		callbacks: {
			onImageUpload: function(files) {
				uploadSummernote('#pesan', files[0], 'kontak')
			},
		}
	})
	const pesan_div = $('#pesan-div')

	function getDetail(id){
		$.ajax({
			url: '<?= base_url('api/'.$module.'/one') ?>',
			data: {id:id},
			type: 'GET',
			beforeSend: function (xhr, settings){
			},
			success: function(response){
				pesan_div.empty()
				pesan_div.html(response['pesan'])
			},
			error: function(error){
			}
		})
	}

	function editRow(id){
		$.ajax({
			url: '<?= base_url('api/'.$module.'/one') ?>',
			data: {id:id},
			type: 'GET',
			beforeSend: function (xhr, settings){
			},
			success: function(response){
				input_id.val(response['id_kontak'])
				input_email.val(response['email'])
				input_pesan.summernote('code', response['pesan'])
			},
			error: function(error){
			}
		})
	}

	form_modal.on('hidden.bs.modal', function(e) {
		input_id.val('')
		input_email.val('')
		input_pesan.summernote('code', '')
	})

	$('#save_form').submit(function(event) {
		event.preventDefault()
		var formData = new FormData()
		formData.append('email', input_email.val())
		formData.append('pesan', input_pesan.val())
		if (input_id.val()){
			formData.append('id', input_id.val())
		}
		$.ajax({
			url: '<?= base_url('api/'.$module.'/save') ?>',
			data: formData,
			contentType: false,
			processData: false,
			type: 'POST',
			beforeSend: function (xhr, settings){
				save_btn.prop('disabled', true)
				save_btn.text('Menyimpan')
			},
			success: function(response){
				save_btn.prop('disabled', false)
				save_btn.text('Simpan')

				toastr.success('Berhasil disimpan')
				table.ajax.reload(null, false)
				form_modal.modal('hide')
			},
			error: function(error){
				save_btn.prop('disabled', false)
				save_btn.text('Simpan')

				toastr.error('Gagal disimpan')
			}
		})
	})

	function deleteRow(id){
		input_delete_id.val(id)
	}

	$('#delete_form').submit(function(event) {
		event.preventDefault()
		$.ajax({
			url: '<?= base_url('api/'.$module.'/delete') ?>',
			data: {
				id: input_delete_id.val(),
			},
			type: 'POST',
			beforeSend: function (xhr, settings){
				delete_btn.prop('disabled', true)
				delete_btn.text('Menghapus')
			},
			success: function(response){
				delete_btn.prop('disabled', false)
				delete_btn.text('Yakin, hapus')

				toastr.success('Berhasil dihapus')
				table.ajax.reload(null, false)
				delete_modal.modal('hide')
			},
			error: function(error){
				delete_btn.prop('disabled', false)
				delete_btn.text('Yakin, hapus')

				toastr.error('Gagal dihapus')
			}
		})
	})

	delete_modal.on('hidden.bs.modal', function(e) {
		input_delete_id.val('')
	})

	function refreshTable() {
		table.ajax.reload(null, false)
	}

	$(document).ready( function () {
		table = $('#table').DataTable({
			'responsive': true,
			'processing': true,
			'serverSide': true,
			'ajax': '<?= base_url('api/kontak/all') ?>',
			'columns': [
			{title: 'ID',data: 'id_kontak'},
			{title: 'Email',data: 'email'},
			{title: 'Waktu Kirim',data: 'waktu_kirim'},
			{title: 'Aksi',data: 'id_kontak'},
			],
			'columnDefs': [
			{
				'render': function (data, type, row) {
					return `
					<div class="btn-group btn-group-sm" role="group" aria-label="First group">
					<button class="btn btn-primary" onclick="getDetail(${row.id_kontak})" data-toggle="modal" data-target="#deskripsi_modal">Lihat Pesan</button>
					<button class="btn btn-warning" onclick="editRow(${row.id_kontak})" data-toggle="modal" data-target="#form_modal"><i class="fa fa-edit"></i></button>
					<button class="btn btn-danger" onclick="deleteRow(${row.id_kontak})" data-toggle="modal" data-target="#delete_modal"><i class="fa fa-trash"></i></button>
					</div>`
				},
				'targets': 3
			},
			],
		})

		$('#refresh_btn').click(()=>{
			table.ajax.reload(null, false)
		})

	})
</script>

