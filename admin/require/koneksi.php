<?php	
	//Koneksi
	$db = $config['koneksi'];
	$con = mysqli_connect($db['host'], $db['user'], $db['password'], $db['database']);
	if (mysqli_connect_errno())
	  {
	    echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }

?>