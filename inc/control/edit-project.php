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

			$get_number = "SELECT client_number FROM track WHERE ID = $id ";
			$query = mysqli_query($db_con, $get_number);

			switch ($status_update) {
				case 'quality_check':
					while ($row = mysqli_fetch_array($query)) {
						$client_number = $row['client_number'];
						// sending text message
						$text_message = "Order update!
						Your order is almost complete and is now being quality checked. We will update you once completed." ;
					 	send_text(.0.$client_number , $text_message);
					 	header('location: ../../edit.php?id='.$id.'');
					}	
				break;
				case 'complete':
					while ($row = mysqli_fetch_array($query)) {
						$client_number = $row['client_number'];
						// sending text message
						$text_message = "Good news!
						Your order is now complete and ready for shipping. If you opted for collection a member of our team will get in touch with you shortly. :)" ;
					 	send_text(.0.$client_number , $text_message);
					 	header('location: ../../dashboard.php');
					}	
				break;
					
				default: 
					header('location: ../../edit.php?id='.$id.'');	
				break;
			}
			

		}
		mysqli_close($db_con);
	}
	
	
	