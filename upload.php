<?php

	require_once("config.php");

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
		
	$nomeFoto = date('dmYHis') . '.jpg';
	 
	if (move_uploaded_file($_FILES["webcam"]["tmp_name"], $diretorio . SEPARADOR_DIRETORIO . $nomeFoto)) {
		$dados["foto"] = $nomeFoto;
		$dao->salva ($conexao->getConexao(), "pacientes", $dados);
		$conexao->getConexao()->commit();
		$conexao->getConexao()->disconnect();
	}
	 
?>