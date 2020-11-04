<script type="text/javascript">
	const save_btn = $('#save_btn')
	const change_form = $('#change_form')
	const input_old_password = $('#old_password')
	const input_new_password = $('#new_password')
	const input_confirm_password = $('#confirm_password')

	$(document).ready( function () {
		change_form.submit(function(event) {
			event.preventDefault();

			if (input_new_password.val()!=input_confirm_password.val()) {
				toastr.error('Konfirmasi password tidak sama')
			} else
			$.ajax({
				url: '<?= base_url('api/'.$module.'/changepass') ?>',
				data: {
					old_password: input_old_password.val(),
					new_password: input_new_password.val(),
				},
				type: 'POST',
				beforeSend: function (xhr, settings){
					save_btn.prop('disabled', true)
					save_btn.text('Menyimpan')
				},
				success: function(response) {
					if (response['status']) {
						toastr.success(response['message'])
						input_old_password.val('')
						input_new_password.val('')
						input_confirm_password.val('')
					} else {
						toastr.error(response['message'])
					}

					save_btn.prop('disabled', false)
					save_btn.text('Simpan')
				},
				error: function(error, a,b){
					save_btn.prop('disabled', false)
					save_btn.text('Simpan')

					toastr.error(error.status + ' ' + error.statusText)
				}
			})
		})


	})
</script>