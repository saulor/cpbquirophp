<?php

	header("Access-Control-Allow-Origin: *");
	require_once("../../config.php");
	$conexao = new Conexao();

	$compromissos = array();
	$dao = new DAOGenerico();

	if (isset($_POST['data'])) {
		list($ano, $mes, $dia) = explode("-", $_POST["data"]);
	}
	else {
		$dia = 1;
		$mes = $_POST["mes"];
		$ano = $_POST["ano"];
	}

	$prevData = date('Y-m-d', mktime(0, 0, 0, $mes-1, 1, $ano));
	$nextData = date('Y-m-d', mktime(0, 0, 0, $mes+1, 1, $ano));

	$where = array(
		"agenda.mes" => $mes,
		"agenda.ano" => $ano
	);

	$holidays = Funcoes::getFeriados($mes, $ano);

	if (!empty($_POST["fisioterapeuta"])) {
		$idFisioterapeuta = $where["agenda_fisioterapeutas.fisioterapeuta"] = $_POST["fisioterapeuta"];
		$fisioterapeuta = $dao->findByPk($conexao->getConexao(), "vw_usuarios", (int) $_POST["fisioterapeuta"]);
		$fisioterapeuta["diasAtendimento"] = !empty($fisioterapeuta["diasAtendimento"]) ? explode(",", $fisioterapeuta["diasAtendimento"]) : array();
	}

	$objetos = $dao->findAll($conexao->getConexao(), "agenda", array(
			"dados" => array(
				"agenda.id",
				"agenda.tipo",
				"agenda.data",
				"agenda.hora",
				"agenda.dia",
				"agenda.mes",
				"agenda.ano",
				"agenda.telefoneResidencial",
				"agenda.telefoneCelular",
				"agenda.lembrete",
				"agenda.observacoes",
				"agenda.nomePaciente",
				"agenda.marcador",
				"CONCAT_WS('T', agenda.data, agenda.hora) as timestamp"
			),
			"where" => $where,
			"leftJoin" => array(
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
			if ($objeto["dia"] == $i) {
				$compromissos[(int) $i][$objeto["hora"]] = $objeto;
			}
		}
	}

	// Create array containing abbreviations of days of week.
  $daysOfWeek = array('Seg', 'Ter', 'Qua', 'Qui', 'Sex');
  // What is the first day of the month in question?
 	$firstDayOfMonth = mktime(0, 0, 0, $mes, $dia, $ano);
 	// Retrieve some information about the first day of the month in question.
 	$dateComponents = getdate($firstDayOfMonth);
 	// What is the index value (0-6) of the first day of the month in question.
 	$dayOfWeek = $dateComponents['wday'];

 	while(in_array($dayOfWeek, array(0,6))) {
	$firstDayOfMonth = mktime(0, 0, 0, $mes, ++$dia, $ano);
	$dateComponents = getdate($firstDayOfMonth);
	$dayOfWeek = $dateComponents['wday'];
 	}

  // How many days does this month contain?
  $numberDays = date('t', $firstDayOfMonth);
  // What is the name of the month in question?
  $mesName = $dateComponents['month'];

	// primeiro dia útil do mês
	$currentDay = (int) date('d', $firstDayOfMonth);

	$result = '<tr>';

	// The variable $dayOfWeek is used to
	// ensure that the calendar
	// display consists of exactly 7 columns.

	if ($dayOfWeek > 1) {
		$result .= '<td colspan=' . ($dayOfWeek-1) . '>&nbsp;</td>';
	}

	$mes = str_pad($mes, 2, "0", STR_PAD_LEFT);

	while ($currentDay <= $numberDays) {

		// Seventh column (Saturday) reached. Start a new row.
		if ($dayOfWeek == 6) {
			$dayOfWeek = 1;
			$result .= '</tr>';

			if (($currentDay+2) > $numberDays) {
				$dayOfWeek=6;
				break;
			}

			$result .= '<tr>';
			foreach($daysOfWeek as $day) {
				$result .= '<th class="header">' . $day . '</th>';
			}
			$result .= '</tr><tr>';
			$currentDay+=2;
		}

		$currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
		$date = "$ano-$mes-$currentDayRel";
		$data = "$currentDayRel/$mes/$ano";
		$result .= '<td rel="' . $date . '"';
		if (date('d') == $currentDay && date('m') == $mes && date('Y') == $ano) {
			$result .= ' id="today" class="today"';
		}
		$result .= '>';
		$result .= '<div class="day';
		if (date('d') == $currentDay && date('m') == $mes && date('Y') == $ano) {
			$result .= ' today';
		}
		$result .= '">';
		$result .= '<a href="?modulo=agenda&acao=imprimir&dia=' . $currentDay . '&mes=' . $mes . '&ano=' . $ano;
		$result .=  '&fisioterapeuta=' . $idFisioterapeuta . '" target="_blank">';
		$result .= $currentDay;
		$result .= '</a>';
		$result .= '</div>';

		$result .= '<div class="holiday">';

		if (isset($holidays[$date])) {
      $result .= '<span>' . $holidays[$date] . '</span>';
    }
    else {
			$result .= '&nbsp;';
		}

		$result .= '</div>';

		for ($i = 0; $i < 24; $i++) {

			$time = mktime(07, $i*30, 0, 0, 0, 0);
			$hora = date('H:i', $time);
			$dateTime = $data . 'T' . $hora;

			$result .= '<div id="compromisso">';
			$result .= '<div class="circle circle';

			$tipoCompromisso = 3; // livre
			$temCompromissoNesseDia = array_key_exists($currentDay, $compromissos);

			if ($temCompromissoNesseDia) {
				$temCompromissoNessaHora = array_key_exists($hora, $compromissos[$currentDay]);
				if ($temCompromissoNessaHora) {
					$id = $compromissos[$currentDay][$hora]["id"];
					$timestamp = $compromissos[$currentDay][$hora]["timestamp"];
					$nomePaciente = $compromissos[$currentDay][$hora]["nomePaciente"];
					$tipoCompromisso = $compromissos[$currentDay][$hora]["tipo"];
				}
			}

			$result .= $tipoCompromisso;
			$result .= '"></div>';

			$conteudo = '<a data-id="0" data-dh="' . $dateTime . '" rel="modal">';
			$conteudo .= '<time datetime="' . $hora . '">';
			$conteudo .= $hora;
			$conteudo .= '</time>';
			$conteudo .= '</a>';

			if (count($fisioterapeuta["diasAtendimento"]) > 0 &&
				!in_array($dayOfWeek, $fisioterapeuta["diasAtendimento"])) {
				$conteudo = '<a style="text-decoration:none;color:#ccc;"';
				$conteudo .= 'data-id="0" data-dh="' . $dateTime . '">';
				$conteudo .= '<time datetime="' . $hora . '">' . $hora . '</time>';
				$conteudo .= ' <span>Não há atendimento</span>';
				$conteudo .= '</a>';
			}
			else if ($temCompromissoNesseDia) {
				if ($temCompromissoNessaHora) {
					$conteudo = '<a class="ver_conteudo" ';
					$conteudo .= 'data-id="' . $id . '" data-dh="' . $dateTime . '" rel="modal">';
					$conteudo .= '<time datetime="' . $hora . '">' . $hora . '</time>';
					$conteudo .= ' <span';
					if ($compromissos[$currentDay][$hora]["marcador"] != 0) {
						$conteudo .= ' class="m' . Agenda::getMarcador($compromissos[$currentDay][$hora]["marcador"]) . '"';
					}
					$conteudo .= '>';
					$conteudo .= compactaTexto($nomePaciente, 22);
					$conteudo .= '</span>';

					$conteudo .= '<div class="info">';
					if ($compromissos[$currentDay][$hora]["marcador"] != 0) {
						$conteudo .= '<p>';
						$conteudo .= Agenda::getMarcador($compromissos[$currentDay][$hora]["marcador"]);
						$conteudo .= '</p>';
					}

					$conteudo .= '<small>';
					$conteudo .= '<time datetime="' . $timestamp . '">' . $compromissos[$currentDay][$hora]["hora"] . '</time>';
					$conteudo .= ' <span>' . Agenda::getTipo($compromissos[$currentDay][$hora]["tipo"]) . '</span>';

					$conteudo .= '</small>';

					$conteudo .= '<span>' . $compromissos[$currentDay][$hora]["nomePaciente"] . '</span>';

					$telefones = array();

					if (!empty($compromissos[$currentDay][$hora]["telefoneResidencial"])) {
						$telefones[] = $compromissos[$currentDay][$hora]["telefoneResidencial"];
					}

					if (!empty($compromissos[$currentDay][$hora]["telefoneCelular"])) {
						$telefones[] = $compromissos[$currentDay][$hora]["telefoneCelular"];
					}

					if (count($telefones) > 0) {
						$conteudo .= '<br />';
						$conteudo .= '<small>' . implode(" | ", $telefones) . '</small>';
					}

					if (!empty($compromissos[$currentDay][$hora]["lembrete"])) {
						$conteudo .= '<br /><strong>Lembrete:</strong> ' . $compromissos[$currentDay][$hora]["lembrete"];
					}

					if (!empty($compromissos[$currentDay][$hora]["observacoes"])) {
						$conteudo .= '<br /><strong>Observações:</strong> ' . $compromissos[$currentDay][$hora]["observacoes"];
					}

					$conteudo .= '</div>';
					$conteudo .= '<span class="seta-cima"></span>';
					$conteudo .= '</a>';
				}
			}

			$result .= $conteudo;
		}

		$result .= '</div>';
		$result .= '</td>';

		// Increment counters
		$currentDay++;
		$dayOfWeek++;
	}

	// Complete the row of the last week in month, if necessary

	if ($dayOfWeek != 6) {
		$remainingDays = 6 - $dayOfWeek;
		$result .= '<td colspan="' . $remainingDays . '">&nbsp;</td>';
	}
	$result .= '</tr>';

	$response = array(
		"mes" => (int) $mes,
		"ano" => (int) $ano,
		"prevData" => $prevData,
		"nextData" => $nextData,
		"result" => $result
	);

	echo json_encode($response);

?>
