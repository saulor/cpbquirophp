<?php

class Funcoes {

	public static function jaExiste($conexao, $dao, $dados, $tabela, $campo) {
		try {
			$paramsQuery = array(
				"where" => array(
					$campo => $dados[$campo]
				),
				"whereNot" => array(
					"id" => $dados["id"]
				)
			);
			return count($dao->findAll($conexao, $tabela, $paramsQuery)) > 0;
		}
		catch (Exception $e) {
			throw $e;
		}
	}

	public static function getFeriados($month, $year) {
	  $first_day = mktime(0, 0, 0, intval($month), 1, intval($year));
	  $last_day = strtotime('-1 day', mktime(0, 0, 0, intval($month) + 1, 1, intval($year)));
	  $api_key = 'AIzaSyD7IaHdRPxBAev1ADy_-O4-XcdmhxAJbI4';
	  $holidays_id = 'brazilian@holiday.calendar.google.com';
	  $holidays_url = sprintf(
	    'https://www.googleapis.com/calendar/v3/calendars/%s/events?'.
	    'key=%s&timeMin=%s&timeMax=%s&maxResults=%d&orderBy=startTime&singleEvents=true',
	    $holidays_id,
	    $api_key,
	    date('Y-m-d', $first_day).'T00:00:00Z' ,
	    date('Y-m-d', $last_day).'T00:00:00Z' ,
	    31
	    );
	  if ( $results = file_get_contents($holidays_url) ) {
	    $results = json_decode($results);
	    $holidays = array();
	    foreach ($results->items as $item) {
	      $date  = strtotime((string) $item->start->date);
	      $title = (string) $item->summary;
	      $holidays[date('Y-m-d', $date)] = $title;
	    }
	    ksort($holidays);
	  }
	  return $holidays;
	}

}

?>
