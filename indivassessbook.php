<?
	require("database.php");
	$information=$_POST['details'];
	$information['accommodations']=implode(", ",$information['accommodations']);
	if ($query=$pdo->prepare("INSERT INTO assessments (" . $_POST['chosenassessment'] . ") VALUES (' " . implode(';',$information) . " ')" )) {
		$query->execute();
	}
	else {
		$error = $query->errorInfo();
		echo 'MySQL Error: ' . $error;
	}
?>