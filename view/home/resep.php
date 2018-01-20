<?php
include('./view/layout/header.php');
?>

    <!-- Page Content -->
<section class="content-section">
  <div class="bg-pattern">
  </div>
      <div class="container page">
        <div class="box-content">
          <div class="search-container">
            <center><img src="statics/img/aku_resep.png" width="200"></center>
            <form action="index.php?c=resep" method="GET" class="form-inline form-search text-center" role="form">
              <input type="hidden" name="c" value="resep">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control " name="search" value="<?php echo get('search') ?>" placeholder="Cari Resep">
              </div>
              <button type="submit" class="btn btn-search">Cari</button>

              <hr>
              <?php if (get('search')!=''): ?>
              <div class="message">
                <p>Terdapat <?php echo $data['total'] ?> data yang cocok.</p>
              </div>          
              <?php endif ?>
            </form>
            <div class="row">
              <div class="col-md-10 col-md-offset-1">
                <div class="list-resep">
                  
                  <?php foreach ($data['reseps'] as $resep): ?>
                    <div class="post col-md-12">
                      <div class="post-image">
                        <img src="statics/image/<?php echo $resep->gambar_utama ? : "no-image.png"?>"  class="img-responsive" alt="Image">
                      </div>
                      <div class="post-content">
                        <div class="post-header">
                          <a href="index.php?c=resep&m=detail&id=<?php echo $resep->id ?>" class="post-title"><?php echo $resep->nama ?></a>
                          <a href="index.php?c=user&profile=<?php echo $resep->id_pengguna?>" class="post-author"><?php echo $resep->nama_depan ?></a>
                        </div>
                        <p><?php echo substr(strip_tags($resep->deskripsi),0,150) ?></p>
                        <div class="post-meta">
                          <span><i class="fa fa-coffee"></i> <?php echo $resep->porsi ?> Porsi</span>
                          <span><i class="fa fa-clock-o"></i> <?php echo $resep->durasi ?></span>
                        </div>
                      </div>
                    </div>

                  <?php endforeach ?>

                  <?php echo $data['paginate']['link'] ?>

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