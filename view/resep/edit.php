<?php
include('./view/layout/header.php');
?>


    
  <div class="container " style="padding-top: 100px;">
      <h3 class="">Tambah Resep
        <a href="index.php?c=myresep&m=index" class=" btn btn-success" style="float: right;"> Kembali</a>
      </h3>
    <br>
  <form action="index.php?c=myresep&m=postEdit" method="post">
    <div class="row">
      <div class="col-md-5">
      
        <div class="form-group">
          <label for="exampleInpuitEmail1">Kategori:</label>
          <?php $instance = ($data['instance']) ;
          ?>
          <input type="hidden" name="id" value="<?php echo($instance->id) ?>">
          <select name="kategori" class="form-control" id="" required>
            <option value="">Pilih Kategori</option>
            <?php 
              foreach ($data['listKategori'] as $key => $value) {
                ?>
                  <option value="<?php echo($value->id) ?>" <?php echo($instance->id_kategori ? "selected" : '')  ?> ><?php echo($value->nama) ?></option>
                <?php 
              }
            ?>
          </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Nama Resep:</label>
          <input type="text " name="nama" class="form-control" id="exampleInputEmail1" value="<?php $this->echoIsset($instance, 'nama') ?>" required>
          
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Porsi:</label>
          <input type="number " name="porsi" class="form-control" id="exampleInputEmail1" value="<?php $this->echoIsset($instance, 'porsi') ?>" required>
          
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Durasi:</label>
          <input type="text " name="durasi" class="form-control" id="exampleInputEmail1" value="<?php $this->echoIsset($instance, 'durasi') ?>" required>
          
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Deskripsi:</label>
          <textarea name="deskripsi" class="form-control" id="" cols="30" rows="10"><?php $this->echoIsset($instance, 'deskripsi') ?></textarea>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Tag:</label>
          <input type="text " name="tag" class="form-control" id="exampleInputEmail1" value="<?php $this->echoIsset($instance, 'tag') ?>" >
          
        </div>

      </div>
      <div class="col-md-7">
        
        <div class="form-group">
          <label for="exampleInputEmail1">Bahan:</label>
          <textarea name="bahan_bahan" class="form-control" id="" cols="10" rows="10" required><?php $this->echoIsset($instance, 'bahan_bahan') ?></textarea>
              
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Langkah:</label>
          <textarea name="langkah_resep" class="form-control" id="" cols="10" rows="10" required><?php $this->echoIsset($instance, 'langkah_resep') ?></textarea>
              
        </div>

      </div>
    </div>
    <button class="btn btn-success">Simpan</button>
  </form>
    <br/>
    
              
  </div><br>
<?php 

include('./view/layout/footer.php');
?>