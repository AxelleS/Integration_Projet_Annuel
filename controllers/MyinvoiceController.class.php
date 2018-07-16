<?php

class MyInvoiceController
{
    public function indexAction($params)
    {
        $id_time_slot = $params['URL'][0];

        //Va chercher toutes les infos de la résa
        $time_slot = new Time_slot();
        $time_slot->setId($id_time_slot);
        $response_timeslot = $time_slot->select('id');
        $donnees_timeslot = $response_timeslot->fetch();

        $homepage = new Homepage();
        $homepage->setId(1);
        $response_homepage = $homepage->select('id');
        $donnees_homepage = $response_homepage->fetch();

        $user = new User();
        $user->setId($donnees_timeslot['id_user']);
        $response_user = $user->select('id');
        $donnees_user = $response_user->fetch();

        //Reformate la date 'Y-m-d' en 'd/m/Y'
        $dateExploded = explode('-',$donnees_timeslot['date_bill']);
        $donnees_timeslot['date_bill'] = $dateExploded[2].'/'.$dateExploded[1].'/'.$dateExploded[0];

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
        $pdf->Cell(10,10, $donnees_homepage['name_company']);
        $pdf->Ln(7);
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(10,10, $donnees_homepage['address_company']);
        $pdf->Ln(7);
        $pdf->Cell(10,10, $donnees_homepage['zipcode_company'].' '.$donnees_homepage['city_company']);
        $pdf->Ln(15);

        $pdf->SetFont('Arial','B',13);
        $pdf->Cell(10,10,'FACTURER A');
        $pdf->Cell(140);

        $pdf->Cell(10,10,'DATE');
        $pdf->Cell(7);
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(10,10, $donnees_timeslot['date_bill']);
        $pdf->Ln(7);

        $pdf->SetFont('Arial','',12);
        $pdf->Cell(10,10, $donnees_user['firstname'].' '.$donnees_user['lastname']);
        $pdf->Ln(7);
        $pdf->Cell(10,10, $donnees_user['address']);
        $pdf->Ln(7);
        $pdf->Cell(10,10, $donnees_user['zipcode'].' '.$donnees_user['city']);
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
        $pdf->Cell(10,10, $donnees_timeslot['number_player']);
        $pdf->Cell(60);
        $pdf->Cell(10,10,$donnees_timeslot['total_price']/$donnees_timeslot['number_player']);
        $pdf->Cell(50);
        $pdf->Cell(10,10,$donnees_timeslot['total_price']);
        $pdf->Ln(20);

        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(120);
        $pdf->Cell(10,10,'Total HT');
        $pdf->Cell(26);
        $pdf->SetFont('Times','',12);
        $pdf->Cell(10,10, $donnees_timeslot['total_price']);
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
        $pdf->Cell(10,10,iconv('UTF-8', 'windows-1252', $donnees_timeslot['total_price'] + ($donnees_timeslot['total_price'] * 0.20).'€'));
        $pdf->Ln(10);

        $pdf->Output();

    }
}
