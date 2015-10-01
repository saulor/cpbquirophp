<?php

	// search for Cross-origin resource sharing (CORS)
	// This fixes common cross-domain errors
	header("Access-Control-Allow-Origin: *");
	
	// buscas de logs
	
	if (count($_POST) > 0) { 
		require_once("../../config.php");
		$conexao = new Conexao();
		$modulo = $_POST['dados']['modulo'];
		$order = isset($_POST['dados']['order']) ? $_POST['dados']['order'] : NULL;
		$exibir = $quantidadePorPagina = (isset($_POST["dados"]["exibir"]) && !empty($_POST["dados"]["exibir"]))  ? (int) $_POST["dados"]["exibir"] : QUANTIDADE_POR_PAGINA;
		$pagina = isset($_POST["dados"]["pagina"]) ? $_POST["dados"]["pagina"] : 1;
		$pagina = $pagina <= 0 ? 1 : $pagina;
		$limit = $pagina == 1 ? $quantidadePorPagina : $quantidadePorPagina * ($pagina - 1);
		$offset = $pagina == 1 ? 0 : $quantidadePorPagina;
		
		$query = $conexao->getConexao()->query()
			->from("vw_usuarios");
			
		$query = $query->order("vw_usuarios.data", "desc");
			
		if (!empty($_POST["dados"]["nome"])) {
			$query = $query->where("vw_usuarios.nome like ?", "%" . codificaDado($_POST["dados"]["nome"]) . "%");
			$query = $query->order("vw_usuarios.nome", "asc");
		}
		
		if (!empty($_POST["dados"]["nomePermissao"])) {
			$query = $query->where("vw_usuarios.nomePermissao like ?", abscodificaDado($_POST["dados"]["nomePermissao"]) . "%");
			$query = $query->order("vw_usuarios.nomePermissao", "asc");
		}
		
		if (preg_match("/^\d{2}\\/\d{2}\/\d{4}$/", $_POST["dados"]["dataFormatada"])) {
			list($dia, $mes, $ano) = explode("/", $_POST["dados"]["dataFormatada"]);
			$data = $ano . "-" . $mes . "-" . $dia;
			if ($data) {
				$query = $query->where("DATE(vw_usuarios.data) = ?", $data);
			}
		}
		
		$quantidade = $query->count();
				
		$query->limitIn($limit, $offset);
		
		$params["objetos"] = $query->all();
		
		if ($quantidade == 0) {
			$iniCount = $inicio = 0;
		}
		else {
			$iniCount = $inicio = ($quantidadePorPagina * $pagina) - ($quantidadePorPagina - 1);
		}
		
		if ($inicio + ($quantidadePorPagina - 1) > $quantidade) {
			$fim = $quantidade;
		}
		else {
			$fim = $inicio + ($quantidadePorPagina - 1);
		}
		
		$acoesMassa = array();
		
		$table = array(
			'fields' => array(
				'nome' => array(
					'link' => array(
						'condition' => 'return true;',
						'link' => 'return "?modulo=' . $modulo . '&acao=cadastrar&id=" . $objeto["id"];'
					),
					'ajax' => 'ajax.php',
					'label' => 'Nome'
				),
				'nomePermissao' => array(
					'ajax' => 'ajax.php',
					'align' => 'center',
					'label' => 'Permissão'
				),
				'dataFormatada' => array(
					'ajax' => 'ajax.php',
					'class' => 'data',
					'align' => 'center',
					'label' => 'Data'
				)
			),
			'acoes' => array(
				'Excluir' => array(
					'condition' => 'return true;',
					'acao' => 'return "excluir";',
					'id' => 'return $objeto["id"];'
				)
			),
			'acoesMassa' => array(
				'excluir' => 'Excluir'
			)
		);
		
		include('../includes/rows-listagem.phtml');
		
		echo json_encode(array(
				"quantidade" => $quantidade,
				"inicio" => $inicio,
				"fim" => $fim,
				"modulo" => $modulo,
				"result" => $rows
			)
		);
			
	}
?>