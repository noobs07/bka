<?php foreach($news as $data){
  $gambar = $data->cover;
  $judul = $data->judul;
  $konten = $data->konten;
  $date=date_create($data->posted_date);
} ?>
<section class="ftco-section">
 <div class="container">
  <div class="row">
    <div class="col-lg-8 ftco-animate">
      <h2 class="mb-3"><?=$judul?></h2>
      <div class="meta" style="margin-bottom: 30px;font-size: 12px;">
        <div style="float: left; margin-right: 20px;"><a href="#"><span class="icon-calendar"></span><?=date_format($date, "F d, Y")?></a></div>
        <div><a href="#"><span class="icon-person"></span> Administrator</a></div>
      </div>
      <p>
        <img src="<?= base_url("assets/uploads/berita/$gambar") ?>" alt="" class="img-fluid">
      </p>
      <?=$konten?>
    </div> <!-- .col-md-8 -->

    <div class="col-lg-4 sidebar ftco-animate">
     

      <div class="sidebar-box ftco-animate">
        <h3>Latest News</h3>
        <?php foreach($news_all as $data){$date=date_create($data->posted_date); ?>
        <div class="block-21 mb-4 d-flex">
          <a class="blog-img mr-4" style="background-image: url(<?= base_url("assets/uploads/berita/$data->cover") ?>);"></a>
          <div class="text">
            <h3 class="heading"><a href="<?=base_url("home/news/?id=$data->id_berita")?>"><?=$data->judul?></a></h3>
            <div class="meta">
              <div><a href="#"><span class="icon-calendar"></span><?=date_format($date, "M d, Y")?></a></div>
              <div><a href="#"><span class="icon-person"></span>Administrator</a></div>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div><!-- END COL -->
  </div>
</div>
</section>