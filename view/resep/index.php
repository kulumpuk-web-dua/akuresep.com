<?php
include('./view/layout/header.php');
?>
  


  <section class="content-section">
  <div class="bg-pattern">
  </div>
      <div class="container page">
        <div class="box-content">
          <div class="detail-container">
            <div class="row">
              <div class="col-md-10 col-md-offset-1">
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
                      <img src="statics/image/<?php echo $value->gambar_utama ? : "no-image.png"?>" class="img-responsive" style="width:100%" alt="Image">
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