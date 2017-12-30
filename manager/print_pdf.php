
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();}
require('fpdf.php');
include('connect.php');
class PDF extends FPDF
{
// Page header
function Header()
{

   
}


// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
$rest_id=$_POST['rest_id'];
$pdf = new PDF();
$no=5;
$pdf->AliasNbPages();
$pdf->AddPage();
$sql=mysqli_query($conn,"SELECT * FROM floorplan WHERE rest_id='$rest_id'");
	while($row=mysqli_fetch_array($sql)){	
// Instanciation of inherited class
$pdf->Image('../QRCODE/'.$row['table_qrcode'],0,$no);
$pdf->SetFont('Times','',10);
$pdf->Cell(0,30,'                           Table Number : '. $row['table_no'],150,$no);
$no=$no+30;
}


$pdf->Output();
?>