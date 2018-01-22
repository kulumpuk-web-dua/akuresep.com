<?php 
require 'require/autoload.php';

if(!isset($_SESSION['login'])) {
	header('Location: login.php');
}

$admin = exec_query("SELECT * FROM login WHERE id=".$_SESSION['login'])[0];


$page = (is_get('page')) ? get('page') : 'dashboard';

if (!file_exists('pages/'.$page.'.php')) {
	include 'app/header.php';
 	require 'pages/404.php';
	include 'app/footer.php';
} else {
	require_once 'app/'.$page.'.php';
	include 'app/header.php';
	require_once 'pages/'.$page.'.php';
	include 'app/footer.php';
}
