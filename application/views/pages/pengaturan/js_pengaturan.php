<script type="text/javascript">
	const refresh_btn = $('#refresh_btn')
	const edit_btn = $('#edit_btn')
	const simpan_btn = $('#simpan_btn')

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

	function refreshPengaturan() {

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



	});
</script>

