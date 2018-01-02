<?
	require("database.php");
	$spaces=explode(' ',$_POST['assessmentname']);
	$underscores=implode('_',$spaces);
	$newCol = ''.$underscores. ' varchar(255)';
	if ($query=$pdo->prepare("ALTER TABLE assessments ADD ( " . $newCol . ")")) {
		$query->execute();
	}
	else {
		$error = $query->errorInfo();
		echo 'MySQL Error: ' . $error;
	}
?>