<?
require($_SERVER['DOCUMENT_ROOT'] . '/login/classes/api.php');
require("functions.php");
require("fpdf.php");
require( "database.php")
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

	    <style>
	    .jumbotron {
		   background: rgba(8,0,42,0.65); 
		}
	    </style>
	    <script>
	    	$(document).ready(function(){
			    $("#assessmentpdf").submit(function(){
					$.ajax({
					    type: 'POST',
					    url: 'assessmentsession.php',
					    data: $('#assessmentpdf').serialize(),
					    success: function(response)
					    {
        					window.open("assessmentpdf.php");
					    },
					    error : function(XMLHttpRequest, textStatus, errorThrown) 
        				{
        					alert ("Error Occured");
        				}
					});
					return false;
			    });
			});
	    	$(document).ready(function(){
			    $("#appointmentpdf").submit(function(){
					$.ajax({
					    type: 'POST',
					    url: 'appointmentsession.php',
					    data: $('#appointmentpdf').serialize(),
					    success: function(response)
					    {
        					window.open("appointmentpdf.php");
					    },
					    error : function(XMLHttpRequest, textStatus, errorThrown) 
        				{
        					alert ("Error Occured");
        				}
					});
					return false;
			    });
			});
			$(document).ready(function(){
			    $("#assessmentbook").submit(function(){
					$.ajax({
					    type: 'POST',
					    url: 'indivassessbook.php',
					    data: $('#assessmentbook').serialize(),
					    success: function(response)
					    {
        					location.reload();
					    },
					    error : function(XMLHttpRequest, textStatus, errorThrown) 
        				{
        					alert ("Error Occured");
        				}
					});
					return false;
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
			$(document).ready(function() {
			    $('#multiselect1').click(function(event) {
			        if (this.checked) {
			            $('.array1').each(function() {
			                this.checked = true;
			            });
			        }
			        else {
			            $('.array1').each(function() {
			                this.checked = false;
			             });
			        }
			    });
			});
			$(document).ready(function(){
			    $("#deletestudent").submit(function(){
					$.ajax({
					    type: 'POST',
					    url: 'controlpanel/deletestudent.php',
					    data: $('#deletestudent').serialize(),
					    success: function(response)
					    {
        					$(location).attr('href', 'index.php')
					    },
					    error : function(XMLHttpRequest, textStatus, errorThrown) 
        				{
        					alert ("Error Occured");
        				}
					});
					return false;
			    });
			});
	    </script>
	</head>
	<? if(null !== $user->getUserName()): ?>
		<? 
			navbar();

			if (isset($_POST["fname"]) && isset($_POST["lname"])) {
				$fnameresult = $_POST["fname"];
				$lnameresult = $_POST["lname"];
				$fnameresult = ucfirst($fnameresult); 
				$lnameresult = ucfirst($lnameresult); 
				$studentname = $fnameresult . ' ' . $lnameresult;
				$studentmatcher=array();
				foreach ($newinfoArray as $row) {
					if (stristr($row['student'], $fnameresult) && stristr($row['student'], $lnameresult)) {
				        $studentmatcher[]=$row['ID'];
				  		$id=$row['ID'];
				    }
				}
			}
			//from andrej's page
			if (isset($_POST["student"])) {
				foreach ($newinfoArray as $row) {
					if ($row['student']==$_POST["student"]) {
						$fields = array('lname','fname');
						$arr = array_combine ( $fields, explode(", ",$_POST["student"]) );
						$studentname = $arr['fname'] . ' ' . $arr['lname'];
				        $studentmatcher[]=$row['ID'];
				        $id=$row['ID'];
				    }
				}
			}
			if (empty($studentmatcher)) {
				?>
				<body background="images/background.jpg" style="background-size:cover;">
					<div class="jumbotron">
						<h1 align="center">Your search returned no results!</h1>
						<form align="center">
							<input type="button" class="btn btn-primary" onclick="window.location.href='index.php'" value="Please click here to return to the homepage and try again"> 
						</form>

					</div>
				</body>
				<?
			}
			elseif (!empty($studentmatcher)) {
				?>
					<body background="images/background.jpg" style="background-size:cover;">
						<div class="container">
							<div class="row">
			    				<div class="col-md-12">
									<div class="panel panel-blue" style="background:#FFF">
										<div class="panel-heading">Basic Student Info</div>
											<table class="table table-hover-color">
												<tr><th>Name</th><th>Student ID</th><th>Grade</th><th>IPRC</th><th>SEA</th><th>Accommodations</th><th>Exceptionalities</th><th>Mailing Address</th><th>Date of Birth</th></tr>
												<?
													foreach ($newinfoArray as $row) {
														if (in_array($row['ID'],$studentmatcher)) {
															echo "<tr><td>".$row['student']."</td><td>".$row['ID']."</td><td>".$row['grade']."</td>";
															echo "<td>".$row['iprc']."</td>";
															echo "<td>".$row['sea']."</td>";
															echo "<td><ul>";
															$separated = explode(":", $row['accommodations']);
															foreach ($separated as $item) {
																echo "<li>$item</li>";
															}
															echo "</ul></td><td><ul>";
															$separated = explode(":", $row['exceptionalities']);
															foreach ($separated as $item) {
																echo "<li>$item</li>";
															}
															echo "</ul></td>";
															echo "<td>".$row['mailingaddress']."</td>";
															echo "<td>".$row['dob']."</td></tr>";
														}
													}
												?>
											</table>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="panel panel-blue" style="background:#FFF">
										<div class="panel-heading">Semester 1 Courses</div>
											<table class="table table-hover-color">
												<tr><th>Room</th><th>Course Code</th><th>Teacher</th></tr>				
												<?
													$date = date('m/d', time());
													foreach ($newinfoArray as $row) {
														if (in_array($row['ID'],$studentmatcher)) {
															$separated = explode(":", $row['s1p1']);
															echo "<tr>";
															$i=0;
															foreach ($separated as $item) {
																if ($i==0 || $i==1) {
																	echo "<td>$item</td>";
																	$i++;
																}
																elseif ($i==2) {
																	$result = explode('/',$item);
																	$fields = array('lname','fname');
																	$arr = array_combine ( $fields, explode(",",$result[0]) );
																	$teachername = $arr['fname'] . ' ' . $arr['lname'];
																	echo "<td>$teachername</td>";
																	if ($date < strtotime("01/31") && $date > strtotime("08/31")) {
																		$homeroomTeacher=$teachername;
																	}
																	break;
																}
															}
															echo "</td>";
															echo "</tr>";
															$separated = explode(":", $row['s1p2']);
															echo "<tr>";
															$i=0;
															foreach ($separated as $item) {
																if ($i==0 || $i==1) {
																	echo "<td>$item</td>";
																	$i++;
																}
																elseif ($i==2) {
																	$result = explode('/',$item);
																	$fields = array('lname','fname');
																	$arr = array_combine ( $fields, explode(",",$result[0]) );
																	$teachername = $arr['fname'] . ' ' . $arr['lname'];
																	echo "<td>$teachername</td>";
																	break;
																}
															}
															echo "</td>";
															echo "</tr>";
															$separated = explode(":", $row['s1p3']);
															echo "<tr>";
															$i=0;
															foreach ($separated as $item) {
																if ($i==0 || $i==1) {
																	echo "<td>$item</td>";
																	$i++;
																}
																elseif ($i==2) {
																	$result = explode('/',$item);
																	$fields = array('lname','fname');
																	$arr = array_combine ( $fields, explode(",",$result[0]) );
																	$teachername = $arr['fname'] . ' ' . $arr['lname'];
																	echo "<td>$teachername</td>";
																	break;
																}
															}
															echo "</td>";
															echo "</tr>";
															$separated = explode(":", $row['s1p4']);
															echo "<tr>";
															$i=0;
															foreach ($separated as $item) {
																if ($i==0 || $i==1) {
																	echo "<td>$item</td>";
																	$i++;
																}
																elseif ($i==2) {
																	$result = explode('/',$item);
																	$fields = array('lname','fname');
																	$arr = array_combine ( $fields, explode(",",$result[0]) );
																	$teachername = $arr['fname'] . ' ' . $arr['lname'];
																	echo "<td>$teachername</td>";
																	break;
																}
															}
															echo "</td>";
														}
													}
												?>
											</table>
									</div>
								</div>

			    				<div class="col-md-6">
									<div class="panel panel-blue" style="background:#FFF">
										<div class="panel-heading">Semester 2 Courses</div>
											<table class="table table-hover-color">
												<tr><th>Room</th><th>Course Code</th><th>Teacher</th></tr>				
												<?
													foreach ($newinfoArray as $row) {
														if (in_array($row['ID'],$studentmatcher)) {
															$separated = explode(":", $row['s2p1']);
															echo "<tr>";
															$i=0;
															foreach ($separated as $item) {
																if ($i==0 || $i==1) {
																	echo "<td>$item</td>";
																	$i++;
																}
																elseif ($i==2) {
																	$result = explode('/',$item);
																	$fields = array('lname','fname');
																	$arr = array_combine ( $fields, explode(",",$result[0]) );
																	$teachername = $arr['fname'] . ' ' . $arr['lname'];
																	echo "<td>$teachername</td>";
																	if (!isset($homeroomTeacher)) {
																		$homeroomTeacher=$teachername;
																	}
																	break;
																}
															}
															echo "</td>";
															echo "</tr>";
															$separated = explode(":", $row['s2p2']);
															echo "<tr>";
															$i=0;
															foreach ($separated as $item) {
																if ($i==0 || $i==1) {
																	echo "<td>$item</td>";
																	$i++;
																}
																elseif ($i==2) {
																	$result = explode('/',$item);
																	$fields = array('lname','fname');
																	$arr = array_combine ( $fields, explode(",",$result[0]) );
																	$teachername = $arr['fname'] . ' ' . $arr['lname'];
																	echo "<td>$teachername</td>";
																	break;
																}
															}
															echo "</td>";
															echo "</tr>";
															$separated = explode(":", $row['s2p3']);
															echo "<tr>";
															$i=0;
															foreach ($separated as $item) {
																if ($i==0 || $i==1) {
																	echo "<td>$item</td>";
																	$i++;
																}
																elseif ($i==2) {
																	$result = explode('/',$item);
																	$fields = array('lname','fname');
																	$arr = array_combine ( $fields, explode(",",$result[0]) );
																	$teachername = $arr['fname'] . ' ' . $arr['lname'];
																	echo "<td>$teachername</td>";
																	break;
																}
															}
															echo "</td>";
															echo "</tr>";
															$separated = explode(":", $row['s2p4']);
															echo "<tr>";
															$i=0;
															foreach ($separated as $item) {
																if ($i==0 || $i==1) {
																	echo "<td>$item</td>";
																	$i++;
																}
																elseif ($i==2) {
																	$result = explode('/',$item);
																	$fields = array('lname','fname');
																	$arr = array_combine ( $fields, explode(",",$result[0]) );
																	$teachername = $arr['fname'] . ' ' . $arr['lname'];
																	echo "<td>$teachername</td>";
																	break;
																}
															}
															echo "</td>";
														}
													}
												?>
											</table>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="panel panel-blue" style="background:#FFF">
										<div class="panel-heading">Upcoming Assessments</div>
											<table class="table table-hover-color">
												<tr><th><input type="checkbox" name="multiselect" id="multiselect" value="" /></th><th>Assessment</th><th>Room</th><th>Accommodations</th><th>Date</th><th>Time</th></tr>
													<form id="assessmentpdf">
														<?
															$i=0;
															foreach ($newassessments as $index => $row) {
																foreach ($row as $row1) {
																	if (strstr($row1, $id)) {
																		?><td><input type="checkbox" class="array" name="assessmentArray[<?=$index;?>][info]" value="<?php echo $row1; ?>" /></td><?
																		?><input type="hidden" class="array" name="assessmentArray[<?=$index;?>][name]" value="<?php echo $studentname; ?>" /><?
																		?><input type="hidden" class="array" name="assessmentArray[<?=$index;?>][chosenassessment]" value="<?php echo str_replace("_"," ",$index); ?>" /><?
																		?><input type="hidden" class="array" name="assessmentArray[<?=$index;?>][homeroomTeacher]" value="<?php echo $homeroomTeacher; ?>" /><?
																		$fields = array('student_no','room','date','time','accommodations');
																		$arr = array_combine ( $fields, explode(";", $row1) );
																		echo "<td>";
																		echo str_replace("_"," ",$index);
																		echo "</td>";
																		echo "<td>".$arr['room']."</td>";
																		$separated=explode(",", $arr['accommodations']);
																		echo "<td>";
																		foreach ($separated as $item) {
																			echo"<li>$item</li>";
																		}
																		echo "</td>";
																		echo "<td>".$arr['date']."</td>";
																		echo "<td>".$arr['time']."</td>";
																		echo"</tr>";
																		$i=1;
																	}
																}
															}
															if ($i==1) {
																?>
																	<tr>
																		<td colspan="6" align="center"><input type="submit" class="btn btn-primary" value="Generate Assessment Forms"/>
																		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Book an Assessment</button></td>
																	</tr>
																<?
															}
															else {
																?>
																	<tr>
																		<td colspan="6" align="center">No Upcoming Assessments!</td>
																	</tr>
																	<tr>
																		<td colspan="6" align="center"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Book an Assessment</button></td>
																	</tr>
																<?
															}
														?>
													</form>
											</table>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="panel panel-blue" style="background:#FFF">
										<div class="panel-heading">Upcoming Appointments</div>
											<table class="table table-hover-color">
												<tr><th><input type="checkbox" name="multiselect1" id="multiselect1" value="" /></th><th>Student</th><th>Homeroom Teacher</th><th>Teacher</th><th>Date</th><th>Time</th><th>Room Number</th></tr>
												<form name="appointmentpdf" id="appointmentpdf">
													<?
														$i=0;
														foreach ($appointmentsArray as $row) {
															if (stristr($row['student'], $studentname)) {
																$info = $row['ID'] . ',' . $row['student'] . ',' . $row['homeroomTeacher'] . ',' . $row['teacher'] . ',' . $row['date'] . ',' . $row['time'] . ',' . $row['roomNumber'];
																?><tr><td><input type="checkbox" class="array1" name="info[]" value="<?php echo $info; ?>" /></td><?
													   			echo "<td>".$row['student']."</td>";
										            			echo "<td>".$row['homeroomTeacher']."</td>";
										            			echo "<td>".$row['teacher']."</td>";
										        				echo "<td>".$row['date']."</td>";
										        				echo "<td>".$row['time']."</td>"; 
																echo "<td>".$row['roomNumber']."</td></tr>";
																$i=1;								
															}
														}
														if ($i==0) {
															?>
																<tr>
																	<td colspan="7" align="center">No Upcoming Appointments!</td>
																</tr>
															<?
														}
														else if ($i==1) {
															?>
																<tr><td colspan="7" align="center"><input type="submit" class="btn btn-primary" value="Generate Appointment Forms"/></td></tr>
															<?
														}
													?>
												</form>
											</table>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<form id="deletestudent">
										<input type="hidden" name="studentnumber" value="<?php echo $id; ?>" />
				                		<button type="submit" class="btn btn-danger btn-block" onclick="return confirm('Are you sure you wish to delete this student? This action is not reversible!');">Delete this student</button>
				                	</form>
								</div>
							</div>
						</div>
						<div class="modal fade" id="myModal" role="dialog">
						    <div class="modal-dialog">
						    
						      	<div class="modal-content">
							        <div class="modal-body">
							        		<?
							        			foreach ($newinfoArray as $row) {
							        				if (in_array($row['ID'],$studentmatcher)) {
							        					$separated = explode(":", $row['accommodations']);
							        					?>
								        					<div class="panel panel-blue" style="background:#fff;">
	                                           					<div class="panel-heading">Individual Assessment Book</div>
	                                            				<div class="panel-body pan">
	                                                				<form id="assessmentbook" action="indivassessbook.php">
						                                                <div class="form-body pal">
						                                                    <div class="row">
						                                                        <div class="col-md-12">
						                                                            <div class="form-group">
						                                                                <label for="optionsdisplay" class="control-label">Available Assessments</label>
						                                                                <div class="input">
						                                                                    <table id="optionsdisplay">
														        								<?
														        									$i=0;
														        									foreach ($assessments as $roww) {
														        										if ($i!=0) {
															        										?>
															        											<tr>
															        												<td>
															        													<input type="radio" id="chosenassessment" name="chosenassessment" value="<?php echo $roww; ?>"/> <?php echo str_replace("_"," ",$roww); ?>
															        												</td>
															        											</tr>
															        										<?
														        										}
														        										$i++;
														        									}
														        								?>
										        											</table>
						                                                                </div>
						                                                            </div>
						                                                        </div>
						                                                    </div>

						                                                    <input type="hidden" name="details[student_no]" value="<?php echo $row['ID']; ?>" />

						                                                    <div class="row">
							                                                   	<div class="col-md-4">
						                                                            <div class="form-group">
						                                                                <label for="room" class="control-label">Room</label>
						                                                                <div class="input">
						                                                                    <input type="text" id="room" name="details[room]" />
						                                                                </div>
						                                                            </div>
							                                                    </div>

							                                                    <div class="col-md-4">
							                                                        <div class="form-group">
							                                                            <label for="date" class="control-label">Date</label>
							                                                            <div class="input">
							                                                                <input type="date" id="date" name="details[date]" />
							                                                            </div>
							                                                        </div>
							                                                    </div>

							                                                    <div class="col-md-4">
							                                                        <div class="form-group">
							                                                            <label for="time" class="control-label">Time</label>
							                                                            <div class="input">
							                                                                <input type="time" id="time" name="details[time]" />
							                                                            </div>
							                                                        </div>
							                                                    </div>
							                                                </div>

							                                                <div class="row">
						                                                        <div class="col-md-12">
						                                                            <div class="form-group">
						                                                                <label for="accommodationsdisplay" class="control-label">Available Accommodations</label>
						                                                                <div class="input">
						                                                                    <table id="accommodationsdisplay">
														        								<?
														        									foreach ($separated as $item) {
														        										?>
														        											<tr><td><input type="checkbox" name="details[accommodations][]" value="<?php echo $item; ?>"/> <?php echo $item; ?></td></tr>
														        										<?
														        									}
														        								?>
											        										</table>
						                                                                </div>
						                                                            </div>
						                                                        </div>
						                                                    </div>
						                                                </div>

						                                                <div class="form-actions text-right pal">
						                                                	<div class="row">
						                                                    	<button type="submit" class="btn btn-primary">Submit</button>
						                                                    </div>
						                                                </div>
	                                                				</form>
	                                            				</div>
	                                        				</div>
							        					<?
							        				}
							        			}	
							        		?>
							        	</form>
							        </div>
							        <div class="modal-footer">
							          	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							        </div>
						      	</div>

						    </div>
						</div>
					</body>
				<?
			}
		?>

	<? elseif(null== $user->getUserName()): ?>
	 	<? login(); ?>

	<? else:
		echo "Error";
		endif;
	?>
</html>