<?
	session_start();
	require('fpdf.php');

	$pdf = new FPDF();
	$pdf->AliasNbPages();

	foreach ($_SESSION["assessmentArray"] as $index => $row) {
		$pdf->AddPage('L','A5');

		$fields = array('student_no','room','date','time','accommodations');
		$arr = array_combine ( $fields, explode(";", $row['info'] ));

		$spaces=str_replace("_"," ",$index);

		$datetime = new DateTime($arr['date']);
		$date = $datetime->format('F d');
		
		$datetime = new DateTime($arr['time']);
		$time = $datetime->format('h:i');

		$pdf->Image('images/wcsslogo.jpg',10,10,20);
		$pdf->SetFont('Arial','B',15);
		$pdf->Cell(80);
		$pdf->Cell(30,10,'West Carleton Secondary School',0,0,'C');
		$pdf->Ln(10);
	    $pdf->Cell(80);
	   	$pdf->Cell(30,10,'Special Education Department',0,0,'C');
	   	$pdf->Ln(20);

	   	$pdf->SetFont('Times','',16);
	   	$pdf->Cell(0,10,'Student: '.$row['name'].'                                 Homeroom Teacher: '.$row['homeroomTeacher'].'',0,1,'C');

		$pdf->Ln(5);
		$pdf->Cell(0,10,'You have an upcoming '.$row['chosenassessment'].'!',0,1,'C');
		$pdf->Ln(5);
		$pdf->Cell(0,10,'Date: '.$date.'    Time: '.$time.'    Location: '.$arr['room'].'',0,1,'C');
		$pdf->Ln(5);
		$pdf->SetFont('Times','',12);
		$pdf->Cell(0,10,'You will have the following accommodations available to you: '.$arr['accommodations'].'',0,1,'C');
		$pdf->Cell(0,10,"***Please get your subject teacher's permission before leaving class***",0,1,'C');
		$pdf->Cell(0,10,"Return to class at: ____________ Teacher's Signature: ____________",0,1,'C');
	}
	$pdf->Output(); 
?>