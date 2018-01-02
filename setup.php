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

	</head>

	<? if(null !== $user->getUserName()): ?>
			<?
				navbar();
				?>
					<body background="images/background.jpg" style="background-size:cover;">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<div class="panel panel-blue" style="background:#FFF">
										<div class="panel-heading">Uploading to the Database</div>
										<div class="panel-body">
											<ul class="list-group">
												<form action="upload.php" method="post" enctype="multipart/form-data">
												    <li class="list-group-item">To add information to the database, please upload a CSV file filled in with the necessary information.</li>
												    <li class="list-group-item"><a href="template.csv">Click here for a template CSV file.</a></li>
												    <li class="list-group-item"><input type="file" name="fileToUpload" id="fileToUpload"></li>
												    <li class="list-group-item"><input type="submit" class="btn btn-primary" value="Upload File" name="submit"></li>
												</form>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</body>
				<?
			?>

	<? elseif(null== $user->getUserName()): ?>
	 	<? login(); ?>

	<? else:
		echo "Error";
		endif;
	?>
</html>