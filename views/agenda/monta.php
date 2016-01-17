<?php
  // Create array containing abbreviations of days of week.
  $daysOfWeek = array('Seg', 'Ter', 'Qua', 'Qui', 'Sex');
  // What is the first day of the month in question?
  $firstDayOfMonth = mktime(0, 0, 0, $mes, $dia, $ano);
  // Retrieve some information about the first day of the month in question.
  $dateComponents = getdate($firstDayOfMonth);
  // What is the index value (0-6) of the first day of the month in question.
  $dayOfWeek = $dateComponents['wday'];
  // calcula o primeiro dia útil da semana
  while(in_array($dayOfWeek, array(0,6))) {
    $firstDayOfMonth = mktime(0, 0, 0, $mes, ++$dia, $ano);
    $dateComponents = getdate($firstDayOfMonth);
    $dayOfWeek = $dateComponents['wday'];
  }
  // How many days does this month contain?
  $numberDays = date('t', $firstDayOfMonth);
  // What is the name of the month in question?
  $mesName = $dateComponents['month'];

  // Create the calendar headers

  $r = '<tr>';

  foreach($daysOfWeek as $day) {
    $r .= '<th class="header">' . $day . '</th>';
  }

  // primeiro dia útil do mês
  $currentDay = (int) date('d', $firstDayOfMonth);

  $r .= '</tr><tr>';

  // The variable $dayOfWeek is used to ensure that the calendar
  // display consists of exactly 7 columns.
  if ($dayOfWeek > 1) {
    $r .= '<td colspan=' . ($dayOfWeek-1) . '>&nbsp;</td>';
  }

  $mes = str_pad($mes, 2, "0", STR_PAD_LEFT);

  while ($currentDay <= $numberDays) {

    // Seventh column (Saturday) reached. Start a new row.
    if ($dayOfWeek == 6) {
      $dayOfWeek = 1;
      $r .= '</tr>';

      if (($currentDay+2) > $numberDays) {
        $dayOfWeek = 6;
        break;
      }

      $r .= '<tr>';
      foreach($daysOfWeek as $day) {
        $r .= '<th class="header">' . $day . '</th>';
      }
      $r .= '</tr><tr>';
      $currentDay+=2;
    }

    $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
    $date = "$ano-$mes-$currentDayRel";
    $data = "$currentDayRel/$mes/$ano";
    $r .= '<td';

    $r .= ' rel="' . $date . '"';
    if (date('d') == $currentDay) {
      $r .= ' id="today" class="today"';
    }
    $r .= '>';
    $r .= '<div class="day';
    if (date('d') == $currentDay) {
      $r .= ' today';
    }
    $r .= '">';
    $r .= '<a href="?modulo=agenda&acao=imprimir&dia=' . $currentDay . '&mes=' . $mes . '&ano=' . $ano;
    $r .=  '&fisioterapeuta=2" target="_blank">';
    $r .= $currentDay;
    $r .= '</a></div>';

    for ($i = 0; $i < 24; $i++) {

      $time = mktime(07, $i*30, 0, 0, 0, 0);
      $hora = date('H:i', $time);

      $r .= '<div id="compromisso">';
      $r .= '<div class="circle circle';

      $tipoCompromisso = 3; // livre
      $temCompromissoNesseDia = array_key_exists($currentDay, $compromissos);

      if ($temCompromissoNesseDia) {
        $id = $compromissos[$currentDay][$hora]["id"];
        $dateTime = $data . 'T' . $hora;
        $timestamp = $compromissos[$currentDay][$hora]["timestamp"];
        $nomePaciente = $compromissos[$currentDay][$hora]["nomePaciente"];
        $temCompromissoNessaHora = array_key_exists($hora, $compromissos[$currentDay]);
        if ($temCompromissoNessaHora) {
          $tipoCompromisso = $compromissos[$currentDay][$hora]["tipo"];
        }
      }

      $r .= $tipoCompromisso;
      $r .= '"></div>';

      $conteudo = '<a data-id="0" data-dh="' . $dateTime . '" rel="modal">';
      $conteudo .= '<time datetime="' . $hora . '">';
      $conteudo .= $hora;
      $conteudo .= '</time>';
      $conteudo .= '</a>';

      if (count($fisioterapeuta["diasAtendimento"]) > 0 && !in_array($dayOfWeek, $fisioterapeuta["diasAtendimento"])) {
        $conteudo = '<a style="text-decoration:none;color:#ccc;"';
        $conteudo .= 'data-id="' . $id . '" data-dh="' . $dateTime . '">';
        $conteudo .= '<time datetime="' . $timestamp . '">' . $hora . '</time>';
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

      $r .= $conteudo;
    }

    $r .= '</div>';
    $r .= '</td>';

    // Increment counters
    $currentDay++;
    $dayOfWeek++;
  }

  // Complete the row of the last week in month, if necessary
  if ($dayOfWeek != 6) {
    $remainingDays = 6 - $dayOfWeek;
    $r .= '<td colspan="' . $remainingDays . '">&nbsp;</td>';
  }

  $r .= '</tr>';

  echo $r;

?>
