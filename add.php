<?php require_once 'inc/control/add-project.php';
		$title = 'Add new project';
		require_once('inc/header.php');?>

	<div class="view">
		<div class="container">		
			<form id="add-form" method="post" action="<?php $_SERVER['PHP_SELF'];?>">	
				<div class="error-box">
					<ul>
						<li>
							<span class="error">
								<?php isset($warning)? print $warning : '';?>
							</span>
						</li>
						<li>
							<span class="error">
								<?php isset($name_error)? print $name_error : '';?>
							</span>
						</li>
						<li>
							<span class="error">
								<?php isset($number_error)? print $number_error : '' ?>
							</span>
						</li>
						<li>
							<span class="error">
								<?php isset($email_error)? print $email_error  : '';?>
							</span>
						</li>
						<li>
							<span class="error">
								<?php isset($project_type_error)? print $project_type_error : '';?>
							</span>
						</li>
						<li>
							<span class="error">
								<?php isset($timeline_error)? print $timeline_error  : '';?>
							</span>
						</li>
						<li>
							<span class="error">
								<?php isset($status_error)? print  $status_error : '';?>
							</span>
						</li>
						<li>
							<span class="error">
								<?php isset($description_error)? print $description_error : '';?>
							</span>
						</li>
					</ul>
				</div>
				
				<div>
					<label>Client Name : 
						<input type="text" name="client_name" value="<?php isset($client_name) ? print $client_name : '' ;?>"  placeholder="Example"/>
					</label>
				</div>
				<div>
					<label>
						Client Number:
							<input type="number" name="client_number" value="<?php isset($client_number)? print $client_number :''?>" />
					</label>
				</div>
				<div>
					<label>Client Email : 
						<input type="email" name="client_email" value="<?php isset($client_email) ? print $client_email : '' ;?>"  placeholder="example@mail.com"/>
					</label>
				</div>
				
				<div>
					<label>Order Type? : 
						<select name="project_type">
							<option value="">None</option>
							
							<option value="digital_printing"
								<?php isset($project_type)? print selected_option($project_type, 'digital_printing'): '' ;?>>Digital Printing
							</option>

							<option value="garment_printing"
								<?php isset($project_type)? print selected_option($project_type, 'garment_printing'): '' ;?>>Garment Printing
							</option>


							<option value="screen_printing">
								<?php isset($project_type)? print selected_option($project_type, 'screen_printing'): '' ?>Screen Printing
							</option>

							<option value="vinyl_transfer">
								<?php isset($project_type)? print selected_option($project_type, 'vinyl_transfer'): '' ?>Vinyl Transfer
							</option>

							<option value="image_transfer">
								<?php isset($project_type)? print selected_option($project_type, 'image_transfer'): '' ?>Image Transfer
							</option>

							<option value="laser_transfer">
								<?php isset($project_type)? print selected_option($project_type, 'laser_transfer'): '' ?>Laser Transfer
							</option>

							<option value="embroidery">
								<?php isset($project_type)? print selected_option($project_type, 'embroidery'): '' ?>Embroidery
							</option>

							<option value="sublimation">
								<?php isset($project_type)? print selected_option($project_type, 'submit'): '' ?>Sublimation
							</option>

							<option value="dtg">
								<?php isset($project_type)? print selected_option($project_type, 'dtg'): '' ?>Direct to garment
							</option>

							



						</select>
					</label>
				</div>
				
				<div>
					<label>Turnaround? : 
						<select name="project_timeline">
							<option value="">None</option>
							<option value="a" 
								<?php isset($project_timeline)? print selected_option($project_timeline, 'a'): '' ;?>  >Rush Job - 3 working days
							</option>
							<option value="b" 
								<?php isset($project_timeline)? print selected_option($project_timeline, 'b'): '' ;?>>3 - 5 working days
							</option>
							<option value="c" 
								<?php isset($project_timeline)? print selected_option($project_timeline, 'c'): '' ;?>>7 - 11 working days
							</option>
						</select>
					</label>
				</div>
				
				<div>
					<label>Order Status : 
						<select name="project_status">
							<option value="in_progress" 
								<?php isset($project_status)? print selected_option($project_status, 'in_progress'): '' ;?> >In Progress 
							</option>
							<option value="pre_press" 
								<?php isset($project_status)? print selected_option($project_status, 'pre_press'): '' ;?>>Pre-press Check
							</option>
							<option value="printing" 
								<?php isset($project_status)? print selected_option($project_status, 'printing'): '' ;?>>Printing
							</option>
							<option value="quality_check" 
								<?php isset($project_status)? print selected_option($project_status, 'quality_check'): '' ;?>>Quality Check
							</option>
							<option value="complete" 
								<?php isset($project_status)? print selected_option($project_status, 'project_status'): '' ;?>>Completed
							</option>
						</select>
					</label>
				</div>
				
				<div>
					<label>Brief Order Description :  <br>
						<textarea cols="50" rows="5" type="text" name="description" value="<?php isset($description)? print $description : ''; ?>" placeholder="Invoice number, Quantity, Extra details" ></textarea>
					</label>
				</div>	
				
				<div>
					<button type="submit">Add Project</button>
				</div>
			</form><!--/end of form-->
		</div><!--/end of container div-->
	</div>
	
<?php include('inc/template/footer.php');?>