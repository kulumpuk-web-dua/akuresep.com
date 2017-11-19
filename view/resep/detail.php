<?php
include('./view/layout/header.php');
?>

    <!-- Page Content -->
<section class="content-section">
  <div class="bg-pattern">
  </div>
      <div class="container page detail-resep">
        <div class="box-content">
          <div class="detail-container">
            <div class="detail-image">
              <img src="statics/img/sop-kaki-sapi.jpg" class="img-responsive" alt="Image">
            </div> 
            <div class="box-header">
              <h1 class="box-title">Sop Buntut Tulang Rangu</h1>
              <a href="" class="author">Feni Nuryanti</a>
              <div class="kategori"><a href=""><i class="fa fa-hashtag"></i> Sop</a></div>
              <hr>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="content">
                  <div class="box-deskripsi">
                    <p><strong>Deskripsi: </strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>

                    <div class="row">
                      <div class="col-sm-3"><strong>Sajian: </strong> 3 porsi</div>
                      <div class="col-sm-3"><strong>Durasi: </strong>30 Menit</div>
                      <div class="col-sm-3"></div>
                      <div class="col-sm-3"><small><i class="fa fa-clock-o"></i> 22/11/2017 14:20</small></div>
                    </div>
                  </div>
                  <div class="box-bahan">
                    <h2>Bahan Bahan</h2>
                    <ul class="bahan">
                      <li>
                        <strong>500 gram </strong> daging ayam
                      </li>
                      <li>
                        <strong>2 butir </strong> telur
                      </li>
                      <li>
                        <strong>4 siung </strong>  bawang putih
                      </li>
                      <li>
                        <strong>3 siung </strong>  bawang merah
                      </li>
                      <li>
                        <strong>secukupnya   </strong>  garam
                      </li>
                      <li>
                        <strong>secukupnya  </strong>  lada
                      </li>
                    </ul>

                  </div>
                  <div class="box-langkah">
                    <h2>Langkah langkah</h2>
                    <ul class="langkah">
                      <li><div class="desc">Cuci ayam lalu pisahkan antara daging dan tulangnya.</div></li>
                      <li><div class="desc">Enim sunt laborum magna dolore amet velit cupidatat sed.</div></li>
                      <li><div class="desc">Simpan daging ayam di lemari pendingin selama 10 menit.</div></li>
                      <li><div class="desc">Campur semua bahan lalu diblender sampai halus.</div></li>
                      <li><div class="desc">Simpan kembali di lemari pendingin minimal 10 menit.</div></li>
                      <li><div class="desc">Panaskan air dalam panci.</div></li>
                      <li><div class="desc">Bentuk adonan menggunakan tangan menjadi bentuk bulat lalu masukkan dalam air mendidih.</div></li>
                      <li><div class="desc">Tunggu hingga matang.</div></li>
                      <li><div class="desc">Jika ingin ditambah kuah baso, langsung saja didihkan air lalu beri garam, bawang putih, lada.</div></li>
                    </ul>
                  </div>
                  <div class="box-img">
                    <h2>Gambar</h2>
                    <div class="row">
                      <div class="col-md-3"><a href="statics/img/sop-kaki-sapi.jpg" target="blank"><img src="statics/img/sop-kaki-sapi.jpg" class="img-responsive" alt="Image"></a></div>
                      <div class="col-md-3"><a href="statics/img/Gambar-Sop-Buntut.jpg" target="blank"><img src="statics/img/Gambar-Sop-Buntut.jpg" class="img-responsive" alt="Image"></a></div>
                      <div class="col-md-3"><a href="statics/img/sop-kaki-sapi.jpg" target="blank"><img src="statics/img/sop-kaki-sapi.jpg" class="img-responsive" alt="Image"></a></div>
                    </div>
                  </div>

                  <div class="box-comment">
                    <h2>Diskusi</h2>
                    <div class="panel panel-comment">
                      <div class="panel-heading">
                        <h3 class="panel-title">Katakan opini Anda</h3>
                      </div>
                      <div class="panel-body">
                        <blockquote><strong>Mohon maaf silahkan login terlebih dahulu untuk memberikan opini.</strong></blockquote>
                        <form action="" method="POST" role="form">
                            <div class="form-group">
                              <textarea name="" id="input" class="form-control" rows="3" required="required"></textarea>
                            </div>
                            <button type="submit" class="btn btn-default btn-lg">Post</button> 
                        </form>
                      </div>
                    </div>
                    <hr>
                    <ul class="list-group list-comment">
                      <li>
                        <div class="author">Deden Nurjaman</div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.</p>
                      </li>
                      <li>
                        <div class="author">Dudi Jumaedi</div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt.</p>
                      </li>
                      <li>
                        <div class="author">Aji Masahid</div>
                        <p>Lonsectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.</p>
                      </li>
                    </ul>

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