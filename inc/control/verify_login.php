<?php session_start();
		require_once('db-con/db_con.php');

if (isset($_SESSION['user'])) {
	$session_id = $_SESSION['user'];
	
	$user_query = "SELECT * FROM admin_group";
	$user_result = mysqli_query($db_con, $user_query);
	
	while ($user = mysqli_fetch_assoc($user_result)) {
		if ($user['username'] === $session_id) {
			//
		}else {
			break;
		}
	}// end of while loop
	
}else {
	/// this is if there isn't an alreadys set session the user is sent back to the login page
	header('location: login.php');
	exit;
}
