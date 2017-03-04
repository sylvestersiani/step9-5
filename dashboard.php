<?php require_once('inc/header.php');
		$title = 'Dashboard';
		$work_log = "SELECT * FROM track 
						WHERE status != 'complete' 
							ORDER BY turnaround_time ASC";
		$show_work_log = mysqli_query($db_con, $work_log);
?>

<div class="view">
	<div class="container">
		<p><?php echo 'Hello ' .'<b>'. active_user() .'</b>'. '!'; ?></p>

		<?php
			if (mysqli_num_rows($show_work_log) > 0) {
				while($row = mysqli_fetch_assoc($show_work_log)){	
		?>
				<div class="live-project">
					<ul>
						<li><label>Order # : </label><?php echo ($row['project_name']);?></li>
						<li><label>Tracking # : </label><?php echo $row['tracking']; ?></li>
						<li><label>Client Name : </label><?php echo ucwords($row['client_name']); ?></li>
						<li><label>Set Date : </label><?php echo ($row['set_time']); ?></li>
						<li><label>Expected Turnaround : </label>
							<?php 
								switch ($row['turnaround_time']) {
									case 'a':
										echo 'Rush Job' ;
										break;
									case 'b':
										echo '3 - 5 working days ' ;
										break;
									case 'c':
										echo '5 - 7 working days ' ;
										break;
									default:
										'This should never show!! Ever ';
										break;
								} 
							?>
						</li>
						<li>
							<label>Brief Description : </label><?php echo wordwrap($row['description'], 40);?>
						</li>
						<li><label>Current Status : </label>
							<?php 
								switch ($row['status']) {
									case 'in_progress':
										echo  ucwords('In Progress') ;
										break;
									case 'pre_press':
										echo ucwords('Pre Press Check ') ;
										break;
									case 'printing':
										echo ucwords('In production') ;
										break;
									case 'quality_check':
										echo ucwords('Post production QC') ;
										break;
									case 'complete':
										echo ucwords('Completed') ;
										break;
									default:
										echo strtoupper('This should never show!! Ever ');
										break;
								} 	
								// passing the link that will enable the user to edit the status
							 	echo '<a href="edit.php?id='.$row['ID'].'">Update</a>';
							 ?>
						</li> 
					</ul>
				</div>
		<?php 
				}
				mysqli_free_result($show_work_log);
			}else { echo '<p>No Live Projects.<p>'; }
		?>
	</div>
</div>


<?php include('inc/template/footer.php');?>