﻿<?php
require_once("../tcpdf/tcpdf.php");
require_once("../php/conectar.php");

$obj_pdf=new TCPDF('L',PDF_UNIT,PDF_PAGE_FORMAT,true,'UTF-8',false);  
$obj_pdf->SetCreator(PDF_CREATOR);  
$obj_pdf->SetTitle("Gerando arquivo PDF com dados do MySQL - biblioteca TCPDF php");  
$obj_pdf->SetHeaderData('','110','BOM SOM' );  
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));  
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA,'',PDF_FONT_SIZE_DATA));  
$obj_pdf->SetDefaultMonospacedFont('helvetica');  
$obj_pdf->SetHeaderMargin('15'); 
$obj_pdf->SetFooterMargin('30');  
$obj_pdf->SetMargins(PDF_MARGIN_LEFT,'40',PDF_MARGIN_RIGHT);  
$obj_pdf->setPrintHeader(true);  
$obj_pdf->setPrintFooter(true);  
$obj_pdf->SetAutoPageBreak(TRUE,10);  
$obj_pdf->SetFont('dejavusans', '', 12, '', true); 
$obj_pdf->AddPage();  


$obj_pdf->Image('../img/nota.jpg', 15, 10, 50, 13, '', '', '', true, 200, '', false, false, 1, false, false, false);
$txt="INSTRUMENTOS CADASTRADOS";
$cod="Código";
$type="Tipo";
$mark="Marca";
$description="Descrição";
$price="Valor";

$obj_pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

$obj_pdf->Cell(263, 15,$txt, 1, 1, 'C', 0, '', 0);
//Cabeçalho
$obj_pdf->MultiCell(18, 5,''.$cod, 1, 'C', 1, 0, '', '', true);
$obj_pdf->MultiCell(60, 5,''.$type, 1, 'C', 1, 0, '', '', true);
$obj_pdf->MultiCell(60, 5,''.$mark, 1, 'C', 1, 0, '', '', true);
$obj_pdf->MultiCell(100, 5,''.$description, 1, 'C', 1, 0, '', '', true);
$obj_pdf->MultiCell(25, 5,''.$price, 1, 'C', 1, 1, '', '', true);

$sql="SELECT * FROM cadastro";
$result=mysqli_query($conexao,$sql);

//dados
while ($linha = mysqli_fetch_row($result))
{
$linha[4] = str_replace(".",",",$linha[4]);
$obj_pdf->writeHTMLCell(18, 0, '', '', $linha[0], 1, 0, 0, true, '', true);
$obj_pdf->writeHTMLCell(60, 0, '', '', $linha[1], 1, 0, 0, true, '', true);
$obj_pdf->writeHTMLCell(60, 0, '', '', $linha[2], 1, 0, 0, true, '', true);
$obj_pdf->writeHTMLCell(100, 0, '', '', $linha[3], 1, 0, 0, true, '', true);
$obj_pdf->writeHTMLCell(25, 0, '', '', $linha[4], 1, 1, 0, true, '', true);
}

ob_start ();
$obj_pdf->Output('../php/relatorio.pdf','I');