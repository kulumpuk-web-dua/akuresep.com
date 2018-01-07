<?php
include('./view/layout/header.php');
?>

    <!-- Page Content -->
<section class="content-section">
  <div class="bg-pattern">
  </div>
      <?php $resep = $data['resep'][0]?>
      <?php $listKomentar = $data['komentar']?>
      <div class="container page detail-resep">
        <div class="box-content">
          <div class="detail-container">
            <div class="detail-image">
              <img src="statics/image/<?php echo $resep->gambar_utama ? : "no-image.png"?>"  class="img-responsive" alt="Image">
            </div> 
            <div class="box-header">
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

                      <?php 
                        foreach ($data['gambar'] as $key => $value) {
                          ?>
                          <div class="col-md-3"><a href="statics/image/<?php echo $value->gambar ? : "no-image.png"?>" target="blank"><img src="statics/image/<?php echo $value->gambar ? : "no-image.png"?>"  class="img-responsive" alt="Image"></a></div>
                          <?php 
                        }
                      ?>
                    </div>
                  </div>

                  <div class="box-comment">
                    <h2>Diskusi</h2>
                    <div class="panel panel-comment">
                      <div class="panel-heading">
                        <h3 class="panel-title">Katakan opini Anda</h3>
                      </div>
                      <div class="panel-body">
                      <?php if(!$data['user']) {?> 
                        <blockquote><strong>Mohon maaf silahkan login terlebih dahulu untuk memberikan opini.</strong></blockquote>
                      <?php } else { ?>  
                        <form action="index.php?c=resep&m=addComment&id=<?php echo($resep->id) ?> " method="POST" role="form">
                            <div class="form-group">
                              <textarea name="pesan" id="input" class="form-control" rows="3" required="required"></textarea>
                            </div>
                            <button type="submit" class="btn btn-default btn-lg">Post</button> 
                        </form>
                      <?php } ?>
                      </div>
                    </div>
                    <hr>
                    <ul class="list-group list-comment">
                      
                      <?php 
                      if(count($listKomentar) > 0) 
                        {
                        foreach ($listKomentar as $key => $koment) {
                          ?> 
                            <li>
                              <div class="author"><?php echo $koment->nama_pengguna ?>
                              
                              <small class="pull-right"><?php echo $koment->dibuat_pada  ?></small>
                              </div>
                              <p><?php echo $koment->pesan  ?></p>
                            </li>
                          <?php 
                        }
                      }else {
                        echo "<center> Tidak Ada Data </center>";
                      }?> 
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