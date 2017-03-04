<?php include_once('inc/control/public_view.php');?>
<html>
<head>
	<title>TRACK MY ORDER</title>
	<link rel="stylesheet" href="inc/css/main.css" />
</head>
<body>
	<div class="outer-container">
	<div class="view">
		<div class="container">


			<a href="login.php">Login</a>


			<h1>TRACK MY ORDER</h1>
			<form id="tracking-form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
				<input id="tracking-input" type="search" name="tracking_code" value="<?php isset($tracking_code)? print $tracking_code: null ?>" placeholder="SP562269" />
				
				<button id="tracking-button" type="submit">Search</button>
			</form>
			
			<div id="result">
				<ul>
				<!--<li>
						<p>Hello 
							<b><?php isset($order_client_name)? print $order_client_name: '';?></b>
						</p>
					</li>-->
					
					<li>
						<?php 
							if (isset($order_number)) {
						?>
							<p><label>Order ID : </label>
								<?php isset($order_number)? print $order_number: '' ;?>
							</p>
						<?php
							}
						?>
						
					</li>
										
					<li>
						<?php 
							if(isset($order_set_date)){
						?>
							<p><label>Date Ordered : </label>
								<?php isset($order_set_date)? print $order_set_date: '' ;?>
							</p>
						<?php
							}
						?>
					</li>
					
					<li>
						<?php 
							if(isset($order_turnaround)){
						?>
							<p><label>Turnaround time : </label>
								<?php 
									if(isset($order_turnaround)){
										switch ($order_turnaround) {
											case 'a':
												echo 'Rush Job' ;
												break;
											case 'b':
												echo 'Complete within 5 working days ' ;
												break;
											case 'c':
												echo 'Complete within 5 - 7 working days ' ;
												break;
											default:
												'This should never show!! Ever ';
										} 
									}
								?>
							</p>
						<?php
							}
						?>
					</li>
					<li id="result-status">
					<?php 
						if(isset($order_status)){
					?>
						<p><label>Current Status : </label>
							<?php 
								switch ($order_status) {
										case 'in_progress':
											echo 'In Progress ' ;
											break;
										case 'pre_press':
											echo 'Pre Press Check ' ;
											break;
										case 'printing':
											echo 'In production' ;
											break;
										case 'quality_check':
											echo 'Post production Quality Check' ;
											break;
										case 'complete':
											echo 'Completed' ;
											break;
										default:
											echo 'This should never show!! Ever ';
									} 	
							?>
						</p>
					<?php 
						}
					?>
					
					
					<?php 
						if (isset($tracking_error)) {
					?>
						<p><?php echo $tracking_error; ?></p>
					<?php
						}
					?>
					</li>
				</ul>
			</div>	
		</div>
	</div>
	</div>
<body>	
</html>