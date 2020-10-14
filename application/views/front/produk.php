	<section class="hero-wrap hero-wrap-2" style="background-image: url(<?= base_url('assets/front/images/bg_1.jpg') ?>);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-center">
				<div class="col-md-9 ftco-animate text-center">
					<h1 class="mb-2 bread"><?=$nama_produk?></h1>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section bg-light">
		<div class="container-fluid px-4">
			<div class="row">
			<?php foreach($produk as $data){ ?>	
				<div class="col-md-6 col-lg-3 ftco-animate">
					<div class="staff">
						<div class="img-wrap d-flex align-items-stretch">
							<div class="img align-self-stretch" style="background-image: url(<?=base_url("assets/admin/uploads/produk/$data->file")?>);"></div>
						</div>
						<div class="text pt-3 text-center">
							<h3><?=$data->nama?></h3>
							<span class="position mb-2"><?=$nama_produk?></span>
							<!--div class="faded">
								<p>I am an ambitious workaholic, but apart from that, pretty simple person.</p>
								
							</div-->
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</section>