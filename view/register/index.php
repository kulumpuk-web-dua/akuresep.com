<?php
include('./view/layout/header.php');
?>
<div class="container page">

<div class="row">

<div class="col-md-3 col-md-offset-3">
  <br>
  <img src="./statics/image/logo.png" width="200">
  </div>
  <div class=" col-md-6">

  <br/>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"><span class="head-login">Register</span></h3>
    </div>
    <div class="panel-body">
      <form action="index.php?c=auth&m=postRegister" method="post">
      <div class="form-group">
        <label for="exampleInputEmail1">Nama Depan:</label>
        <input type="text " name="nama_depan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
        
      </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Nama Belakang:</label>
          <input type="text" name="nama_belakang"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
          
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Pekerjaan:</label>
          <input type="text" name="pekerjaan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Guru , Mahasiswa , Dosen , dll">
          
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Akun Email:</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="me@akuresep.com">
          
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Kata Sandi</label>
          <input type="password" name="password"  class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-akuresep">Register</button>
        Sudah Punya Akun ? <a href="?c=auth&m=login">Masuk </a>
      </form>
    </div>
  </div>
  </div>
</div>  
</div>

<?php

include('./view/layout/footer.php');
?>