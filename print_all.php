<?php
session_start();


if (isset($_POST['PRINT'])) {
include'dbconnect.php';
date_default_timezone_set("Africa/Nairobi");
$tarehe=date("Y-m-d");

 require("libs/fpdf.php");
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Times','B','10');
$pdf->SetFont('Times','B','9');
$pdf->Cell('0',10,'LIST OF LOAN BENEFICIAL',0,1,'C');
$pdf->SetFont('Times','B','7');
$pdf->Cell('20',7,'First Name',1,0,'C');
$pdf->Cell('20',7,'Last Name',1,0,'C');
$pdf->Cell('20',7,'Phone #',1,0,'C');
$pdf->Cell('20',7,'Status',1,0,'C');
$pdf->Cell('20',7,'Date',1,1,'C');
// $pdf->Cell('20',7,'Time',1,1,'C');
// $pdf->Cell('20',7,'IN',1,0,'C');
// $pdf->Cell('20',7,'OUT',1,1,'C');

$microfinance_id=$_SESSION['microfinance_id'];
$query="SELECT * FROM `customer`, `microfinance`, `loan` WHERE customer.microfinance_id = microfinance.microfinance_id AND loan.microfinance_id=microfinance.microfinance_id AND loan.customer_id = customer.customer_id AND customer.microfinance_id='$microfinance_id'";

   $result = mysqli_query($connection,$query);
  //$result=mysqli_num_rows($query);
  if(mysqli_num_rows($result)>0){

while($row=mysqli_fetch_assoc($result)){
	//CHANGE DURATION FROM 00:00:00 TO EMPTY
  	$pdf->SetFont('Times','','7');
	$pdf->Cell("20","7",$row['first_name'],"1","0","C");
	$pdf->Cell("20","7",$row['last_name'],"1","0","C");
	$pdf->Cell("20","7",$row['phone_number'],"1","0","C");
	$pdf->Cell("20","7",$row['status'],"1","0","C");
	$pdf->Cell("20","7",$row['date'],"1","1","C");
	// $pdf->Cell("20","7",$row['microfinance_name'],"1","1","C");
}
}
date_default_timezone_set("Africa/Nairobi");
$pdf->Cell(0,5,'',0,1,'L');
$pdf->SetFont('Times','I','10');
$pdf->Cell(190,5,'Printed on   '.date('l,d/m/Y').' at '.date('H:ia'),0,1,'R');
$pdf->Cell(0,5,'',0,1,'L');
$pdf->Cell(0,2,'',0,1,'L');
$pdf->Cell(190,5,"Signature..........................................",0,1,'');
$pdf->SetFont('Times','B','10');
$pdf->Cell(180,5,"(Stamp)",0,1,'');
$pdf->Output();

}
 ?>
