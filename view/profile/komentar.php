<?php
include('./view/layout/header.php');
?>
  


  <section class="content-section">
  <div class="bg-pattern">
  </div>
      <div class="container page">
        <div class="box-content">
          <div class="detail-container">
            <div class="box-header">
              <h1 class="box-title pull-left">
                <img src="statics/img/Profile.png" width="60">
                Profil
              </h1>
              <div class="clearfix"></div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-3">
              <?php
              include('./view/profile/sidemenu.php');
              ?>
              </div>
              <div class="col-md-9">
                <?php 
                  $userData = $_SESSION['loginedUserDetail'];
                ?>
                <legend>Komentar Saya</legend>
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Tanggal</th>
                      <th>Judul Resep</th>
                      <th>Isi Komentar</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($data['komentars'] as $komentar): ?>
                    <tr>
                      <td><?php echo $komentar->dibuat_pada ?></td>
                      <td><a href="index.php?c=resep&m=detail&id=<?php echo $komentar->id_resep ?>"><?php echo $komentar->nama ?></a></td>
                      <td><?php echo $komentar->pesan ?></td>
                      <td><a href="index.php?c=profile&m=delKomentar&id=<?php echo $komentar->id ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    <?php endforeach ?>
                    <?php if (count($data['komentars'])==0): ?>
                      <tr><td colspan="4">Komentar tidak ditemukan.</td></tr>
                    <?php endif ?>
                  </tbody>
                </table>
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