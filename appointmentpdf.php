<?
	session_start();
	require('fpdf.php');

	$pdf = new FPDF();
	$pdf->AliasNbPages();

	foreach ($_SESSION['info'] as $row) {
		$pdf->AddPage('L','A5');
		$separated=explode(",",$row);

		$datetime = new DateTime($separated[4]);
		$date = $datetime->format('F d');

		$datetime = new DateTime($separated[5]);
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
		$pdf->Cell(0,10,'Student: '.$separated[1].'                                 Homeroom Teacher: '.$separated[2].'',0,1,'C');
		$pdf->Ln(10);
		$pdf->Cell(0,10,'Please come to an appointment with: '.$separated[3].'',0,1,'C');
		$pdf->Ln(10);
		$pdf->Cell(0,10,'Date: '.$date.'                                            Time: '.$time.'',0,1,'C');
		$pdf->Cell(0,10,''.$separated[6].'',0,1,'C');
		$pdf->Cell(0,10,"***Please get your subject teacher's permission before leaving class***",0,1,'C');
		$pdf->Cell(0,10,"Return to class at: ____________ Teacher's Signature: ____________",0,1,'C');
	}
	$pdf->Output(); 
?>