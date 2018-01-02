<?
require($_SERVER['DOCUMENT_ROOT'] . '/login/classes/api.php');
require("functions.php");
require("fpdf.php");
unset($assessments[0]);
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
		    width: 70%;
		    margin: auto;
		}
		.carousel-caption{
		    background: rgba(0,0,0,0.5);
		}
		</style>
        <script>
            $(document).ready(function(){
                $("#newassessment").submit(function(){
                    $.ajax({
                        type: 'POST',
                        url: 'assessmentcol.php',
                        data: $('#newassessment').serialize(),
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
                        <p><a class="btn btn-primary btn-block" data-toggle="collapse" data-target="#viewdetails1">Booking Assessments</a></p>

                        <div class="panel panel-blue collapse" id="viewdetails1">
                            <div class="panel-heading">
                                Book a new assessment
                            </div>
                            <div class="panel-body pan">
                               <form id="newassessment" action="assessmentcol.php">
                                    <div class="form-body pal">

                                    Assessment Name: 
                                    <div class="input">
                                    <input type="text" id="assessment" name="assessmentname" />
                                    
                                    <button name="Button" type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form> 
                            </div>
                        </div>
                    </div>
                </div>
				<div class="row">
    				<div class="col-md-12">
    					<div id="lightbox" class="carousel slide" data-ride="carousel">
    					    <ol class="carousel-indicators">
    				            <?
    					            $i = 1;
    					            foreach ($assessments as $row) {
    					                $ol_class = ($i == 1) ? 'active' : '';
    					            	?>
    					            		<li data-target="#lightbox" data-slide-to="<?php echo $i;?>" class="<?php echo $ol_class; ?>"></li>
    					            	<?
    					            	$i++;
    					            }
    				            ?>
    					    </ol>
    					    <div class="carousel-inner">
    				            <?
    					            $i = 1;
    					            foreach ($assessments as $row) {
    						            $item_class = ($i == 1) ? 'item active' : 'item';
    						            ?>              
    							            <div class="<?php echo $item_class; ?>"> 
    							            	<?
    								            	if (stristr($row, 'BAF3M')) {
    								                	?><img src="images/accounting.jpg" ><?
    								            	}
    								            	elseif (stristr($row, 'biology')) {
    								            		?><img src="images/biology.jpg" ><?
    								            	}
    								            	elseif (stristr($row, 'chemistry') || stristr($row, 'SCH3U') || stristr($row, 'SCH4U')) {
    								            		?><img src="images/chemistry.jpg" ><?
    								            	}
    								            	elseif (stristr($row, 'computer science')) {
    								            		?><img src="images/computerscience.jpg" ><?
    								            	}
    								            	elseif (stristr($row, 'ENG2D') || stristr($row, 'ENG3U') || stristr($row, 'ENG1D') || stristr($row, 'ENG4U')) {
    								            		?><img src="images/english.jpg" ><?
    								            	}
    								            	elseif (stristr($row, 'geography') || stristr($row, 'CGC1D')) {
    								            		?><img src="images/geography.jpg" ><?
    								            	}
    								            	elseif (stristr($row, 'gym')) {
    								            		?><img src="images/gym.jpg" ><?
    								            	}
    								            	elseif (stristr($row, 'history')) {
    								            		?><img src="images/history.jpg" ><?
    								            	}
    								            	elseif (stristr($row, 'MHF4U') || stristr($row, 'MPM2D') || stristr($row, 'functions') || stristr($row, 'calculus') || stristr($row, 'vectors')) {
    								                	?><img src="images/math.jpg" ><?
    								            	}
    								            	elseif (stristr($row, 'music')) {
    								            		?><img src="images/music.jpg" ><?
    								            	}
    								            	elseif (stristr($row, 'physics') || stristr($row, 'SPH3U') || stristr($row, 'SPH4U')) {
    								            		?><img src="images/physics.jpg" ><?
    								            	}
    								            	else {
    								            		?><img src="images/generic.jpg" ><?
    								            	}
    							            	?>
    							                <div class="carousel-caption">
    							                	<h3><? echo str_replace("_"," ",$row); ?></h3>
    							                	<form action="viewassessment.php" method="post">
    							                		<button class="btn btn-primary" type="submit" id="chosenassessment" name="chosenassessment" value="<?php echo $row; ?>" class="btn-link">View Full Details</button>
    							                	</form>
    								            </div>
    							            </div>
    						            <? 
    						            $i++;
    						       	}
    					       	?>
    					    </div>
    					    <a class="left carousel-control" href="#lightbox" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
    					    <a class="right carousel-control" href="#lightbox" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
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