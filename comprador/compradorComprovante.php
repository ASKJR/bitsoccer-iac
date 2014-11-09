<?php
require("../db/connection.php");
require("../db/crud.php");
require("../function/data.php");
require("../function/validation.php");
require("../function/mensagens.php");
require_once("../function/data.php");
require("../fpdf17/fpdf.php");

	$fill = geraComprovante($_SESSION["idComprador"]);
	//var_dump($fill);
	date_default_timezone_set('Brazil/East');
	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',15);
	$pdf->Cell( 34, 11, $pdf->Image('../img/logo.png', $pdf->GetX(), $pdf->GetY(), 33.78), 1, 0, 'L', false );
	$pdf->Cell(150,11,'Comprovante do jogo sorteado',1,1,'C');
	//$pdf->Image(,10,6,30);
	$pdf->SetFont('Arial','B',10);
	
	$pdf->Cell(184,8,'Emitido em:'.date(" H:i:s - d/M/Y"),1,1,'L');	
	
	$pdf->Ln(15);
	$pdf->Cell(184,8,'Dados do sorteado:',1,1,'C');	
	
	$pdf->Cell(23,8,'Nome:',1,0,'L');
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(161,8,$fill['nome'],1,1,'L');
    
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(23,8,'CPF:',1,0,'L');
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(161,8,$fill['cpf'],1,1,'L');
	
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(23,8,'Nascimento:',1,0,'L');
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(161,8,UserDate($fill['nascimento']),1,1,'L');
	
	
	$pdf->SetFont('Arial','B',10);
	$pdf->Ln(15);
	$pdf->Cell(184,8,utf8_decode('Informações do jogo:'),1,1,'C');	
	
	$pdf->Cell(23,8,'Jogo:',1,0,'L');
	
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(161,8,$fill['selecao1'].' X '.$fill['selecao2'],1,1,'L');
	
	
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(23,8,'Local:',1,0,'L');
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(161,8,$fill['local'],1,1,'L');
	
	
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(23,8,'Data:',1,0,'L');
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(161,8,UserDate($fill['data']),1,1,'L');
	
	
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(23,8,utf8_decode('Horário:'),1,0,'L');
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(161,8,TimeUser($fill['horario']),1,1,'L');
	
	
	$pdf->Output();
?>
