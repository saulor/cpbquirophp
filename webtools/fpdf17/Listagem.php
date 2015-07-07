<?php

class Listagem extends FPDF {
	
	private $header;
	
	function Listagem ($orientation='P', $unit='mm', $format='A4', $header = array()) {
		parent::FPDF($orientation, $unit, $format);
		$this->header = $header;
	}

	function Header() {
		$this->SetMargins(10,10,10);
		$this->SetFont('Helvetica','B',14);
		$this->Image('imagens/logo-impressao-pdf.gif',10,10,33);
		$this->Cell(30,30,utf8_decode('IEFAP - Instituto de Ensino, Formação e Aperfeiçoamento em Pós-Graduação'));
		$this->SetY(28);
		$this->SetFontSize(10);
		$this->MultiCell(0,5,utf8_decode('Listagem de '.$this->header["de"]),0,1);
		$this->SetY($this->getY() + 5);
		$this->SetFontSize(9);
	}
	
	function Footer() {
		$this->SetY(-15);
		$this->SetFont('Arial','I',8);
		$this->SetTextColor(128);
		$this->Cell(0,10,'Pagina '.$this->PageNo(),0,0,'C');
	}

}


?>