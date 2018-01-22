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
                <form action="index.php?c=profile&m=postProfile" method="POST" role="form" enctype="multipart/form-data">
                  <legend>Edit Profile</legend>
                  <div class="row">
                    <div class="col-md-8">
                      <div class="form-group">
                        <label for="">Nama Depan</label>
                        <input type="text" class="form-control" name="nama_depan" value="<?php echo $userData['nama_depan'] ?>" required>
                      </div>

                      <div class="form-group">
                        <label for="">Nama Belakang</label>
                        <input type="text" class="form-control" name="nama_belakang" value="<?php echo $userData['nama_belakang'] ?>" required>
                      </div>

                      <div class="form-group">
                        <label for="">Pekerjaan</label>
                        <input type="text" class="form-control" name="pekerjaan" value="<?php echo $userData['pekerjaan'] ?>" required>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Poto</label>
                        <br>
                        <img src="statics/image/<?php echo $userData['poto'] ? : "no-image.png"?>" width="80" height="80">
                        <br>
                        <input type="file" class="" name="poto">
                      </div>
                    </div>
                  </div>
                
                  <button type="submit" class="btn btn-primary">Ubah</button>
                </form>
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