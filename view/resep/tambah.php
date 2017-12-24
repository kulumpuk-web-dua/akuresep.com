<?php
include('./view/layout/header.php');
?>


    
  <div class="container " style="padding-top: 100px;">
      <h3 class="">Tambah Resep
        <a href="index.php?c=myresep&m=index" class=" btn btn-success" style="float: right;"> Kembali</a>
      </h3>
    <br>
  <form action="index.php?c=myresep&m=postTambah"  method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-5">
      
        <div class="form-group">
          <label for="exampleInpuitEmail1">Kategori:</label>
          
          <select name="kategori" enctype="multipart/form-data" class="form-control" id="">
            <option value="">Pilih Kategori</option>
            <?php 
              foreach ($data['listKategori'] as $key => $value) {
                ?>
                  <option value="<?php echo($value->id) ?>"><?php echo($value->nama) ?></option>
                <?php 
              }
            ?>
          </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Nama Resep:</label>
          <input type="text " name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
          
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Porsi:</label>
          <input type="text " name="porsi" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
          
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Durasi:</label>
          <input type="text " name="durasi" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
          
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Deskripsi:</label>
          <textarea name="deskripsi" class="form-control" id="" cols="30" rows="10"></textarea>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Tag:</label>
          <input type="text " name="tag" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
          
        </div>

      </div>
      <div class="col-md-7">
        
        <div class="form-group">
          <label for="exampleInputEmail1">Bahan:</label>
          <textarea name="bahan_bahan" class="form-control" id="" cols="10" rows="10"></textarea>
              
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Langkah:</label>
          <textarea name="langkah_resep" class="form-control" id="" cols="10" rows="10"></textarea>
              
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Gambar:</label>
          <input type="file" name="gambar" id="">
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