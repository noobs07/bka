</div>

<footer class="m-grid__item		m-footer ">
	<div class="m-container m-container--fluid m-container--full-height m-page__container">
		<div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
			<div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
				<span class="m-footer__copyright">
					2020 &copy;
				</span>
			</div>
		</div>
	</div>
</footer>

</div>

<div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
	<i class="la la-arrow-up"></i>
</div>

<!-- jQuery -->
<script src="<?= base_url('assets/admin/plugins/jquery/jquery.min.js') ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/admin/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
	$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- ChartJS -->
<script src="<?= base_url('assets/admin/plugins/chart.js/Chart.min.js') ?>"></script>
<!-- Sparkline -->
<script src="<?= base_url('assets/admin/plugins/sparklines/sparkline.js') ?>"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url('assets/admin/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
<!-- Toastr -->
<script src="<?= base_url('assets/admin/plugins/toastr/toastr.min.js') ?>"></script>
<!-- JQVMap -->
<script src="<?= base_url('assets/admin/plugins/jqvmap/jquery.vmap.min.js') ?>"></script>
<script src="<?= base_url('assets/admin/plugins/jqvmap/maps/jquery.vmap.usa.js') ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url('assets/admin/plugins/jquery-knob/jquery.knob.min.js') ?>"></script>
<!-- daterangepicker -->
<script src="<?= base_url('assets/admin/plugins/moment/moment.min.js') ?>"></script>
<script src="<?= base_url('assets/admin/plugins/daterangepicker/daterangepicker.js') ?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('assets/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>"></script>
<!-- Summernote -->
<script src="<?= base_url('assets/admin/plugins/summernote/summernote-bs4.min.js') ?>"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('assets/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
<!-- Dropzone -->
<script src='<?= base_url('assets/admin/plugins/dropzone/dist/dropzone.js'); ?>' type='text/javascript'></script>
<!-- DataTables -->
<script src='<?= base_url('assets/admin/plugins/datatables/datatables.min.js'); ?>' type='text/javascript'></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/admin/dist/js/adminlte.js') ?>"></script>

<script type="text/javascript">

	function uploadSummernote(id, file, dir) {
		data = new FormData()
		data.append('file', file)
		data.append('dir', dir)

		$.ajax({
			data: data,
			type: 'POST',
			url: '<?= base_url('api/upload_summernote') ?>',
			cache: false,
			contentType: false,
			processData: false,
			success: function(url) {
				if (url) {
					toastr.success('Uploaded')
					$(id).summernote('insertImage', url)
				} else {
					toastr.error('Upload failed')
				}
			},
			fail: function(){
				toastr.error('Upload failed')
			}
		});
	}

	function uploadFileSummernote(id, file, dir) {
		data = new FormData()
		data.append('file', file)
		data.append('dir', dir)

		$.ajax({
			data: data,
			type: 'POST',
			url: '<?= base_url('api/upload_summernote') ?>',
			cache: false,
			contentType: false,
			processData: false,
			success: function(url) {
				if (url) {
					let listMimeImg = ['image/png', 'image/jpeg', 'image/webp', 'image/gif', 'image/svg'];
					let listMimeAudio = ['audio/mpeg', 'audio/ogg'];
					let listMimeVideo = ['video/mpeg', 'video/mp4', 'video/webm'];
					let elem;

					if (listMimeImg.indexOf(file.type) > -1) {
						$(id).summernote('insertImage', url);
					} else if (listMimeAudio.indexOf(file.type) > -1) {
						elem = document.createElement('audio');
						elem.setAttribute('src', url);
						elem.setAttribute('controls', 'controls');
						elem.setAttribute('preload', 'metadata');
						$(id).summernote('insertNode', elem);
					} else if (listMimeVideo.indexOf(file.type) > -1) {
						elem = document.createElement('video');
						elem.setAttribute('src', url);
						elem.setAttribute('controls', 'controls');
						elem.setAttribute('preload', 'metadata');
						$(id).summernote('insertNode', elem);
					} else {
						elem = document.createElement('a');
						let linkText = document.createTextNode(file.name);
						elem.appendChild(linkText);
						elem.title = file.name;
						elem.href = url;
						$(id).summernote('insertNode', elem);
					}
				}
			},
			fail: function(){
				toastr.error('Upload failed')
			}
		});
	}

	jQuery(document).ready(() => {

		readURL= (input, previewImg) => {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
					$(previewImg).attr('src', e.target.result);
				}

				reader.readAsDataURL(input.files[0]);
			}
		}


	});
</script>
