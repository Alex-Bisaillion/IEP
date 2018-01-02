<?
	require("database.php");
	if ($query=$pdo->prepare(" ALTER TABLE assessments DROP ". $_POST['chosenassessment'] ." ")) {
		$query->execute();
	}
	else {
		$error = $query->errorInfo();
		echo 'MySQL Error: ' . $error;
	}
?>