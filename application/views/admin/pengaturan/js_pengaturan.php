<script type="text/javascript">
	const refresh_btn = $('#refresh_btn')
	const edit_btn = $('#edit_btn')
	const simpan_btn = $('#simpan_btn')

	const input_id = $('#id')
	const gambar = $('#gambar_profil')
	let profil = $('#profil_input')
	let profil_text = $('#profil_text')

	let link_promo = $('#link_promo')
	let link_promo_text = $('#link_promo_text')

	let input_image_promo = $('#image_promo')
	let cover_promo = $('#cover_promo')

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

	let title_videos = $('#title_videos')
	let videos_text = $('#videos_text')
	let desc_videos = $('#desc_videos')
	let desc_videos_text = $('#desc_videos_text')
	let title_bigroot = $('#title_bigroot')
	let bigroot_text = $('#bigroot_text')
	let desc_bigroot = $('#desc_bigroot')
	let desc_bigroot_text = $('#desc_bigroot_text')
	let title_vermont = $('#title_vermont')
	let vermont_text = $('#vermont_text')
	let desc_vermont = $('#desc_vermont')
	let desc_vermont_text = $('#desc_vermont_text')

	simpan_btn.click((e)=>{
		var formData = new FormData();
		formData.append('profil', profil.val());
		formData.append('promo', promo.val());
		formData.append('link_promo', link_promo.val());
		formData.append('alamat', alamat.val());
		formData.append('twitter', twitter.val());
		formData.append('facebook', facebook.val());
		formData.append('instagram', instagram.val());
		formData.append('reseller_rule', reseller_rule.val());
		formData.append('title_videos', title_videos.val());
		formData.append('desc_videos', desc_videos.val());
		formData.append('title_bigroot', title_bigroot.val());
		formData.append('desc_bigroot', desc_bigroot.val());
		formData.append('title_vermont', title_vermont.val());
		formData.append('desc_vermont', desc_vermont.val());
		formData.append('file', input_image_promo[0].files[0]);
		if (input_id.val()){
			formData.append('id', input_id.val());
		}
		$.ajax({
			url: '<?= base_url('api/'.$module) ?>',
			data: formData,
			contentType: false,
			processData: false,
			type: 'POST',
			beforeSend: function (xhr, settings){
				simpan_btn.text('Loading ...')
			},
			success: function(response){ 
				simpan_btn.text('Simpan')
				if (response){
					profil_text.html(response['profil'])
					promo_text.html(response['promo'])
					link_promo_text.html(response['link_promo'])
					cover_promo.attr('src','<?= base_url('assets/uploads/') ?>'+response['image_promo'])
					alamat_text.html(response['alamat'])
					twitter_text.html(response['twitter'])
					facebook_text.html(response['facebook'])
					instagram_text.html(response['instagram'])
					reseller_rule_text.html(response['reseller_rule'])
					videos_text.html(response['title_videos'])
					desc_videos_text.html(response['desc_videos'])
					bigroot_text.html(response['title_bigroot'])
					desc_bigroot_text.html(response['desc_bigroot'])
					vermont_text.html(response['title_vermont'])
					desc_vermont_text.html(response['desc_vermont'])
				}
			},
			error: function(error){
				simpan_btn.text('Simpan')
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
				link_promo_text.html('Loading ...')
				alamat_text.html('Loading ...')
				twitter_text.html('Loading ...')
				facebook_text.html('Loading ...')
				instagram_text.html('Loading ...')
				reseller_rule_text.html('Loading ...')
				videos_text.html('Loading ...')
				desc_videos_text.html('Loading ...')
				bigroot_text.html('Loading ...')
				desc_bigroot_text.html('Loading ...')
				vermont_text.html('Loading ...')
				desc_vermont_text.html('Loading ...')
			},
			success: function(response){ 
				if (response){
					input_id.val(response['id'])
					profil_text.html(response['profil'])
					promo_text.html(response['promo'])
					link_promo_text.html(response['link_promo'])
					cover_promo.attr('src','<?= base_url('assets/uploads/') ?>'+response['image_promo'])
					alamat_text.html(response['alamat'])
					twitter_text.html(response['twitter'])
					facebook_text.html(response['facebook'])
					instagram_text.html(response['instagram'])
					reseller_rule_text.html(response['reseller_rule'])
					videos_text.html(response['title_videos'])
					desc_videos_text.html(response['desc_videos'])
					bigroot_text.html(response['title_bigroot'])
					desc_bigroot_text.html(response['desc_bigroot'])
					vermont_text.html(response['title_vermont'])
					desc_vermont_text.html(response['desc_vermont'])
				}
			},
			error: function(error){
				profil_text.html('Coba lagi')
				promo_text.html('Coba lagi')
				link_promo_text.html('Coba lagi')
				alamat_text.html('Coba lagi')
				twitter_text.html('Coba lagi')
				facebook_text.html('Coba lagi')
				instagram_text.html('Coba lagi')
				reseller_rule_text.html('Coba lagi')
				videos_text.html('Coba lagi')
				desc_videos_text.html('Coba lagi')
				bigroot_text.html('Coba lagi')
				desc_bigroot_text.html('Coba lagi')
				vermont_text.html('Coba lagi')
				desc_vermont_text.html('Coba lagi')
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
					uploadSummernote('#profil_input', files[0], 'pengaturan')
				},
			}
		})
		profil_text.hide()

		input_image_promo.show()
		link_promo.show()
		link_promo_text.hide()
		promo = $('#promo_input').summernote({
			height: 100,
			dialogsInBody: true,
			callbacks: {
				onImageUpload: function(files) {
					uploadSummernote('#promo_input', files[0], 'pengaturan')
				},
			}
		})
		promo_text.hide()

		alamat = $('#alamat_input').summernote({
			height: 100,
			dialogsInBody: true,
			callbacks: {
				onImageUpload: function(files) {
					uploadSummernote('#alamat_input', files[0], 'pengaturan')
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
					uploadSummernote('#reseller_rule_input', files[0], 'pengaturan')
				},
			}
		})
		reseller_rule_text.hide()

		title_videos.show()
		videos_text.hide()
		desc_videos.show()
		desc_videos_text.hide()
		title_bigroot.show()
		bigroot_text.hide()
		desc_bigroot.show()
		desc_bigroot_text.hide()
		title_vermont.show()
		vermont_text.hide()
		desc_vermont.show()
		desc_vermont_text.hide()


		$.ajax({
			url: '<?= base_url('api/'.$module) ?>',
			type: 'GET',
			beforeSend: function (xhr, settings){
				profil_text.html('Loading ...')
				promo_text.html('Loading ...')
				link_promo_text.html('Loading ...')
				alamat_text.html('Loading ...')
				twitter_text.html('Loading ...')
				facebook_text.html('Loading ...')
				instagram_text.html('Loading ...')
				reseller_rule_text.html('Loading ...')
				videos_text.html('Loading ...')
				desc_videos_text.html('Loading ...')
				bigroot_text.html('Loading ...')
				desc_bigroot_text.html('Loading ...')
				vermont_text.html('Loading ...')
				desc_vermont_text.html('Loading ...')
			},
			success: function(response){
				if (response) {
					input_id.val(response['id'])
					profil.summernote('code',response['profil'])
					promo.summernote('code',response['promo'])
					link_promo.val(response['link_promo'])
					cover_promo.attr('src','<?= base_url('assets/uploads/') ?>'+response['image_promo'])
					alamat.summernote('code',response['alamat'])
					twitter.val(response['twitter'])
					facebook.val(response['facebook'])
					instagram.val(response['instagram'])
					reseller_rule.summernote('code',response['reseller_rule'])
					title_videos.val(response['title_videos'])
					desc_videos.val(response['desc_videos'])
					title_bigroot.val(response['title_bigroot'])
					desc_bigroot.val(response['desc_bigroot'])
					title_vermont.val(response['title_vermont'])
					desc_vermont.val(response['desc_vermont'])
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
				videos_text.html('Coba lagi')
				desc_videos_text.html('Coba lagi')
				bigroot_text.html('Coba lagi')
				desc_bigroot_text.html('Coba lagi')
				vermont_text.html('Coba lagi')
				desc_vermont_text.html('Coba lagi')
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

		input_image_promo.hide()
		link_promo.hide()
		link_promo_text.show()
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

		title_videos.hide()
		videos_text.show()
		desc_videos.hide()
		desc_videos_text.show()
		title_bigroot.hide()
		bigroot_text.show()
		desc_bigroot.hide()
		desc_bigroot_text.show()
		title_vermont.hide()
		vermont_text.show()
		desc_vermont.hide()
		desc_vermont_text.show()
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
					link_promo_text.html(response['link_promo'])
					cover_promo.attr('src','<?= base_url('assets/uploads/') ?>'+response['image_promo'])
					alamat_text.html(response['alamat'])
					twitter_text.html(response['twitter'])
					facebook_text.html(response['facebook'])
					instagram_text.html(response['instagram'])
					reseller_rule_text.html(response['reseller_rule'])
					videos_text.html(response['title_videos'])
					desc_videos_text.html(response['desc_videos'])
					bigroot_text.html(response['title_bigroot'])
					desc_bigroot_text.html(response['desc_bigroot'])
					vermont_text.html(response['title_vermont'])
					desc_vermont_text.html(response['desc_vermont'])
				} else {
					profil_text.text('Kosong')
					promo_text.text('Kosong')
					link_promo_text.text('Kosong')
					alamat_text.text('Kosong')
					twitter_text.text('Kosong')
					facebook_text.text('Kosong')
					instagram_text.text('Kosong')
					reseller_rule_text.text('Kosong')
					videos_text.html('Kosong')
					desc_videos_text.html('Kosong')
					bigroot_text.html('Kosong')
					desc_bigroot_text.html('Kosong')
					vermont_text.html('Kosong')
					desc_vermont_text.html('Kosong')
				}
			},
			error: function(error){
			}
		})

	});
</script>

