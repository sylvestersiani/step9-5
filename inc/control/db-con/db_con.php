<?php 
	define('HOST', 'localhost');
	define('USER', 'root');
	define('PASS', 'root');
	define('DB', 'tracking');
	$db_con = mysqli_connect(HOST,USER,PASS,DB);

	if (mysqli_connect_errno($db_con)) {
		die('error connecting to the database'. mysqli_connect_error() );
		// header('Location : http://www.sianiprint.co.uk/404.php');
	}


 ?>