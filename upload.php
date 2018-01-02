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
												<?
													$target_file = basename($_FILES["fileToUpload"]["name"]);
													$uploadOk = 1;
													$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
													// Check if image file is a actual image or fake image

													// Check if file already exists
													if (file_exists($target_file)) {
														?><div class="alert alert-danger"><strong>Sorry, file already exists.</strong></div><?
													    $uploadOk = 0;
													}
													// Check file size
													if ($_FILES["fileToUpload"]["size"] > 500000) {
													    ?><div class="alert alert-danger"><strong>Sorry, your file is too large.</strong></div><?
													    $uploadOk = 0;
													}
													// Allow certain file formats
													if($imageFileType != "csv" ) {
														?><div class="alert alert-danger"><strong>Sorry, only CSV files are allowed.</strong></div><?
													    $uploadOk = 0;
													}
													// Check if $uploadOk is set to 0 by an error
													if ($uploadOk == 0) {
														?><div class="alert alert-danger"><strong>Sorry, your file was not uploaded.</strong></div><?
													// if everything is ok, try to upload file
													}
													else {
													    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
													        ?><div class="alert alert-success"><strong><?echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";?></strong></div><?
												        	$rows = array_map('str_getcsv', file(basename( $_FILES["fileToUpload"]["name"])));
												        	$header = array_shift($rows);
												        	$csv = array();
												        	$dump = array();
												        	foreach ($rows as $row) {
												        	  	$csv[] = array_combine($header, $row);
												        	}
												        	foreach ($csv as $row) {
												        		if (isset($dump[$row['Student_No']])) {
												        			$dump[$row['Student_No']]['E']=$row['A'];
												        			$dump[$row['Student_No']]['F']=$row['B'];
												        			$dump[$row['Student_No']]['G']=$row['C'];
												        			$dump[$row['Student_No']]['H']=$row['D'];
												        		}
												        		elseif (!isset($dump[$row['Student_No']])) {
												        			$dump[$row['Student_No']]=$row;
												        		}
												        	}
												        	foreach ($dump as $row) {
												        		unset($dump[$row['Student_No']]['Semester']);
												        	}
												        	foreach ($dump as $row) {
												        		$setup=array();
												        		$setup=$row;
												        		foreach($row as $k => $v ) {
												        			if (gettype($k)=='integer') {
												            			$column[] = ''.$k.' int';
												            		}
												            		elseif (gettype($k)=='string') {
												            			$column[] = ''.$k. ' varchar(255)';
												            		}
												        		}
												        		if ($query=$pdo->prepare("DROP TABLE studentinfo")) {
												        	   		$query->execute();
												        		}

												        		if ($query=$pdo->prepare("CREATE TABLE studentinfo ( " . implode(', ',$column) . " ) ")) {
												        	   		$query->execute();
												        		}

												        		break;
												        	}

												        	foreach ($dump as $row) {
												        		$prep = array();

												        		foreach($row as $k => $v ) {
												            		$prep[':'.$k] = $v;
												        		}
												        		if ($query=$pdo->prepare("INSERT INTO studentinfo ( " . implode(', ',array_keys($row)) . ") VALUES (" . implode(', ',array_keys($prep)) . ")")) {
												        	        $query->execute($prep);
												        		}
												        	}
												        	?><div class="alert alert-success"><strong>Database successfuly filled!</strong></div><?
													    }
													    else {
													    	?><div class="alert alert-danger"><strong>Sorry, there was an error uploading your file.</strong></div><?
													    }
													}

												?>
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