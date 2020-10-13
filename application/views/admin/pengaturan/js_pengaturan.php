<script type="text/javascript">
	const refresh_btn = $('#refresh_btn')
	const edit_btn = $('#edit_btn')
	const simpan_btn = $('#simpan_btn')

	const input_id = $('#id')
	const gambar = $('#gambar_profil')
	let profil = $('#profil_input')
	let profil_text = $('#profil_text')

	let promo = $('#promo_input')
	let promo_text = $('#promo_text')

	let alamat = $('#alamat_input')
	let alamat_text = $('#alamat_text')

	let twitter = $('#twitter_input')
	let twitter_text = $('#twitter_text')

	let facebook = $('#facebook_input')
	let facebook_text = $('#facebook_text')

	let instagram = $('#instagram_input')
	let instagram_text = $('#instagram_text')

	let reseller_rule = $('#reseller_rule_input')
	let reseller_rule_text = $('#reseller_rule_text')

	simpan_btn.click((e)=>{
		$.ajax({
			url: '<?= base_url('api/'.$module) ?>',
			data:{
				id:input_id.val(),
				profil:profil.val(),
				promo:promo.val(),
				alamat:alamat.val(),
				twitter:twitter.val(),
				facebook:facebook.val(),
				instagram:instagram.val(),
				reseller_rule:reseller_rule.val(),
			},
			type: 'POST',
			beforeSend: function (xhr, settings){
				simpan_btn.text('Loading ...')
			},
			success: function(response){ 
				simpan_btn.text('Simpan')
				if (response){
					profil_text.html(response['profil'])
					promo_text.html(response['promo'])
					alamat_text.html(response['alamat'])
					twitter_text.html(response['twitter'])
					facebook_text.html(response['facebook'])
					instagram_text.html(response['instagram'])
					reseller_rule_text.html(response['reseller_rule'])
				}
			},
			error: function(error){
				simpan_btn.text('Refresh Halaman')
			}
		})
	})

	function refreshPengaturan() {
		$.ajax({
			url: '<?= base_url('api/'.$module) ?>',
			type: 'GET',
			beforeSend: function (xhr, settings){
				profil_text.html('Loading ...')
				promo_text.html('Loading ...')
				alamat_text.html('Loading ...')
				twitter_text.html('Loading ...')
				facebook_text.html('Loading ...')
				instagram_text.html('Loading ...')
				reseller_rule_text.html('Loading ...')
			},
			success: function(response){ 
				if (response){
					input_id.val(response['id'])
					profil_text.html(response['profil'])
					promo_text.html(response['promo'])
					alamat_text.html(response['alamat'])
					twitter_text.html(response['twitter'])
					facebook_text.html(response['facebook'])
					instagram_text.html(response['instagram'])
					reseller_rule_text.html(response['reseller_rule'])
				}
			},
			error: function(error){
				profil_text.html('Coba lagi')
				promo_text.html('Coba lagi')
				alamat_text.html('Coba lagi')
				twitter_text.html('Coba lagi')
				facebook_text.html('Coba lagi')
				instagram_text.html('Coba lagi')
				reseller_rule_text.html('Coba lagi')
			}
		})
	}

	function editPengaturan() {
		refresh_btn.hide()
		edit_btn.hide()
		simpan_btn.show()

		gambar.show()
		profil = $('#profil_input').summernote({
			height: 100,
			dialogsInBody: true,
			callbacks: {
				onImageUpload: function(files) {
					uploadSummernote(id, files[0], '')
				},
			}
		})
		profil_text.hide()

		promo = $('#promo_input').summernote({
			height: 100,
			dialogsInBody: true,
			callbacks: {
				onImageUpload: function(files) {
					uploadSummernote(id, files[0], '')
				},
			}
		})
		promo_text.hide()

		alamat = $('#alamat_input').summernote({
			height: 100,
			dialogsInBody: true,
			callbacks: {
				onImageUpload: function(files) {
					uploadSummernote(id, files[0], '')
				},
			}
		})
		alamat_text.hide()

		twitter.show()
		twitter_text.hide()
		facebook.show()
		facebook_text.hide()
		instagram.show()
		instagram_text.hide()

		reseller_rule = $('#reseller_rule_input').summernote({
			height: 100,
			dialogsInBody: true,
			callbacks: {
				onImageUpload: function(files) {
					uploadSummernote(id, files[0], '')
				},
			}
		})
		reseller_rule_text.hide()


		$.ajax({
			url: '<?= base_url('api/'.$module) ?>',
			type: 'GET',
			beforeSend: function (xhr, settings){
				profil_text.html('Loading ...')
				promo_text.html('Loading ...')
				alamat_text.html('Loading ...')
				twitter_text.html('Loading ...')
				facebook_text.html('Loading ...')
				instagram_text.html('Loading ...')
				reseller_rule_text.html('Loading ...')
			},
			success: function(response){
				if (response) {
					input_id.val(response['id'])
					profil.summernote('code',response['profil'])
					promo.summernote('code',response['promo'])
					alamat.summernote('code',response['alamat'])
					twitter.val(response['twitter'])
					facebook.val(response['facebook'])
					instagram.val(response['instagram'])
					reseller_rule.summernote('code',response['reseller_rule'])
				}
			},
			error: function(error){
				profil_text.html('Coba lagi')
				promo_text.html('Coba lagi')
				alamat_text.html('Coba lagi')
				twitter_text.html('Coba lagi')
				facebook_text.html('Coba lagi')
				instagram_text.html('Coba lagi')
				reseller_rule_text.html('Coba lagi')
			}
		})
	}

	function simpanPengaturan() {
		refresh_btn.show()
		edit_btn.show()
		simpan_btn.hide()

		gambar.hide()
		profil.summernote('destroy')
		profil.hide()
		profil_text.show()

		promo.summernote('destroy')
		promo.hide()
		promo_text.show()

		alamat.summernote('destroy')
		alamat.hide()
		alamat_text.show()

		twitter.hide()
		twitter_text.show()
		facebook.hide()
		facebook_text.show()
		instagram.hide()
		instagram_text.show()

		reseller_rule.summernote('destroy')
		reseller_rule.hide()
		reseller_rule_text.show()
	}


	$(document).ready( function () {

		$.ajax({
			url: '<?= base_url('api/'.$module) ?>',
			type: 'GET',
			beforeSend: function (xhr, settings){
			},
			success: function(response){ 
				if (response){
					input_id.val(response['id'])
					profil_text.html(response['profil'])
					promo_text.html(response['promo'])
					alamat_text.html(response['alamat'])
					twitter_text.html(response['twitter'])
					facebook_text.html(response['facebook'])
					instagram_text.html(response['instagram'])
					reseller_rule_text.html(response['reseller_rule'])
				}
			},
			error: function(error){
			}
		})

	});
</script>

