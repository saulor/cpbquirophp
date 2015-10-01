<?php

function getVariavel ($variavel) {
	return isset($_GET[$variavel]) ? (int) $_GET[$variavel] : 0; 
}

function getTitulo ($breadcrumbs) {
	$t = array();
	foreach ($breadcrumbs as $key => $value) {
		foreach ($value as $titulo => $link) {
			$t[] = $titulo;
		}
	}
	return implode(' &rsaquo; ', $t);
}

function setMensagem ($tipo, $texto) {
    $mensagem = array("tipo" => $tipo, "texto" => $texto);
    $_SESSION["mensagemSe"][] = $mensagem;
}

function getMensagem ($classCss = NULL) {
    $rMensagem = '';
    if (count($_SESSION["mensagemSe"]) > 0) {
        foreach ($_SESSION["mensagemSe"] as $mensagem) {
        	switch ($mensagem["tipo"]) {
        		case "error" : $classType = "alert-danger"; break;
        		case "info" : $classType = "alert-success"; break;
        	}
            $rMensagem .= '<div class="alert ' . $classType;
			if ($classCss != NULL) {
				$rMensagem .= ' ' . $classCss;
			}
			$rMensagem .= '">';
            $rMensagem .= $mensagem["texto"];
            $rMensagem .= '</div>';
        }
    }
    $_SESSION["mensagemSe"] = array();
    return $rMensagem;
}

function paginacao ($quantidade, $quantidadePorPagina, $pagina, $queryString) {
        
    if ($quantidade == 0) {
        $numeroPaginas = 0;
   	}
    else {
        $numeroPaginas = ceil($quantidade/$quantidadePorPagina);
   	}

	$numeroItens = 10;
		
	$pag = '<nav role="pagination"><ol class="pagination">';
	
	//seta que leva para a primeira página
	if ($pagina > 1 && ($numeroPaginas > $numeroItens)) {
        $pag .= '<li title="Ir para a primeira página">';
        $pag .= '<a href="?';
        $pag .= $queryString;
        $pag .= '&p=1';
        $pag .= '">«</a></li>';
	}
	
	// seta que retrocede entre páginas
	if($pagina > 1) {
        $pag .= '<li title="Ir para a página anterior">';
        $pag .= '<a href="?';
        $pag .= $queryString;
        $pag .= '&p='.($pagina-1);
        $pag .= '">‹</a></li>';
	}
	
	//$pag .= $pagina;
	if ($numeroPaginas > $numeroItens) {
        $subtrai = ($numeroItens - ($numeroPaginas - $pagina + 1));
        if ($subtrai < 0)
        $subtrai = 0;
        $inicial = $pagina - $subtrai;
        $final = $inicial + $numeroItens - 1;
	}
	else {
        $inicial = 1;
        $final = $numeroPaginas;
	}
	
	for($i=$inicial;$i<=$final;$i++){
        $pag .= '<li';
        if ($pagina == $i) {
            $pag .= ' class="current">';
            $pag .= '<a href="#">' . $i . '</a>';
        }
        else {
            $pag .= '><a href="?';
            $pag .= $queryString;
            $pag .= '&p=' . $i;
            $pag .= '">';
            $pag .= $i;
            $pag .= '</a>';
        }
        $pag .= '</li>';
	}
	
	// seta que avança entre páginas
	if($pagina < $numeroPaginas) {
        $pag .= '<li title="Ir para a próxima página">';
        $pag .= '<a href="?';
        $pag .= $queryString;
        $pag .= '&p=' . ($pagina+1);
        $pag .= '">›</a></li>';
	}
	
	//seta que leva para a última página
	if ($pagina <= ($numeroPaginas - $numeroItens)) {
        $pag .= '<li title="Ir para última página">';
        $pag .= '<a href="?';
        $pag .= $queryString;
        $pag .= '&p=' . $numeroPaginas;
        $pag .= '">»</a></li>';
	}	
	
	$pag .= '</ol>';
	
	return $pag;
	
}

function is_utf8($str) {
    return (bool) preg_match('//u', $str);
}

function is_html($text) {
	return (bool) preg_match("/<\/?\w+((\s+\w+(\s*=\s*(?:\".*?\"|'.*?'|[^'\">\s]+))?)+\s*|\s*)\/?>/", $text);
	     
}

function compactaTexto ($word, $tamanho = 48) {
	$wordAux = $word;
	$tamanhoAux = $tamanho;
    if (strlen($word) > $tamanho) {
        do {
           $word = substr($wordAux, 0, (($tamanhoAux++)-3)) . '...';
        } while (!is_utf8($word));
   	}   
    return $word;
}

function getMesPorExtenso ($mes) {
	switch ($mes) {
		case 1 : return "Janeiro"; break;
		case 2 : return "Fevereiro"; break;
		case 3 : return "Março"; break;
		case 4 : return "Abril"; break;
		case 5 : return "Maio"; break;
		case 6 : return "Junho"; break;
		case 7 : return "Julho"; break;
		case 8 : return "Agosto"; break;
		case 9 : return "Setembro"; break;
		case 10 : return "Outubro"; break;
		case 11 : return "Novembro"; break;
		case 12 : return "Dezembro"; break;		
	}
}

function getPrimeiroDiaSemana() {
	return strtotime('last Sunday', time());
}

function rangeMonth ($datestr) {
	date_default_timezone_set(date_default_timezone_get());
	$dt = strtotime($datestr);
	//$res['start'] = date('Y-m-d', strtotime('first day of this month', $dt));
	//$res['end'] = date('Y-m-d', strtotime('last day of this month', $dt));
	$res['start'] = date('d', strtotime('first day of this month', $dt));
	$res['end'] = date('d', strtotime('last day of this month', $dt));
	return $res;
}

function rangeWeek ($datestr) {
	date_default_timezone_set(date_default_timezone_get());
	$dt = strtotime($datestr);
	$res['start'] = date('N', $dt) == 1 ? date('Y-m-d', $dt) : date('Y-m-d', strtotime('last monday', $dt));
	$res['end'] = date('N', $dt) == 7 ? date('Y-m-d', $dt) : date('Y-m-d', strtotime('next friday', $dt));
	return $res;
}

/**
*	Função recebe data e hora e retorna no formato yyyy-mm-ddTHH:ii:ss
*/
function converteDatetime ($data, $hora) {
	if (!preg_match('/\d{2}\/\d{2}\/\d{4}/', $data)) {
		
	}
	if (!preg_match('/\d{2}:\d{2}:\d{2}/', $hora)) {
		
	}
	list($dia, $mes, $ano) = explode("/", $data);
	list($hora, $min, $seg) = explode(":", $hora);
	return $ano . "-" . $mes . "-" . $dia . "T" . $hora . ":" . $min . ":" . $seg;
}

function inicializaDados ($obj) {

	$dados = array();
	$inspector = new Inspector($obj);
	
	$first = function($array, $key) {
		if (!empty($array[$key]) && sizeof($array[$key]) == 1) {
			return $array[$key][0];
		}
		return null;
	};
		
	foreach ($inspector->getClassProperties() as $property) {
		$meta = $inspector->getPropertyMeta($property);
		$type = $first($meta, "@type");
		if (!empty($type)) {
			$name = preg_replace("#^_#", "", $property);
			if ($type == "autonumber") {
				$dados[$name] = 0;
			}
			if ($type == "text" || $type == "longtext") {
				$dados[$name] = "";
			}
			if ($type == "integer") {
				$dados[$name] = "";
			}
			if ($type == "datetime") {
				$dados[$name] = "";
			}
			if ($type == "time") {
				$dados[$name] = "";
			}
			if ($type == "array") {
				$dados[$name] = array();
			}
			if ($type == "decimal") {
				$dados[$name] = "0,00";
			}
			if ($type == "date") {
				//$dados['timestamp' . ucwords($name)] = 0;
				$dados[$name] = "";
			}
		}
    }
	return $dados;
}

function validaPost ($obrigatorios, $campos) {
    
    $mensagem = "";
    $camposVazios = array();
	
    // percorre todos os campos
    foreach($campos as $key => $value) {
		
        // verifica se campo existe no array de obrigatórios
        if(array_key_exists($key, $obrigatorios)) {
		
            // se existir verifica se está vazio
			
			if($obrigatorios[$key]["tipo"] == "array") {
				if(count($value) == 0) {
					$camposVazios[] = $obrigatorios[$key]["nome"];
				}
				else {
					if (is_string($value[0]) && trim($value[0]) == '') {
						$camposVazios[] = $obrigatorios[$key]["nome"];
					}
				}
            }
            
            if($obrigatorios[$key]["tipo"] == "input") {
                if($value == "")
                    $camposVazios[] = $obrigatorios[$key]["nome"];
            }
            
            if($obrigatorios[$key]["tipo"] == "decimal") {
                if((int) $value == "0") {
                    $camposVazios[] = $obrigatorios[$key]["nome"];
               	}
            }
			
			if($obrigatorios[$key]['tipo'] == "radio") {
				if($value == 0)
					$camposVazios[] = $obrigatorios[$key]["nome"];
			}
                    
            if($obrigatorios[$key]["tipo"] == "select") {
                if($value == "")
                    $camposVazios[] = $obrigatorios[$key]["nome"];
            }
            
			if($obrigatorios[$key]["tipo"] == "textarea") {
                if(trim(strlen($value)) == 0)
                    $camposVazios[] = $obrigatorios[$key]["nome"];
            }
			
            if($obrigatorios[$key]["tipo"] == "editor1") {
                if(trim(strlen($value)) == 0)
                    $camposVazios[] = $obrigatorios[$key]["nome"];
            }

            if($obrigatorios[$key]["tipo"] == "editor") {
                if(strlen(strip_tags(trim($value))) == 0)
                    $camposVazios[] = $obrigatorios[$key]["nome"];
            }

            if($obrigatorios[$key]["tipo"] == "file") {
                if(!enviouArquivo($value)) {
                    $camposVazios[] = $obrigatorios[$key]["nome"];
                }
            }				
                
        }
        
    }
    
    if (count($camposVazios) > 0) {
        $mensagem = "O(s) campo(s) ";
        $mensagem .= implode(", ", $camposVazios);
        $mensagem .= " deve(m) ser preenchidos.";
    }
    
    return $mensagem;
    
}

function converteData ($data) {
	if (preg_match('/\d{4}-\d{2}-\d{2}/', $data)) {
		return $data;
	}
	else if (empty($data)) {
		return "0000-00-00";
	}
	else {
		list($dia, $mes, $ano) = explode("/", $data);
		return $ano . "-" . $mes . "-" . $dia;
	}
}

function desconverteData ($data) {
	if (preg_match('/\d{2}\/\d{2}\/\d{4}/', $data)) {
		return $data;
	}
	else if (empty($data) || $data == "0000-00-00") {
		return "";
	}
	else {
		list($ano, $mes, $dia) = explode("-", $data);
		return $dia . "/" . $mes . "/" . $ano;
	}
}

function converteDataTime ($data) {
	if (preg_match('/\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}/', $data)) {
		return $data;
	}
	else if (empty($data)) {
		return "0000-00-00 00:00:00";
	}
	else {
		list($parte1, $parte2) = explode(" ", $data);
		list($dia, $mes, $ano) = explode("/", $parte1);
		list($hora, $min, $seg) = explode(":", $parte2);
		return $ano . "-" . $mes . "-" . $dia . " " . $hora . ":" . $min . ":" . $seg;
	}
}

function desconverteDataTime ($data) {
	if (preg_match('/\d{2}\/\d{2}\/\d{4} \d{2}:\d{2}:\d{2}/', $data)) {
		return $data;
	}
	else if (empty($data) || $data == "0000-00-00 00:00:00") {
		return "00/00/0000 00:00:00";
	}
	else {
		list($parte1, $parte2) = explode(" ", $data);
		list($ano, $mes, $dia) = explode("-", $parte1);
		list($hora, $min, $seg) = explode(":", $parte2);
		return $dia . "/" . $mes . "/" . $ano . " " . $hora . ":" . $min . ":" . $seg;
	}
}

function existeArquivo($diretorio) {
	if (is_file($diretorio)) {
		return true;
	}
	return false;
}

function excluiDiretorio ($diretorio){
    $diretorio = cleanPath($diretorio);
    if(is_dir($diretorio)){
        excluiConteudo($diretorio);
        @rmdir($diretorio);
    }
}

function excluiConteudo ($diretorio){
    if(!estaVazia($diretorio)){
        if($dir = opendir($diretorio)){
            while(false !== $arq = readdir($dir)) {
                if ($arq != '.' && $arq != '..') {
                    if( is_dir($diretorio.'/'.$arq) ) {
                        if(estaVazia($diretorio.'/'.$arq)) {
                            @rmdir($diretorio.'/'.$arq);
                        }
                        else {
                            excluiConteudo($diretorio.'/'.$arq);
                            rmdir($diretorio.'/'.$arq);
                        }
                    }
                    else{
                        unlink($diretorio.'/'.$arq);
                    }
                   
                }
            }
            closedir($dir);
        }
    }
}

function cleanPath ($word){
    return str_replace('amp;', '', $word); 
}

function trataDados($dados = array()) {
	$result = array();
	foreach ($dados as $key => $value) {
		if ($value != "") {
			$result[$key] = $value;
		}
	} 
	return $result;
}

function codificaDado($dado) {
	return htmlentities($dado, ENT_NOQUOTES, "utf-8");
}

function semana ($datestr) {
	date_default_timezone_set(date_default_timezone_get());
	$dt = strtotime($datestr);
	//$res['start'] = date('N', $dt) == 1 ? date('Y-m-d', $dt) : date('Y-m-d', strtotime('last monday', $dt));
	//$res['end'] = date('N', $dt) == 7 ? date('Y-m-d', $dt) : date('Y-m-d', strtotime('next friday', $dt));
	$res['start'] = date('N', $dt) == 1 ? $dt : strtotime('last monday', $dt);
	$res['end'] = date('N', $dt) == 7 ? $dt : strtotime('next friday', $dt);
	return array(
		"primeiro" => $res['start'],
		"ultimo" => $res['end']
	);
}

function converteDecimal ($dado) {
	$valor = $dado;
	$v = "";
	if (strpos($valor, ",") !== false) {
		$partes = explode(".", $valor);
		foreach ($partes as $parte) {
			$v .= $parte;
		}
		$valor = $v;
	} 
	return (float) str_replace(",", ".", $valor);
}

function desconverteDecimal($dado) {
	return number_format($dado, 2, ",", ".");
}

function retiraDoArray($chaves = array(), $array = array()) {
	$result = array();
	foreach ($array as $key => $value) {
		if(!in_array($key, $chaves)) {
			$result[$key] = $value;
		}
	}
	return $result;
}

function validaHora($hora) {
	return (bool) preg_match("/(2[0-3]|[01][0-9]):[0-5][0-9]/", $hora);
}

function existeDiretorio($diretorio) {
	if (is_dir($diretorio)) 
		return true;
	return false;
}

function estaVazia ($pasta){		
    if(file_exists($pasta.'/Thumbs.db'))
        @unlink($pasta.'/Thumbs.db');
    $files = scandir($pasta);
            
    if(count($files) > 2)
        return false;
    else
        return true;
}

function criaDiretorio ($diretorio) {
    if (is_dir($diretorio)) 
        return true;
    if (@mkdir($diretorio,0777))
        return true;
    return false;
}

function excluiArquivo ($diretorio){
    if (is_file($diretorio)) {
        if(unlink($diretorio))
			return true;
		return false;
    }
}

function getArquivos($diretorio){

    $extensions = 'pdf|PDF|jpg|JPG|png|PNG|gif|GIF|bmp|BMP|jpeg|JPEG|ico|ICO';
    $files = array();

    if(is_dir($diretorio)){
        if ($dir = opendir($diretorio)) {
            while(false !== ($arq = readdir($dir))) {
                if ((!is_dir($diretorio . '/' . $arq) ) && (preg_match("/$extensions/",$arq))) {
                    $files[] = $diretorio . $arq;
                }
            }
        }
    }
    
    return $files;
}

function getIconByFiletype($diretorio) {
	$iconPath = 'imagens/';
	$finfo = finfo_open(FILEINFO_MIME_TYPE);
	$mime = finfo_file($finfo, $diretorio);
	
	switch ($mime) {
		
		case 'application/pdf' :
			return $iconPath . 'pdf-icon.gif';
		break;
		
		default :
		break;
	}
}

/*

function trataDados ($dados = array()) {
	foreach ($dados as $key => $value) {
		if (!strcmp($value, strip_tags($value)) == 0) {
			$dados[$key] = $value;
		}
		else {
			if (is_float($value)) {
				$dados[$key] = (float) $value;
			}
			else if (is_numeric($value)) {
				$dados[$key] = (int) $value;
			}
			else {
				$dados[$key] = codificaDado($value);
			}
		}
	}
	return $dados;
}

function compactaTexto ($word, $tamanho = 48) {
    if (strlen($word) > $tamanho) 
        return substr($word, 0, ($tamanho-3)).'...';
    else
        return $word;
}







//function week_start_end_by_date($date, $format = 'Ymd') {
//    
//    if (is_numeric($date) AND strlen($date) == 10) {
//        $time = $date;
//    }
//	else{
//        $time = strtotime($date);
//    }
//    
//    $week['week'] = date('W', $time);
//    $week['year'] = date('o', $time);
//    $first_day_of_week_timestamp = strtotime($week['year']."W".str_pad($week['week'],2,"0",STR_PAD_LEFT));
//    $week['first_day_of_week'] = date($format, $first_day_of_week_timestamp);
//    $week['first_day_of_week_timestamp'] = $first_day_of_week_timestamp;
//    $last_day_of_week_timestamp = strtotime($week['first_day_of_week']. " +6 days");
//    $week['last_day_of_week'] = date($format, $last_day_of_week_timestamp);
//    $week['last_day_of_week_timestamp']  = $last_day_of_week_timestamp;
//    
//    return $week;
//}
//
//function getMes($mes) {
//	switch ($mes) {
//		case "Jan" :
//			return "Jan";
//		break;
//		case "Feb" :
//			return "Fev";
//		break;
//		case "Mar" :
//			return "Mar";
//		break;
//		case "Apr" :
//			return "Abr";
//		break;
//		case "May" :
//			return "Mai";
//		break;
//		case "Jun" :
//			return "Jun";
//		break;
//		case "Jul" :
//			return "Jul";
//		break;
//		case "Aug" :
//			return "Ago";
//		break;
//		case "Sep" :
//			return "Set";
//		break;
//		case "Oct" :
//			return "Out";
//		break;
//		case "Nov" :
//			return "Nov";
//		break;
//		case "Dec" :
//			return "Dez";
//		break;
//		default :
//		break;
//	}
//}
//
//function configuraPeriodo($periodo) {
//	
//	$meses = array(
//		"Jan" => "Jan",
//		"Feb" => "Fev",
//		"Mar" => "Mar",
//		"Apr" => "Abr",
//		"May" => "Mai",
//		"Jun" => "Jun",
//		"Jul" => "Jul",
//		"Aug" => "Ago",
//		"Sep" => "Set",
//		"Oct" => "Out",
//		"Nov" => "Nov",
//		"Dec" => "Dez"
//	);
//	
//	$dias = array(
//		"Mon" => "Seg",
//		"Tue" => "Ter",
//		"Wed" => "Qua",
//		"Thu" => "Qui",
//		"Fri" => "Sex",
//		"Sat" => "Sáb",
//		"Sun" => "Dom"
//	);
//	
//	foreach ($meses as $key => $value) {
//		$periodo = str_replace($key, $value, $periodo);
//	}
//	
//	foreach ($dias as $key => $value) {
//		$periodo = str_replace($key, $value, $periodo);
//	}
//	
//	return $periodo;
//}

function codificaDado ($dado) {
    return htmlentities(addslashes(trim($dado)), ENT_NOQUOTES, "utf-8");
}

function decodificaDado ($dado) {
    return html_entity_decode(stripslashes(trim($dado)), ENT_NOQUOTES, "utf-8");
}

function codificaDados ($dados) {
    
    //$keys = array('noticia', 'descricao', 'senha', 'id');
    
    foreach ($dados as $key => $value) {
        if (!in_array($key, $keys)) {
            $dados[$key] = htmlentities(trim($value), ENT_NOQUOTES, "utf-8");
        }
    }
    
    return $dados;

}

function decodificaDados ($dados) {
    
    //$keys = array('id', 'senha', 'noticia', 'descricao', 'data');
	$keys = array();
    
    foreach ($dados as $key => $value) {
		if (!in_array($key, $keys)) {
			$dados[$key] = html_entity_decode(trim($value), ENT_NOQUOTES, "utf-8");
		}
    }
        
    return $dados;
}

// Converte de timestamp pra data
function getData ($timestamp) {
	return date('d/m/Y', $timestamp);
}



// Desconverte datas no formato YYYY-mm-dd


function getTimestamp() {
	return time();
}

function getMomento() {
	return date('Y-m-d H:i:s');
}



function includeQueryString($queryString) {
	// array para armazenar o resultado final
	$resultQsArray = array();
	// itens que não entrarão na composição da query string
	$excludeArray = array("modulo", "acao");
	// quebra os parâmetros pelo &
	$parametros = explode("&", $queryString);
	// percorre todos eles
	foreach ($parametros as $parametro) {
		// quebra o parâmetro pelo sinal =
		$item = explode("=", $parametro);
		list($chave, $valor) = $item;
		// verifica se esse parâmetro é um dos que não deve entrar na composição da query string
		if (!in_array($chave, $excludeArray)) {
			// se não for armazena  no array
			$resultQsArray[] = $chave . '=' . $valor;
		}
	}
	// retorna os parâmetros corretos
	$resultQs = '';
	if (count($resultQsArray) > 0) {
		$resultQs .= '&';
	}
	$resultQs .= implode("&", $resultQsArray);
	return $resultQs;
}

function paginacao ($quantidade, $quantidadePorPagina, $pagina, $queryString) {
        
    if ($quantidade == 0)
        $numeroPaginas = 0;
    else
        $numeroPaginas = ceil($quantidade/$quantidadePorPagina);

	$numeroItens = 10;
		
	$pag = '<ul>';
	
	//seta que leva para a primeira página
	if ($pagina > 1 && ($numeroPaginas > $numeroItens)) {
        $pag .= '<li title="Ir para a primeira página">';
        $pag .= '<a href="?';
        $pag .= $queryString;
        $pag .= '&p=1';
        $pag .= '">«</a></li>';
	}
	
	// seta que retrocede entre páginas
	if($pagina > 1) {
        $pag .= '<li title="Ir para a página anterior">';
        $pag .= '<a href="?';
        $pag .= $queryString;
        $pag .= '&p='.($pagina-1);
        $pag .= '">‹</a></li>';
	}
	
	//$pag .= $pagina;
	if ($numeroPaginas > $numeroItens) {
        $subtrai = ($numeroItens - ($numeroPaginas - $pagina + 1));
        if ($subtrai < 0)
        $subtrai = 0;
        $inicial = $pagina - $subtrai;
        $final = $inicial + $numeroItens - 1;
	}
	else {
        $inicial = 1;
        $final = $numeroPaginas;
	}
	
	for($i=$inicial;$i<=$final;$i++){
        $pag .= '<li';
        if ($pagina == $i) {
            $pag .= ' class="current">';
            $pag .= '<a href="#">'.$i.'</a>';
        }
        else {
            $pag .= '><a href="?';
            $pag .= $queryString;
            $pag .= '&p='.$i;
            $pag .= '">';
            $pag .= $i;
            $pag .= '</a>';
        }
        $pag .= '</li>';
	}
	
	// seta que avança entre páginas
	if($pagina < $numeroPaginas) {
        $pag .= '<li title="Ir para a próxima página">';
        $pag .= '<a href="?';
        $pag .= $queryString;
        $pag .= '&p='.($pagina+1);
        $pag .= '">›</a></li>';
	}
	
	//seta que leva para a última página
	if ($pagina <= ($numeroPaginas - $numeroItens)) {
        $pag .= '<li title="Ir para última página">';
        $pag .= '<a href="?';
        $pag .= $queryString;
        $pag .= '&p='.$numeroPaginas;
        $pag .= '">»</a></li>';
	}	
	
	$pag .= '</ul>';
	
	return $pag;
	
}



function excluiConteudo ($diretorio){
    if(!estaVazia($diretorio)){
        if($dir = opendir($diretorio)){
            while(false !== $arq = readdir($dir)) {
                if ($arq != '.' && $arq != '..') {
                    if( is_dir($diretorio.'/'.$arq) ) {
                        if(estaVazia($diretorio.'/'.$arq)) {
                            @rmdir($diretorio.'/'.$arq);
                        }
                        else {
                            excluiConteudo($diretorio.'/'.$arq);
                            rmdir($diretorio.'/'.$arq);
                        }
                    }
                    else{
                        unlink($diretorio.'/'.$arq);
                    }
                   
                }
            }
            closedir($dir);
        }
    }
}







/*

function converteData($data) {
	if ($data == "")
		return "";
	$data = explode("/", $data);
	return $data[2] . "-" . $data[1] . "-" . $data[0];
}

function desconverteData($data) {
	if ($data == "" || $data == "0000-00-00 00:00:00")
		return "";
	$data = explode("-", substr($data,0,10));
	return $data[2] . "/" . $data[1] . "/" . $data[0];
}

function getData($data) {
	if ($data == "0000-00-00" || $data == "0000-00-00 00:00:00")
		return "";
	return $data;
	//return date('d/m/Y', strtotime($data));
}

function getDataHora($data) {
	return date('d/m/Y', strtotime($data)).' às '.date('H:i:s', strtotime($data));
}



function temPermissao ($permissoes = array(), $permissoesSession) {
	foreach ($permissoes as $p) {
		if (!in_array($p, $permissoesSession))
			return false;
	}
	return true;
}

function montaView ($view, $dados) {
	
	// tag <form> e seus atributos
	$v = '<form';
	// enctype
	if ($view["form"]["file"]) {
		$v .= ' enctype="multipart/form-data"';
	}
	// id
	$v .= ' id="'.$view["form"]["id"].'"';
	// method
	$v .= ' method="'.$view["form"]["method"].'"';
	// action
	$v .= ' action="'.$view["form"]["action"].'"';
	$v .= '>';
	
	// ocorrerá nos casos de atualização
	if (isset($dados["id"])) {
		$v .= '<input type="hidden" name="id" value="'.$dados["id"].'" />';
	}		
	
	foreach ($view["dados"] as $elemento => $dado) {
	
		// elemento <label>
		$v .= '<label for="'.$elemento.'"';
		
		// se o <label> precede um elemento do tipo input checkbox
		if (isset($view["dados"][$elemento]["type"]) && $view["dados"][$elemento]["type"] == 'checkbox') {
			$v .= 'class="checkbox"';
		}

		// se o <label> precede um elemento do tipo editor1
		if (isset($view["dados"][$elemento]["tipo"]) && $view["dados"][$elemento]["tipo"] == 'editor1') {
			$v .= 'class="clear"';
		}
		
		// </label>
		$v .= '>'.$elemento.':</label>';
		
		// elemento editor1 (textarea/ckeditor)
		if (isset($view["dados"][$elemento]["tipo"]) && $view["dados"][$elemento]["tipo"] == 'editor1') {
			$v .= '<textarea class="ckeditor" name="editor1">';
			if (array_key_exists($view["dados"][$elemento]["name"], $dados) && $dados[$view["dados"][$elemento]["name"]] != '')
				$v .= $dados[$view["dados"][$elemento]["name"]];
			$v .= '</textarea>';
		}
		
		// <inputs>, <selects>
		
		$v .= '<'.$view["dados"][$elemento]["tipo"];
		
		// se for <input>
		if ($view["dados"][$elemento]["tipo"] == 'input') {
			// define o atributo type (text, checkbox, radio)
			$v .= ' type="'.$view["dados"][$elemento]["type"].'"';
			
			if ($view["dados"][$elemento]["type"] == 'checkbox' && array_key_exists($view["dados"][$elemento]["name"], $dados) && $dados[$view["dados"][$elemento]["name"]] == 1) {
				$v .= ' checked="checked"';
			}
			
			// se for input text define o atributo size
			if ($view["dados"][$elemento]["type"] == 'text') {
				$v .= ' size="'.$view["dados"][$elemento]["size"].'"';
			}
			
			// valor setado
			if ($view["dados"][$elemento]["type"] != 'password') {
				if (array_key_exists($view["dados"][$elemento]["name"], $dados) && $dados[$view["dados"][$elemento]["name"]] != '') {
					$v .= ' value="'.$dados[$view["dados"][$elemento]["name"]].'"';
				}
			}
		}		
	
		// nome do elemento
		$v .= ' name="'.$view["dados"][$elemento]["name"].'"';
		
		// fecha elemento
		$v .= '>';
		
		// no caso de <select> define os elementos <option>
		
		if ($view["dados"][$elemento]["tipo"] == 'select') {
			$v .= '<option value="0">--Selecione--</option>';	
			foreach ($view["dados"][$elemento]["options"] as $valorOption => $labelOption) {
				$v .= '<option value="'.$valorOption.'"';
				if (array_key_exists($view["dados"][$elemento]["name"], $dados) && $dados[$view["dados"][$elemento]["name"]] == $valorOption)
					$v .= 'selected="selected"';	
				$v .= '>';
				$v .= $labelOption;
				$v .= '</option>';	
			}
			// fecha elemento <select>
			$v .= '</select>';
		}
		
	}
	
	// botão Salvar
	$v .= '<input type="submit" value="Salvar" />';
	// fecha <form>
	$v .= '</form>';
	
	echo $v;

}

function getInformacoesModulo ($modulo) {
    foreach ($_SESSION['modulos'] as $key => $value) {
        if ($_SESSION['modulos'][$key]['id'] == $modulo)
            return $_SESSION['modulos'][$key];
    }
    return array();
}

function redirect ($url){
    header("Location: ".$url);
}

function getMenu ($modulo) {
    $menu = '<ul>';
    $xml = simplexml_load_file("menu.xml");
    foreach ($xml->children() as $modulos) {
        if ($modulos['id'] == $modulo) {
            $itens = $modulos->children();
            foreach ($itens as $item) {
                $menu .= '<li><a href="?modulo='.$modulo;
                if (isset($item['link']))
                        $menu .= '&view='.$item['link'];
                $menu .= '">'.$item.'</a></li>';
            }
        }
    }
    $menu .= "</ul>";
    return $menu;
}

function validaPost ($obrigatorios, $campos) {
    
    $mensagem = "";
    $camposVazios = array();
	
    // percorre todos os campos
    foreach($campos as $key => $value) {
		
        // verifica se campo existe no array de obrigatórios
        if(array_key_exists($key, $obrigatorios)) {
		
            // se existir verifica se está vazio
			
			if($obrigatorios[$key]["tipo"] == "array") {
				if(count($value) > 0) {
					if (is_string($value[0]) && trim($value[0]) == '')
						$camposVazios[] = $obrigatorios[$key]["nome"];
				}
            }
            
            if($obrigatorios[$key]["tipo"] == "input") {
                if($value == "")
                    $camposVazios[] = $obrigatorios[$key]["nome"];
            }
            
            if($obrigatorios[$key]["tipo"] == "decimal") {
                if($value == "0,00")
                    $camposVazios[] = $obrigatorios[$key]["nome"];
            }
			
			if($obrigatorios[$key]['tipo'] == "radio") {
				if($value == 0)
					$camposVazios[] = $obrigatorios[$key]["nome"];
			}
                    
            if($obrigatorios[$key]["tipo"] == "select") {
                if($value == "")
                    $camposVazios[] = $obrigatorios[$key]["nome"];
            }
            
			if($obrigatorios[$key]["tipo"] == "textarea") {
                if(trim(strlen($value)) == 0)
                    $camposVazios[] = $obrigatorios[$key]["nome"];
            }
			
            if($obrigatorios[$key]["tipo"] == "editor1") {
                if(trim(strlen($value)) == 0)
                    $camposVazios[] = $obrigatorios[$key]["nome"];
            }

            if($obrigatorios[$key]["tipo"] == "editor") {
                if(strlen(strip_tags(trim($value))) == 0)
                    $camposVazios[] = $obrigatorios[$key]["nome"];
            }

            if($obrigatorios[$key]["tipo"] == "file") {
                if(!enviouArquivo($value)) {
                    $camposVazios[] = $obrigatorios[$key]["nome"];
                }
            }				
                
        }
        
    }
    
    if (count($camposVazios) > 0) {
        $mensagem = "O(s) campo(s) ";
        $mensagem .= implode(", ", $camposVazios);
        $mensagem .= " deve(m) ser preenchidos.";
    }
    
    return $mensagem;
    
}

function validaEmail ($email) {
    //$conta = "/^[a-zA-Z0-9\._-]+@";
    //$domino = "[a-zA-Z0-9\._-]+\.";
    //$extensao = "([a-zA-Z]{2,4})$/";
    //$pattern = $conta.$domino.$extensao;
    $pattern = '/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/';
    if (preg_match($pattern, $email))
            return true;
    return false;
}

function getExtensao ($arquivo) {
    return pathinfo($arquivo["name"], PATHINFO_EXTENSION);	
}

function getExtensaoImagem($diretorio){
	$dot = strrpos($diretorio, '.') + 1;
	return substr($diretorio, $dot);
}

function verificaImagemPorExtensao($imagem, $extensoes){
	$uploadext = explode('|',$extensoes);
	$dot = strrpos($imagem, '.') + 1;
	if(in_array(substr($imagem, $dot),$uploadext)){
		return true;
	}
	else{
		return false;
	}	
}

function enviouArquivo ($imagem) {
    if($imagem['error'] == 4)
        return false;
    else
        return true;
}



function verificaTipo ($arquivo, $permitidos) {
    
    $permitidos = explode("|", $permitidos);
    
    if (in_array($arquivo["type"], $permitidos)) 
        return true;
    return false;

}

function salvaArquivo ($arquivo, $diretorio) {
    if(move_uploaded_file($arquivo['tmp_name'],$diretorio.'/'.$arquivo['name']))
        return true;
    return false;
}

function redimensionaImagem ($imagem, $diretorio, $largura = 200) {
    $imagemDir = $diretorio . SEPARADOR_DIRETORIO . $imagem['name'];
    $img = imagecreatefromjpeg($imagemDir);
    $x = imagesx($img);
    $y = imagesy($img);
    $autura = ($largura * $y) / $x;
    $nova = imagecreatetruecolor($largura, $autura);
    imagecopyresampled($nova, $img, 0, 0, 0, 0, $largura, $autura, $x, $y);
    imagejpeg($nova, $diretorio. SEPARADOR_DIRETORIO . 'mini-'.$imagem["name"]);
    imagedestroy($img);
    imagedestroy($nova);	
    return true;
}



function getImagens($diretorio){

    $extensions = 'jpg|JPG|png|PNG|gif|GIF|bmp|BMP|jpeg|JPEG|ico|ICO';
    $files = array();

    if(is_dir($diretorio)){
        if ($dir = opendir($diretorio)) {
            while(false !== ($arq = readdir($dir))) {
                if (strpos($arq, 'mini') === false) {
                    if ((!is_dir($diretorio.'/'.$arq) ) && (preg_match("/$extensions/",$arq))) {
                        $files[] = $arq;
                    } 
                }
                
            }
        }
    }
    
    return $files;
	
}

function imageResize($width, $height, $target){
    if ($width > $height) {
        $percentage = ($target / $width);
    } 
    else {
        $percentage = ($target / $height);
    }
    $width = round($width * $percentage);
    $height = round($height * $percentage);
    return array($width, $height);
}

function renomeiaImagem ($old, $new){
	rename($old,$new);
}

function ehArquivo ($diretorio) {
	if (is_file($diretorio))
		return true;
	return false;
}

function ehPasta($diretorio) {
	if (is_dir($diretorio))
		return true;
	return false;
}

function enviarEmail ($dados = array()) {
	$to = 'cursos@iefap.com.br';
	$from = 'cursos@iefap.com.br';
	$assunto = 'Uma nova inscrição foi efetuada através do site';

	$email = '';
	$email .= '<html xmlns="http://www.w3.org/1999/xhtml">';
	$email .= '<head>';
	$email .= '<title>resposta.jpg</title>';
	$email .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
	$email .= '<style type="text/css"> ';
	$email .= 'table {} ';
	$email .= 'td img {display: block;} ';
	$email .= 'ul {list-style:none;} ';
	$email .= 'ul, p, span {font-size:0.8em;color:#000;font-family:Arial, Helvetica, sans-serif;} ';
	$email .= 'p {line-height:20px;} ';
	$email .= 'ul li {padding:2px;} ';
	$email .= '</style>';
	$email .= '</head>';
	$email .= '<body bgcolor="#ffffff">';
	$email .= '<table width="675" border="0" align="center" cellpadding="0" cellspacing="0" style="display: inline-table;">';
	$email .= '<tr>';
	$email .= '<td>';
	$email .= '<img src="'.WWW_ROOT.'/administrar/imagens/email/spacer.gif" width="14" height="1" border="0" alt="" />';
	$email .= '</td>';
	$email .= '<td>';
	$email .= '<img src="'.WWW_ROOT.'/administrar/imagens/email/spacer.gif" width="647" height="1" border="0" alt="" />';
	$email .= '</td>';
	$email .= '<td>';
	$email .= '<img src="'.WWW_ROOT.'/administrar/imagens/email/spacer.gif" width="14" height="1" border="0" alt="" />';
	$email .= '</td>';
	$email .= '<td>';
	$email .= '<img src="'.WWW_ROOT.'/administrar/imagens/email/spacer.gif" width="1" height="1" border="0" alt="" />';
	$email .= '</td>';
	$email .= '</tr>';
	$email .= '<tr>';
   	$email .= '<td colspan="3">';
   	$email .= '<img src="'.WWW_ROOT.'/administrar/imagens/email/resposta_r1_c1.jpg" width="675" height="138" border="0" alt="" />';
   	$email .= '</td>';
   	$email .= '<td>';
   	$email .= '<img src="'.WWW_ROOT.'/administrar/imagens/email/spacer.gif" width="1" height="138" border="0" alt="" />';
   	$email .= '</td>';
	$email .= '</tr>';
	$email .= '<tr>';
   	$email .= '<td colspan="3">';
   	$email .= '<img src="'.WWW_ROOT.'/administrar/imagens/email/resposta_r2_c1.jpg" width="675" height="98" border="0" alt="" />';
   	$email .= '</td>';
   	$email .= '<td>';
   	$email .= '<img src="'.WWW_ROOT.'/administrar/imagens/email/spacer.gif" width="1" height="98" border="0" alt="" />';
   	$email .= '</td>';
	$email .= '</tr>';
	$email .= '<tr>';
	$email .= '<td colspan="3">';
	$email .= '<img src="'.WWW_ROOT.'/administrar/imagens/email/resposta_r3_c1.jpg" width="675" height="126" border="0" alt="" />';
	$email .= '</td>';
	$email .= '<td>';
	$email .= '<img src="'.WWW_ROOT.'/imagens/email/spacer.gif" width="1" height="126" border="0" alt="" />';
	$email .= '</td>';
	$email .= '</tr>';
	$email .= '<tr>';
	$email .= '<td colspan="3">';
	$email .= '<img src="'.WWW_ROOT.'/administrar/imagens/email/resposta_r4_c1.jpg" width="675" height="10" border="0" alt="" />';
	$email .= '</td>';
	$email .= '<td>';
	$email .= '<img src="'.WWW_ROOT.'/administrar/imagens/email/spacer.gif" width="1" height="10" border="0" alt="" />';
	$email .= '</td>';
	$email .= '</tr>';
	$email .= '<tr>';
	$email .= '<td rowspan="2" style="border-left:1px solid #df6a03">';
	$email .= '&nbsp;';
	$email .= '</td>';
	$email .= '<td valign="top" bgcolor="#ffffff">';
	$email .= '<h3>Olá, '.$dados["nome"].'</h3>';
	$email .= '<p>Você realizou sua inscrição no curso <strong>'.$dados["curso"].'</strong>';
	
	if (!empty($dados["unidade"]))
		$email .= ' e escolheu a unidade <strong>'.$dados["unidade"].'</strong>';
	else 
		$email .= '.';
	
	if (!empty($dados["cargaHoraria"]))
		$email .='. Este curso tem duração de <strong>'.$dados["duracao"].'</strong>';
	
	if (!empty($dados["duracao"]))
		$email .= ', totalizando carga horária de <strong>'.$dados["cargaHoraria"].'</strong>';
	
	if (!empty($dados["valorInscricao"]) && (int) $dados["valorInscricao"] > 0)
	$email .= '. Para efetivação da inscrição será cobrada uma taxa no valor de R$ '.formataDecimalMysql($dados["valorInscricao"]).'. Clique <a href="'.WWW_ROOT.'/boleto.php?curso='.urlencode($dados["curso"]).'&aluno='.urlencode($dados["nome"]).'&email='.urlencode($dados["email"]).'">aqui</a> para solicitar o boleto de pagamento da taxa de inscrição e efetivar sua matrícula';
	
	$email .= '. Abaixo seguem outras informações sobre o curso:</p>';
	
	$itens = 0;
	
	if (!empty($dados["unidade"])) {
		$email .= '<p><strong>'.(++$itens).') Investimento:</strong></p>';
		$email .= '<table width="100%" cellpadding="0" cellspacing="0">';
		$email .= '<tr>';
		$email .= '<td>';
		$email .= '<span>PARCELAS</span>';
		$email .= '</td>';
		$email .= '<td>';
		$email .= '<span>ATÉ O VENCIMENTO (15%)</span>';
		$email .= '</td>';
		$email .= '<td>';
		$email .= '<span>APÓS O VENCIMENTO</span>';
		$email .= '</td>';
		$email .= '<td>';
		$email .= '<span>VALOR TOTAL</span>';
		$email .= '</td>';
		$email .= '</tr>';
	
		// valor total do curso
		$valorTotal = (double) $dados["valorCurso"];
		// valor do curso com desconto
		$valorComDesconto = (double) ($valorTotal - ($valorTotal * 0.15));
		// valor do curso sem desconto
		$valorSemDesconto = $valorTotal;
		// quantidade de parcelas
		$parcelas = (int) $dados["quantidadeParcelas"];
		
		// cálculo do valor da mensalidade se pago até a data do vencimento
		// a função ceil arredonda frações para cima
		$parteInteira = $valorComDesconto / $parcelas;
		$resto = ($valorComDesconto / $parcelas) - $parteInteira;
		//$parte1 = $resto*10;
		//$resto = ($resto * 10) - $parte1;
		//$parte2 = $resto*10;
		//$valor = $parteInteira.",".$parte1.$parte2;
		$comDesconto = formataDecimalMysql($valorComDesconto / $parcelas); 
		
		//$cell = $table->addCell(2000, $cellStyle);
		// cálculo do valor da mensalidade se pago após a data do vencimento
		$parteInteira = $valorSemDesconto / $parcelas;
		$resto = ($valorSemDesconto/$parcelas) - $parteInteira;
		$parte1 = $resto*10;
		$resto = ($resto * 10) - $parte1;
		$parte2 = $resto*10;
		$valor = $parteInteira.",".$parte1.$parte2;	
		$semDesconto = formataDecimalMysql($valorSemDesconto / $parcelas); 
		
		$email .= '<tr>';
		$email .= '<td>';
		$email .= '<span>'.$dados["quantidadeParcelas"].'</span>';
		$email .= '</td>';
		$email .= '<td>';
		$email .= '<span>R$ '.$comDesconto.'</span>';
		$email .= '</td>';
		$email .= '<td>';
		$email .= '<span>R$ '.$semDesconto.'</span>';
		$email .= '</td>';
		$email .= '<td>';
		$email .= '<span>R$ '.formataDecimalMysql($dados["valorCurso"]).'</span>';
		$email .= '</td>';
		$email .= '</tr>';
		$email .= '</table>';
	}
	
	if (!empty($dados["informacoesAulas"])) {
		$email .= '<p><strong>'.(++$itens).') Aulas:</strong></p>';
		$email .= '<p>'.strip_tags($dados["informacoesAulas"]).'</p>';	
	}
	
	if ($dados["unidadeCertificadora"] != 0) {
		$email .= '<p><strong>'.(++$itens).') Instituição de Ensino Superior:</strong></p>';
		if ($dados["unidadeCertificadora"] == Curso::CURSO_UNIDADE_CERTIFICADORA_FIP) {
			$email .= '<p>FIP – Faculdades Integradas de Patos (<a target="_blank" href="http://emec.mec.gov.br/emec/consulta-cadastro/detalhamento/d96957f455f6405d14c6542552b0f6eb/MzMwNA==">Visualizar credenciamento da instituição junto ao MEC</a>)</p>';
		}
		else {
			$email .= '<p>Uninassau – Faculdade Maurício de Nassau (<a target="_blank" href="http://emec.mec.gov.br/emec/consulta-cadastro/detalhamento/d96957f455f6405d14c6542552b0f6eb/MjgzNQ==">Visualizar credenciamento da instituição junto ao MEC</a>)</p>';
		}
	}
	
	if (!empty($dados["cronograma"])) {
		$email .= '<p><strong>'.(++$itens).') Cronograma do curso:</strong></p>';
		$email .= $dados["cronograma"];	
	}
	
	$email .= '<p><strong>'.(++$itens).') Documentos necessários para efetivação da matrícula:</strong></p>';
	$email .= '<ul>';
    $email .= '<li> - Requerimento de matrícula como termo de compromisso entre as partes para entrega de documentos.</li>';
    $email .= '<li> - Formulário de Matrícula.</li>';
    $email .= '<li> - Currículum vitae</li>';
    $email .= '<li> - 02 fotos 3x4 recentes</li>';
    $email .= '<li> - 02 Cópias do CPF e do RG.</li>';
    $email .= '<li> - 02 Cópias autenticadas do Diploma de Graduação ou Declaração Provisória.</li>';
    $email .= '<li> - 02 Cópias da Certidão de Nascimento e/ou Casamento.</li>';
    $email .= '<li> - 02 Contratos de Prestação de Serviços Educacionais </li>';
  	$email .= '</ul>';
	
	$email .= '<br /><span style="font-size:8.0pt;line-height:140%;color:red"><strong>1) Ao IEFAP reserva-se o direito de não realizar o curso ou prorrogar o período de inscrição, caso o número mínimo de vagas (25 alunos) não seja preenchido.</strong></span><br />';
	$email .= '<span style="font-size:8.0pt;line-height:140%;color:red"><strong>2) Alunos que ingressarem após o segundo módulo estarão sujeitos a planos de pagamento diferenciados. Entrar em contato com o IEFAP para maiores informações.</strong></span><br />';
	$email .= '<span style="font-size:8.0pt;line-height:140%;color:red"><strong>3) O cronograma previsto é geral para todos os cursos. A quantidade de meses letivos varia de um curso para o outro. Confira a quantidade de meses letivos do seu curso. Em caso de força maior as datas previstas podem sofrer alteração. Se houver alteração, será feita a devida notificação e ajustes necessários.</strong></span><br />';
	$email .= '<span style="font-size:8.0pt;line-height:140%;color:red"><strong>4) Para maiores informações e esclarecimentos de outras dúvidas pedimos a gentileza de acessar esse <a href="'.WWW_ROOT.'/contato.php">link</a> e deixar o seu contato que ligaremos pra você.</strong></span>';
	
	$email .= '</td>';
	$email .= '<td rowspan="2" style="border-right:1px solid #df6a03">';
	$email .= '&nbsp;';
	$email .= '</td>';
	$email .= '<td><img src="'.WWW_ROOT.'/administrar/imagens/email/spacer.gif" width="1" height="390" border="0" alt="" />';
	$email .= '</td>';
	$email .= '</tr>';
	$email .= '<tr>';
	$email .= '<td>';
	$email .= '<img src="'.WWW_ROOT.'/administrar/imagens/email/resposta_r6_c2.jpg" width="647" height="12" border="0" alt="" />';
	$email .= '</td>';
	$email .= '<td>';
	$email .= '<img src="'.WWW_ROOT.'/administrar/imagens/email/spacer.gif" width="1" height="12" border="0" alt="" />';
	$email .= '</td>';
	$email .= '</tr>';
	$email .= '<tr>';
	$email .= '<td colspan="3">';
	$email .= '<img src="'.WWW_ROOT.'/administrar/imagens/email/resposta_r7_c1.jpg" width="675" height="26" border="0" alt="" />';
	$email .= '</td>';
	$email .= '<td>';
	$email .= '<img src="'.WWW_ROOT.'/administrar/imagens/email/spacer.gif" width="1" height="26" border="0" alt="" />';
	$email .= '</td>';
	$email .= '</tr>';
	$email .= '</table>';
	$email .= '</body>';
	$email .= '</html>';
	
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'To: <'.$to.'>' . "\r\n";
	$headers .= 'From: <'.$from.'>' . "\r\n";
	
	//mail($to, $assunto, $email, $headers);
	echo $email;
	
}

function enviarEmailBoleto ($dados = array()) {
	$to = 'cursos@iefap.com.br';
	$from = 'cursos@iefap.com.br';
	$assunto = 'Enviar boleto para pagamento da taxa de inscrição';
	
	$email = '';
	$email .= '<html xmlns="http://www.w3.org/1999/xhtml">';
	$email .= '<head>';
	$email .= '<title>resposta.jpg</title>';
	$email .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
	$email .= '<style type="text/css">';
	$email .= ' td img {display: block;}';
	$email .= ' ul {list-style:none;}';
	$email .= ' ul, p, span {font-size:0.8em;color:#000;font-family:Arial, Helvetica, sans-serif;}';
	$email .= ' p {line-height:20px;} ul li {padding:2px;}';
	$email .= '</style>';
	$email .= '</head>';
	$email .= '<body bgcolor="#ffffff">';
	$email .= '<table width="675" border="0" align="center" cellpadding="0" cellspacing="0" style="display: inline-table;">';
	$email .= '<tr>';
	$email .= '<td>';
	$email .= '<img src="'.WWW_ROOT.'/administrar/imagens/email/spacer.gif" width="14" height="1" border="0" alt="" />';
	$email .= '</td>';
	$email .= '<td>';
	$email .= '<img src="'.WWW_ROOT.'/administrar/imagens/email/spacer.gif" width="647" height="1" border="0" alt="" />';
	$email .= '</td>';
	$email .= '<td>';
	$email .= '<img src="'.WWW_ROOT.'/administrar/imagens/email/spacer.gif" width="14" height="1" border="0" alt="" />';
	$email .= '</td>';
	$email .= '<td>';
	$email .= '<img src="'.WWW_ROOT.'/administrar/imagens/email/spacer.gif" width="1" height="1" border="0" alt="" />';
	$email .= '</td>';
	$email .= '</tr>';
	$email .= '<tr>';
   	$email .= '<td colspan="3">';
   	$email .= '<img src="'.WWW_ROOT.'/administrar/imagens/email/resposta_r1_c1.jpg" width="675" height="138" border="0" alt="" />';
   	$email .= '</td>';
   	$email .= '<td>';
   	$email .= '<img src="'.WWW_ROOT.'/administrar/imagens/email/spacer.gif" width="1" height="138" border="0" alt="" />';
   	$email .= '</td>';
	$email .= '</tr>';
	$email .= '<tr>';
	$email .= '<td colspan="3">';
	$email .= '<img src="'.WWW_ROOT.'/administrar/imagens/email/resposta_r4_c1.jpg" width="675" height="10" border="0" alt="" />';
	$email .= '</td>';
	$email .= '<td>';
	$email .= '<img src="'.WWW_ROOT.'/administrar/imagens/email/spacer.gif" width="1" height="10" border="0" alt="" />';
	$email .= '</td>';
	$email .= '</tr>';
	$email .= '<tr>';
	$email .= '<td rowspan="2" style="border-left:1px solid #df6a03">';
	$email .= '&nbsp;';
	$email .= '</td>';
	$email .= '<td valign="top" bgcolor="#ffffff">';
	$email .= '<h3>Solicitação de boleto</h3>';
	$email .= '<p>O(A) aluno(a) <strong>' . $dados["aluno"] . '</strong> que realizou inscrição no curso <strong>' . $dados["curso"]. '</strong> solicitou o boleto para pagamento da taxa de inscrição. Enviar o boleto para <strong>'.$dados["email"].'</strong>.</p>';
	$email .= '</td>';
	$email .= '<td rowspan="2" style="border-right:1px solid #df6a03">';
	$email .= '&nbsp;';
	$email .= '</td>';
	$email .= '<td>';
	$email .= '<img src="'.WWW_ROOT.'/administrar/imagens/email/spacer.gif" width="1" height="390" border="0" alt="" />';
	$email .= '</td>';
	$email .= '</tr>';
	$email .= '<tr>';
	$email .= '<td>';
	$email .= '<img src="'.WWW_ROOT.'/administrar/imagens/email/resposta_r6_c2.jpg" width="647" height="12" border="0" alt="" />';
	$email .= '</td>';
	$email .= '<td>';
	$email .= '<img src="'.WWW_ROOT.'/administrar/imagens/email/spacer.gif" width="1" height="12" border="0" alt="" />';
	$email .= '</td>';
	$email .= '</tr>';
	$email .= '<tr>';
	$email .= '<td colspan="3">';
	$email .= '<img src="'.WWW_ROOT.'/administrar/imagens/email/resposta_r7_c1.jpg" width="675" height="26" border="0" alt="" />';
	$email .= '</td>';
	$email .= '<td>';
	$email .= '<img src="'.WWW_ROOT.'/administrar/imagens/email/spacer.gif" width="1" height="26" border="0" alt="" />';
	$email .= '</td>';
	$email .= '</tr>';
	$email .= '</table>';
	$email .= '</body>';
	$email .= '</html>';

	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'To: <'.$to.'>' . "\r\n";
	$headers .= 'From: <'.$from.'>' . "\r\n";
	
	//mail($to, $assunto, $email, $headers);
	echo $email;
	
}
*/

?>