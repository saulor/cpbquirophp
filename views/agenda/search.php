<?php

	require_once ('../../config.php');
	$conexao = new Conexao();
	$q = $_GET['q'];
	
	$fisioterapeutas = $conexao->getConexao()->query()
		->from("usuarios")
		->where("permissao = ?", (int) Permissao::PERMISSAO_FISIOTERAPEUTA)
		->where("nome like ?", '%' . $q . '%')
		->all();
	
	$arr = array();
	
	foreach ($fisioterapeutas as $fisioterapeuta) {
		$arr[] = array(
			"id" => $fisioterapeuta["id"],
			"name" => $fisioterapeuta["nome"]
		); 
	}
	
	echo json_encode($arr);
	
?>