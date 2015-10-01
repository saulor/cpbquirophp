<?php
	session_start();
	ini_set('display_errors', 0); 
	error_reporting(E_ALL); 
	date_default_timezone_set('America/Sao_Paulo');
	if (!isset($_SESSION["mensagemSe"])) {
		$_SESSION["mensagemSe"] = array();
	}
	DEFINE("PREFIX", "cpq_");
	DEFINE("WWW_ROOT", "http://localhost/~saulor/cpbquirophp");
	//DEFINE("WWW_ROOT", "http://sistema.centropbquiropraxia.com.br");
	DEFINE("DIR_ROOT", dirname(__file__));
	DEFINE("QUANTIDADE_POR_PAGINA", 10);
	DEFINE("SEPARADOR_DIRETORIO", "/");
	DEFINE("DIR_UPLOADS", DIR_ROOT . SEPARADOR_DIRETORIO . 'uploads');
	DEFINE("PATH_UPLOADS", '../uploads');
	require_once 'lib/ClassesLoader.php';
	ClassesLoader::Register();
	require_once 'funcoes.php';
	//require_once 'webtools/PHPWord_0.6.2_Beta/PHPWord.php';
	//require_once 'webtools/PHPExcel_1.7.9/Classes/PHPExcel.php';
	//require_once 'webtools/fpdf17/fpdf.php';
?>