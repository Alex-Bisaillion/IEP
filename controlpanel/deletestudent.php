<?
	require($_SERVER['DOCUMENT_ROOT'] . '/iep/database.php');

	if ($query=$pdo->prepare("DELETE FROM studentinfo WHERE Student_No='".$_POST['studentnumber']."'" )) {
		$query->execute();
	}
	else {
		$error = $query->errorInfo();
		echo 'MySQL Error: ' . $error;
	}
?>