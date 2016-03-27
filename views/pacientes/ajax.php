<?php

	// search for Cross-origin resource sharing (CORS)
	// This fixes common cross-domain errors
	header ("Access-Control-Allow-Origin: *");
	header ("Content-type: text/html; charset=UTF-8");

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
			->from("pacientes");

		if (!empty($_POST["dados"]["nome"])) {
			$query->where("nome like ?", "%" . codificaDado($_POST["dados"]["nome"]) . "%");
			$query->order("nome", "asc");
		}

		if (!empty($_POST["dados"]["cpf"])) {
			$query->where("cpf like ?", $_POST["dados"]["cpf"] . "%");
			$query->order("nome", "asc");
		}

		if (preg_match("/^\d{2}\\/\d{2}\/\d{4}$/", $_POST["dados"]["dataFormatada"])) {
			list($dia, $mes, $ano) = explode("/", $_POST["dados"]["dataFormatada"]);
			$data = $ano . "-" . $mes . "-" . $dia;
			if ($data) {
				$query->where("DATE(data) = ?", $data);
			}
		}

		if (empty($order)) {
			$query->order("data", "desc");
		}
		else {
			$query->order($order, "asc");
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
				'thumbnail' => array(
					'dir' => 'return DIR_UPLOADS . "/" . "pacientes" . "/" . $objeto["id"] . "/" . $objeto["foto"];',
					'path' => 'return "uploads/pacientes/" . $objeto["id"] . "/" . $objeto["foto"];',
	  			'align' => 'center',
	  			'class' => 'foto',
	  			'label' => 'Foto',
	  		),
	  		'nome' => array(
	  			'ajax' => 'ajax.php',
	  			'order' => true,
	  			'link' => array(
	  				'condition' => 'return true;',
	  				'link' => 'return "?modulo=' . $modulo . '&acao=cadastrar&id=" . $objeto["id"];'
	  			),
	  			'label' => 'Nome',
	  			'info' => array(
	  				0 => array(
	  					'info' => 'return Paciente::getTratamentos($objeto["tratamentos"]);'
	  				)
	  			),
	  			'links' => array(
	  				'Atendimento' => array(
	  					'condition' => 'return true;',
	  					'url' => 'return "?modulo=' . $modulo . '&acao=atendimento&paciente=" . $objeto["id"];'
	  				),
	  				'Ficha' => array(
	  					'condition' => 'return true;',
	  					'url' => 'return "?modulo=' . $modulo . '&acao=ficha&id=" . $objeto["id"];'
	  				)
	  			)
	  		),
				'observacoes' => array(
	  			'label' => 'Observações',
	  		),
	  		'cpf' => array(
	  			'ajax' => 'ajax.php',
	  			'align' => 'center',
	  			'class' => 'cpf',
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
	  		'dataFormatada' => array(
	  			'content' => 'return date("d/m/Y", $objeto["timestamp"]);',
	  			'ajax' => 'ajax.php',
	  			'class' => 'data',
	  			'align' => 'center',
	  			'label' => 'Data',
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
