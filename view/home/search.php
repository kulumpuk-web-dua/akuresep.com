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
            <h1 class="box-title">Hasil Pencarian</h1>
            <form action="index.php?c=resep&m=search" method="POST" class="form-inline form-search text-center" role="form">
            
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control " name="search" value="<?php echo $_GET['search'] ?>" placeholder="Cari Resep">
              </div>
              <button type="submit" class="btn btn-search">Cari</button>

              <hr>
              <div class="message">
                <p>Terdapat <?php echo count($data['reseps']) ?> data yang cocok.</p>
              </div>          
            </form>
            <div class="row">
              <div class="col-md-10 col-md-offset-1">
                <div class="list-resep">
                    
                  <?php foreach ($data['reseps'] as $resep): ?>
                    <div class="post col-md-12">
                      <div class="post-image">
                        <img src="statics/img/Gambar-Sop-Buntut.jpg" class="img-responsive" alt="Image">
                      </div>
                      <div class="post-content">
                        <div class="post-header">
                          <a href="index.php?c=resep&m=detail&id=<?php echo $resep->id ?>" class="post-title"><?php echo $resep->nama ?></a>
                          <a href="index.php?c=profle&m=resep&id=<?php echo $resep->id_pengguna ?>" class="post-author"><?php echo $resep->nama_depan ?></a>
                        </div>
                        <p><?php echo $resep->deskripsi ?></p>
                        <div class="post-meta">
                          <span><i class="fa fa-heart"></i> Disukai 5 Orang</span>
                          <span><i class="fa fa-coffee"></i> <?php echo $resep->porsi ?> Porsi</span>
                          <span><i class="fa fa-clock-o"></i> <?php echo $resep->durasi ?> Menit</span>
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