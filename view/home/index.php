<?php
include('./view/layout/header.php');
?>

<!-- Header -->
    <header class="intro-header">
      <div class="container">
        <div class="intro-message">
          <h1 class="animated swing">AkuResep.com</h1>
          <h3>Resep nusantara dan mancanegara</h3>
          <hr class="intro-divider">
          <ul class="list-inline intro-kategori">
            <li class="list-inline-item list-kategori">
              <a href="index.php?c=kategori&m=detail"><span class="network-name">Makanan</span></a>
            </li>
            <li class="list-inline-item list-kategori">
              <a href="index.php?c=kategori&m=detail"><span class="network-name">Minuman</span></a>
            </li>
            <li class="list-inline-item list-kategori">
              <a href="index.php?c=kategori&m=detail"><span class="network-name">Kue</span></a>
            </li>
            <li class="list-inline-item list-kategori">
              <a href="index.php?c=kategori&m=detail"><span class="network-name">Cemilan</span></a>
            </li>
            <li class="list-inline-item list-kategori">
              <a href="index.php?c=kategori&m=detail"><span class="network-name">Sop</span></a>
            </li>
            <li class="list-inline-item list-kategori">
              <a href="index.php?c=kategori&m=detail"><span class="network-name">Tumis</span></a>
            </li>
            <li class="list-inline-item list-kategori">
              <a href="index.php?c=kategori"><span class="network-name">| Daftar Kategori</span></a>
            </li>
          </ul>
          <form action="index.php?c=resep&m=search" method="GET" class="form-inline form-search" role="form">
            <input type="hidden" name="c" value="resep">
            <input type="hidden" name="m" value="search">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-search"></i></span>
              <input type="text" class="form-control " name="search" id="" placeholder="Cari Resep">
            </div>
            <button type="submit" class="btn btn-search">Cari</button>
          
            
          
          </form>
        </div>
      </div>
    </header>

    <!-- Page Content -->
    <section class="content-section">

      <div class="container">

        <div class="banner">
          <img src="statics/img/banner-resep-produk-tepung.png" class="img-responsive" alt="Image">
        </div>
        <div class="box-content">
        <div class="resep-container">
          <h1 class="box-title">Resep Terakhir Dipost</h1>
          <div class="row">
            <?php if (count($data['reseps'])>0): ?>
              
            <?php foreach ($data['reseps'] as $resep): ?>
            <div class="col-md-3">
              <div class="box-resep">
                <div class="img-resep">
                  <img src="statics/img/Gambar-Sop-Buntut.jpg" class="img-responsive" alt="Gambar Resep">
                </div>
                <div class="desc-resep">
                  <h2 class="title-resep"><a href="index.php?c=resep&m=detail&id=<?php echo $resep->id ?> "><?php echo $resep->nama ?></a></h2>
                  <p><?php echo $resep->deskripsi ?></p>
                  <span>Dibuat oleh <a href="index.php?c=profile&user=<?php echo $resep->id_pengguna?>"><?php echo $resep->nama_depan ?></a></span>
                </div>
              </div>
            </div>
            <?php endforeach ?>
            <?php else: ?>
              <h1><blockquote>Tidak ada resep masakan.</blockquote></h1>
            <?php endif ?>
          </div>
        </div>
        </div>
      </div>
      <!-- /.container -->
    </section>


<?php 

include('./view/layout/footer.php');
?>