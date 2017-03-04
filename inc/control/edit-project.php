<?php
	require_once 'db-con/db_con.php';
	require_once 'func/functions.php';
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$id = clean($_POST['id_update']);	
		$status_update = clean($_POST['status_update']);
		
		$update_query = "UPDATE track SET status = '$status_update' WHERE ID = '{$id}'"; 	
		$update_data = mysqli_query($db_con,$update_query);
		
		// if sucessefull
		if($update_data && mysqli_affected_rows($db_con) > 0){
		
			if ($status_update == 'complete') {

				$get_number = "SELECT client_number FROM track WHERE ID = $id ";
				$query = mysqli_query($db_con, $get_number);
				
				while ($row = mysqli_fetch_array($query)) {
					$client_number = $row['client_number'];
					// sending text message
					$text_message = "Good news!
					Your order is now complete and ready for pick up." ;
					 send_text(.0.$client_number , $text_message);
					break; 
				}		
			}	
			 header('location: ../../dashboard.php');
		}else {
			
			header('location: ../../edit.php?id='.$id.'');	
		}
		mysqli_close($db_con);
	}
	
	
	