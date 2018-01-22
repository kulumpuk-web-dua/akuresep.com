<?php
if(!defined("web")) die();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (is_post('action') && post('action')=='login') {
		$user = clean(post('username'));
		$pass = (clean(post('password')));

		$user = exec_query("SELECT * FROM login WHERE type='admin' AND email='$user' AND password='$pass'");
		if (count($user)>0) {
			$_SESSION['login'] = $user[0]['id'];
			header('Location: index.php');
		} else {
			$message = "Username atau password salah.";
		}
	}

}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
	if (is_get('action') && get('action')=='logout') {
		unset($_SESSION['login']);
		header('Location: login.php');
	}
}
