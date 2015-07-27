<?php

	// search for Cross-origin resource sharing (CORS)
	// This fixes common cross-domain errors
	header("Access-Control-Allow-Origin: *");
	
	// buscas de logs
	
	if (count($_POST) > 0) { 
	
		require_once("../../config.php");
	
		$conexao = new Conexao();
		
		$modulo = "pacientes";
		$quantidadePorPagina = QUANTIDADE_POR_PAGINA;
		$pagina = isset($_POST["dados"]["pagina"]) ? $_POST["dados"]["pagina"] : 1;
		$pagina = $pagina <= 0 ? 1 : $pagina;
		$limit = $pagina == 1 ? $quantidadePorPagina : $quantidadePorPagina * ($pagina - 1);
		$offset = $pagina == 1 ? 0 : $quantidadePorPagina;
		
		$query = $conexao->getConexao()->query()
			->from("pacientes", array(
					"pacientes.*",
					"DATE_FORMAT(pacientes.data, '%d/%m/%Y %H:%i:%s') as data",
				)
			);
			
		$query = $query->order("data", "desc");
			
		if (!empty($_POST["dados"]["nome"])) {
			$query = $query->where("nome like ?", "%" . codificaDado($_POST["dados"]["nome"]) . "%");
			$query = $query->order("nome", "asc");
		}
		
		if (!empty($_POST["dados"]["cpf"])) {
			$query = $query->where("cpf like ?", codificaDado($_POST["dados"]["cpf"]) . "%");
			$query = $query->order("cpf", "asc");
		}
		
		if (!empty($_POST["dados"]["email"])) {
			$query = $query->where("email like ?", "%" . codificaDado($_POST["dados"]["email"]) . "%");
			$query = $query->order("email", "asc");
		}
		
		if (preg_match("/^\d{2}\\/\d{2}\/\d{4}$/", $_POST["dados"]["data"])) {
			list($dia, $mes, $ano) = explode("/", $_POST["dados"]["data"]);
			$data = $ano . "-" . $mes . "-" . $dia;
			if ($data) {
				$query = $query->where("DATE(data) = ?", $data);
			}
		}
		
		$quantidade = count($query->all());
				
		$query = $query->limitIn($limit, $offset);
		
		$dados = $query->all();
		
		$result = '';
		
		$table = array(
			'fields' => array(
				'nome' => array(
					'ajax' => true,
					'editField' => true,
					'label' => 'Nome',
					'info' => 'return Paciente::getTratamentos($objeto["tratamentos"]);',
					'acoes' => array(
						'atendimento' => 'Atendimento',
						'ficha' => 'Ficha'
					)
				),
				'cpf' => array(
					'ajax' => true,
					'align' => 'center',
					'label' => 'CPF',
				),
				'email' => array(
					'align' => 'center',
					'label' => 'Email',
				),
				'telefoneResidencial' => array(
					'align' => 'center',
					'label' => 'Tel. Res.',
				),
				'telefoneCelular' => array(
					'align' => 'center',
					'label' => 'Tel. Cel.',
				),
				'data' => array(
					'ajax' => true,
					'class' => 'data',
					'align' => 'center',
					'label' => 'Data',
				)
			),
			'acoesMassa' => array(
				'excluir' => 'Excluir'
			)
		);
		
		$result = '';
		$inicio = 1;
		
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
						$result .= '<a href="?modulo=pacientes&acao=cadastrar&id=' . $objeto["id"] . '"';
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
							$a = '<a href="?modulo=pacientes&acao=' . $key;
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
			$result .= '<a href="?modulo=pacientes&acao=cadastrar&id=' . $objeto["id"] . '">';
			$result .= '<img title="Editar" alt="Editar" src="imagens/edit-icon.gif" />';
			$result .= '</a>';
			$result .= '</td>';
			$result .= '<td>';
			$result .= '<a href="?modulo=pacientes&acao=excluir&id=' . $objeto["id"] . '">';
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