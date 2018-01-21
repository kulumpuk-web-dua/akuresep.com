<?php
include('./view/layout/header.php');
$kategori = $data['kategori'][0];
?>

    <!-- Page Content -->
<section class="content-section">
  <div class="bg-pattern">
  </div>
      <div class="container page">
        <div class="box-content">
          <div class="detail-container">
            <div class="row">
              <div class="col-sm-3">
                <div class="detail-image kategori-circle">
                  <img src="statics/image/<?php echo $kategori->gambar ? : "no-image.png"?>"  class="img-responsive" alt="<?php echo $kategori->nama ?>">
                </div> 
              </div>
              <div class="col-sm-9">
                <div class="box-header">
                  <h1 class="box-title">Kategori : <?php echo $kategori->nama ?></h1>
                  <blockquote><?php echo $kategori->deskripsi ?></blockquote>
                </div>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-12 col-md-offset-0">
                <div class="list-resep">
                  <?php if (count($data['reseps'])>0): ?>
                  <?php foreach ($data['reseps'] as $resep): ?>
                    
                    <div class="post col-md-12">
                      <div class="post-image">
                        <img src="statics/image/<?php echo $resep->gambar_utama ? : "no-image.png"?>"  class="img-responsive" alt="<?php echo $resep->nama ?>">
                      </div>
                      <div class="post-content">
                        <div class="post-header">
                          <a href="index.php?c=resep&m=detail&id=<?php echo $resep->id ?>" class="post-title"><?php echo $resep->nama ?></a>
                          <a href="index.php?c=user&profile=<?php echo $resep->id_pengguna?>" class="post-author"><?php echo $resep->nama_depan.' '.$resep->nama_belakang ?></a>
                        </div>
                        <p><?php echo substr(strip_tags($resep->deskripsi),0,150) ?></p>
                        <div class="post-meta">
                          <span><i class="fa fa-coffee"></i> <?php echo $resep->porsi ?> Porsi</span>
                          <span><i class="fa fa-clock-o"></i> <?php echo $resep->durasi ?></span>
                        </div>
                      </div>
                    </div>

                    <?php echo $data['paginate']['link'] ?>
                  <?php endforeach ?>
                  <?php else: ?>
                  <ul class="list-group">
                    <li class="list-group-item"><h3>Resep tidak tersedia.</h3></li>
                  </ul>
                  <?php endif ?>


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