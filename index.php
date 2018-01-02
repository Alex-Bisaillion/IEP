<?
require($_SERVER['DOCUMENT_ROOT'] . '/login/classes/api.php');
require( "database.php");
include("functions.php");
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

		<style>
		.carousel-inner > .item > img,
		.carousel-inner > .item > a > img {
		    width: 100%;
		    margin: auto;
		}
		.carousel-caption{
		    background: rgba(5,0,28,0.55);
		}
		.jumbotron {
		   background: rgba(8,0,42,0.65); 
		}
                /*.panel{ 61,89,100
                background-image: url('images/accounting.jpg');
                background-position: center;
                background-size: cover;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                }*/
                .shadow {
                        background: rgba(0,0,0,0.5);
                }
                .carousel-control.left, .carousel-control.right {
                    background-image: url("images/history.jpg")
                }

		</style>

	</head>

	<? if(null !== $user->getUserName()): ?>
		<body background="images/background.jpg" style="background-size:cover;">
			<? navbar(); ?>
				<div class="container">
					<div class="jumbotron">
						<h1>Welcome to the IEP Database!</h1> 
						<p>Developed by Alex Bisaillion, Alex Vo, Andrej Vrzic, and Dawson Manseau.</p> 
					</div>
        			<div class='row'>
                        <div class="col-md-12">
                            <div class="panel panel-blue">

                            

                                <div class="panel-heading">All Students</div>


                                
                                                                           
                                        

                                
                                

                                <div class="carousel-inner">
                                    <div class="item active">
                                        <img src="images/classroom.jpg" class="img-responsive">
                                        <div class="carousel-caption">
                                            <p>View all students in the database.</p>
                                        </div>
                                    </div>
                                </div>

                                                      
                                        
                                    
                                                        
                                



                                <div class="panel-heading">
                                    <p><a href="allstudents.php" class="btn btn-info btn-block">Enter</a></p>
                                </div>

                            </div>                          
                        </div>
        			</div>

        			<div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-blue">

                            

                                <div class="panel-heading">Initial Setup of Database</div>


                                
                                                                           
                                        

                                
                                

                                <div class="carousel-inner">
                                    <div class="item active">
                                        <img src="images/launch.jpg" class="img-responsive">
                                        <div class="carousel-caption">
                                            <p>Initialize the database for the beginning of the school year.</p>
                                        </div>
                                    </div>
                                </div>

                                                      
                                        
                                    
                                                        
                                



                                <div class="panel-heading">
                                    <p><a href="http://dev.emmell.org/iep/setup.php" class="btn btn-info btn-block">Enter</a></p>
                                </div>

                            </div>                          
                        </div>

                        <div class="col-md-6">
                            <div class="panel panel-blue">

                            

                                <div class="panel-heading">Student Search</div>


                                
                                                                           
                                        

                                
                                

                                <div class="carousel-inner">
                                    <div class="item active">
                                        <img src="images/search.jpg" class="img-responsive">
                                        <div class="carousel-caption">
                                            <p>Search through the database for more comprehensive student information.</p>
                                        </div>
                                    </div>
                                </div>

                                                      
                                        
                                    
                                                        
                                



                                <div class="panel-heading">
                                    <p><a class="btn btn-info btn-block" data-toggle="collapse" data-target="#viewdetails1">Expand</a></p>
                                </div>
                                <div class="panel panel-blue collapse" id="viewdetails1">
                                    <div class="panel-heading">
                                        Student Search
                                    </div>
                                    <div class="panel-body pan">
                                        <form method="post" action="search.php" id="searchform">
                                            <fieldset>
                                                    <div class="form-body pal">
                                                    First Name: <input type="text" name="fname"><br>
                                                    Last Name: <input type="text" name="lname">
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

        				<!--<div class="col-md-4">
        					<p><a class="btn btn-primary btn-block" data-toggle="collapse" data-target="#viewdetails2">Accommodation Search</a></p>

        					<div class="panel panel-blue collapse" id="viewdetails2">
        						<div class="panel-heading">
        							Accommodation Search
        						</div>
        						<div class="panel-body pan">
        							<form method="post" action="accommodations.php" id="searchform">
        								<fieldset>
        									<div class="form-body pal">
        									Accommodation: <input type="text" name="accommodation">
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
        				</div>-->

        				<!--<div class="col-md-3">
        					<p><a class="btn btn-primary btn-block" data-toggle="collapse" data-target="#viewdetails4">Generic Test Planning</a></p>

        					<div class="panel panel-blue collapse" id="viewdetails4">
        						<div class="panel-heading">
        							Generic Test Planning
        						</div>
        						<div class="panel-body pan">
        							<form method="post" action="generictest.php" id="searchform">
        								<fieldset>
        									<div class="form-body pal">
        									Course: <input type="text" name="course">
        									</div>
        									<center>
        										<label class="checkbox-inline"><input type="checkbox" name="semester1" value="semester1">Semester 1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        										<label class="checkbox-inline"><input type="checkbox" name="semester2" value="semester2">Semester 2</label>
        									</center>

        									<div class="form-actions text-center pal">
        										<button type="submit" class="btn btn-primary">
        											Submit
        										</button>
        									</div>
        								</fieldset>
        							</form>
        						</div>
        					</div>
        				</div>-->
        			</div>
        			
        			<div class="row">

        				<div class="col-md-6">
                                                <div class="panel panel-blue">
                                                        <div class="panel-heading">Appointments</div>

                                                        <div class="carousel-inner">
                                                                <div class="item active">
                                                                        <img src="images/clock.jpg" class="img-responsive">
                                                                        <div class="carousel-caption">
                                                                                <p>View/add appointments, and delete curent or past bookings.</p>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <!--<div class="panel-body>">
                                                                    <div class="carousel-inner">
                                                                        <div class="item active">
                                                                        <img src="images/music.jpg" class="img-responsive">
                                                                           <div class="carousel-caption">
                                                                           Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id euismod ipsum, eget sollicitudin risus. Phasellus vitae lorem ut lorem aliquam molestie sit amet ac nibh.
                                                                           </div>
                                                                        </div>
                                                                    </div>
                                                        </div>-->


                                                        <div class="panel-heading">
                                                                <p><a href="http://dev.emmell.org/iep/appointments.php" class="btn btn-info btn-block">Enter</a></p>
                                                        </div>
                                                </div>


        				</div>

        				<!--<div class="col-md-4">
        					<p><a href="eqao.php" class="btn btn-primary btn-block">EQAO Planning</a></p>
        				</div>

        				<div class="col-md-4">
        					<p><a href="osslt.php" class="btn btn-primary btn-block">OSSLT Planning</a></p>
        				</div>-->

        				<div class="col-md-6">
                            <div class="panel panel-blue">

                            

                                <div class="panel-heading">View Upcoming Assessments</div>


                                
                                                                           
                                        

                                
                                

                                <div class="carousel-inner">
                                    <div class="item active">
                                        <img src="images/test.jpg" class="img-responsive">
                                        <div class="carousel-caption">
                                            <p>View upcoming assessments, add a new one or delete any of the previous assessments.</p>
                                        </div>
                                    </div>
                                </div>

                                                      
                                        
                                    
                                                        
                                



                                <div class="panel-heading">
                                    <p><a href="assessments.php" class="btn btn-info btn-block">Enter</a></p>
                                </div>

                            </div>        					
        				</div>
        				<!--<div class="col-md-4">
        					<p><a class="btn btn-primary btn-block" data-toggle="collapse" data-target="#viewassessments">View Upcoming Assessments</a></p>

        					<div class="panel panel-blue collapse" id="viewassessments">
        						<div class="panel-heading">
        							Upcoming Assessments
        						</div>
        						<div class="panel-body pan">
        							<form method="post" action="viewassessment.php" id="searchform">
        								<fieldset>
        									<div class="form-body pal">
	        									<?
	        										foreach ($assessments as $roww) {
		        										?>
		        											<tr>
		        												<td>
		        													<input type="radio" id="chosenassessment" name="chosenassessment" value="<?php echo $roww; ?>"/> <?php echo str_replace("_"," ",$roww); ?>
		        												</td>
		        											</tr>
		        										<?
		        									}
		        								?>
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
        				</div>-->
        			</div>

                    <div class='row'>
                        <div class="col-md-12">
                            <div class="panel panel-blue">

                            

                                <div class="panel-heading">Control Panel</div>


                                
                                                                           
                                        

                                
                                

                                <div class="carousel-inner">
                                    <div class="item active">
                                        <img src="images/controlpanel.jpg" class="img-responsive">
                                        <div class="carousel-caption">
                                            <p>Manage the website and add new students.</p>
                                        </div>
                                    </div>
                                </div>

                                                      
                                        
                                    
                                                        
                                



                                <div class="panel-heading">
                                    <p><a href="controlpanel.php" class="btn btn-info btn-block">Enter</a></p>
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