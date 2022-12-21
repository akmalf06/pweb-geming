<?php
// memanggil library FPDF
require(__DIR__.'/../asset/vendor/fpdf/fpdf.php');

$pdf = new FPDF('l','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);

$pdf->Cell(190,7,'SMAN 2 Jeruk',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'Pendaftar Penerimaan Peserta Didik Baru',0,1,'C');

$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(50,6,'Nama',1,0);
$pdf->Cell(30,6,'Jenis Kelamin',1,0);
$pdf->Cell(25,6,'Tanggal Lahir',1,0);
$pdf->Cell(30,6,'Tempat Lahir',1,0);
$pdf->Cell(40,6,'Alamat',1,0);
$pdf->Cell(40,6,'NISN',1,0);
$pdf->Cell(50,6,'Asal Sekolah',1,0);
$pdf->Cell(10,6,'',0,1);

$pdf->SetFont('Arial','',10);

include 'connection.php';
$query = "SELECT * FROM registrations";
$sql = $db1->query($query);
while($row = $sql->fetch_assoc()){
    $pdf->Cell(50,20,$row['name'],1,0);
    $pdf->Cell(30,20,$row['gender'],1,0);
    $pdf->Cell(25,20,$row['birth_date'],1,0);
    $pdf->Cell(30,20,$row['birth_location'],1,0);
    $pdf->Cell(40,20,$row['address'],1,0);
    $pdf->Cell(40,20,$row['student_number'],1,0);
    $pdf->Cell(50,20,$row['junior_school'],1,0);
    $pdf->Cell(10,20,'',0,1);
}
$sql->close();
$pdf->Output();
?>