<?
require($_SERVER['DOCUMENT_ROOT'] . '/login/classes/api.php');
include( "database.php");
require( "functions.php");
require("fpdf.php");
$apptable="appointments";

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
	   
	    <script>
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
			    $("#delete").click(function(){
					$.ajax({
					    type: 'POST',
					    url: 'controlpanel/deleteappointment.php',
					    data: $('#appointmentpdf').serialize(),
					    success: function(response)
					    {
        					$(location).attr('href', 'appointments.php')
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
	    </script>
	</head>

	<? if(null !== $user->getUserName()): ?>
		<? navbar(); ?>

	<body background="images/background.jpg" style="background-size:cover;">
	<div class="container">
		<div class"row">
			<div class="col-md-16">	

				<div class="panel panel-blue" style="background:#FFF">

					<div class="panel-heading">Add A New Appointment</div>
						<form name="appointments" action="" method="post">
							<center>
    							<input type="date" name="date">
    							<input type="time" name="time">
	   							<input type="text" name="student" placeholder="Student">
	  							<select name="roomNumber" id="sel1">
	  								<option>Room 121</option>
	  							    <option>Room 107C</option>
	  							</select>
	  							<select name="teacher" id="sel1">
	  								<option>Ms. Spear</option>
	  							    <option>Mrs. Hare</option>
	  							</select>
	  							<input type="submit" class="btn btn-primary" value="Add Appointment">
	   						</center>
						</form>
				</div>						

				<?
					if (isset($_POST['date'])) {
						foreach ($newinfoArray as $row) {
							$date = date('m/d', time());
							$fields = array('lname','fname');
							$arr1 = array_combine ( $fields, explode(", ",$row['student']) );
							$studentname = $arr1['fname'] . ' ' . $arr1['lname'];
							$i=0;
							if (stristr($studentname, $_POST['student'])) {
								$i=0;
								if ($date < strtotime("01/31") && $date > strtotime("08/31")) {
									$separated = explode(":", $row['s1p1']);
									foreach ($separated as $item) {
										if ($i==2) {
											$result = explode('/',$item);
											$fields = array('lname','fname');
											$arr = array_combine ( $fields, explode(",",$result[0]) );
											$teachername = $arr['fname'] . ' ' . $arr['lname'];
											$homeroomTeacher=$teachername;
											break;
										}
										$i++;
									}
								}
								else {
									$i=0;
									$separated = explode(":", $row['s2p1']);
									foreach ($separated as $item) {
										if ($i==2) {
											$fields = array('lname','fname');
											$arr = array_combine ( $fields, explode(",",$item) );
											$teachername = $arr['fname'] . ' ' . $arr['lname'];
											$homeroomTeacher=$teachername;
											break;
										}
										$i++;
									}
								} 
							}
						}
						if (!isset($homeroomTeacher)) {
							$homeroomTeacher="N/A";
						}

						if($query=$pdo->prepare("INSERT INTO $apptable (date, time, student, roomNumber, homeroomTeacher, teacher) VALUES (:Date,:Time,:Student,:Room,:HomeroomTeacher,:Teacher);"))	{
	          	      		$queryArray = array('Date' => $_POST['date'], 'Time' => $_POST['time'],'Student' => $_POST['student'],'Room' => $_POST['roomNumber'],'HomeroomTeacher' => $homeroomTeacher,'Teacher' => $_POST['teacher']);
	              	  		$query->execute($queryArray);
	                		addToLog("add",$pdo->lastInsertId(),$_POST['date'], $_POST['time'], $_POST['student'],$_POST['roomNumber'],$homeroomTeacher,$_POST['teacher']);
	       		 		}

	       		 		else {
	               			$error = $query->errorInfo();
	                		echo 'MySQL Error: ' . $error[2];
	       		 		}

					}

					else if (isset($_POST['toDelete'])) {

						addToLog("del",$_POST['toDelete']);

						if($query=$pdo->prepare("DELETE FROM $apptable WHERE ID=:id;")) {
	                		$queryArray = array('id' => $_POST['toDelete'] );
	                		$query->execute($queryArray);
	        			}

	        			else {
	                		$error = $query->errorInfo();
	                		echo 'MySQL Error: ' . $error[2];
	       				}
					
					}
				?>

				<div class="panel panel-blue" style="background:#FFF">
					<div class="panel-heading">Appointments</div>			
						<? 
							if($query=$pdo->prepare("SELECT * FROM $apptable")) { 
								$queryArray = array(
									//	'person_ID' => "1"
	   							);  

								$query->execute($queryArray);

								?>
									<table class='table table-hover-color'>
										<form id="appointmentpdf">
											<tr><th><input type="checkbox" name="multiselect1" id="multiselect1" value="" /></th><th>Student</th><th>Homeroom Teacher</th><th>Teacher</th><th>Date</th><th>Time</th><th>Room Number</th><th></th></tr>
											<?
												while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
													$info = $result['ID'] . ',' . $result['student'] . ',' . $result['homeroomTeacher'] . ',' . $result['teacher'] . ',' . $result['date'] . ',' . $result['time'] . ',' . $result['roomNumber'];
													?><tr><td><input type="checkbox" class="array1" name="info[]" value="<?php echo $info; ?>" /></td><?
										   			echo "<td>".$result['student']."</td>";
							            			echo "<td>".$result['homeroomTeacher']."</td>";
							            			echo "<td>".$result['teacher']."</td>";
							        				echo "<td>".$result['date']."</td>";
							        				echo "<td>".$result['time']."</td>"; 
													echo "<td>".$result['roomNumber']."</td>";
													echo "</tr>\n";												
												}	
											?>

											<tr><td colspan="8" align="center"><input type="submit" class="btn btn-primary" value="Generate Appointment Forms"/></td></tr>
										</form>
										<tr><td colspan="8" align="center"><button type="button" id="delete" class="btn btn-danger">Delete Selected Appointments</button></td></tr>
									</table>
								<?
							}

							else {
								$error = $query->errorInfo();
								echo 'MySQL Error: ' . $error;
							}

						?>	

				</div>
			</div>
		</div>
	</div>			
	</body>

	<? elseif(null== $user->getUserName()): ?>
	 	<? login(); ?>

	<? else:
		echo "Error";
		endif;
	?>

</html>

