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
                    <table class="table table-bordered">
                      <tbody>
                        <tr>
                          <td rowspan="3" align="center" valign="middle">
                            <img src="statics/image/<?php echo $userData['poto'] ? : "no-image.png"?>" width="80" height="80">
                            <br>
                            <br>
                            <a href="index.php?c=profile&m=ubahProfile" class="btn btn-default"><i class="fa fa-edit"></i> Edit Profil</a>
                          </td>
                          <th>Nama</th>
                          <td><?php echo $userData['nama_depan'].' '.$userData['nama_belakang'] ?></td>
                        </tr>
                         <tr>
                          <th>Email</th>
                          <td><?php echo $userData['email'] ?></td>
                        </tr>
                         <tr>
                          <th>Pekerjaan</th>
                          <td><?php echo $userData['pekerjaan'] ?></td>
                        </tr>
                      </tbody>
                    </table>
              </div>
            </div>
            <hr>
                <h3 class="">Resep Saya
                  <a href="index.php?c=myresep" class=" btn btn-info" style="float: right;"> Lihat Semua</a>
                </h3>
                <div class="clearfix"></div>
                <?php if (count($data['reseps'])>0): ?>
                <div class="row">
                  <?php foreach ($data['reseps'] as $resep) {?>
                  <div class="col-sm-4 col-md-3 col-xs-6">
                    <div class="thumbnail" >
                      <img src="statics/image/<?php echo $resep->gambar_utama ? : "no-image.png"?>" class="img-responsive" style="height: 200px; width:100%">
                      <div class="caption">
                        <h3><?php echo $resep->nama ?></h3>
                        <div class="row">
                          <div class="col-md-6">
                            <a href="index.php?c=myresep&m=edit&id=<?php echo($resep->id)?>" class="btn btn-primary btn-block"><i class="fa fa-edit"></i> Edit</a> 
                          </div>
                          <div class="col-md-6">
                            <a href="index.php?c=myresep&m=delete&id=<?php echo($resep->id)?>" class="btn btn-danger btn-block"><i class="fa fa-trash"></i> Delete</a></div>
                        </div>

                        <p> </p>
                      </div>
                    </div>
                  </div>
                  <?php } ?>
                <?php else: ?>
                  <blockquote>Tidak ada resep.</blockquote>
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