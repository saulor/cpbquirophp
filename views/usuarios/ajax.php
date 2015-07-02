<?php

	// search for Cross-origin resource sharing (CORS)
	// This fixes common cross-domain errors
	header("Access-Control-Allow-Origin: *");
	
	// buscas de logs
	
	if (count($_POST) > 0) { 
	
		require_once("../../config.php");
	
		$conexao = new Conexao();
		
		$modulo = "usuarios";
		$quantidadePorPagina = QUANTIDADE_POR_PAGINA;
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
			$query = $query->where("vw_usuarios.nomePermissao like ?", codificaDado($_POST["dados"]["nomePermissao"]) . "%");
			$query = $query->order("vw_usuarios.nomePermissao", "asc");
		}
		
		if (preg_match("/^\d{2}\\/\d{2}\/\d{4}$/", $_POST["dados"]["dataFormatada"])) {
			list($dia, $mes, $ano) = explode("/", $_POST["dados"]["dataFormatada"]);
			$data = $ano . "-" . $mes . "-" . $dia;
			if ($data) {
				$query = $query->where("DATE(vw_usuarios.data) = ?", $data);
			}
		}
		
		$quantidade = count($query->all());
				
		$query = $query->limitIn($limit, $offset);
		
		$dados = $query->all();
		
		$table = array(
			'fields' => array(
				'nome' => array(
					'ajax' => true,
					'editField' => true,
					'label' => 'Nome'
				),
				'nomePermissao' => array(
					'ajax' => true,
					'align' => 'center',
					'label' => 'Permissão'
				),
				'dataFormatada' => array(
					'ajax' => true,
					'class' => 'data',
					'align' => 'center',
					'label' => 'Data'
				)
			),
			'acoesMassa' => array(
				'excluir' => 'Excluir'
			)
		);
		
		$result = '';
		
		foreach ($dados as $objeto) {
			$result .= '<tr>';
			$result .= '<th scope="row">';
			$result .= '<small>' . $inicio++ . '</small>';
			$result .= '</th>';
			$result .= '<td>';
	        $result .= '<input type="checkbox" name="objetos[]" value="' . $objeto["id"] . '" />';
	        $result .= '</td>';
			foreach ($table['fields'] as $key => $f) {
				if (array_key_exists($key, $objeto)) {
					$result .= '<td';
					if (isset($f['align'])) {
						$result .= ' class="' . $f['align'] . '"';
					}
					$result .= '>';
					if (isset($f["editField"])) {
						$result .= '<a href="?modulo=usuarios&acao=cadastrar&id=' . $objeto["id"] . '"';
						$result .= '>';
					}
					$result .= $objeto[$key];
					if (isset($f["editField"])) {
						$result .= '</a>';
					}
					if (isset($f["info"])) {
						$result .= '<br /><small>';
						$result .= eval($f["info"]);
						$result .= '</small>';
					}
					if (isset($f["acoes"])) {
						$result .= '<div>';
						$as = array();
						foreach ($f["acoes"] as $key => $value) {
							$a = '<a href="?modulo=usuarios&acao=' . $key;
							$a .= '&id=' . $objeto["id"] . '">';
							$a .= $value;
							$a .= '</a>';
							$as[] = $a; 	
						}
						$result .= implode(" | ", $as);
						$result .= '</div>';
					}
					$result .= '</td>';
				}
			}
			
			$result .= '<td>';
			$result .= '<a href="?modulo=usuarios&acao=cadastrar&id=' . $objeto["id"] . '">';
			$result .= '<img title="Editar" alt="Editar" src="imagens/edit-icon.gif" />';
			$result .= '</a>';
			$result .= '</td>';
			$result .= '<td>';
			$result .= '<a href="?modulo=usuarios&acao=excluir&id=' . $objeto["id"] . '">';
			$result .= '<img title="Excluir" alt="Excluir" src="imagens/delete-icon.gif" />';
			$result .= '</a>';
			$result .= '</td>';
			
			$result .= '</tr>';
		}
		
		$jsonRetorno = array(
			"quantidade" => $quantidade,
			"result" => $result
		);
		
		$conexao->getConexao()->disconnect();
		echo json_encode($jsonRetorno);
			
	}
?>