<?php
	
	require_once("../config.php");
	$logDao = new LogDAO();
	$conexao = new Conexao();
	
	// buscas de logs
	
	if (count($_POST) > 0) { 
	
		$quantidadePorPagina = QUANTIDADE_POR_PAGINA;
		$pagina = (isset($_POST["dados"]["pagina"])) ? $_POST["dados"]["pagina"] : 1;
		$pagina = ($pagina <= 0) ? 1 : $pagina;
		$limit = ($pagina == 1) ? $quantidadePorPagina : $quantidadePorPagina * ($pagina - 1);
		$offset = ($pagina == 1) ? 0 : $quantidadePorPagina;
	
		switch ($_GET['q']) {
		
			case 'logs' :
					
				$query = $conexao->getConexao()->query()->from("logs");
				
				if (!empty($_POST['dados']['quem'])) {
					$query = $query->where("quem like ?", "%".codificaDado($_POST['dados']['quem'])."%");
				}
				
				if (!empty($_POST['dados']['acao'])) {
					$query = $query->where("acao like ?", codificaDado($_POST['dados']['acao'])."%");
				}
				
				if (!empty($_POST['dados']['oque'])) {
					$query = $query->where("oque like ?", "%".codificaDado($_POST['dados']['oque'])."%");
				}
				
				if (!empty($_POST['dados']['qual'])) {
					$query = $query->where("qual like ?", "%".codificaDado($_POST['dados']['qual'])."%");
				}
				
				if (!empty($_POST['dados']['descricao'])) {
					$query = $query->where("descricao like ?", "%".codificaDado($_POST['dados']['descricao'])."%");
				}
				
				if (preg_match("/^\d{2}\\/\d{2}\/\d{4}$/", $_POST['dados']['data'])) {
					list($dia, $mes, $ano) = explode("/", $_POST['dados']['data']);
					$data = $ano . "-" . $mes . "-" . $dia;
					if ($data) {
						$query = $query->where("DATE(data) = ?", $data);
					}
				}
				
				$quantidade = count($query->all());
				
				$query = $query->limitIn($limit, $offset);
				
				$query = $query->order("data", "desc");
				$dados = $query->all();
				
				foreach ($dados as $key => $value) {
					$dados[$key] = decodificaDados($value);
					$dados[$key]["data"] = getDataHoraFormatada($dados[$key]["timestampData"]);
				}
				
				$dados[]["quantidade"] = $quantidade;
				$conexao->getConexao()->disconnect();
				echo json_encode($dados);
			
			break;
			
			case 'pacientes' :
				
				$query = $conexao->getConexao()
					->query()
					->from("pacientes");
				
				if (!empty($_POST["dados"]['nome'])) {
					$query = $query->where("nome like ?", "%".codificaDado($_POST["dados"]['nome'])."%");
					$query = $query->order("nome", "asc");
				}
				else {
					$query = $query->order("data", "desc");
				}
				
				$quantidade = count($query->all());
				
				$query = $query->limitIn($limit, $offset);
				
				$dados = $query->all();
				
				foreach ($dados as $key => $value) {
					$dados[$key] = decodificaDados($value);
					
//					$dados[$key]["nome"] = compactaTexto(decodificaDado($dados[$key]['nome']));
//					
//					$quantidadePreinscricoes = $preinscricaoDAO->getQuantidadePreinscricoes($conexao->getConexao(), $value,$estadosUsuario
//					);
//					
//					$dados[$key]["quantidadePreinscricoes"] = $quantidadePreinscricoes;
//					$dados[$key]["unidadeCertificadora"] = Curso::getCertificadora($dados[$key]["unidadeCertificadora"]);
//					$dados[$key]["tipo"] = $dados[$key]["tipo"];
//					$dados[$key]["nomeTipo"] = Curso::getTipo($dados[$key]["tipo"]);
//					$dados[$key]["categoria"] = Curso::getNomeCategoria($dados[$key]["categoria"]);
//					$dados[$key]["area"] = Curso::getArea($dados[$key]["area"]);
					$dados[$key]["data"] = getData($dados[$key]["timestamp"]); 
				}
				
				$dados[]["quantidade"] = $quantidade;
				$conexao->getConexao()->disconnect();
				echo json_encode($dados);
			
			break;
			
			case 'usuarios' :
					
				$query = $conexao->getConexao()->query()
					->from("usuarios");
					
				if (!empty($_POST["dados"]['nome'])) {
					$query = $query->where("usuarios.nome like ?", "%".codificaDado($_POST["dados"]['nome'])."%");
					$query = $query->order("usuarios.nome", "asc");
				}
				else {
					$query = $query->order("usuarios.data", "desc");
				}
				
				$quantidade = count($query->all());
				
				$query = $query->limitIn($limit, $offset);
				
				$dados = $query->all();
				
				foreach ($dados as $key => $value) {
					$dados[$key] = decodificaDados($value);
					$dados[$key]["permissao"] = Usuario::getPermissao($dados[$key]['permissao']);	
					$dados[$key]["data"] = getData($dados[$key]['timestamp']);	
				}
				
				$dados[]["quantidade"] = $quantidade;
				$conexao->getConexao()->disconnect();
				echo json_encode($dados);
			
			break;
			
		}
	}
	
?>