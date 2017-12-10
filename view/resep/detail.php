<?php
include('./view/layout/header.php');
?>

    <!-- Page Content -->
<section class="content-section">
  <div class="bg-pattern">
  </div>
      <div class="container page detail-resep">
        <div class="box-content">
          <div class="detail-container">
            <div class="detail-image">
              <img src="statics/img/sop-kaki-sapi.jpg" class="img-responsive" alt="Image">
            </div> 
            <div class="box-header">
            <?php $resep = $data['resep'][0]?>
              <h1 class="box-title"><?php echo($resep->nama)?></h1>
              <a href="index.php?c=profile&user=<?php echo $resep->id_pengguna?>" class="author"><?php echo($resep->nama_depan. " " . $resep->nama_belakang)?></a>
              <div class="kategori"><a href=""><i class="fa fa-hashtag"></i> <?php echo($resep->nama_kategori)?></a></div>
              <hr>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="content">
                  <div class="box-deskripsi">
                    <p><strong>Deskripsi: </strong> <?php echo($resep->deskripsi)?></p>

                    <div class="row">
                      <div class="col-sm-3"><strong>Sajian: </strong> <?php echo($resep->porsi)?></div>
                      <div class="col-sm-3"><strong>Durasi: </strong><?php echo($resep->durasi)?></div>
                      <div class="col-sm-3"></div>
                      <div class="col-sm-3"><small><i class="fa fa-clock-o"></i> 22/11/2017 14:20</small></div>
                    </div>
                  </div>
                  <div class="box-bahan">
                    <h2>Bahan Bahan</h2>
                    <ul class="bahan">
                    <?php 
                    foreach (explode(PHP_EOL, $resep->bahan_bahan) as $key => $value) {
                      # code...
                      ?>
                      <li>
                        <?php echo $value ?>
                      </li>
                      <?php 
                    }?>
                    </ul>

                  </div>
                  <div class="box-langkah">
                    <h2>Langkah langkah</h2>
                    <ul class="langkah">
                    <?php 
                    foreach (explode(PHP_EOL, $resep->langkah_resep) as $key => $value) {
                      # code...
                      if($value != "") {
                        
                      ?>
                        <li><div class="desc">
                          <?php echo $value ?>
                        </div></li>
                      <?php 
                      }
                    }?>
                    </ul>
                  </div>
                  <div class="box-img">
                    <h2>Gambar</h2>
                    <div class="row">
                      <div class="col-md-3"><a href="statics/img/sop-kaki-sapi.jpg" target="blank"><img src="statics/img/sop-kaki-sapi.jpg" class="img-responsive" alt="Image"></a></div>
                      <div class="col-md-3"><a href="statics/img/Gambar-Sop-Buntut.jpg" target="blank"><img src="statics/img/Gambar-Sop-Buntut.jpg" class="img-responsive" alt="Image"></a></div>
                      <div class="col-md-3"><a href="statics/img/sop-kaki-sapi.jpg" target="blank"><img src="statics/img/sop-kaki-sapi.jpg" class="img-responsive" alt="Image"></a></div>
                    </div>
                  </div>

                  <div class="box-comment">
                    <h2>Diskusi</h2>
                    <div class="panel panel-comment">
                      <div class="panel-heading">
                        <h3 class="panel-title">Katakan opini Anda</h3>
                      </div>
                      <div class="panel-body">
                        <blockquote><strong>Mohon maaf silahkan login terlebih dahulu untuk memberikan opini.</strong></blockquote>
                        <form action="" method="POST" role="form">
                            <div class="form-group">
                              <textarea name="" id="input" class="form-control" rows="3" required="required"></textarea>
                            </div>
                            <button type="submit" class="btn btn-default btn-lg">Post</button> 
                        </form>
                      </div>
                    </div>
                    <hr>
                    <ul class="list-group list-comment">
                      <li>
                        <div class="author">Deden Nurjaman</div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.</p>
                      </li>
                      <li>
                        <div class="author">Dudi Jumaedi</div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt.</p>
                      </li>
                      <li>
                        <div class="author">Aji Masahid</div>
                        <p>Lonsectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.</p>
                      </li>
                    </ul>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.container -->
</section>

<?php 

include('./view/layout/footer.php');
?>