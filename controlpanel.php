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
        <script type="text/javascript" src="js/noty/packaged/jquery.noty.packaged.min.js"></script>

		<link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700">
	    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
	    <link type="text/css" rel="stylesheet" href="KAdmin-Dark/styles/jquery-ui-1.10.4.custom.min.css">

	    <script>
		    $(document).ready(function(){
			    $("#wipeappointments").submit(function(){
					$.ajax({
					    type: 'POST',
					    url: 'controlpanel/wipeappointments.php',
					    success: function(response)
					    {
        					noty({
        					    layout: 'topCenter',
        					    type: 'success',
        					    text: 'All appointments have been successfully deleted!',
        					    dismissQueue: true, 
        					    animation: {
        					        open: {height: 'toggle'},
        					        close: {height: 'toggle'},
        					        easing: 'swing',
        					        speed: 500 
        					        },
        					    timeout: 0
        					    });
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
			    $("#wipeassessments").submit(function(){
					$.ajax({
					    type: 'POST',
					    url: 'controlpanel/wipeassessments.php',
					    success: function(response)
					    {
        					noty({
        					    layout: 'topCenter',
        					    type: 'success',
        					    text: 'All assessments have been successfully deleted!',
        					    dismissQueue: true, 
        					    animation: {
        					        open: {height: 'toggle'},
        					        close: {height: 'toggle'},
        					        easing: 'swing',
        					        speed: 500 
        					        },
        					    timeout: 0
        					    });
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
			    $("#wipestudents").submit(function(){
					$.ajax({
					    type: 'POST',
					    url: 'controlpanel/wipestudents.php',
					    success: function(response)
					    {
        					noty({
        					    layout: 'topCenter',
        					    type: 'success',
        					    text: 'All assessments have been successfully deleted!',
        					    dismissQueue: true, 
        					    animation: {
        					        open: {height: 'toggle'},
        					        close: {height: 'toggle'},
        					        easing: 'swing',
        					        speed: 500 
        					        },
        					    timeout: 0
        					    });
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
			    $("#newstudent").submit(function(){
					$.ajax({
					    type: 'POST',
					    url: 'controlpanel/addnewstudent.php',
					    data: $('#newstudent').serialize(),
					    success: function(response)
					    {
        					noty({
        					    layout: 'topCenter',
        					    type: 'success',
        					    text: 'The student has been successfully added to the database!',
        					    dismissQueue: true, 
        					    animation: {
        					        open: {height: 'toggle'},
        					        close: {height: 'toggle'},
        					        easing: 'swing',
        					        speed: 500 
        					        },
        					    timeout: 0
        					    });
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
		?>
		<body background="images/background.jpg" style="background-size:cover;">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<form id="wipeappointments">
	                		<button type="submit" class="btn btn-danger btn-block" onclick="return confirm('Are you sure you wish to wipe all appointments? This action is not reversible!');">Wipe all appointments</button>
	                	</form>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<form id="wipeassessments">
	                		<button type="submit" class="btn btn-danger btn-block" onclick="return confirm('Are you sure you wish to wipe all assessments? This action is not reversible!');">Wipe all assessments</button>
	                	</form>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<form id="wipestudents">
							<button type="submit" class="btn btn-danger btn-block" onclick="return confirm('Are you sure you wish to wipe all students from the database? This action is not reversible!');">Wipe all students</button>
						</form>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<a class="btn btn-primary btn-block" data-toggle="collapse" data-target="#viewdetails1">Add a new student to the database</a><br>
						<div class="panel panel-blue collapse" id="viewdetails1">
						    <div class="panel-heading">
						        Add a new student to the database
						    </div>
						    <div class="panel-body pan">
						        <form method="post" action="controlpanel/addnewstudent.php" id="newstudent">
						            <fieldset>
						                <div class="form-body pal">
						                	<table class="table table-hover">
						                		<tr><th colspan="5">Personal Info</th></tr>
						                		<tr>
								                    <td>Name: <input type="text" name="newstudent[name]" placeholder="Lastname, Firstname"></td>
								                    <td>Address: <input type="mailingaddress" name="newstudent[mailingaddress]"></td>
								                    <td>Date of Birth: <input type="dob" name="newstudent[dob]" placeholder="d/m/yyyy"></td>
								                </tr>
						                    </table>

						                    <table class="table table-hover">
						                		<tr><th colspan="5">School Info</th></tr>
						                		<tr>
								                    <td>Student Number: <input type="text" name="newstudent[studentnumber]" placeholder="123456789"></td>
							                    	<td>Grade: <input type="text" name="newstudent[grade]"></td>
							                    	<td>IPRC: <input type="text" name="newstudent[iprc]"></td>
							                    	<td>SEA: <input type="text" name="newstudent[sea]"></td>
								                </tr>
						                    </table>

						                    <table class="table table-hover">
						                    	<tr><th colspan="5">Course Info</th></tr>
						                    	<tr>
						                    		<td>S1 P1 - Room: <input type="text" name="newstudent[s1p1][room]"></td>
						                    		<td>S1 P1 - Course Code: <input type="text" name="newstudent[s1p1][code]"></td>
						                    		<td>S1 P1 - Teacher: <input type="text" name="newstudent[s1p1][teacher]"></td>
						                    	</tr>
						                    		<td>S1 P2 - Room: <input type="text" name="newstudent[s1p2][room]"></td>
						                    		<td>S1 P2 - Course Code: <input type="text" name="newstudent[s1p2][code]"></td>
						                    		<td>S1 P2 - Teacher: <input type="text" name="newstudent[s1p2][teacher]"></td>
						                    	<tr>
						                    		<td>S1 P3 - Room: <input type="text" name="newstudent[s1p3][room]"></td>
						                    		<td>S1 P3 - Course Code: <input type="text" name="newstudent[s1p3][code]"></td>
						                    		<td>S1 P3 - Teacher: <input type="text" name="newstudent[s1p3][teacher]"></td>
						                    	</tr>
						                    	<tr>
						                    		<td>S1 P4 - Room: <input type="text" name="newstudent[s1p4][room]"></td>
						                    		<td>S1 P4 - Course Code: <input type="text" name="newstudent[s1p4][code]"></td>
						                    		<td>S1 P4 - Teacher: <input type="text" name="newstudent[s1p4][teacher]"></td>
						                    	</tr>
						                    	<tr>
						                    		<td>S2 P1 - Room: <input type="text" name="newstudent[s2p1][room]"></td>
						                    		<td>S2 P1 - Course Code: <input type="text" name="newstudent[s2p1][code]"></td>
						                    		<td>S2 P1 - Teacher: <input type="text" name="newstudent[s2p1][teacher]"></td>
						                    	</tr>
						                    	<tr>
						                    		<td>S2 P2 - Room: <input type="text" name="newstudent[s2p2][room]"></td>
						                    		<td>S2 P2 - Course Code: <input type="text" name="newstudent[s2p2][code]"></td>
						                    		<td>S2 P2 - Teacher: <input type="text" name="newstudent[s2p2][teacher]"></td>
						                    	</tr>
						                    	<tr>
						                    		<td>S2 P3 - Room: <input type="text" name="newstudent[s2p3][room]"></td>
						                    		<td>S2 P3 - Course Code: <input type="text" name="newstudent[s2p3][code]"></td>
						                    		<td>S2 P3 - Teacher: <input type="text" name="newstudent[s2p3][teacher]"></td>
						                    	</tr>
						                    	<tr>
						                    		<td>S2 P4 - Room: <input type="text" name="newstudent[s2p4][room]"></td>
						                    		<td>S2 P4 - Course Code: <input type="text" name="newstudent[s2p4][code]"></td>
						                    		<td>S2 P4 - Teacher: <input type="text" name="newstudent[s2p4][teacher]"></td>
						                    	</tr>
						                    </table>
						                    <table class="table table-hover">
						                    	<tr colspan="5"><th>Accommodations</th></tr>
												<tr>
													<td><div class="checkbox"><input type="checkbox" name="newstudent[accommodation][]" value="Alternative Settings">Alternative Settings</div></td>
													<td><div class="checkbox"><input type="checkbox" name="newstudent[accommodation][]" value="Extra Time">Extra Time</div></td>
													<td><div class="checkbox"><input type="checkbox" name="newstudent[accommodation][]" value="Strategic Seating">Strategic Seating</div></td>
													<td><div class="checkbox"><input type="checkbox" name="newstudent[accommodation][]" value="Quiet Setting">Quiet Setting</div></td>
													<td><div class="checkbox"><input type="checkbox" name="newstudent[accommodation][]" value="Chunking">Chunking</div></td>
												</tr>
												<tr>
													<td><div class="checkbox"><input type="checkbox" name="newstudent[accommodation][]" value="Prompting">Prompting</div></td>
													<td><div class="checkbox"><input type="checkbox" name="newstudent[accommodation][]" value="Alternative Settings">Alternative Settings</div></td>
													<td><div class="checkbox"><input type="checkbox" name="newstudent[accommodation][]" value="Repetition">Repetition</div></td>
													<td colspan="2"><div class="checkbox"><input type="checkbox" name="newstudent[accommodation][]" value="Assistive Technology">Assistive Technology</div></td>
												</tr>
												<tr>
													<td><div class="checkbox"><input type="checkbox" name="newstudent[accommodation][]" value="Computer Options">Computer Options</div></td>
													<td><div class="checkbox"><input type="checkbox" name="newstudent[accommodation][]" value="Graphic Organizers">Graphic Organizers</div></td>
													<td><div class="checkbox"><input type="checkbox" name="newstudent[accommodation][]" value="Anxiety Reducers">Anxiety Reducers</div></td>
													<td colspan="2"><div class="checkbox"><input type="checkbox" name="newstudent[accommodation][]" value="Organizational Coaching">Organizational Coaching</div></td>
												</tr>
												<tr>
													<td><div class="checkbox"><input type="checkbox" name="newstudent[accommodation][]" value="Time Management Aids">Time Management Aids</div></td>
													<td><div class="checkbox"><input type="checkbox" name="newstudent[accommodation][]" value="Visual Supports">Visual Supports</div></td>
													<td><div class="checkbox"><input type="checkbox" name="newstudent[accommodation][]" value="Simplified Language">Simplified Language</div></td>
													<td colspan="2"><div class="checkbox"><input type="checkbox" name="newstudent[accommodation][]" value="Reduction in Tasks">Reduction in Tasks</div></td>
												</tr>
												<tr>
													<td><div class="checkbox"><input type="checkbox" name="newstudent[accommodation][]" value="Frequent Breaks">Frequent Breaks</div></td>
													<td><div class="checkbox"><input type="checkbox" name="newstudent[accommodation][]" value="Memory Aids">Memory Aids</div></td>
													<td><div class="checkbox"><input type="checkbox" name="newstudent[accommodation][]" value="Use of Headphones">Use of Headphones</div></td>
													<td colspan="2"><div class="checkbox"><input type="checkbox" name="newstudent[accommodation][]" value="Manipulatives">Manipulatives</div></td>
												</tr>
											</table>
											<table class="table table-hover">
						                    	<tr colspan="6"><th>Exceptionalities</th></tr>
												<tr>
													<td><div class="checkbox"><input type="checkbox" name="newstudent[exceptionality][]" value="ADHD">ADHD</div></td>
													<td><div class="checkbox"><input type="checkbox" name="newstudent[exceptionality][]" value="Anxiety">Anxiety</div></td>
													<td><div class="checkbox"><input type="checkbox" name="newstudent[exceptionality][]" value="ASD">ASD</div></td>
													<td><div class="checkbox"><input type="checkbox" name="newstudent[exceptionality][]" value="Behaviour">Behaviour</div></td>
													<td><div class="checkbox"><input type="checkbox" name="newstudent[exceptionality][]" value="BLV">BLV</div></td>
													<td><div class="checkbox"><input type="checkbox" name="newstudent[exceptionality][]" value="DHH">DHH</div></td>
												</tr>
												<tr>
													<td><div class="checkbox"><input type="checkbox" name="newstudent[exceptionality][]" value="DD">DD</div></td>
													<td><div class="checkbox"><input type="checkbox" name="newstudent[exceptionality][]" value="ELL">ELL</div></td>
													<td><div class="checkbox"><input type="checkbox" name="newstudent[exceptionality][]" value="Gifted">Gifted</div></td>
													<td><div class="checkbox"><input type="checkbox" name="newstudent[exceptionality][]" value="Language Impairment">Language Impairment</div></td>
													<td colspan="2"><div class="checkbox"><input type="checkbox" name="newstudent[exceptionality][]" value="LD">LD</div></td>
												</tr>
												<tr>
													<td><div class="checkbox"><input type="checkbox" name="newstudent[exceptionality][]" value="Medical">Medical</div></td>
													<td><div class="checkbox"><input type="checkbox" name="newstudent[exceptionality][]" value="MID">MID</div></td>
													<td><div class="checkbox"><input type="checkbox" name="newstudent[exceptionality][]" value="Physical Disability">Physical Disability</div></td>
													<td colspan="3"><div class="checkbox"><input type="checkbox" name="newstudent[exceptionality][]" value="Speech Impairment">Speech Impairment</div></td>
												</tr>
											</table>
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
			</div>
		</body>

	<? elseif(null== $user->getUserName()): ?>
	 	<? login(); ?>

	<? else:
		echo "Error";
		endif;
	?>
</html>