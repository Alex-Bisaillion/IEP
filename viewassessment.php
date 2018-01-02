<?
	require($_SERVER['DOCUMENT_ROOT'] . '/login/classes/api.php');
	require("functions.php");
	require("fpdf.php");
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
			$(document).ready(function(){
			    $("#bulkassessmentpdf").submit(function(){
					$.ajax({
					    type: 'POST',
					    url: 'assessmentsession.php',
					    data: $('#bulkassessmentpdf').serialize(),
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
			    $("#bulkassessmentpdf2").submit(function(){
					$.ajax({
					    type: 'POST',
					    url: 'assessmentsession.php',
					    data: $('#bulkassessmentpdf2').serialize(),
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
			/*$(document).ready(function(){
			    $("#report").submit(function(){
					$.ajax({
					    type: 'POST',
					    url: 'reportingassessment.php',
					    data: $('#report').serialize(),
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
			});*/
			$(document).ready(function(){
			    $("#delete").click(function(){
					$.ajax({
					    type: 'POST',
					    url: 'deleteassessment.php',
					    data: $('#bulkassessmentpdf').serialize(),
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
			$(document).ready(function(){
			    $("#deleteassess").submit(function(){
			        $.ajax({
			            type: 'POST',
			            url: 'deletefullassessment.php',
			            data: $('#deleteassess').serialize(),
			            success: function(response)
			            {
			                $(location).attr('href', 'assessments.php')
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

			if (isset($_POST['chosenassessment'])) {
				$_SESSION['chosenassessment']=$_POST['chosenassessment'];
				$filename = ''.$_POST['chosenassessment'].'.csv';
				$file = fopen($filename,"w");

				$fields = array('Student #','Room','Date','Time','Accommodations');
				fputcsv($file,$fields);

				foreach ($newassessments as $index => $row)  {
					if ($index==$_POST['chosenassessment']) {
						foreach ($row as $student) {
							if (isset($student)) {
								fputcsv($file,explode(';',$student));
							}
						}
			  		}
				}

				fclose($file);
				?>
					<body background="images/background.jpg" style="background-size:cover;">
						<div class="container">
							<div class="row">
			    				<div class="col-md-12">
			    					<p><a class="btn btn-primary btn-block" data-toggle="collapse" data-target="#viewdetails6">Bulk Add Students</a></p>

			    					<div class="panel panel-blue collapse" id="viewdetails6">
			    						<div class="panel-heading">Bulk Add Students to <? echo str_replace("_"," ",$_POST['chosenassessment']); ?></div>
			    						<div class="panel-body pan">
			    							<form method="post" action="viewassessbook.php" id="searchform">
			    								<fieldset>
			    									<div class="form-body pal">
			    										Course: <input type="text" name="course">
			    										<input type="radio" name="semester" value="semester1">Semester 1
			    										<input type="radio" name="semester" value="semester2">Semester 2
			    										<input type="hidden" name="chosenassessment" value="<?php echo $_POST['chosenassessment']; ?>" />
			    									</div>

			    									<div class="form-actions text-center pal">
			    										<button type="submit" class="btn btn-primary">
			    											Submit
			    										</button>
			    									</div>
			    								</fieldset>
			    							</form>
			    						</div>
			    					</div>
			    				</div>	
							</div>
							<div class="row">
								<div class="col-md-12">
									<a class="btn btn-primary btn-block" href="<?=$filename ?>">Generate Report</a><br>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<form id="deleteassess">
										<input type="hidden" name="chosenassessment" value="<?php echo $_POST['chosenassessment']; ?>" />
				                		<button class="btn btn-danger btn-block" type="submit">Delete Assessment</button>
				                	</form>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="panel panel-blue" style="background:#FFF">
										<div class="panel-heading" align="center">Students Scheduled for <? echo str_replace("_"," ",$_POST['chosenassessment']); ?></div>
											<table class="table table-hover-color">
											<tr><th><input type="checkbox" name="multiselect" id="multiselect" value="" /></th><th>Student</th><th>Room</th><th>Accommodations</th><th>Date</th><th>Time</th></tr>
												<form name="bulkassessmentpdf" id="bulkassessmentpdf">
													<?
														foreach ($newassessments as $index => $row) {
														   	if ($index==$_POST['chosenassessment']) {
														   		foreach ($row as $student) {
														   			if (!empty($student)) {
																   		$fields = array('student_no','room','date','time','accommodations');
																   		$arr = array_combine ( $fields, explode(";", $student) );
																   		foreach ($newinfoArray as $row) {
														   					if ($row['ID']==$arr['student_no']) {
														   						$studentname=$row['student'];
														   						$date = date('m/d', time());
														   						if ($date < strtotime("01/31") && $date > strtotime("08/31")) {
														   							$separated = explode(":", $row['s1p1']);
														   							$i=0;
														   							foreach ($separated as $item) {
														   								if ($i==0 || $i==1) {
														   									$i++;
														   								}
														   								elseif ($i==2) {
														   									$result = explode(',',$item);
														   									$fields = array('lname','fname');
														   									$arr2 = array_combine ( $fields, $result );
														   									$teachername = $arr2['fname'] . ' ' . $arr2['lname'];
														   									break;
														   								}
														   							}
														   						}
														   						else {
														   							$separated = explode(":", $row['s2p1']);
														   							$i=0;
														   							foreach ($separated as $item) {
														   								if ($i==0 || $i==1) {
														   									$i++;
														   								}
														   								elseif ($i==2) {
														   									$result = explode(',',$item);
														   									$fields = array('lname','fname');
														   									$arr2 = array_combine ( $fields, $result );
														   									$teachername = $arr2['fname'] . ' ' . $arr2['lname'];
														   									break;
														   								}
														   							}
														   						}
														   					}
														   				}
														   				$fields = array('lname','fname');
														   				$arr1 = array_combine ( $fields, explode(", ",$studentname) );
														   				$studentname = $arr1['fname'] . ' ' . $arr1['lname'];
														   				?>
														   					<tr><td>
														   						<input type="checkbox" class="array" name="assessmentArray[<?=$arr['student_no'];?>][info]" value="<?php echo $student; ?>" />
														   					</td>
														   				<?
														   				echo "<td>".$studentname."</td>";
																   		echo "<td>".$arr['room']."</td>";
																   		$separated=explode(", ", $arr['accommodations']);
																   		echo "<td>";
																   		foreach ($separated as $item) {
																   			echo"<li>$item</li>";
																   		}
																   		echo "</td>";
																   		echo "<td>".$arr['date']."</td>";
																   		echo "<td>".$arr['time']."</td>";
																   		?>
																   			<input type="hidden" class="array" name="assessmentArray[<?=$arr['student_no'];?>][homeroomTeacher]" value="<?php echo $teachername; ?>" />
																   			<input type="hidden" class="array" name="assessmentArray[<?=$arr['student_no'];?>][name]" value="<?php echo $studentname; ?>" />
																   			<input type="hidden" class="array" name="assessmentArray[<?=$arr['student_no'];?>][chosenassessment]" value="<?php echo str_replace("_"," ",$_POST['chosenassessment']); ?>" />

																   		<?
																   		echo"</tr>";
														   			}
															   	}
															}
														}		
													?>
													<tr><td colspan="3" align="center"><input type="submit" class="btn btn-primary" value="Generate Forms for Selected Students"/></td>
												</form>
												<td colspan="3" align="center"><button type="button" id="delete" class="btn btn-danger">Delete Selected Assessments</button></td></tr>
											</table>
									</div>
								</div>
							</div>
						</div>
					</body>
				<?
			}
			else {
				$filename = ''.$_SESSION['chosenassessment'].'.csv';
				$file = fopen($filename,"w");

				$fields = array('Student #','Room','Date','Time','Accommodations');
				fputcsv($file,$fields);

				foreach ($newassessments as $index => $row)  {
					if ($index==$_SESSION['chosenassessment']) {
						foreach ($row as $student) {
							if (isset($student)) {
								fputcsv($file,explode(';',$student));
							}
						}
			  		}
				}

				fclose($file);
				?>
					<body background="images/background.jpg" style="background-size:cover;">
						<div class="container">
							<div class="row">
			    				<div class="col-md-12">
			    					<p><a class="btn btn-primary btn-block" data-toggle="collapse" data-target="#viewdetails6">Bulk Add Students</a></p>

			    					<div class="panel panel-blue collapse" id="viewdetails6">
			    						<div class="panel-heading">Bulk Add Students to <? echo str_replace("_"," ",$_SESSION['chosenassessment']); ?></div>
			    						<div class="panel-body pan">
			    							<form method="post" action="viewassessbook.php" id="searchform">
			    								<fieldset>
			    									<div class="form-body pal">
			    										Course: <input type="text" name="course">
			    										<input type="radio" name="semester" value="semester1">Semester 1
			    										<input type="radio" name="semester" value="semester2">Semester 2
			    										<input type="hidden" name="chosenassessment" value="<?php echo $_SESSION['chosenassessment']; ?>" />
			    									</div>

			    									<div class="form-actions text-center pal">
			    										<button type="submit" class="btn btn-primary">
			    											Submit
			    										</button>
			    									</div>
			    								</fieldset>
			    							</form>
			    						</div>
			    					</div>
			    				</div>	
							</div>
							<div class="row">
								<div class="col-md-12">
									<a class="btn btn-primary btn-block" href="<?=$filename ?>">Generate Report</a><br>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<form id="deleteassess">
										<input type="hidden" name="chosenassessment" value="<?php echo $_SESSION['chosenassessment']; ?>" />
				                		<button class="btn btn-danger btn-block" type="submit">Delete Assessment</button>
				                	</form>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="panel panel-blue" style="background:#FFF">
										<div class="panel-heading" align="center">Students Scheduled for <? echo str_replace("_"," ",$_SESSION['chosenassessment']); ?></div>
											<table class="table table-hover-color">
											<tr><th><input type="checkbox" name="multiselect" id="multiselect" value="" /></th><th>Student</th><th>Room</th><th>Accommodations</th><th>Date</th><th>Time</th></tr>
												<form name="bulkassessmentpdf" id="bulkassessmentpdf2">
													<?
														foreach ($newassessments as $index => $row) {
														   	if ($index==$_SESSION['chosenassessment']) {
														   		foreach ($row as $student) {
														   			if (!empty($student)) {
																   		$fields = array('student_no','room','date','time','accommodations');
																   		$arr = array_combine ( $fields, explode(";", $student) );
																   		foreach ($newinfoArray as $row) {
														   					if ($row['ID']==$arr['student_no']) {
														   						$studentname=$row['student'];
														   					}
														   				}
														   				?>
														   					<input type="hidden" class="array" name="studentname" value="<?php echo $studentname; ?>" />
														   					<tr><td>
														   						<input type="checkbox" class="array" name="assessmentArray[<?=$arr['student_no'];?>][info]" value="<?php echo $student; ?>" />
														   					</td>
														   				<?
														   				echo "<td>".$studentname."</td>";
																   		echo "<td>".$arr['room']."</td>";
																   		$separated=explode(", ", $arr['accommodations']);
																   		echo "<td>";
																   		foreach ($separated as $item) {
																   			echo"<li>$item</li>";
																   		}
																   		echo "</td>";
																   		echo "<td>".$arr['date']."</td>";
																   		echo "<td>".$arr['time']."</td>";
																   		?>
																   			<input type="hidden" class="array" name="assessmentArray[<?=$arr['student_no'];?>][name]" value="<?php echo $studentname; ?>" />
																   			<input type="hidden" name="chosenassessment" value="<?php echo $_SESSION['chosenassessment']; ?>" />

																   		<?
																   		echo"</tr>";
														   			}
															   	}
															}
														}		
													?>
													<tr><td colspan="3" align="center"><input type="submit" class="btn btn-primary" value="Generate Forms for Selected Students"/></td>
												</form>
												<td colspan="3" align="center"><button type="button" id="delete" class="btn btn-danger">Delete Selected Assessments</button></td></tr>
											</table>
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