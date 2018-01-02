<?
	require($_SERVER['DOCUMENT_ROOT'] . '/iep/database.php');
	print_r($_POST['newstudent']);

	$accommodations = implode(":", $_POST['newstudent']['accommodation']);
	$exceptionalities = implode(":", $_POST['newstudent']['accommodation']);
	$s1p1 = implode(":", $_POST['newstudent']['s1p1']);
	$s1p2 = implode(":", $_POST['newstudent']['s1p2']);
	$s1p3 = implode(":", $_POST['newstudent']['s1p3']);
	$s1p4 = implode(":", $_POST['newstudent']['s1p4']);
	$s2p1 = implode(":", $_POST['newstudent']['s2p1']);
	$s2p2 = implode(":", $_POST['newstudent']['s2p2']);
	$s2p3 = implode(":", $_POST['newstudent']['s2p3']);
	$s2p4 = implode(":", $_POST['newstudent']['s2p4']);

	if ($query=$pdo->prepare("INSERT INTO studentinfo (Student,Student_No,Date_of_Birth,Mailing_Address,Grade,A,B,C,D,E,F,G,H,Accommodations,Exceptionalities,IPRC,SEA) VALUES ('".$_POST['newstudent']['name']."','".$_POST['newstudent']['studentnumber']."','".$_POST['newstudent']['dob']."','".$_POST['newstudent']['mailingaddress']."','".$_POST['newstudent']['grade']."','".$s1p1."','".$s1p2."','".$s1p3."','".$s1p4."','".$s2p1."','".$s2p2."','".$s2p3."','".$s2p4."','".$accommodations."','".$exceptionalities."','".$_POST['newstudent']['iprc']."','".$_POST['newstudent']['sea']."')")) {
        $query->execute();
	}
?>