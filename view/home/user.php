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
            <div class="span3 well">
        <center>
        <a href="#aboutModal" data-toggle="modal"><img src="statics/image/<?php echo $data['user']->poto ? : "no-image.png"?>" name="aboutme" width="140" height="140" class="img-circle"></a>
         <h3><?php echo $data['user']->nama_depan.' '.$data['user']->nama_belakang ?></h3>
         <em>Profesi - <?php echo $data['user']->pekerjaan ?></em>
         <p><h4>Resep <span class="badge"><?php echo count($data['reseps']) ?></span></h4></p>
      </center>
    </div>
            <hr>
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