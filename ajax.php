<?php
	
	require_once("config.php");
	
	$hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
	$resposta = array();
	$timestamp = $_GET["timestamp"];
	$semana = $_GET['semana'];
	
	if ($semana == 'anterior') {
		$primeiroDiaTimestamp = strtotime(date('Ymd', $timestamp) . " -7 days");
		$ultimoDiaTimestamp = strtotime(date('Ymd', $primeiroDiaTimestamp) . " +6 days");
	}
	else {
		$primeiroDiaTimestamp = strtotime(date('Ymd', $timestamp) . " +1 days");
		$ultimoDiaTimestamp = strtotime(date('Ymd', $primeiroDiaTimestamp) . " +6 days");
	}
	
	$resposta["hoje"] = configuraPeriodo(date("D d/m", $hoje));
	$resposta["timestampDown"] = $primeiroDiaTimestamp;
	$resposta["timestampUp"] = $ultimoDiaTimestamp;
	
	$periodo = date("d M Y", $primeiroDiaTimestamp);
	$periodo .= " - ";
	$periodo .= date("d M Y", $ultimoDiaTimestamp);
	
	$resposta["periodo"] = configuraPeriodo($periodo);
	
	$primeiroDia = date("d", $primeiroDiaTimestamp);
	$month = date("m", $primeiroDiaTimestamp);
	$ultimoDia = date("d", $ultimoDiaTimestamp);
	
	for ($i=0; $i<7; $i++) {
		$mktime = mktime(0, 0, 0, $month, $primeiroDia+$i, date("Y"));
		$resposta["dias"][] = configuraPeriodo(date("D d/m", $mktime));
	}
	
	echo json_encode($resposta);
	
?>