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
              <h1 class="box-title">Profil</h1>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                  <div class="panel-body">
                    <?php 
                      $userData = (array) $_SESSION['loginedUserDetail'][0];
                    ?>
                    <table class="table table-hover table-bordered">
                      <tbody>
                        <tr>
                          <th>Nama</th>
                          <td><?php echo $userData[1].' '.$userData[2] ?></td>
                        </tr>
                         <tr>
                          <th>Email</th>
                          <td><?php echo $userData[3] ?></td>
                        </tr>
                         <tr>
                          <th>Pekerjaan</th>
                          <td><?php echo $userData[4] ?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <hr>
                <h3 class="">Resep Saya
                  <a href="index.php?c=myresep&m=tambah" class=" btn btn-success" style="float: right;"> Tambah</a>
                </h3>
                <div class="clearfix"></div>
                <div class="row">
                  <?php
                  foreach ($data['resepSaya'] as $key => $value) {
                    # code...
                  ?>
                    <div class="col-sm-3">
                      <p><?php echo($value->nama) ?></p>
                      <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
                      <br>
                      <a href="index.php?c=myresep&m=edit&id=<?php echo($value->id)?>" class="btn btn-warning"> Edit</a>
                      <a href="index.php?c=myresep&m=delete&id=<?php echo($value->id)?>" class="btn btn-danger"> Delete</a>
                    </div>
                    <?php 
                  }?>
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