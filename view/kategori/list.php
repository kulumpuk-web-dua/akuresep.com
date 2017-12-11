<?php
include('./view/layout/header.php');
?>

    <!-- Page Content -->
<section class="content-section">
  <div class="bg-pattern">
  </div>
      <div class="container page kategori">
        <div class="box-content">
          <div class="kategori-container">
            <h1 class="box-title">Daftar Kategori</h1>
            <hr>
            <img src="statics/img/kategori.jpg" class="img-responsive" alt="Kategori">
            <div class="row">
              <?php foreach ($data['kategories'] as $kategori): ?>
              <div class="col-md-4">
                <div class="kategori-list">
                  <a href="index.php?c=kategori&m=detail&id_kategori=<?php echo $kategori->id ?>"><i class="fa fa-hashtag"></i> <?php echo $kategori->nama ?></a>
                </div>
              </div>
              <?php endforeach ?>
            </div>
          </div>
        </div>
      </div>
      <!-- /.container -->
</section>

<?php 

include('./view/layout/footer.php');
?>