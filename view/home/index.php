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
              <a href="statics/#"><span class="network-name">Makanan</span></a>
            </li>
            <li class="list-inline-item list-kategori">
              <a href="statics/#"><span class="network-name">Minuman</span></a>
            </li>
            <li class="list-inline-item list-kategori">
              <a href="statics/#"><span class="network-name">Kue</span></a>
            </li>
            <li class="list-inline-item list-kategori">
              <a href="statics/#"><span class="network-name">Cemilan</span></a>
            </li>
            <li class="list-inline-item list-kategori">
              <a href="statics/#"><span class="network-name">Sop</span></a>
            </li>
            <li class="list-inline-item list-kategori">
              <a href="statics/#"><span class="network-name">Tumis</span></a>
            </li>
          </ul>
        </div>
      </div>
    </header>

    <!-- Page Content -->
    <section class="content-section">

      <div class="container">

        <div class="banner">
          <img src="statics/img/banner-bg.jpg" class="img-responsive" alt="Image">
        </div>
        <div class="resep-container">
          <div class="row">
            <div class="col-md-3">
              <div class="box-resep">
                <div class="img-resep">
                  <img src="statics/img/ipad.png" class="img-responsive" alt="Gambar Resep">
                </div>
                <div class="desc-resep">
                  <h2 class="title-resep">Sop Iga Bakar</h2>
                  <p>Dolor in adipisicing aliqua sit excepteur esse elit tempor laborum.</p>
                  <span>Dibuat oleh <a href="statics/#">Nadiron</a></span>
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