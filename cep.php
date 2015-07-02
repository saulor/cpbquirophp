<?php
	
	// search for Cross-origin resource sharing (CORS)
	// This fixes common cross-domain errors
	header("Access-Control-Allow-Origin: *");
	
	$cep = $_GET['cep'];
	
	include("lib/phpQuery-onefile.php");
	
	function simple_curl($url, $post=array(), $get=array()){
		$ch = curl_init($url);
		curl_setopt ($ch, CURLOPT_POST, 1);
		curl_setopt ($ch, CURLOPT_POSTFIELDS, http_build_query($post));
		curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		return curl_exec ($ch);
	}
	
	$html = simple_curl("http://m.correios.com.br/movel/buscaCepConfirma.do",array(
			"cepEntrada" => $cep,
			"tipoCep" => "",
			"cepTemp" => "",
			"metodo" => "buscarCep"
		)
	);
	
	phpQuery::newDocumentHTML($html, $charset = "utf-8");
	
	$d = array(
		'logradouro' => trim(pq('.caixacampobranco .resposta:contains("Logradouro: ") + .respostadestaque:eq(0)')->html()),
		'bairro' => trim(pq('.caixacampobranco .resposta:contains("Bairro: ") + .respostadestaque:eq(0)')->html()),
		'cidade/uf' => trim(pq('.caixacampobranco .resposta:contains("Localidade / UF: ") + .respostadestaque:eq(0)')->html()),
		'cep' => trim(pq('.caixacampobranco .resposta:contains("CEP: ") + .respostadestaque:eq(0)')->html())
	);
	
	$dados = array();
	
	if (!empty($d["logradouro"])) {
		$logradouro = $d["logradouro"];
		if (strpos($logradouro, "-") !== false)
			list($logradouro,) = explode("-", $d["logradouro"]);
		list($cidade, $uf) = explode("/", $d["cidade/uf"]);
		$dados = array(
			'logradouro' => trim($logradouro),
			'bairro' => trim($d["bairro"]),
			'cidade' => trim($cidade),
			'estado' => trim($uf),
			'cep' => trim($d["cep"])
		);
	}
	
	echo json_encode($dados);

?>