<?php

class AgendaController extends Controller {
	
	public function AgendaController() {
		parent::__construct();
		$this->DAO = new DAOGenerico();
	}
	
    public function indexAction() {
    	
    	try {
    		$conexao = $this->conexao->getConexao();
    		$breadcrumbs = array();
    		$breadcrumbs[] = array("Agenda" => "");
    		$quantidadePorPagina = isset($_GET["exibir"]) ? (int) $_GET["exibir"] : QUANTIDADE_POR_PAGINA;
    		$pagina = isset($_GET["p"]) ? $_GET["p"] : 1;
    		$pagina = $pagina <= 0 ? 1 : $pagina;
    		$limit = $pagina == 1 ? $quantidadePorPagina : $quantidadePorPagina * ($pagina - 1);
    		$offset = $pagina == 1 ? 0 : $quantidadePorPagina;
    		$order = array(
    			"data" => "desc"
    		);
    		if (isset($_GET['order'])) {
    			$order = array(
    				$_GET['order'] => "asc"
    			);
    		}
    		$quantidade = 0;
    		$objetos = array();
    		$compromissos = array();

    		$objetos = $this->DAO->findAll($conexao, "agenda", array(
    				"dados" => array(
    					"DISTINCT agenda.id",
    					"agenda.tipo",
    					//"agenda.telefoneResidencial",
    					//"agenda.telefoneCelular",
    					"agenda.data",
    					"agenda.hora",
    					"agenda.dia",
    					"agenda.mes",
    					"agenda.ano",
    					//"DATE_FORMAT(agenda.data, '%d/%m/%Y') as dataFormatada",
    					"SUBSTR(agenda.hora, 1, 5) as horaFormatada",
    					//"agenda.dataC",
    					//"agenda.timestampC",
    					//"DATE_FORMAT(agenda.dataC, '%d/%m/%Y') as dataCFormatada",
    					//"pacientes.id as idPaciente",
    					"pacientes.nome as nomePaciente "
    				),
    				"where" => array(
    					"agenda.mes" => date('m'),
    					"agenda.ano" => date('Y')
    				),
    				"join" => array(
    					"pacientes" => "pacientes.id = agenda.paciente",
    					"agenda_fisioterapeutas" => "agenda.id = agenda_fisioterapeutas.compromisso"
    				),
    				"order" => array(
    					"agenda.hora" => "asc"
    				)
    			)
    		);

    		$fisioterapeutas = $this->DAO->findAll($conexao, "vw_usuarios", array(
    				"where" => array(
    					"permissao" => Permissao::PERMISSAO_FISIOTERAPEUTA
    				),
    				"order" => array(
    					"nome" => "asc"
    				)
    			)
    		);
    		
    		$mesAtual = rangeMonth(date('Y') . '-' . date('m') . '-'.date('d'));
    		
    		for ($i=$mesAtual["start"];$i<=$mesAtual["end"];$i++) {
    			foreach ($objetos as $objeto) {
    				if ($objeto["dia"] == $i) {
    					$compromissos[(int) $i][$objeto["hora"]] = $objeto;
    				}
    			}
    		}
    		
    	}
    	catch (Exception $e) {
    		setMensagem("error", $e->getMessage());
    	}
    	$conexao->disconnect();
    	$view = new View($_GET["modulo"], "extendido", "index.phtml");
    	$view->setParams(array(
    			"title" => getTitulo($breadcrumbs), 
    			"compromissos" => $compromissos,
    			"fisioterapeutas" => $fisioterapeutas,
    			"quantidade" => $quantidade,
    			"quantidadePorPagina" => $quantidadePorPagina,
    			"pagina" => $pagina,
    			"breadcrumbs" => $breadcrumbs
    		)
    	);
    	$view->showContents();
    }
    
    public function cadastrarAction() {
    	
    	try {
    		$conexao = $this->conexao->getConexao();
    		$redirecionar = "?modulo=agenda";
    		$tipos = Agenda::getTipos();
    		$breadcrumbs = array();
    		$breadcrumbs[] = array("Agenda" => "?modulo=" . $_GET["modulo"]);

    		$dados = inicializaDados(new Agenda());
    		$dados["data"] = isset($_GET['data']) ? $_GET['data'] : date('d/m/Y');
    		$dados["hora"] = isset($_GET['hora']) ? $_GET['hora'] : '';
    		$dados["tipo"] = isset($_GET['tipo']) ? $_GET['tipo'] : '0';
    		$fisioterapeutasAtuais = array(
    			"fisioterapeutas" => NULL,
    			"ids" => ""
    		);
    		$arrFis = array();
    		$arrIds = array();
    		
    		// recupera os pacientes para o autocomplete
    		$pacientes = $this->DAO->findAll($conexao, "pacientes");
    		$pacientesArr = array();
    		foreach ($pacientes as $paciente) {
    			$pacientesArr[] = '"' . $paciente["nome"] . '"';	
    		}
    		
    		if (isset($_GET["compromisso"])) {
    		
    			$arrFis = array();
    			$arrIds = array();
    			
    			// recupera o compromisso
    			$dados = $this->DAO->findByPk($conexao, "agenda", (int) $_GET["compromisso"]);
    			
    			$dadosFisioterapeutas = $this->DAO->findAll($conexao, "agenda_fisioterapeutas", array(
    					"where" => array(
    						"compromisso" => (int) $dados["id"]
    					)
    				)
    			);
    			
    			// recupera o paciente e os fisioterapeutas do compromisso	
    			$paciente = $conexao->query()
    				->from("pacientes")
    				->where("id = ?", (int) $dados["paciente"])
    				->first();

    			foreach ($dadosFisioterapeutas as $f) {
    				$fisioterapeuta = $conexao->query()
	    				->from("usuarios")
	    				->where("id = ?", (int) $f["fisioterapeuta"])
	    				->first();
    				$arrIds[] = $fisioterapeuta["id"];
    				$arrFis[] = array(
    					"id" => $fisioterapeuta["id"],
    					"name" => $fisioterapeuta["nome"]
    				);
    			} 
    				
    			$dados["paciente"] = $paciente["nome"];
    			$fisioterapeutasAtuais = $dados["fisioterapeutas"] = array(
					"fisioterapeutas" => json_encode($arrFis),
					"ids" => implode(",", $arrIds)
				);
    			$dados["hora"] = substr($dados["hora"],0,5);
    			$breadcrumbs[] = array(
    				"Atualizar" => ""
    			);
    			$acao = "editar";
    			
    		}
    		else {
    			$breadcrumbs[] = array(
    					"Novo compromisso" => ""
    				);
    			$acao = "novo";
    		}
			
    		if (count($_POST) > 0) {
    			
    			$dados = $dadosIn = $_POST;
    			$ids = $dadosIn["fisioterapeutas"];
    			$arrFis = array();
    			$arrIds = array();
    			$arrNomes = array();
    			
    			if (!empty($dadosIn["fisioterapeutas"])) {
    				$fisioterapeutas = $conexao->query()
    					->from("usuarios")
    					->where("id in (" . $dadosIn["fisioterapeutas"] . ")")
    					->all();
    				foreach ($fisioterapeutas as $f) {
    					$arrIds[] = $f["id"];
    					$arrNomes[$f["id"]] = $f["nome"];
    					$arrFis[] = array(
    						"id" => $f["id"],
    						"name" => $f["nome"]
    					);
    				} 
    			}
    				
    			$dados["fisioterapeutas"] = $dadosIn["fisioterapeutas"] = array(
    				"fisioterapeutas" => json_encode($arrFis),
    				"ids" => implode(",", $arrIds)
    			);
    			
    			$obrigatorios = array(
    				"tipo" => array(
    					"tipo" => "select", 
    					"nome" => "Tipo"
    				),
    				"paciente" => array(
    					"tipo" => "input", 
    					"nome" => "Paciente"
    				),
    				"data" => array(
    					"tipo" => "input", 
    					"nome" => "Data"
    				),
    				"hora" => array(
    					"tipo" => "input", 
    					"nome" => "Hora"
    				),
    				"idsFisioterapeutas" => array(
    					"tipo" => "input", 
    					"nome" => "Fisioterapeutas"
    				)	
    			);
    			    			
    			$mensagem = validaPost($obrigatorios, $dadosIn);
    			if (!empty($mensagem)) {
    				$redirecionar = NULL;
    				throw new Exception($mensagem);
    			}
    			
    			if (!validaHora($dadosIn["hora"])) {
    				throw new Exception("Informe uma hora válida");
    			}
	    		
	    		// recupera o paciente
	    		$paciente = $this->DAO->find($conexao, "pacientes", array(
	    				"where" => array(
	    					"nome" => $dadosIn["paciente"]
	    				)
	    			)
	    		);
	    		
	    		if (count($paciente) == 0) {
	    			throw new Exception("Paciente não encontrado [" . $dadosIn["paciente"] . "]");
	    		}
	    		
				foreach ($arrIds as $id) {
					// verifica se já existe um compromisso para aquela data e horário   					
					$compromissos = $this->DAO->count($conexao, "agenda", array(
							"join" => array(
								"agenda_fisioterapeutas" => "agenda_fisioterapeutas.compromisso = agenda.id"
							),
							"where" => array(
								"agenda.data" => $dadosIn["data"],
								"agenda.hora" => $dadosIn["hora"],
								"agenda_fisioterapeutas.fisioterapeuta" => $id 
							),
							"whereNot" => array(
								"agenda.id" => $dadosIn["id"]
							)
						)
					);
					if ($compromissos > 0) {
						throw new Exception("Já existe um compromisso para " . $arrNomes[$id] . " nesta mesma data e horário");
					}
				}
				
				if ($dadosIn["id"] == 0) {
					$dadosIn["timestampC"] = time();
					$dadosIn["dataC"] = date('d/m/Y H:i:s', $dadosIn["timestampC"]);
				}

				$dadosIn = retiraDoArray(array("fisioterapeutas", "idsFisioterapeutas"), $dadosIn);
				$dadosIn["paciente"] = $paciente["id"];
				list($dadosIn["dia"],$dadosIn["mes"],$dadosIn["ano"]) = explode("/", $dadosIn["data"]);
				
				$dadosIn = $this->DAO->salva($conexao, "agenda", $dadosIn);

				$excluidos = array_diff(explode(",", $fisioterapeutasAtuais["ids"]), $arrIds);
				$incluidos = array_diff($arrIds, explode(",", $fisioterapeutasAtuais["ids"]));

				foreach ($incluidos as $id) {
					$this->DAO->salva($conexao, "agenda_fisioterapeutas", array(
							"id" => 0,
							"fisioterapeuta" => $id,
							"compromisso" => $dadosIn["id"] 
						)
					);
				}
				
				foreach ($excluidos as $id) {
					$this->DAO->exclui($conexao, "agenda_fisioterapeutas", array(
							"where" => array(
								"compromisso" => $dadosIn["id"],
								"fisioterapeuta" => $id
							)
						)
					);
				}

				$conexao->commit();
    			
    			if ($acao == "novo") {					
    				setMensagem("info", "Compromisso do dia " . desconverteData($dadosIn["data"]) . " às " . $dadosIn["hora"] . " cadastrado [" . $paciente["nome"] . "]");
    				Application::redirect("?modulo=agenda&acao=cadastrar");
    				exit;
    			}
    			else {
    				setMensagem("info", "Compromisso do dia " . desconverteData($dadosIn["data"]) . " às " . $dadosIn["hora"] . " atualizado [" . $paciente["nome"] . "]");
    				Application::redirect("?modulo=agenda");
    				exit;
    			}	
    		}
    	}
    	catch (Exception $e) {
    		$conexao->rollback();
    		setMensagem("error", $e->getMessage());
    		if ($redirecionar != NULL) {
    			Application::redirect($redirecionar);
    			exit;
    		}
    	}
    	
    	$conexao->disconnect();					
    	$view = new View($_GET["modulo"], "painel", "novo.phtml");
    	$view->setParams(array(
    			"title" => getTitulo($breadcrumbs), 
    			"breadcrumbs" => $breadcrumbs,
    			"compromisso" => $dados,
    			"pacientes" => implode(",", $pacientesArr)
    		)
    	);
    	$view->showContents();
    	
    }
    
    public function excluirAction() {
    
    	try {

    		$conexao = $this->conexao->getConexao();
    		$redirect = WWW_ROOT . "/?modulo=agenda";
    		
    		$dados = $this->DAO->findByPk($conexao, "vw_agenda", getVariavel("id"));
    		
    		$affectedRows = $this->DAO->excluiByPk($conexao, "agenda", $dados["id"]);
    		
    		if ($affectedRows > 0) {
    			$conexao->commit();
    			setMensagem("info", "Compromisso de " . $dados["dataFormatada"] . " excluído [" . $dados["nomePaciente"] . "]");
    			$redirect = WWW_ROOT . "/?modulo=agenda";
    		}
    	}
    	catch (Exception $e) {
    		$conexao->rollback();
    		setMensagem("error", $e->getMessage());
    	}
    	
    	$conexao->disconnect();
    	Application::redirect($redirect);
    	exit;
    	
    	    	
    }
    
    public function opcoesAction () {
    
    	if (count($_POST) > 0) {
    		
    		if (isset($_POST["opcoes"])) {
    		
    			$processados = 0;
    			$naoProcessados = 0;
    			$ids = isset($_POST["agenda"]) ? $_POST["agenda"] : array();
    			
    			// retira o elemento -1, caso exista
    			if (count($ids) > 0 && $ids[0] == -1)
    				array_shift($ids);
    		
    			try {
    				
    				$conexao = $this->conexao->getConexao();
    				
    				//if (!temPermissao(array('agenda:manterCursos'), $_SESSION[PREFIX . "permissoes"]))
    				//	throw new Exception("Você não tem permissão para realizar esta ação.");
    					
    				foreach ($ids as $id) {
    					
    					$dados = $this->DAO->getById($conexao, "agenda", $id);
    			
    					switch ($_POST["opcoes"]) {
    					
    						case "excluir" :
    							
    							$opcao = "excluído(s)";
    							try {
    								$affectedRows = $this->DAO->excluir($conexao, "agenda", $id);
    								if ($affectedRows > 0) {
    									$processados+=1;
    									$diretorio = DIR_UPLOADS . SEPARADOR_DIRETORIO . "agenda" . SEPARADOR_DIRETORIO . $id;
    									excluiDiretorio($diretorio);
    									//$this->logDAO->adicionar ($conexao, "excluiu", "paciente", $_SESSION[PREFIX . "loginNome"], $dados["nome"], "Usuário excluiu o paciente.");
    								}
    							}
    							catch (Exception $e) {
    								$naoProcessados+=1;
    							}
    							
    						break;
    					
    						case "ativar" :
    							
    							$opcao = "ativado(s)";
    							$dados["status"] = 1;
    							$affectedRows = $this->DAO->atualizar($conexao, "agenda", $dados);
    							if ($affectedRows > 0) {
    								$processados += 1;
    								//$this->logDAO->adicionar ($conexao, "ativou", "paciente", $_SESSION[PREFIX . "loginNome"], $dados["nome"], "Usuário ativou paciente."); 
    							}
    							
    						break;
    						
    						case "desativar" :
    							
    							$opcao = "desativado(s)";
    							$dados["status"] = 0;
    							$affectedRows = $this->DAO->atualizar($conexao, "agenda", $dados);
    							if ($affectedRows > 0) {
    								$processados += 1;
    								//$this->logDAO->adicionar ($conexao, "desativou", "paciente", $_SESSION[PREFIX . "loginNome"], $dados["nome"], "Usuário desativou paciente."); 
    							}
    							
    						break;
    						
    					}
    				}
    				
    				if ($processados > 0) {
    					$conexao->commit();
    					setMensagem("info", $processados. " paciente(s) " . $opcao);
    				}
    				
    				if ($naoProcessados > 0) {
    					setMensagem("error", $naoProcessados. " paciente(s) não podem ser " . $opcao);
    				}
    				
    				$conexao->disconnect();
    			
    			}
    			catch (Exception $e) {
    				setMensagem("error", $e->getMessage());
    				$conexao->rollback();
    			}
    			
    		}
    		
    	}
    	
    	Application::redirect(WWW_ROOT . "/?" . urldecode($_POST['q']));
    	exit;
    	
    }
	
}

?>