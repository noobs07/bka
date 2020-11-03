<script type="text/javascript">
	$(document).ready( function () {

		$('#cancel_btn').click(e=>{
			$('#cancel_btn').hide()
			$('#save_btn').hide()
			$('input[name="id"]').prop('readonly', true)
			$('input[name="link_toko"]').prop('readonly', true)
			$('input[name="whatsapp"]').prop('readonly', true)

			$('#edit_btn').show()
		})

		$('#edit_btn').click(e=>{
			$('#cancel_btn').show()
			$('#save_btn').show()
			$('input[name="id"]').prop('readonly', false)
			$('input[name="link_toko"]').prop('readonly', false)
			$('input[name="whatsapp"]').prop('readonly', false)

			$('#edit_btn').hide()
		})

		$('#save_btn').click(e=>{
			const save_btn = $(e.target)
			$.ajax({
				url: '<?= base_url('admin/'.$module.'/update_link_wa') ?>',
				data: {
					id: $('input[name="id"]').val(),
					link_toko: $('input[name="link_toko"]').val(),
					whatsapp: $('input[name="whatsapp"]').val(),
				},
				type: 'POST',
				beforeSend: function (xhr, settings){
					save_btn.prop('disabled', true)
					save_btn.text('Menyimpan')
				},
				success: function(response){
					$('#cancel_btn').hide()
					$('#save_btn').hide()
					$('input[name="id"]').prop('readonly', true)
					$('input[name="link_toko"]').prop('readonly', true)
					$('input[name="whatsapp"]').prop('readonly', true)

					$('#edit_btn').show()

					const parsed = JSON.parse(response)
					if (parsed['status']) {
						toastr.success(parsed['msg'])
					}else {
						toastr.error(parsed['msg'])
					}
				},
				error: function(error){
					save_btn.prop('disabled', false)
					save_btn.text('Simpan')
					toastr.error('Gagal disimpan')
				}
			})
		})

	});
</script>

