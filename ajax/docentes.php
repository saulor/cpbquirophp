<?php
	
	require_once("../config.php");
	$logDao = new LogDAO();
	$conexao = new Conexao();
	$dao = new DAO();
	$logDAO = new LogDAO();
	
	if (count($_GET) > 0) { 
		
		// acao que será realizada
		$acao = $_GET["acao"];
		// o que vai excluir
		$oQue = $_GET["oQue"];
		// quem realizou a ação
		$quem = $_SESSION[PREFIX . "loginNome"];	
		
		if ($acao == "remover") {	
			
			$docente = $dao->getDados($conexao->getConexao(), "docentes", array(
					"where" => array(
						"id" => (int) $_GET['docente']
					)
				)
			);
			
			switch ($oQue) {
			
				case "graduacoes" :
					$tabela = "docentes_graduacoes";
					$acao = "excluiu";
					$oQue2 = "graduação";
					$objeto = $dao->getDados($conexao->getConexao(), $tabela, array(
							"where" => array(
								"id" => (int) $_GET['id']
							)
						)
					);
					$nome = $objeto["graduacao"];
					$mensagem = "Usuário excluiu graduação do Profissional Docente " . $docente["nome"] . ".";
				break;
				
				case "senior" :
					$tabela = "docentes_graduacoes_senior";
					$acao = "excluiu";
					$oQue2 = "graduação senior";
					$objeto = $dao->getDados($conexao->getConexao(), $tabela, array(
							"where" => array(
								"id" => (int) $_GET['id']
							)
						)
					);
					$nome = $objeto["graduacaoSenior"];
					$mensagem = "Usuário excluiu graduação senior do Profissional Docente " . $docente["nome"] . ".";
				break;
				
				case "curso" :
					$tabela = "docentes_cursos";
					$acao = "excluiu";
					$oQue2 = "curso";
					$objeto = $dao->getDados($conexao->getConexao(), $tabela, array(
							"where" => array(
								"id" => (int) $_GET['id']
							)
						)
					);
					$nome = $objeto["curso"];
					$mensagem = "Usuário excluiu curso do Profissional Docente " . $docente["nome"] . ".";
				break;
				
				case "disciplina" :
					$tabela = "docentes_cursos_disciplinas";
					$acao = "excluiu";
					$oQue2 = "disciplina";
					$objeto = $dao->getDados($conexao->getConexao(), $tabela, array(
							"where" => array(
								"id" => (int) $_GET['id']
							)
						)
					);
					$nome = $objeto["disciplina"];
					$mensagem = "Usuário excluiu disciplina do Profissional Docente " . $docente["nome"] . ".";
				break;
				
				default :
				break;
			}
			
			$affectedRows = $dao->exclui($conexao->getConexao(), $tabela, array(
					"id" => (int) $_GET['id']
				)
			);
			
			if ($affectedRows > 0) {
				$logDAO->adicionar ($conexao->getConexao(), $acao, $oQue2, $quem, $nome, $mensagem);
				$conexao->getConexao()->commit();
				echo 1;
			}
			else {
				echo 0;
			}
		}

	}		
	
	$conexao->getConexao()->disconnect();
	
?>