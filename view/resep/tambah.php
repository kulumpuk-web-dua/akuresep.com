<?php
include('./view/layout/header.php');
?>


    
  <div class="container ">
      <h3 class="pull-left">Tambah Resep
        <a href="index.php?c=myresep&m=index" class=" btn btn-success" style="float: right;"> Kembali</a>
      </h3>
    <br>
  <form action="index.php?c=auth&m=postRegister" method="post">
    <div class="row">
      <div class="col-md-5">
      
        <div class="form-group">
          <label for="exampleInputEmail1">Nama Resep:</label>
          <input type="text " name="nama_depan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
          
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Porsi:</label>
          <input type="text " name="nama_depan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
          
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Durasi:</label>
          <input type="text " name="nama_depan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
          
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Deskripsi:</label>
          <input type="text " name="nama_depan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
          
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Tag:</label>
          <input type="text " name="nama_depan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
          
        </div>
      </div>
    </div>
  </form>
    <br/>
    
    
  </div><br>
<?php 

include('./view/layout/footer.php');
?>