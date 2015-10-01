<?php
	
	header("Access-Control-Allow-Origin: *");
	require_once("../../config.php");
	$conexao = new Conexao();
	$dao = new DAOGenerico();
	
	switch ($_GET['acao']) {
		case 'recupera' :
			$compromisso = $dao->findByPk($conexao->getConexao(), "agenda", $_POST['id']);
			$fisioterapeutas = $dao->findAll($conexao->getConexao(), "agenda_fisioterapeutas", array(
					"where" => array(
						"compromisso" => $_POST['id']
					)
				)
			);
			$arr = array();
			foreach ($fisioterapeutas as $f) {
				$arr[] = $f["fisioterapeuta"];
			}
			$compromisso["fisioterapeutas"] = implode(",", $arr);
			echo json_encode($compromisso);
		break;
		
		case 'cadastra' :
			
			try {

				$dados = $_POST["dados"];
				$fisioterapeutasMarcados = !empty($dados["fisioterapeutas"]) ? explode(",", $dados["fisioterapeutas"]) : array();
				$fisioterapeutasAtuaisIds = $fisioterapeutas = $indisponiveis = array();
				
				// verifica disponibilidade de horário para cada fisioterapeuta marcado
				foreach ($fisioterapeutasMarcados as $f) {
					list($nome, $id) = explode("-", $f);
					$fisioterapeutas[] = $id;
					$quantidadeCompromissos = $dao->count($conexao->getConexao(), "agenda", array(
							"leftJoin" => array(
								"agenda_fisioterapeutas" => "agenda_fisioterapeutas.compromisso = agenda.id"
							),
							"where" => array(
								"agenda.data" => $dados["data"],
								"agenda.hora" => $dados["hora"],
								"agenda_fisioterapeutas.fisioterapeuta" => $id 
							),
							"whereNot" => array(
								"agenda.id" => $dados["id"]
							)
						)
					);
					if ($quantidadeCompromissos > 0) {
						$indisponiveis[] = $nome;
					}
				}
				
				if (count($indisponiveis) > 0) {
					echo json_encode(array(
							'type' => 'danger',
							'message' => 'Já existe(m) compromisso(s) para ' . implode(', ', $indisponiveis) . ' nesta mesma data e horário.'
						)
					);
					exit;
				}
				
				$fisioterapeutasAtuais = $dao->findAll($conexao->getConexao(), "agenda_fisioterapeutas", array(
						"where" => array(
							"compromisso" => $dados["id"]
						)
					)
				);
				
				foreach ($fisioterapeutasAtuais as $f) {
					$fisioterapeutasAtuaisIds[] = $f["fisioterapeuta"];
				}
				
				$dados = retiraDoArray(array("fisioterapeutas"), $dados);
				list($dados["dia"],$dados["mes"],$dados["ano"]) = explode("/", $dados["data"]);
				
				if ($dados['id'] == 0) {
					$dados["timestampC"] = time();
					$dados["dataC"] = date('d/m/Y H:i:s', $dados["timestampC"]);
				}
				
				$dados = $dao->salva($conexao->getConexao(), "agenda", $dados);
				
				$excluidos = array_diff($fisioterapeutasAtuaisIds, $fisioterapeutas);
				$incluidos = array_diff($fisioterapeutas, $fisioterapeutasAtuaisIds);
	
				foreach ($incluidos as $id) {
					$dao->salva($conexao->getConexao(), "agenda_fisioterapeutas", array(
							"id" => 0,
							"fisioterapeuta" => $id,
							"compromisso" => $dados["id"] 
						)
					);
				}
				
				foreach ($excluidos as $id) {
					$dao->exclui($conexao->getConexao(), "agenda_fisioterapeutas", array(
							"where" => array(
								"compromisso" => $dados["id"],
								"fisioterapeuta" => $id
							)
						)
					);
				}
				
				$conexao->getConexao()->commit();
				echo json_encode(array(
						'type' => 'success',
						'message' => 'Salvo com sucesso'
					)
				);
			}
			catch (Exception $e) {
				echo json_encode(array(
						'type' => 'danger',
						'message' => $e->getMessage()
					)
				);
			}
			
		break;
		
		case "exclui" :
			
			try {
				$dao->excluiByPk($conexao->getConexao(), "agenda", $_POST["id"]);
				$conexao->getConexao()->commit();
				echo 1;
			}
			catch (Exception $e) {
				echo 0;
			}
		
		break;
	}

?>