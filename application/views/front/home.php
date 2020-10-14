<section class="home-slider owl-carousel">
<?php foreach ($banner as $data){?>
	  <div class="slider-item" style="background-image:url(<?= base_url("assets/uploads/banner/$data->cover") ?>);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-6 ftco-animate">
            <h1 class="mb-4"><?=$data->judul?></h1>
            <p><?=$data->deskripsi?></p>
            <p><a href="<?=$data->link?>" class="btn btn-primary px-4 py-3 mt-3">More</a></p>
          </div>
        </div>
        </div>
      </div>
<?php }?>
	  
	  <div class="slider-item" style="background-image:url(<?= base_url('assets/front/images/produk/vermont-banner.png')?>);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-6 ftco-animate">
            <h1 class="mb-4">Disinfectant Spray</h1>
            <p>Used as liquid spray to kill bacterias (Pseudomonas aeruginosa, Salmonella spp., Escherichia coli) and germs in any surfaces, vehicle, household appliances and also eliminate odors to give freshness..</p>
            <p><a href="#" class="btn btn-primary px-4 py-3 mt-3">Contact Us</a></p>
          </div>
        </div>
        </div>
      </div>
	  
	   <div class="slider-item" style="background-image:url(<?= base_url('assets/front/images/produk/vermont-banner.png')?>);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-6 ftco-animate">
            <h1 class="mb-4">Handsanitizer Spray</h1>
            <p>Used as liquid spray to kill bacterias (Pseudomonas aeruginosa, Salmonella spp., Escherichia coli) and germs in any surfaces, vehicle, household appliances and also eliminate odors to give freshness..</p>
            <p><a href="#" class="btn btn-primary px-4 py-3 mt-3">Contact Us</a></p>
          </div>
        </div>
        </div>
      </div>

      <div class="slider-item" style="background-image:url(<?= base_url('assets/front/images/produk/vermont-carburator.png')?>);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-6 ftco-animate">
            <h1 class="mb-4">CARBURETOR INJECTOR CLEANER</h1>
            <p>Vermont Carburetor & Injector Cleaner menggunakan teknologi sistem pembersih dengan bahan terkini untuk membersihkan semua bagian karburator.</p>
            <p><a href="#" class="btn btn-primary px-4 py-3 mt-3">Contact Us</a></p>
          </div>
        </div>
        </div>
      </div>
    </section>
	<section class="ftco-section">
	<div class="container">
	<div class="row justify-content-center mb-5 pb-2">
			<div class="col-md-8 text-center heading-section ftco-animate">
				<h2 class="mb-4"><span>Our</span> VIdeos</h2>
				<p >Enjoy Our Videos</p>
			</div>
		</div>
			<div class="row justify-content-center mb-2 pb-2 d-flex">
				<?php foreach($video as $data){?>
				<div class="col-md-3 course ftco-animate">
					<div class="img img-video d-flex align-items-center" style="background-image: url(<?=base_url("assets/uploads/video/$data->cover")?>);">
						<div class="video justify-content-center">
							<a href="<?=$data->link?>" class="icon-video popup-vimeo d-flex justify-content-center align-items-center">
								<span class="ion-ios-play"></span>
							</a>
						</div>
					</div>
				</div>
				<?php } ?>
				<div class="col-md-3 course ftco-animate">
					<div class="img img-video d-flex align-items-center" style="background-image: url(<?= base_url('assets/admin/uploads/produk/bigroot-disinfectan.png') ?>);">
						<div class="video justify-content-center">
							<a href="https://vimeo.com/45830194" class="icon-video popup-vimeo d-flex justify-content-center align-items-center">
								<span class="ion-ios-play"></span>
							</a>
						</div>
					</div>
				</div>
				<div class="col-md-3 course ftco-animate">
					<div class="img img-video d-flex align-items-center" style="background-image: url(<?= base_url('assets/admin/uploads/produk/bigroot-handsanitizer-100.png') ?>);">
						<div class="video justify-content-center">
							<a href="https://vimeo.com/45830194" class="icon-video popup-vimeo d-flex justify-content-center align-items-center">
								<span class="ion-ios-play"></span>
							</a>
						</div>
					</div>
				</div>
				<div class="col-md-3 course ftco-animate">
					<div class="img img-video d-flex align-items-center" style="background-image: url(<?= base_url('assets/admin/uploads/produk/bigroot-disinfectan.png') ?>);">
						<div class="video justify-content-center">
							<a href="https://vimeo.com/45830194" class="icon-video popup-vimeo d-flex justify-content-center align-items-center">
								<span class="ion-ios-play"></span>
							</a>
						</div>
					</div>
				</div>
			</div>	
			
		</div>
	</div>
	</section>
	<section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(<?= base_url('assets/front/images/tiga.jpg') ?>);" data-stellar-background-ratio="0.5">
		<div class="container">
			<div class="row justify-content-center mb-5 pb-2 d-flex">
				<div class="col-md-5 align-items-stretch d-flex">
					<div class="img img-video d-flex align-items-center" style="background-image: url(<?= base_url('assets/front/images/tiga.jpg') ?>);">
						<div class="video justify-content-center">
							<a href="https://vimeo.com/45830194" class="icon-video popup-vimeo d-flex justify-content-center align-items-center">
								<span class="ion-ios-play"></span>
							</a>
						</div>
					</div>
				</div>
				<div class="col-md-6 heading-section heading-section-white ftco-animate pl-lg-5 pt-md-0 pt-5">
					<h2 class="mb-4">PROMO</h2>
					<p>AGK menyediakan berbagai jenis Cairan Disinfektan (Disinfectant) untuk area komersil hingga Pabrik. Semua cairan Disinfektan dibuat oleh Klenco Singapore dan sudah dilengkapi dengan SDS (Safety Data Sheet).</p>
					<p>Cairan Disinfektan adalah cairan khusus yang digunakan untuk membunuh virus dan bakteri penyebab penyakit. Cairan Disinfektan dapat digunakan sebagai proses Sanitasi di semua area seperti area Kantor, Rumah Sakit, Hotel, Restaurant, Rumah, hingga area Pabrik.</p>
				</div>
			</div>	
			
		</div>
	</div>
</section>


<section class="ftco-section">
	<div class="container-fluid px-4">
		<div class="row justify-content-center mb-5 pb-2" style="padding-bottom: 20px;">
			<div class="col-md-8 text-center heading-section ftco-animate">
				<h2 class="mb-4">Bigroot</h2>
				<p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
			</div>
		</div>	
		<div class="row" style="padding-left: 100px; padding-right: 100px;">
		<?php foreach ($bigroot as $data){?>
			<div class="col-md-3 course ftco-animate">
				<div class="img" style="background-image: url(<?=base_url("assets/admin/uploads/produk/$data->file")?>);"></div>
				<div class="text pt-4">
					
					<p><a href="<?=base_url("home/produk/?id=$data->id_produk")?>"><?=$data->nama?></a> </p>
				</div>
			</div>
		<?php } ?>
		</div>
	</div>
</section>

<section class="ftco-section bg-light">
	<div class="container-fluid px-4">
		<div class="row justify-content-center mb-5 pb-2">
			<div class="col-md-8 text-center heading-section ftco-animate">
				<h2 class="mb-4">Vermont</h2>
				<p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
			</div>
		</div>	
		<div class="row" style="padding-left: 100px; padding-right: 100px;">
		<?php foreach ($vermont as $data){?>
			<div class="col-md-3 course ftco-animate">
				<div class="img" style="background-image: url(<?=base_url("assets/admin/uploads/produk/$data->file")?>);"></div>
				<div class="text pt-4">
					
					<p><a href="<?=base_url("home/produk/?id=$data->id_produk")?>"><?=$data->nama?></a> </p>
				</div>
			</div>
		<?php } ?>
		</div>
	</div>
</section>
<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-2">
			<div class="col-md-8 text-center heading-section ftco-animate">
				<h2 class="mb-4"><span>Recent</span> News</h2>
				<p >Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
			</div>
		</div>
		<div class="row">
		<?php foreach ($news as $data){
			$date=date_create($data->posted_date);
			?>
			<div class="col-md-6 col-lg-4 ftco-animate">
				<div class="blog-entry">
					<a href="blog-single.html" class="block-20 d-flex align-items-end" style="background-image: url(<?= base_url("assets/admin/uploads/berita/$data->cover") ?>);">
						<div class="meta-date text-center p-2">
							<span class="day"><?=date_format($date,"d")?></span>
							<span class="mos"><?=date_format($date,"F")?></span>
							<span class="yr"><?=date_format($date,"Y")?></span>
						</div>
					</a>
					<div class="text bg-white p-4">
						<h3 class="heading"><a href="<?=base_url("home/news/?id=$data->id_berita")?>"><?=$data->judul?></a></h3>
						<p style="font-size: 14px;"><?=substr($data->konten,0, 80).'... '?><a href="<?=base_url("home/news/?id=$data->id_berita")?>">read more</a></p>
						
					</div>
				</div>
			</div>
		<?php } ?>
		</div>
	</div>
</section>
<!--Dimunculkan jika datanya nanti sudah ada -->
<!--section class="ftco-section bg-light">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-2">
			<div class="col-md-8 text-center heading-section ftco-animate">
				<h2 class="mb-4"><span>What's</span> On</h2>
				<p >Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
			</div>
		</div>
		<div class="row">
		<?php foreach ($news as $data){
			$date=date_create($data->posted_date);
			?>
			<div class="col-md-6 col-lg-4 ftco-animate">
				<div class="blog-entry">
					<a href="blog-single.html" class="block-20 d-flex align-items-end" style="background-image: url(<?= base_url("assets/admin/uploads/berita/$data->cover") ?>);">
						<div class="meta-date text-center p-2">
							<span class="day"><?=date_format($date,"d")?></span>
							<span class="mos"><?=date_format($date,"F")?></span>
							<span class="yr"><?=date_format($date,"Y")?></span>
						</div>
					</a>
					<div class="text bg-white p-4">
						<h3 class="heading"><a href="<?=base_url("home/news/?id=$data->id_berita")?>"><?=$data->judul?></a></h3>
						<p style="font-size: 14px;"><?=substr($data->konten,0, 80).'... '?><a href="<?=base_url("home/news/?id=$data->id_berita")?>">read more</a></p>
						
					</div>
				</div>
			</div>
		<?php } ?>
		</div>
	</div>
</section-->
