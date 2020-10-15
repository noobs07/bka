<section class="ftco-section bg-light">
 <div class="container">
  <div class="row">
    <?php foreach($news as $data){$date=date_create($data->posted_date);?>
    <div class="col-md-6 col-lg-4 ftco-animate">
      <div class="blog-entry">
        <a href="blog-single.html" class="block-20 d-flex align-items-end" style="background-image: url(<?= base_url('assets/front/images/enam.jpg') ?>);">
          <div class="meta-date text-center p-2">
          <span class="day"><?=date_format($date,"d")?></span>
							<span class="mos"><?=date_format($date,"F")?></span>
							<span class="yr"><?=date_format($date,"Y")?></span>
          </div>
        </a>
        <div class="text bg-white p-4">
        <h3 class="heading"><a href="<?=base_url("home/news/?id=$data->id_berita")?>"><?=$data->judul?></a></h3>
						<p style="font-size: 14px;"><?=substr($data->konten,0, 80).'... '?><a href="<?=base_url("home/news/?id=$data->id_berita")?>">read more</a></p>
          <div class="d-flex align-items-center mt-4">
          </div>
        </div>
      </div>
    </div><!-- -->
    <?php } ?>
    
  </div>
</div>
</section>