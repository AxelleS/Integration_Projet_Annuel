<?php

class MafactureController
{
    public function indexAction($params)
    {
        require('./fpdf/fpdf.php'); 

        $pdf = new FPDF();
        $pdf->AddPage();

        // Logo
        $pdf->Image('img/logo.jpg',10,6,30);
        // Police Arial gras 15
        $pdf->SetFont('Arial','B',20);
        // Décalage à droite
        $pdf->Cell(80);
        // Titre
        $pdf->Cell(40,10,'FACTURE',1,0,'C');
        // Saut de ligne
        $pdf->Ln(30);
        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(10,10,'Nom de la societe');
        $pdf->Ln(7);
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(10,10,'1 rue du test');
        $pdf->Ln(7);
        $pdf->Cell(10,10,'00000 VilleTest');
        $pdf->Ln(15);

        $pdf->SetFont('Arial','B',13);
        $pdf->Cell(10,10,'FACTURER A');
        $pdf->Cell(140);

        $pdf->Cell(10,10,'DATE');
        $pdf->Cell(7);
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(10,10,'00/00/0000');
        $pdf->Ln(7);

        $pdf->SetFont('Arial','',12);
        $pdf->Cell(10,10,'Prenom Nom');
        $pdf->Ln(7);
        $pdf->Cell(10,10,'1 rue du test');
        $pdf->Ln(7);
        $pdf->Cell(10,10,'00000 VilleTest');
        $pdf->Ln(20);

        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(10);
        $pdf->Cell(10,10,'Nb de participants');
        $pdf->Cell(60);
        $pdf->Cell(10,10,'Prix par personne HT');
        $pdf->Cell(60);
        $pdf->Cell(10,10,'Montant HT');
        $pdf->Ln(10);

        $pdf->SetFont('Times','',12);
        $pdf->Cell(25);
        $pdf->Cell(10,10,'5');
        $pdf->Cell(60);
        $pdf->Cell(10,10,'30.00');
        $pdf->Cell(50);
        $pdf->Cell(10,10,'150.00');
        $pdf->Ln(20);

        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(120);
        $pdf->Cell(10,10,'Total HT');
        $pdf->Cell(26);
        $pdf->SetFont('Times','',12);
        $pdf->Cell(10,10,'150.00');
        $pdf->Ln(7);
        $pdf->Cell(120);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(10,10,'TVA');
        $pdf->Cell(26);
        $pdf->SetFont('Times','',12);
        $pdf->Cell(10,10,'20%');
        $pdf->Ln(7);
        $pdf->Cell(120);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(10,10,'Total TTC');
        $pdf->Cell(26);
        $pdf->SetFont('Times','',12);
        $pdf->Cell(10,10,iconv('UTF-8', 'windows-1252', '180.00 €'));
        $pdf->Ln(10);

        $pdf->Output();
    }
}
