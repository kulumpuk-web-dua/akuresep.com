<?php 
define("web", true);
session_start();
if(!isset($_SESSION['flash'])) $_SESSION['flash'] = ['time'=>0];
if ((time()-$_SESSION['flash']['time']) > 1) {
	unset($_SESSION['flash']);
	$_SESSION['flash']['time'] = time();
}
require 'config.php';
require 'koneksi.php';
require 'fungsi.php';
?>