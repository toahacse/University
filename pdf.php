<?php
$db=mysqli_connect("localhost","root","","universitym");
if(isset($_POST['ok'])) {
    $studentRegNo = $_POST['studentRegNo'];
    $studentName = $_POST['studentName'];
    $email = $_POST['email'];
    $dpt = $_POST['department'];
    $date = date("d-m-y");

    $count = "SELECT * FROM saveResult WHERE studentRegNo='$studentRegNo'";

    require('fpdf/fpdf.php');
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont("Arial", "B", 16);
    $pdf->SetFillColor(235, 236, 236);
    $pdf->Cell(0, 10, "University Course And Result Managment", 1, 1, 'C',true);
    $pdf->Ln(8);
    $pdf->SetFont("Arial", "", 14);
    $pdf->Cell(15, 10, "Date:", 0, 0, 'L');
    $pdf->Cell(150, 10, "$date", 0, 1, 'L');
    $pdf->Ln(3);
    $pdf->SetFont("Arial", "I", 14);
    $pdf->SetTextColor(255, 0, 0);
    $pdf->Cell(90, 10, "Name :", 1, 0, 'C');
    $pdf->Cell(100, 10, "$studentName", 1, 1, 'C');
    $pdf->Cell(90, 10, "Reg :", 1, 0, 'C');
    $pdf->Cell(100, 10, "$studentRegNo", 1, 1, 'C');
    $pdf->Cell(90, 10, "Email :", 1, 0, 'C');
    $pdf->Cell(100, 10, "$email", 1, 1, 'C');
    $pdf->Cell(90, 10, "Department :", 1, 0, 'C');
    $pdf->Cell(100, 10, "$dpt", 1, 1, 'C');
    $pdf->Ln(10);
    $pdf->Cell(150, 10, "Result:", 0, 1, 'L');
    $pdf->Ln(2);
    $pdf->SetTextColor(0, 0, 0);
    $width_cell = array(140, 50);
    $pdf->SetFont("Arial", "B", 14);
    $pdf->SetFillColor(193, 229, 252);
    $pdf->Cell($width_cell[0], 10, 'Course Name', 1, 0, 'C', true);
    $pdf->Cell($width_cell[1], 10, 'Grade', 1, 1, 'C', true);
    $pdf->SetFont("Arial", "B", 12);
    $pdf->SetFillColor(235, 236, 236);
    $fill = false;
    foreach ($db->query($count) as $row) {
        $pdf->Cell($width_cell[0], 10, $row['selectCourse'], 1, 0, 'C', $fill);
        $pdf->Cell($width_cell[1], 10, $row['grade'], 1, 1, 'C', $fill);
        $fill = !$fill;
    }

    $pdf->Output();
}
    ?>