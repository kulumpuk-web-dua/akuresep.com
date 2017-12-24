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
            <div class="box-header">
              <h1 class="box-title">Kategori : <?php echo $kategori->nama ?></h1>
              <blockquote><?php echo $kategori->deskripsi ?></blockquote>
            </div>
            <div class="detail-image">
              <img src="statics/image/<?php echo $kategori->gambar ? : "no-image.png"?>"  class="img-responsive" alt="<?php echo $kategori->nama ?>">
            </div> 
            <hr>
            <div class="row">
              <div class="col-md-12 col-md-offset-0">
                <div class="list-resep">
                  <?php foreach ($data['reseps'] as $resep): ?>
                    
                    <div class="post">
                      <div class="post-image">
                        <img src="statics/image/<?php echo $resep->gambar_utama ? : "no-image.png"?>"  class="img-responsive" alt="<?php echo $resep->nama ?>">
                      </div>
                      <div class="post-content">
                        <div class="post-header">
                          <a href="index.php?c=resep&m=detail" class="post-title"><?php echo $resep->nama ?></a>
                          <a href="index.php?c=resep&m=search" class="post-author"><?php echo $resep->nama_depan ?></a>
                        </div>
                        <p><?php echo $resep->deskripsi?></p>
                        <div class="post-meta">
                          <span><i class="fa fa-heart"></i> Disukai 10 Orang</span>
                          <span><i class="fa fa-coffee"></i> 5 Porsi</span>
                          <span><i class="fa fa-clock-o"></i> 60 Menit</span>
                        </div>
                      </div>
                    </div>

                  <?php endforeach ?>

                    <nav aria-label="Page navigation">
                      <ul class="pagination">
                        <li>
                          <a href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                          </a>
                        </li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li>
                          <a href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                          </a>
                        </li>
                      </ul>
                    </nav>

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