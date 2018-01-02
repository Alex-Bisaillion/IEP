<?
	require($_SERVER['DOCUMENT_ROOT'] . '/iep/database.php');

	if ($query=$pdo->prepare("drop table assessments" )) {
		$query->execute();
	}
	else {
		$error = $query->errorInfo();
		echo 'MySQL Error: ' . $error;
	}

	if ($query=$pdo->prepare("CREATE TABLE assessments (ID int NOT NULL AUTO_INCREMENT,UNIQUE (ID))" )) {
		$query->execute();
	}
	else {
		$error = $query->errorInfo();
		echo 'MySQL Error: ' . $error;
	}
?>