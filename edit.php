<?php require_once('inc/header.php');
	 require_once 'inc/control/func/functions.php';

	$title = "Update project";

	if(isset($_GET['id'])){
		// id taken from dashboard stored to a var
		 $id_key = clean($_GET['id']);

		 $getting_data_by_id = "SELECT * FROM track WHERE id = $id_key";
		 $data_gathering = mysqli_query($db_con, $getting_data_by_id); 
		 // passing the associate array to a variable
		 $row = mysqli_fetch_assoc($data_gathering);
		 	if ($id_key != $row['ID']) {
		 		header('location: dashboard.php');	
		 		exit;	
		 	}			 		
	} else {
		header('location: dashboard.php');	
		exit;
	}
?>

<div class="view">	
	<div class="container">
		<div class="live-project">
			<ul>
				<li>
					<label>Order # : </label>
					<?php echo $row['project_name']; ?>
				</li>
				
				<li>
					<label>Tracking # : </label>
					<?php echo $row['tracking']; ?>
				</li>
				
				<li>
					<label>Client Name : </label>
					<?php echo ucwords($row['client_name']); ?>
				</li>
				
				<li>
					<label>Client Number: </label>
					<?php echo .0.$row['client_number'];?>
				</li>
				
				<li>
					<label>Client Email : </label>
					<?php echo $row['client_email']; ?>
				</li>
				
				
				<li>	
					<form id="edit-form" method="post" action="inc/control/edit-project.php">
						<label>Project Status :</label>
						<input type="hidden" name="id_update" value="<?php echo $row['ID'];?>" />
						<select name="status_update">
							<option value="in_progress"
								<?php isset($row['status'])? print selected_option($row['status'], 'in_progress') : '' ; ?>>In Progress
							</option>
					
							<option value="pre_press" 
								<?php isset($row['status'])? print selected_option($row['status'], 'pre_press') : '' ; ?>>Pre-press Check
							</option>
							
							<option value="printing" 
								<?php isset($row['status'])? print selected_option($row['status'], 'printing') : '' ; ?>>Printing
							</option>
							
							<option value="quality_check"
								<?php isset($row['status'])? print selected_option($row['status'], 'quality_check') : '' ; ?>>Quality Check
							 </option>
							
							<option value="complete"
								<?php isset($row['status'])? print selected_option($row['status'], 'complete') : '' ; ?>>Complete
							</option>
						</select>
						<button type="submit">Update</button>
					</form>			
				</li>
			</ul>
		</div>
	</div><!--/end of container-->
</div><!--/end of view div-->



<?php include('inc/footer.php');?>