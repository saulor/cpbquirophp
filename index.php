<?php
require_once 'config.php';
ini_set('display_errors', 1); 
error_reporting(E_ALL); 
require_once 'lib/ClassesLoader.php';
ClassesLoader::Register();
require_once 'funcoes.php';
require_once 'webtools/PHPWord_0.6.2_Beta/PHPWord.php';
require_once 'webtools/PHPExcel_1.7.9/Classes/PHPExcel.php';
require_once 'webtools/fpdf17/fpdf.php';

$modulo = isset($_GET['modulo']) ? ucwords($_GET['modulo']) : NULL;
$acao = isset($_GET['acao']) ? $_GET['acao'] : NULL;

try {
	$application = new Application();
	$application->dispatch($modulo, $acao);
}
catch (Exception $e) {
	//echo $e->getMessage();
	setMensagem("error", $e->getMessage());
	header("Location: ?modulo=erro");
}

?>