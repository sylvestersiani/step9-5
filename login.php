<?php session_start();

require 'inc/control/db-con/db_con.php';
require 'inc/control/func/functions.php';

	if (isset($_SESSION['user'])) {
		header('location: dashboard.php');
	}
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (!empty($_POST['password']) && !empty($_POST['username'])) {
			$password = clean($_POST['password']);
			$username = clean($_POST['username']);
	
			$user_query = "SELECT * FROM admin_group";
			$user_result = mysqli_query($db_con, $user_query);
			
			while($user = mysqli_fetch_assoc($user_result)){
				if ($username == $user['username']) {
					if ($password == $user['pass']) {
						$_SESSION['user'] = $username;
						header('location: dashboard.php');	
					}
				} else{
					echo 'Check if user name or password is correct';
				}		
			}// end of while loop
		}else { 
			echo 'Error!'; 
		}		
	}// end of post request script
	

?>


<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
	<input type="text" name="username" value="<?php isset($username)? print $username:'';?>" placeholder="username"/>
	<input type="password" name="password" value="<?php isset($password)? print $password: ''?>" placeholder="password" />
	<input type="submit" name="" value="Login" />
</form>