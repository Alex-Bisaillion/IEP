<?
require($_SERVER['DOCUMENT_ROOT'] . '/login/classes/api.php');
include( "database.php");
include("functions.php");
$ieptestTable="ieptest";
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>IEP Database</title>

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700">
        <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">


       	<script type="text/javascript">
	    $(document).ready(function() {
			    $('#multiselect').click(function(event) {
			        if (this.checked) {
			            $('.array').each(function() {
			                this.checked = true;
			            });
			        }
			        else {
			            $('.array').each(function() {
			                this.checked = false;
			             });
			        }
			    });
			});

	    $(document).ready(function() {
			    $('#multiselect').click(function(event) {
			        if (this.checked) {
			            $('.array').each(function() {
			                this.checked = true;
			            });
			        }
			        else {
			            $('.array').each(function() {
			                this.checked = false;
			             });
			        }
			    });
			});
	   	</script>
    </head>

    <?	if(null !== $user->getUserName()): ?>
    	<body background="images/background.jpg" style="background-size:cover;">
    	<? navbar(); ?>
    	<div class="container">
	    	<div class="row">
						<div class="col-md-12">
							<p><a class="btn btn-primary btn-block" data-toggle="collapse" data-target="#viewdetails1">Filter by Accommodation</a></p>
							<div class="panel panel-blue collapse" id="viewdetails1">
								<div class="panel-heading">
									Accommodation Filter
								</div>
								<div class="panel-body pan">
									<form method="post" action="allstudents.php" id="filter">
										<div class="form-body pal">
											<table class="table table-hover">
												<tr>
													<td><div class="checkbox"><input type="checkbox" name="accommodation[]" value="Alternative Settings">Alternative Settings</div></td>
													<td><div class="checkbox"><input type="checkbox" name="accommodation[]" value="Extra Time">Extra Time</div></td>
													<td><div class="checkbox"><input type="checkbox" name="accommodation[]" value="Strategic Seating">Strategic Seating</div></td>
													<td><div class="checkbox"><input type="checkbox" name="accommodation[]" value="Quiet Setting">Quiet Setting</div></td>
													<td><div class="checkbox"><input type="checkbox" name="accommodation[]" value="Chunking">Chunking</div></td>
												</tr>
												<tr>
													<td><div class="checkbox"><input type="checkbox" name="accommodation[]" value="Prompting">Prompting</div></td>
													<td><div class="checkbox"><input type="checkbox" name="accommodation[]" value="Alternative Settings">Alternative Settings</div></td>
													<td><div class="checkbox"><input type="checkbox" name="accommodation[]" value="Repetition">Repetition</div></td>
													<td><div class="checkbox"><input type="checkbox" name="accommodation[]" value="Assistive Technology">Assistive Technology</div></td>
												</tr>
												<tr>
													<td><div class="checkbox"><input type="checkbox" name="accommodation[]" value="Computer Options">Computer Options</div></td>
													<td><div class="checkbox"><input type="checkbox" name="accommodation[]" value="Graphic Organizers">Graphic Organizers</div></td>
													<td><div class="checkbox"><input type="checkbox" name="accommodation[]" value="Anxiety Reducers">Anxiety Reducers</div></td>
													<td><div class="checkbox"><input type="checkbox" name="accommodation[]" value="Organizational Coaching">Organizational Coaching</div></td>
												</tr>
												<tr>
													<td><div class="checkbox"><input type="checkbox" name="accommodation[]" value="Time Management Aids">Time Management Aids</div></td>
													<td><div class="checkbox"><input type="checkbox" name="accommodation[]" value="Visual Supports">Visual Supports</div></td>
													<td><div class="checkbox"><input type="checkbox" name="accommodation[]" value="Simplified Language">Simplified Language</div></td>
													<td><div class="checkbox"><input type="checkbox" name="accommodation[]" value="Reduction in Tasks">Reduction in Tasks</div></td>
												</tr>
												<tr>
													<td><div class="checkbox"><input type="checkbox" name="accommodation[]" value="Frequent Breaks">Frequent Breaks</div></td>
													<td><div class="checkbox"><input type="checkbox" name="accommodation[]" value="Memory Aids">Memory Aids</div></td>
													<td><div class="checkbox"><input type="checkbox" name="accommodation[]" value="Use of Headphones">Use of Headphones</div></td>
													<td><div class="checkbox"><input type="checkbox" name="accommodation[]" value="Manipulatives">Manipulatives</div></td>
												</tr>
											</table>
										</div>
										<div class="form-actions text-center pal">
											<button type="submit" class="btn btn-primary">Submit</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>

			<div class="row">
					<div class="col-md-12">
						<p><a class="btn btn-primary btn-block" data-toggle="collapse" data-target="#viewdetails2">Filter by Grade</a></p>
						<div class="panel panel-blue collapse" id="viewdetails2">
							<div class="panel-heading">
								Grade Filter
							</div>
							<div class="panel-body pan">
								<form method="post" action="allstudents.php" id="filter">
									<div class="form-body pal">
										<table class="table table-hover">
											<tr>
												<td><div class="checkbox"><input type="radio" name="grade" value="9">Grade 9</div></td>
												<td><div class="checkbox"><input type="radio" name="grade" value="10">Grade 10</div></td>
												<td><div class="checkbox"><input type="radio" name="grade" value="11">Grade 11</div></td>
												<td><div class="checkbox"><input type="radio" name="grade" value="12">Grade 12</div></td>
											</tr>
										</table>
									</div>
									<div class="form-actions text-center pal">
										<button type="submit" class="btn btn-primary">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
			</div>

		<? if (!isset($_POST['grade']) && !isset($_POST['accommodation'])) { ?>
			<div class="row">
				<div class="col-md-12">
				<div class="panel panel-blue" style="background:#FFF">
				<div class="panel-heading">Basic Student Info</div>		
						
						<table class="table table-hover table-bordered">
						<tr><!--<th><input type="checkbox" name="multiselect" id="multiselect" value="" />Select All</th>--><th>Student Number</th><th>Name</th><th>Date of Birth</th><th>Grade</th><th>Mailing Address</th><th>IPRC</th><th>Exceptionalities</th><!--<th>Add An Appointment</th>--><th>Accommodations</th><th>View Full Info</th></tr>
												
						<?
							foreach($newinfoArray as $index => $row){
									/*?><tr><td><input type="checkbox" class="array" name="studentArray[<?=$index;?>][fname]" value="<?php echo $studentArray[$index]['fname']; ?>" /></td>
										<?*/
										echo "<td>".$row['ID']."</td>";
										echo "<td>".$row['student']."</td>";
										echo "<td>".$row['dob']."</td>";
										echo "<td>".$row['grade']."</td>";
										echo "<td>".$row['mailingaddress']."</td>";
										echo "<td>".$row['iprc']."</td>";
																
										$separated = explode(":", $row['exceptionalities']);
										echo "<td>";
										foreach ($separated as $item) {
											echo "<li>$item</li>";
										}
										"</td>";

										$separated = explode(":", $row['accommodations']);
										echo"<td>";
										foreach ($separated as $item)
										{
											echo"<li>$item</li>";
										}
										"<td>";

										/*echo "<td>";
										?>		
											<a href="appointments.php"><input type="button" class="btn btn-primary" value="Add"/></a>
										<?

										echo "<td>";*/
										?>
											<td>
											<form method="post" action="search.php">
													<input type="hidden" name="student" value="<? echo $row['student']; ?>"/>												
													<button type="submit" class="btn btn-primary">
													View
													</button>
											</form>
											</td>

										<?							

										echo "</td></tr>";
							}	
							echo "</table>\n";
						?>
					</div>
					</div>
					</div>

		<?	} elseif (isset($_POST['grade']) && !isset($_POST['accommodation'])) { ?>
				<div class="row">
				<div class="col-md-12">
				<div class="panel panel-blue" style="background:#FFF">
					<div class="panel-heading">Basic Student Info</div>		
						
						<table class="table table-hover table-bordered">
						<tr><!--<th><input type="checkbox" name="multiselect" id="multiselect" value="" />Select All</th>--><th>Student Number</th><th>Name</th><th>Date of Birth</th><th>Grade</th><th>Mailing Address</th><th>IPRC</th><th>Exceptionalities</th><th>Accommodations</th><!--<th>Add An Appointment</th>--><th>View Full Info</th></tr>
												
						<?
							foreach($newinfoArray as $index => $row){
								if ($_POST['grade']==$row['grade']){
									
									/*?><tr><td><input type="checkbox" class="array" name="studentArray[<?=$index;?>][fname]" value="<?php echo $studentArray[$index]['fname']; ?>" /></td>
										<?*/
										echo "<td>".$row['ID']."</td>";
										echo "<td>".$row['student']."</td>";
										echo "<td>".$row['dob']."</td>";
										echo "<td>".$row['grade']."</td>";
										echo "<td>".$row['mailingaddress']."</td>";

										

										if ($result['iprc']=1) {
											echo "<td>Yes</td>";
										}
																
										$separated = explode(":", $row['exceptionalities']);
										echo "<td>";
										foreach ($separated as $item) {
											echo "<li>$item</li>";
										}
										"</td>";

										$separated = explode(":", $row['accommodations']);
										echo"<td>";
										foreach ($separated as $item)
										{
											echo"<li>$item</li>";
										}
										"<td>";

										/*echo "<td>";
										?>		
											<a href="appointments.php"><input type="button" class="btn btn-primary" value="Add"/></a>
										<?

										echo "<td>";*/
										?>
											<td>
											<form method="post" action="search.php">
													<input type="hidden" name="student" value="<? echo $row['student']; ?>"/>												
													<button type="submit" class="btn btn-primary">
													View
													</button>
											</form>
											</td>

										<?							

										echo "</td></tr>";
								}
							}	
							echo "</table>\n";
						?>
					</div>
					</div>
					</div>

		<?	} elseif (!isset($_POST['grade']) && isset($_POST['accommodation'])) { ?>
				<div class="row">
				<div class="col-md-12">
				<div class="panel panel-blue" style="background:#FFF">
					<div class="panel-heading">Basic Student Info</div>		
						
						<table class="table table-hover table-bordered">
						<tr><!--<th><input type="checkbox" name="multiselect" id="multiselect" value="" />Select All</th>--><th>Student Number</th><th>Name</th><th>Date of Birth</th><th>Grade</th><th>Mailing Address</th><th>IPRC</th><th>Exceptionalities</th><th>Accommodations</th><!--<th>Add An Appointment</th>--><th>View Full Info</th></tr>
												
						<?
							foreach($newinfoArray as $index => $row){
								$separated = explode(":", $newinfoArray[$index]['accommodations']);
								$intersection = array_intersect($_POST['accommodation'], $separated);
								if (count($intersection) > 0){
									
									
									/*?><tr><td><input type="checkbox" class="array" name="studentArray[<?=$index;?>][fname]" value="<?php echo $studentArray[$index]['fname']; ?>" /></td>
										<?*/
										echo "<td>".$row['ID']."</td>";
										echo "<td>".$row['student']."</td>";
										echo "<td>".$row['dob']."</td>";
										echo "<td>".$row['grade']."</td>";
										echo "<td>".$row['mailingaddress']."</td>";

										

										if ($result['iprc']=1) {
											echo "<td>Yes</td>";
										}
																
										$separated = explode(":", $row['exceptionalities']);
										echo "<td>";
										foreach ($separated as $item) {
											echo "<li>$item</li>";
										}
										"</td>";

										$separated = explode(":", $row['accommodations']);
										echo"<td>";
										foreach ($separated as $item)
										{
											echo"<li>$item</li>";
										}
										"<td>";

										/*echo "<td>";
										?>		
											<a href="appointments.php"><input type="button" class="btn btn-primary" value="Add"/></a>
										<?

										echo "<td>";*/
										?>
											<td>
											<form method="post" action="search.php">
													<input type="hidden" name="student" value="<? echo $row['student']; ?>"/>												
													<button type="submit" class="btn btn-primary">
													View
													</button>
											</form>
											</td>

										<?							

										echo "</td></tr>";
								}
							}	
							echo "</table>\n";
						?>
					</div>
					</div>
					</div>

		<?	} elseif (isset($_POST['grade']) && isset($_POST['accommodation'])) { ?>
			<div class="row">
			<div class="col-md-12">
			<div class="panel panel-blue" style="background:#FFF">
				<div class="panel-heading">Basic Student Info</div>		
					
					<table class="table table-hover table-bordered">
					<tr><!--<th><input type="checkbox" name="multiselect" id="multiselect" value="" />Select All</th>--><th>Student Number</th><th>Name</th><th>Date of Birth</th><th>Grade</th><th>Mailing Address</th><th>IPRC</th><th>Exceptionalities</th><th>Accommodations</th><!--<th>Add An Appointment</th>--><th>View Full Info</th></tr>
											
					<?
						foreach($newinfoArray as $index => $row){

							if ($_POST['accommodation']==$row['accommodations']){
					
								/*?><tr><td><input type="checkbox" class="array" name="studentArray[<?=$index;?>][fname]" value="<?php echo $studentArray[$index]['fname']; ?>" /></td>
									<?*/
									echo "<td>".$row['accommodations']."</td>";
									echo "<td>".$row['ID']."</td>";
									echo "<td>".$row['student']."</td>";
									echo "<td>".$row['dob']."</td>";
									echo "<td>".$row['grade']."</td>";
									echo "<td>".$row['mailingaddress']."</td>";

									

									if ($result['iprc']=1) {
										echo "<td>Yes</td>";
									}
															
									$separated = explode(":", $row['exceptionalities']);
									echo "<td>";
									foreach ($separated as $item) {
										echo "<li>$item</li>";
									}
									"</td>";

									$separated = explode(":", $row['accommodations']);
									echo"<td>";
									foreach ($separated as $item)
									{
										echo"<li>$item</li>";
									}
									"<td>";

									/*echo "<td>";
									?>		
										<a href="appointments.php"><input type="button" class="btn btn-primary" value="Add"/></a>
									<?

									echo "<td>";*/
									?>
										<td>
										<form method="post" action="search.php">
												<input type="hidden" name="student" value="<? echo $row['student']; ?>"/>												
												<button type="submit" class="btn btn-primary">
												View
												</button>
										</form>
										</td>

									<?							

									echo "</td></tr>";
							}
						}	
						echo "</table>\n";
					?>
				</div>
				</div>
				</div>

		<? } 
			else {echo "Error";
		}
    	
    	?> 
    	</div>
    </body>				     

    <? elseif(null== $user->getUserName()): ?>
       <? login(); ?>         
    
    <? else:
        echo "Error";
        endif;
    ?>          
</html>