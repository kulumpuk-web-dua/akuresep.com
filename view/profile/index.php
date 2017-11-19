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
                    $data = (array) $_SESSION['loginedUserDetail'][0];
                     ?>
                    <table class="table table-hover">
                      <tbody>
                        <tr>
                          <th>Nama</th>
                          <td><?php echo $data[1].' '.$data[2] ?></td>
                        </tr>
                         <tr>
                          <th>Email</th>
                          <td><?php echo $data[3] ?></td>
                        </tr>
                         <tr>
                          <th>Pekerjaan</th>
                          <td><?php echo $data[4] ?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <hr>
                <h3 class="pull-left">Resep Saya
                  <a href="index.php?c=myresep&m=tambah" class=" btn btn-success" style="float: right;"> Tambah</a>
                </h3>
                <div class="clearfix"></div>
                <div class="row">
                  <div class="col-sm-3">
                    <p>Nama Resep</p>
                    <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
                  </div>
                  <div class="col-sm-3">
                    <p>Nama Resep</p>
                    <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
                  </div>
                  <div class="col-sm-3">
                    <p>Nama Resep</p>
                    <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
                  </div>
                  <div class="col-sm-3">
                    <p>Nama Resep</p>
                    <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
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