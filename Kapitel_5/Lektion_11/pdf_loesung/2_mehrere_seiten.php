<?php

require __DIR__ . '/fpdf/fpdf.php';

class PDF extends FPDF
{
    public function Header()
    {
        $this->Image('logo.png', 10, 6, 40);
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(80);
        $this->Cell(50, 10, 'Rheinwerk Verlag', 1, 0, 'C');
        $this->Ln(20);
    }

    public function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Times', 'I', 8);
        $this->Cell(0, 10, 'Seite ' . $this->PageNo() . ' von {nb}', 0, 0, 'C');
    }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', '', 12);

for ($i = 1; $i <= 40; $i++) {
    $pdf->Cell(0, 10, 'Ausgabe der Zeile ' . $i, 0, 1);
}

$pdf->Output();