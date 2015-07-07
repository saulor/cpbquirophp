<?php

	header("Access-Control-Allow-Origin: *");
	require_once("../../config.php");
	$conexao = new Conexao();
	
	$compromissos = array();
	$dao = new DAOGenerico();
	$mes = $_POST["mes"];
	$ano = $_POST["ano"];
	$fisioterapeuta = $_POST["fisioterapeuta"];
	
	$prevData = date('Y-m-d', mktime(0, 0, 0, $mes-1, 1, $ano));
	$nextData = date('Y-m-d', mktime(0, 0, 0, $mes+1, 1, $ano));
	
	$where = array(
		"mes" => (int) $mes,
		"ano" => (int) $ano
	);
	
	if (!empty($fisioterapeuta)) {
		$where["agenda_fisioterapeutas.fisioterapeuta"] = $fisioterapeuta;
	}
	
	$objetos = $dao->findAll($conexao->getConexao(), "agenda", array(
			"dados" => array(
				"DISTINCT agenda.id",
				"agenda.tipo",
				"agenda.telefoneResidencial",
				"agenda.telefoneCelular",
				"agenda.data",
				"agenda.hora",
				"agenda.dia AS diaCompromisso",
				"agenda.mes AS mesCompromisso",
				"agenda.ano AS anoCompromisso",
				//"DATE_FORMAT(agenda.data, '%d/%m/%Y') as dataFormatada",
				"SUBSTR(agenda.hora, 1, 5) as horaFormatada",
				"agenda.dataC",
				"agenda.timestampC",
				//"DATE_FORMAT(agenda.dataC, '%d/%m/%Y') as dataCFormatada",
				"pacientes.id as idPaciente",
				"pacientes.nome as nomePaciente "
			),
			"where" => $where,
			"join" => array(
				"pacientes" => "pacientes.id = agenda.paciente",
				"agenda_fisioterapeutas" => "agenda.id = agenda_fisioterapeutas.compromisso"
			),
			"order" => array(
				"agenda.hora" => "asc"
			)
		)
	);
	
	$mesRange = rangeMonth($ano . "-" . $mes . "-01");
	
	for ($i=$mesRange["start"];$i<=$mesRange["end"];$i++) {
		foreach ($objetos as $objeto) {
			if ($objeto["diaCompromisso"] == $i) {
<<<<<<< HEAD
				$compromissos[(int) $i][$objeto["hora"]] = $objeto;
=======
				$compromissos[$i][$objeto["hora"]] = $objeto;
>>>>>>> 8e86ef22ab831f420da5502e014833c0d9a4f8a1
			}
		}
	}
	
	// Create array containing abbreviations of days of week.
    $daysOfWeek = array('Dom','Seg','Ter','Qua','Qui','Sex','Sáb');
    // What is the first day of the month in question?
    $firstDayOfMonth = mktime(0, 0, 0, $mes, 1, $ano);
    // How many days does this month contain?
    $numberDays = date('t', $firstDayOfMonth);
    // Retrieve some information about the first day of the
    // month in question.
    $dateComponents = getdate($firstDayOfMonth);
    // What is the name of the month in question?
    $monthName = $dateComponents['month'];
    // What is the index value (0-6) of the first day of the
    // month in question.
    $dayOfWeek = $dateComponents['wday'];
     
	$currentDay = 1;
	
	$result = '<tr>';
	
	// The variable $dayOfWeek is used to
	// ensure that the calendar
	// display consists of exactly 7 columns.
	
	if ($dayOfWeek > 0) { 
		$result .= '<td colspan=' . $dayOfWeek . '>&nbsp;</td>'; 
	}
	
	$mes = str_pad($mes, 2, "0", STR_PAD_LEFT);
	
	while ($currentDay <= $numberDays) {
		// Seventh column (Saturday) reached. Start a new row.
		if ($dayOfWeek == 7) {
			$dayOfWeek = 0;
			$result .= '</tr><tr>';
		}
		$currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
		$date = "$ano-$mes-$currentDayRel";
		$result .= '<td rel="' . $date . '"';
		if (date('d') == $currentDay && date('m') == $mes && date('Y') == $ano) {
			$result .= ' class="today"';
		}
		$result .= '>';
		$result .= '<div class="day';
		if (date('d') == $currentDay && date('m') == $mes && date('Y') == $ano) {
			$result .= ' today';
		}
		$result .= '">' . $currentDay . '</div>';
	
		$result .= '<div class="compromissos-wrapper';
				
		if (date('d') == $currentDay) {
			$result .= ' today';
		}
		
		$result .= '">';
		
		for ($i = 0; $i < 23; $i++) {
								
			$time = mktime(07, $i*30, 0, 0, 0, 0);
			$hora = date('H:i', $time);
			
			$result .= '<div id="compromisso" style="clear:both;">';
			$result .= '<div class="circle circle';
			
			$temCompromissoNesseDia = array_key_exists($currentDay, $compromissos);
			
			if ($temCompromissoNesseDia) {
				$temCompromissoNessHora = array_key_exists($hora, $compromissos[$currentDay]);
				if ($temCompromissoNessHora) {
					$result .= $compromissos[$currentDay][$hora]["tipo"];
				}
				else {
					$result .= "3";
				}
			}
			else {
				$result .= "3";
			}
			$result .= '"></div>';
			
			if ($temCompromissoNesseDia) {
				if ($temCompromissoNessHora) {
					$result .= '<a href="?modulo=agenda&acao=cadastrar&compromisso=';
					$result .= $compromissos[$currentDay][$hora]["id"] . '">';
					$result .= '<small>';
					$result .= $hora;
					$result .= ' ' . compactaTexto(html_entity_decode($compromissos[$currentDay][$hora]["nomePaciente"], ENT_NOQUOTES, 'utf-8'), 15);
					$result .= '</small></a>';
				}
				else {
<<<<<<< HEAD
					$result .= '<a href="?modulo=agenda&acao=cadastrar&data=' . str_pad($currentDay, 2, "0", STR_PAD_LEFT) . '/' . $mes . '/' . $ano . '&hora=' . $hora  .'">';
=======
					$result .= '<a href="?modulo=agenda&acao=cadastrar&data=' . str_pad($currentDay, 2, "0", STR_PAD_LEFT) . '/' . $month . '/' . $year . '&hora=' . $hora  .'">';
>>>>>>> 8e86ef22ab831f420da5502e014833c0d9a4f8a1
					$result .= '<small>';
					$result .= $hora;
					$result .= '</small></a>';
				}
			}
			else {
				$result .= '<a href="?modulo=agenda&acao=cadastrar&data=' . str_pad($currentDay, 2, "0", STR_PAD_LEFT) . '/' . $mes . '/' . $ano . '&hora=' . $hora  .'">';
				$result .= '<small>';
				$result .= $hora;
				$result .= '</small></a>';
			}

			$result .= '</div>';

		}
	
		$result .= "</div>";
		$result .= '</td>';
		// Increment counters
		$currentDay++;
		$dayOfWeek++;
	}
		
	// Complete the row of the last week in month, if necessary
	
	if ($dayOfWeek != 7) { 
		$remainingDays = 7 - $dayOfWeek;
		$result .= '<td colspan="' . $remainingDays . '">&nbsp;</td>'; 
	}
	
	$result .= '</tr>';
	
	$response = array(
		"mes" => $mes,
		"ano" => $ano,
		"prevData" => $prevData,
		"nextData" => $nextData,
		"result" => $result
	);
	
	echo json_encode($response);
	
?>