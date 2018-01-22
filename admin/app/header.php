<?php
if(!defined("web")) die();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Administrator Atlit">
    <meta name="author" content="<?php echo $config['author'] ?>">

    <title>Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo $config['admin_url'] ?>bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo $config['admin_url'] ?>bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?php echo $config['admin_url'] ?>bower_components/bootstrap3-wysiwyg/bootstrap3-wysihtml5.min.css"></link>

    <!-- Timeline CSS -->
    <link href="<?php echo $config['admin_url'] ?>dist/css/timeline.css" rel="stylesheet">

     <!-- DataTables CSS -->
    <link href="<?php echo $config['admin_url'] ?>bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo $config['admin_url'] ?>dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo $config['admin_url'] ?>bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo $config['admin_url'] ?>">Administrator</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        Hi, <?php echo $admin['email'] ?> <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo $config['admin_url'] ?>?page=admin"><i class="fa fa-user fa-fw"></i> Manajemen User</a>
                        </li>
                        <li><a href="#"><i class="fa fa-key fa-fw"></i> Ubah password</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo $config['admin_url'] ?>login.php?action=logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <?php echo $config['site_name'] ?>
                        </li>
                        <li>
                            <a href="<?php echo $config['admin_url'] ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="<?php echo $config['admin_url'] ?>?page=resep"><i class="fa fa-flag fa-fw"></i> Resep</a>
                        </li>
                        <li>
                            <a href="<?php echo $config['admin_url'] ?>?page=kategori"><i class="fa fa-child fa-fw"></i> Kategori</a>
                        </li>
                        <li>
                            <a href="<?php echo $config['admin_url'] ?>?page=pengguna"><i class="fa fa-edit fa-fw"></i> Pengunjung / Pengguna</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>