<?php
require_once('fpdf186\fpdf.php');

// Get the name, father name, and total years from the form
$name = isset($_POST['name']) ? $_POST['name'] : '';
$fname = isset($_POST['fname']) ? $_POST['fname'] : '';
$totalYears = isset($_POST['total_years']) ? $_POST['total_years'] : '';

// Create a new FPDF instance
class PDF extends FPDF
{
    function Header()
    {
        // Add two logos on each side
        $this->Image('logo2.png', 27, 11, 15); // Move to the left
        $this->Image('logo.png', 150, 9, 52); // Move to the right
    
        // Add college name at the center
        $this->SetFont('Arial', 'B', 16);
        $this->Cell(0, 10, 'Sri Ramakrishna Engineering College', 0, 1, 'C');
        
        // Add address below college name in a smaller font size
        $this->SetFont('Arial', '', 10);
        $this->Cell(0, 5, 'VattamalaiPalayam Rd, NGGO Colony,', 0, 1, 'C');
        $this->Cell(0, 5, 'Vattamalaipalayam, Coimbatore, Tamil Nadu 641022', 0, 1, 'C');
        // Move the Y position for content separation
        $this->Ln(20);
    }

    function Footer()
    {
        // Add a footer with a date
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Generated on ' . date('Y-m-d H:i:s'), 0, 0, 'C');
    }
}

$pdf = new PDF();

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('Arial', '', 12);

// Add content to the PDF
$text = "This is to certify that Shri / Kumari / Smt $name, Son / Daughter of Shri $fname, is known to me for the last $totalYears Year(s). To the best of my knowledge, he / she bears a good moral character. This certificate is being given to him / her for the purpose of ..........................................";

$pdf->MultiCell(0, 10, $text, 0, 'J');
$pdf->Ln(13); // Add line space

// Add the signature image
$signatureImage = 'signature.png'; // Replace with the actual path to your signature image
$pdf->Image($signatureImage, $pdf->GetX(), $pdf->GetY(), 50); // Adjust the width (50) as needed

$pdf->Ln(20); // Add more line space after the signature

// Add the signature text and authority name aligned to the right
$pdf->Cell(0, 10, "(Signature with date)", 0, 1, 'L'); // Align to the right

// Output the PDF to the browser or save to a file
$pdf->Output("character_certificate_$name.pdf", 'D'); // 'D' forces download, you can use 'I' to display in the browser

exit;
?>
