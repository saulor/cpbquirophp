<?php
require_once 'config.php';
require_once 'lib/ClassesLoader.php';
ClassesLoader::Register();
require_once 'funcoes.php';
require_once 'webtools/fpdf17/fpdf.php';

$modulo = isset($_GET['modulo']) ? ucwords($_GET['modulo']) : NULL;
$acao = isset($_GET['acao']) ? $_GET['acao'] : NULL;

try {
	$application = new Application();
	$application->dispatch($modulo, $acao);
}
catch (Exception $e) {
	setMensagem("error", $e->getMessage());
	header("Location: ?modulo=erro");
}

?>