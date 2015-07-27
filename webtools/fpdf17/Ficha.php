<?php

class Ficha extends FPDF {
	
	function Formulario ($orientation='P', $unit='mm', $format='A4') {
		parent::FPDF($orientation, $unit, $format);
	}

	function Header() {
		$this->SetTitle("Ficha de Paciente");
		$logo = 'imagens/logo.png';
		$x = 10;
		$y = 5;
		$tamanho = 55;
		$nomeInstituicaoX = 70;
		$nomeInstituicaoY = 10;
		$this->SetFillColor(181, 181, 181); 
		$this->setY(27);
		$this->setX(10);
		$this->Cell(13,270,'',0,0,0,true,'');
		$this->Image($logo,$x,$y,$tamanho);
		$this->SetFont('Helvetica','B',12);
		$this->SetTextColor(252, 102, 0);
		$this->SetY(35);
	}
	
	function Footer() {
		$this->SetY(-15);
		$this->SetFont('Arial','',8);
		$this->SetTextColor(128);
		$this->Cell(0,10,utf8_decode('Centro Paraibano de Quiropraxia'),0,0,'C');
	}	

}


?>