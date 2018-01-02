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

	    <script>
	    $(document).ready(function(){
			    $("#newassessment").submit(function(){
					$.ajax({
					    type: 'POST',
					    url: 'assessmentcol.php',
					    data: $('#newassessment').serialize(),
					    success: function(response)
					    {
        					noty({
								layout: 'topCenter',
								type: 'success',
								text: 'The assessment has been successfully added!',
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

		<body background="background.jpg" style="background-size:cover;">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-blue" style="background:#FFF">
							<div class="panel-heading">Book a New Assessment</div>
							<div class="panel-body">
								
								<form id="newassessment" action="assessmentcol.php">
									<div class="form-body pal">

			        				Assessment Name: 
			        				<div class="input">
						            <input type="text" id="assessment" name="assessmentname" />
									
									<button name="Button" type="submit" class="btn btn-primary">Submit</button>
                        			<p><a href="assessments.php" class="btn btn-primary">Return</a></p>                    
									</div>
									
									<?

									if (isset($_POST['Button'])){
									echo ("Assessment addded!");
									}
									
									?>	
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