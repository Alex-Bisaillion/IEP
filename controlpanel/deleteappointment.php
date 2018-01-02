<?
	require($_SERVER['DOCUMENT_ROOT'] . '/iep/database.php');

	foreach ($_POST['info'] as $row) {
		$separated=explode(",",$row);
		if ($query=$pdo->prepare("DELETE FROM appointments WHERE ID='".$row[0]."'" )) {
			$query->execute();
		}
		else {
			$error = $query->errorInfo();
			echo 'MySQL Error: ' . $error;
		}
	}
?>