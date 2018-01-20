<?php
include('./view/layout/header.php');
?>
<div class="container page">

<div class="row">
  <div class="col-md-4 col-md-offset-4">

    <br/>
    <br/>
    <br/>
    <br/>
    <div class="panel panel-default">
      <div class="panel-heading">
        <img src="./statics/image/logo.png" width="50">
        <span class="head-login">Login</span>
      </div>
      <div class="panel-body">
      <form action="index.php?c=auth&m=postLogin" method="post">
        <div class="form-group">
          <label for="exampleInputEmail1">Akun Email</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
          
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Kata Sandi</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
        </div>
        <button type="submit" class="btn btn-akuresep btn-block">Masuk</button>
        <br>
        Belum Punya Akun ? <a href="?c=auth&m=register">Register </a>
      </form>
      </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
  </div>
</div>  
</div>

<?php

include('./view/layout/footer.php');
?>