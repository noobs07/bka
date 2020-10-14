<section class="ftco-section">
 <div class="container">
  <div class="row">
    <div class="col-lg-12 ftco-animate">
     
      <div class="container">
        <div class="card">
          <div class="container-fliud">
            <div class="wrapper row">
              <div class="preview col-md-6">
                
                <div class="preview-pic tab-content">
                  <?php $i=0; foreach($foto as $data){ $i++; 
                    if($i==1)$active='active';else $active='';?>
                  <div class="tab-pane <?=$active?>" id="pic-<?=$i?>"><img src="<?=base_url("assets/admin/uploads/produk/$data->file")?>" /></div>
                  <?php } ?>
                  <div class="tab-pane" id="pic-2"><img src="../../assets/front/images/enam.jpg" /></div>
                </div>
                <ul class="preview-thumbnail nav nav-tabs">
                <?php $i=0; foreach($foto as $data){ $i++; 
                    if($i==1)$active='active';else $active='';?>
                  <li class="<?=$active?>"><a data-target="#pic-<?=$i?>" data-toggle="tab"><img src="<?=base_url("assets/admin/uploads/produk/$data->file")?>" /></a></li>
                <?php } ?>
                  <li><a data-target="#pic-2" data-toggle="tab"><img src="../../assets/front/images/enam.jpg" /></a></li>
                </ul>
                
              </div>
              <?php foreach($produk as $data){
                $nama = $data->nama;
                $deskripsi = $data->deskripsi;
                $tentang = $data->tentang;
              } ?>
              <div class="details col-md-6">
                <h3 class="product-title"><?=$nama?></h3>
                
                <p class="product-description"><?=$deskripsi?></p>
                <h4 class="price">Harga: <span>Rp 100.000</span></h4>
                
              </div>
            </div>
          </div>
        </div>
      </div>


      <section class="ftco-section">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 ftco-animate">
              <h2 class="mb-3">Tentang Produk</h2>
              
              <?=$tentang?>
            </div> <!-- .col-md-8 -->
            <div class="col-lg-4 sidebar ftco-animate">
             

              <div class="sidebar-box ftco-animate">
                <h3>Produk Terbaru</h3>
                <div class="block-21 mb-4 d-flex">
                  <a class="blog-img mr-4" style="background-image: url(<?= base_url('assets/front/images/satu.jpg') ?>); width: 100%;"></a>
                  <div class="text" style="width: 100%;">
                    <h3 class="heading"><a href="#">Bigroot Hand Sanitizer 100ml</a></h3>
                    
                  </div>
                </div>
                <div class="block-21 mb-4 d-flex">
                  <a class="blog-img mr-4" style="background-image: url(<?= base_url('assets/front/images/satu.jpg') ?>); width: 100%;"></a>
                  <div class="text" style="width: 100%;">
                    <h3 class="heading"><a href="#">Bigroot Hand Sanitizer 100ml</a></h3>
                    
                  </div>
                </div>
                <div class="block-21 mb-4 d-flex">
                  <a class="blog-img mr-4" style="background-image: url(<?= base_url('assets/front/images/satu.jpg') ?>); width: 100%;"></a>
                  <div class="text" style="width: 100%;">
                    <h3 class="heading"><a href="#">Bigroot Hand Sanitizer 100ml</a></h3>
                  </div>
                </div>
              </div>             
            </div>
          </div>
        </section>
      </div> <!-- .col-md-8 -->      
    </div><!-- END COL -->
  </div>
</div>
</section>