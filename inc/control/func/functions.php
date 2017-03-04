<?php
// checks if user is logged in
function active_user() {
	if(isset($_SESSION['user'])){
		return ucwords($_SESSION['user']);
	}
}


// this function takes in an already set variable if user has selected an option from the dropdown list
// and the value of the option, if they do match in case there is an error with the from completion
// the value remains so the user would not have to select it again, this allow for great user experience.
// example of how the could should be ran -- isset($var)? print selected_option($var, 'option_value'): '' ;
function selected_option($set_var, $input_name){
	if (isset($set_var) && $set_var == $input_name) {
		return 'selected="selected"';
	}
}



function clean($data){
	global $db_con;
	$data = trim($data);
	$data = htmlspecialchars($data);
	$data = stripslashes($data);
	$data = mysqli_escape_string($db_con, $data);
	$data = strip_tags($data);
	$data = strtolower($data);		
	return $data;
}	




		// takes the company code and appends a random number between 1000000 to 9999999 that will enable the client to track the progress of their project
function tracking_code_generator() {
	$company_code = 'SP';
	$tracking_code = $company_code.'-'.mt_rand(1000, 9999);
	return $tracking_code;
}	
	
// // generaring project code this takes in our automated tracking number and appends the first 3 letters of or client name this is then added to our database under the row of project name
// function project_code_generator($name, $company_code = 'SIA') {
// 	if (isset($name)) {
// 		$client_name_code = preg_replace('/\s+/', '',$name);
// 		$client_name_code = substr($client_name_code, 0, 3);
// 		$project_code = $company_code.rand(100, 999).'-'. date('y-m') .'-' . strtoupper($client_name_code);
// 		return $project_code;
// 	}			
// }


function data_collection($data, $preg_pattern){
	if (!empty($data)) {
		if (preg_match($preg_pattern, $data)) {
			return $result = clean($data);
		}else{
			return "Error2";
		}
	}else{
		return "Error1";
	}
}

// send text messages
function send_text($number,$text){
	require_once 'class/class-Clockwork.php';
	$api_key = "736f3536953d7fb6a0c01aec345c636f6b07f09d";
	
	$clockwork = new Clockwork($api_key);
	$message = array('to' => $number, 'message' => "$text");
	if($done = $clockwork->send($message)){
		// header('location: dashboard.php');
	}else {
		/////
	}
}




// email framework 
// function email($to,$order_number,$tracking_number, $email_subect, $email_message){

// 	$header = 'FROM: tracking@sianiprint.co.uk' . "\n";
// 	$subject = $email_subject . ' : ' . $order_number;		
			
// 	// body	
// 	$message = wordwrap($email_message, 60);
	
// 	return mail($to, $subject, $message, $header);
// }	
