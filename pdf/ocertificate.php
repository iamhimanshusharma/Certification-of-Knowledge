<?php

require_once('../session.php');
include('../db.php');

if(!isset($_SESSION['ssid']))
{
    header('location:../login');
}

$student_id=$_SESSION['ssid'];
$course=$_REQUEST['certificate-id'];
$query="SELECT * FROM `organized_passed_students` WHERE `signup_id`='$student_id' AND `unique_id`='$course'";
$run=mysqli_query($con,$query);

if(mysqli_num_rows($run)>0)
{
    $data=mysqli_fetch_assoc($run);
$name = $data['student_name'];
$unique_id = $data['unique_id'];
$course=$data['exam_course'];
$date=strtotime($data['passed_date']);
$printed_data=date('d/m/Y',$date);

require('fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    $width=$this->w;
    // Logo
    $this->Image('certificate.jpg',0,0,297,210,'jpg');    
    // Arial bold 15
    $this->SetY(0);
    // Move to the right
    $this->Cell(1);
    
}

}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage(["Landscape","A4",0]);
$pdf->AddFont('bell','','bell.php');
    $pdf->AddFont('gothic','','gothic.php');
    $pdf->AddFont('product','','product.php');

    $pdf->SetFont('bell','',20);
$pdf->SetTextColor(0,0,0);
$pdf->Text(28,70,$printed_data);

$pdf->SetFont('gothic','',60);
$pdf->SetTextColor(0,176,240);
$pdf->Text(26,100,$name);

$pdf->SetFont('gothic','',28);
$pdf->SetTextColor(34,42,53);
$pdf->Text(27,132,$course);

$pdf->SetFont('product','',14);
$pdf->SetTextColor(31,78,121);
$pdf->Text(77,200,$unique_id);

$pdf->Output('studentdetails.pdf','I');
}
else
{
    echo "not found!";
}
?>