<?php
date_default_timezone_set('America/Bogota');
require('../../assets/libreria/fpdf/fpdf.php');
include('../../assets/conexion.php');

class PDF extends FPDF
{
    function Header()
    {
        $this->Image('../../assets/img/img_mini.png',20,7,80);

    }
// Pie de página
    function Footer()
    {
        $this->SetDrawColor(89,155,179);
        $this->SetFillColor(255,0,0);
        $this->SetTextColor(0,0,0);
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','',8);
        // Número de página
        $this->Cell(0,7,utf8_decode('Cl. 23, Chinauta, La Serena, Fusagasugá, Cundinamarca - Teléfono: 315 8138346'),0,0,'C');
    }
}



$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->ln(40);

$cod = $_GET['cod'];
$consulta_datos = "SELECT * from pagos inner join usuarios on doc_usu_pagos = ID_Usuario where id_pagos = '$cod'";
$resultado_datos = mysqli_query($con, $consulta_datos);
$mostrar_datos = mysqli_fetch_array($resultado_datos);


$pdf = new PDF('L', 'mm', array(139.7, 215.9));
$pdf->AliasNbPages();
$pdf->AddPage();


$pdf->SetDrawColor(0,0,0);
$pdf->SetFillColor(255,0,0);
$pdf->SetTextColor(0,0,0);
// Arial bold 15
$pdf->SetFont('Arial','B',15);
// Movernos a la derecha
$pdf->Cell(60);
// Título
$gym = "SELECT * FROM gimnasios";
$respuesta = mysqli_query($con, $gym);
$muestra = mysqli_fetch_array($respuesta);
$pdf->Ln(10);
$pdf->Cell(0,0,utf8_decode($muestra['Nom_Gym']),2, 1, 'R', 0);
$pdf->Cell(0,30,utf8_decode('Registro de pago N° ').$cod,0,0,'R');

$pdf->Ln(35);
$pdf->SetFont('Arial','B',10);
$pdf->SetDrawColor(0,0,0);
$pdf->SetFillColor(255,0,0);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(30,5,utf8_decode('Fecha:') ,0, 0, 'I', 0);
$pdf->Cell(30,5, $mostrar_datos['fec_pago'] ,0, 1, 'I', 0);

$pdf->Cell(30,5,'Documento:' ,0, 0, 'I', 0);
$pdf->Cell(30,5, $mostrar_datos['ID_Usuario'] ,0, 1, 'I', 0);

$pdf->Cell(30,5,'Nombres:' ,0, 0, 'I', 0);
$pdf->Cell(30,5,utf8_decode($mostrar_datos['Nom_usu']) ,0, 1, 'I', 0);

$pdf->Cell(30,5,'Valor pagado:' ,0, 0, 'I', 0);
$pdf->Cell(30,5,'$ '.number_format($mostrar_datos['cant_diner']) ,0, 1, 'I', 0);

$pdf->Ln(5);
$pdf->Cell(35,5,'Observaciones:' ,0, 0, 'I', 0);

$pdf->Ln(5);
$pdf->SetFont('Arial','I',10);
$observacion = $mostrar_datos['Observ_pago'];
$token = strtok($observacion,"-");
while($token!=false)
{
    $pdf->Cell(35,5,"* ".$token,0, 1, 'I', 0);
    $token = strtok("-");
}

$pdf->Output();
?>