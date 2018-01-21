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

            <?php if (count($data['kategories'])>0) { ?>
              <?php foreach ($data['kategories'] as $resep): ?>
                <li class="list-inline-item list-kategori">
                  <a href="index.php?c=kategori&m=detail&id_kategori=<?php echo($resep->id) ?>"><span class="network-name"><?php echo($resep->nama) ?></span></a>
                </li>
              <?php endforeach ?>
            <?php } ?>
            <li class="list-inline-item list-kategori">
              <a href="index.php?c=kategori"><span class="network-name">| Daftar Kategori</span></a>
            </li>
          </ul>
          <form action="index.php?c=resep&m=search" method="GET" class="form-inline form-search" role="form">
            <input type="hidden" name="c" value="resep">
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
        <blockquote class="intro">Cooking and baking is both physical and mental therapy
          <footer>Mary Berry</footer>
        </blockquote>
        </div>
        <div class="banner">
        <a href="index.php?c=resep&m=search"><img src="statics/img/banner-middle.jpg" class="img-responsive" alt="Image"></a>
        </div>
        <div class="box-content">
        <div class="resep-container">
          <h1 class="box-title">Resep Terakhir Dipost</h1>

          <?php if (count($data['reseps'])>0): ?>
          <div class="row">
              
            <?php foreach ($data['reseps'] as $resep): ?>
            <div class="col-md-3 col-xs-6">
              <div class="box-resep">
                <div class="img-resep">
                  <img src="statics/image/<?php echo $resep->gambar_utama ? : "no-image.png"?>" class="img-responsive" alt="Gambar Resep">
                </div>
                <div class="desc-resep">
                  <h2 class="title-resep"><a href="index.php?c=resep&m=detail&id=<?php echo $resep->id ?> "><?php echo $resep->nama ?></a></h2>
                  <p><?php echo substr(strip_tags($resep->deskripsi),0,100) ?></p>
                  <span>Dibuat oleh <a href="index.php?c=user&profile=<?php echo $resep->id_pengguna?>"><?php echo $resep->nama_depan ?></a></span>
                </div>
              </div>
            </div>
            <?php endforeach ?>
          </div>

          <h1><a href="index.php?c=resep"><blockquote>Lihat Yang Lainnya</blockquote></a></h1>
            <?php else: ?>
              <h1><blockquote>Tidak ada resep masakan.</blockquote></h1>
            <?php endif ?>
        </div>
        </div>
      </div>
      <!-- /.container -->
    </section>


<?php 

include('./view/layout/footer.php');
?>