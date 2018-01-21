<?php
include('./view/layout/header.php');
$resep = $data['resep'][0];
$listKomentar = $data['komentar'];
?>

    <!-- Page Content -->
<section class="content-section">
  <div class="bg-pattern" style="background: url(statics/image/<?php echo $resep->gambar_utama ? : "no-image.png"?>) no-repeat center center fixed; background-size: cover;">
  </div>
      <div class="container page page-2x detail-resep">
        <div class="box-content detail-resep">
          <div class="detail-container">
            <div class="detail-image circle">
              <img src="statics/image/<?php echo $resep->gambar_utama ? : "no-image.png"?>"  class="img-responsive" alt="Image">
            </div> 
            <div class="box-header text-center">
              <h1 class="box-title"><?php echo($resep->nama)?></h1>
              <a href="index.php?c=user&profile=<?php echo $resep->id_pengguna?>" class="author"> <?php echo($resep->nama_depan. " " . $resep->nama_belakang)?></a>
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
                          <div class="col-md-3"><a class="image-link" href="statics/image/<?php echo $value->gambar ? : "no-image.png"?>" ><img src="statics/image/<?php echo $value->gambar ? : "no-image.png"?>"  class="img-responsive" alt="Image"></a></div>
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
                      <?php if(!$_SESSION['loginedUserDetail']) {?> 
                        <blockquote><strong>Mohon maaf silahkan login terlebih dahulu untuk memberikan opini.</strong></blockquote>
                      <?php } else { ?>  
                        <form action="index.php?c=resep&m=addComment" method="POST" role="form">
                            <input type="hidden" name="resep" value="<?php echo $resep->id ?>">
                            <div class="form-group">
                              <textarea name="pesan" id="input" class="form-control" rows="3" required="required"></textarea>
                            </div>
                            <button type="submit" class="btn btn-default btn-lg">Post</button> 
                        </form>
                      <?php } ?>
                      </div>
                    </div>
                    <hr>
                      <?php if (count($listKomentar) > 0): ?>
                      <div class="komentar">
                    <div class="row">
                      <?php foreach ($listKomentar as $key => $komen): ?>
                        
                      <div class="col-sm-2">
                        <div class="thumbnail">
                          <img class="img-responsive user-photo" src="statics/image/<?php echo $komen->poto_pengguna ? : "no-image.png"?>">
                        </div><!-- /thumbnail -->
                      </div><!-- /col-sm-1 -->

                      <div class="col-sm-10">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <strong><a href="index.php?c=user&profil=<?php echo $komen->id_pengguna ?>"><?php echo $komen->nama_pengguna ?></a></strong> <span class="text-muted">commented <?php echo $komen->dibuat_pada ?></span>
                          </div>
                          <div class="panel-body">
                            <?php echo $komen->pesan ?>
                          </div><!-- /panel-body -->
                        </div><!-- /panel panel-default -->
                      </div><!-- /col-sm-5 -->
                      <?php endforeach ?>
                    </div>
                      </div>
                      <?php else: ?>
                      <blockquote> Tidak ada diskusi. </blockquote>
                      <?php endif ?>

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