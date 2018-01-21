<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="AkuResep.com | Kumpulan resep nusantara dan mancanegara">
    <meta name="author" content="Aku Resep">
    <link rel="icon" href="statics/favicon.ico">

    <title>AkuResep.com | Home</title>

    <!-- Bootstrap core CSS -->
    <link href="statics/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="statics/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="statics/css/magnific-popup.css" rel="stylesheet" type="text/css">
    <link href="statics/css/animate.css" rel="stylesheet">
    <link href="statics/css/style.css" rel="stylesheet">

  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-resep navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><img src="statics/img/aku_resep.png"></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
              <li><a href="index.php?c=resep">Resep Masakan</a></li>
              <li><a href="index.php?c=kategori">Kategori</a></li>
            <?php if (isset($_SESSION['loginedUser'])): ?>
              <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown">Selamat datang <?php echo $_SESSION['loginedUserDetail']['nama_depan'] ?>! </a>
                <ul class="dropdown-menu">
                  <li><a href="index.php?c=profile">Profil</a></li>
                  <li><a href="index.php?c=myresep&m=tambah">+Tambah Resep</a></li>
                  <li><a href="index.php?c=myresep">My Resep</a></li>
                  <li class="divider"></li>
                  <li><a href="index.php?c=auth&m=postLogout">Keluar</a></li>
                </ul>
              </li>
            <?php else: ?>
              <li><a href="index.php?c=auth&m=register">Daftar</a></li>
              <li><a href="index.php?c=auth&m=login">Masuk</a></li> 
            <?php endif ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

