<?
	require("database.php");
	foreach ($_POST['assessmentArray'] as $row)	{
		if (isset($row['info'])) {
			if ($query=$pdo->prepare(" UPDATE assessments SET ". $_POST['chosenassessment'] ." = NULL WHERE ". $_POST['chosenassessment'] ." = '".$row['info']."' ")) {
				$query->execute();
			}
			else {
				$error = $query->errorInfo();
				echo 'MySQL Error: ' . $error;
			}
		}
	}
?>