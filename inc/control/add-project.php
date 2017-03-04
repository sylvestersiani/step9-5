<?php require_once 'db-con/db_con.php'; 
		require_once 'func/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// checking for name
	switch (data_collection($_POST['client_name'], '/[^0-9]+$/')) {
		case 'Error1':
			$name_error = 'Clients name required';
			break;
		case 'Error2':
			$name_error = 'No number(s) in the clients name';
			break;
		default:
			$client_name = data_collection($_POST['client_name'], '/[^0-9]+$/');
			break;
	}
	// checking for number
	switch (data_collection($_POST['client_number'], "/^(\+44\s?7\d{3}|\(?07\d{3}\)?)\s?\d{3}\s?\d{3}$/")) {
		case 'Error1':
			$number_error = 'Don\'t forget to enter clients number.';
			break;
		case 'Error2':
			$number_error = "Valid UK number required.";
			break;
		default:
			$client_number = data_collection($_POST['client_number'], "/^(\+44\s?7\d{3}|\(?07\d{3}\)?)\s?\d{3}\s?\d{3}$/");
			break;
	}

	//
	if (!empty($_POST['client_email'])){
		if (filter_var($_POST['client_email'], FILTER_VALIDATE_EMAIL)) {
			$client_email = clean($_POST['client_email']);
		}else {$email_error = 'Enter a valid email address.';}
	}else{$email_error = "Email required.";}
	//
	if (!empty($_POST['project_type'])){
		$project_type = clean($_POST['project_type']);
	}else{$project_type_error = "Select project Type.";}
	//
	if (!empty($_POST['project_timeline'])){
		$project_timeline = clean($_POST['project_timeline']);
	}else{$timeline_error = "Select a timeline.";}	
	//
	if (!empty($_POST['project_status'])){
		$project_status = clean($_POST['project_status']);}	
	//
	if (!empty($_POST['description'])){
		$description = clean($_POST['description']);
	}else {$description_error = 'Project description required.';}
		

	if (!empty($client_name) && 
		!empty($project_status) && 
		!empty($client_number) &&
		!empty($project_timeline)) {

		$tracking_code = tracking_code_generator();
		// $project_code = project_code_generator($client_name);
		$date = date('d-m-y');
		
		$new_project = "INSERT INTO track (client_name, status, client_number,tracking, client_email, project_type, turnaround_time, set_time, description ) VALUES ('$client_name', '$project_status',$client_number, '".$tracking_code."','$client_email','$project_type','$project_timeline' , '$date', '$description' )";
		
		
		$new_project_added = mysqli_query($db_con,$new_project);

		if($new_project_added){
			/*need to set the link to be custom so when the customer clicks it, they are directed to a custome site containing their order status. this will require a get method.
		text need copywriting including things such as date produced and expected turn around. */
			$text_message = "Your order is now being processed. To track your order use the code  $tracking_code on the link http://google.com" ;	
           	send_text($client_number, $text_message);
     		header('location: dashboard.php');

		}else {$warning = 'OOPS THERE WAS AN ERROR SOMEWHERE - NOTHING ADDED TO THE DATABASE';}
		
		// closing up mysqli connection.
		// The variable doesn't have to be passed through the function but it's good practice
		mysqli_close($db_con);
			
	}
		
}

