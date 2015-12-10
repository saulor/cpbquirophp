<?php

	require_once("config.php");

	list($type, $data) = explode(';', $_POST['foto']);
	list(, $data)      = explode(',', $data);
	$data = base64_decode($data);
	
	$conexao = new Conexao();
	$dao = new DAOGenerico();
	
	$dados = $dao->findByPk ($conexao->getConexao(), "pacientes", (int) $_GET["id"]);

	$diretorio = DIR_UPLOADS . SEPARADOR_DIRETORIO . "pacientes" . SEPARADOR_DIRETORIO . $dados["id"];
	
	if (existeArquivo($diretorio . SEPARADOR_DIRETORIO . $dados["foto"])) {
		excluiArquivo($diretorio . SEPARADOR_DIRETORIO . $dados["foto"]);
	}
		
	if (!existeDiretorio($diretorio)) {
		criaDiretorio($diretorio);
	}
		
	$nomeFoto = date('dmYHis') . '.png';
	
	$file = file_put_contents($diretorio . '/' . $nomeFoto, $data);
	 
	if (is_integer($file)) {	
		$dados["foto"] = $nomeFoto;
		$dao->salva ($conexao->getConexao(), "pacientes", $dados);
		$conexao->getConexao()->commit();
		$conexao->getConexao()->disconnect();
		echo $diretorio . '/' . $nomeFoto;
	}
	 
	
?>