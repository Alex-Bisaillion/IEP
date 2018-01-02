<?
	require("database.php");
	foreach ($_POST['details'] as $row)	{
		if (isset($row['check'])) {
			if (isset($row['room']) && isset($row['date']) && isset($row['time']) && isset($row['room'])) {
				$string = $row['id'] . ';' . $row['room'] . ';' . $row['date'] . ';' . $row['time'] . ';' . implode(", ",$row['accommodations']);
				if ($query=$pdo->prepare("INSERT INTO assessments (" . $_POST['chosenassessment'] . ") VALUES (' " . $string . " ')" )) {
					$query->execute();
				}
				else {
					$error = $query->errorInfo();
					echo 'MySQL Error: ' . $error;
				}
			}
		}
	}
?>