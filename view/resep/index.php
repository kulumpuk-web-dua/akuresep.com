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
                <hr>
                <form action="index.php?c=myresep" method="GET" role="form" class="form-inline">
                  <input type="hidden" name="c" value="myresep">
                  <div class="form-group">
                    <label>Cari</label>
                    <input type="text" class="form-control" name="search">
                  </div>  
                  <button type="submit" class="btn btn-default" style="padding : 10px 15px">Cari</button>
                </form>
                <hr>
                <div class="clearfix"></div>
                  <?php if (count($data['reseps'])>0): ?>
                <div class="row">
                  <?php foreach ($data['reseps'] as $resep) {?>
                  <div class="col-sm-4 col-md-3 col-xs-6">
                    <div class="thumbnail" >
                      <img src="statics/image/<?php echo $resep->gambar_utama ? : "no-image.png"?>" class="img-responsive" style="height: 150px; width:100%">
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
                </div>
                  <?php echo $data['paginate']['link'] ?>
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