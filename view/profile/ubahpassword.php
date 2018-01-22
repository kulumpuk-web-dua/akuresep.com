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
                <?php if (get('error')!=''): ?>
                  <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo get('error') ?>
                  </div>
                <?php endif ?>
                <form action="index.php?c=profile&m=postPassword" method="POST" role="form" enctype="multipart/form-data">
                  <legend>Ubah Password</legend>
                  <div class="row">
                    <div class="col-md-8">
                      <div class="form-group">
                        <label for="">Password Lama</label>
                        <input type="password" class="form-control" name="old_pass" required>
                      </div>

                      <hr>

                      <div class="form-group">
                        <label for="">Password Baru</label>
                        <input type="password" class="form-control" name="new_pass" required>
                      </div>

                      <div class="form-group">
                        <label for="">Verifikasi Password</label>
                        <input type="password" class="form-control" name="ver_pass" required>
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