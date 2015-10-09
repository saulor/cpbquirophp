<?php

class AgendaController extends Controller {
	
	public function AgendaController() {
		parent::__construct();
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
    		$mes = date('m');
    		$ano = date('Y');
    		$dia = date('d');

    		$objetos = $this->dao->findAll($conexao, "agenda", array(
    				"dados" => array(
    					"agenda.id",
    					"agenda.tipo",
    					"agenda.data",
    					"agenda.hora",
    					"agenda.dia",
    					"agenda.mes",
    					"agenda.ano",
    					"agenda.telefoneResidencial",
    					"agenda.telefoneCelular",
    					"agenda.lembrete",
    					"agenda.observacoes",
    					"agenda.ano",
    					"agenda.nomePaciente",
    					"CONCAT_WS('T', data, hora) as timestamp"
    				),
    				"where" => array(
    					"agenda.mes" => $mes,
    					"agenda.ano" => $ano,
    					"agenda_fisioterapeutas.fisioterapeuta" => 2
    				),
    				"leftJoin" => array(
    					"agenda_fisioterapeutas" => "agenda.id = agenda_fisioterapeutas.compromisso"
    				),
    				"order" => array(
    					"agenda.hora" => "asc"
    				),
    			)
    		);
    		    		    	
    		$fisioterapeutas = $this->dao->findAll($conexao, "vw_usuarios", array(
    				"where" => array(
    					"permissao" => Permissao::PERMISSAO_FISIOTERAPEUTA
    				),
    				"order" => array(
    					"nome" => "asc"
    				)
    			)
    		);
    		
    		// recupera os pacientes para o autocomplete
    		$pacientes = $this->dao->findAll($conexao, "pacientes");
    		$pacientesArr = array();
    		foreach ($pacientes as $paciente) {
    			$pacientesArr[] = '"' . $paciente["nome"] . '"';	
    		}
    		
    		$mesAtual = rangeMonth($ano . '-' . $mes . '-' . $dia);
    		
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
    			"pacientes" => implode(",", $pacientesArr),
    			"quantidade" => $quantidade,
    			"quantidadePorPagina" => $quantidadePorPagina,
    			"pagina" => $pagina,
    			"breadcrumbs" => $breadcrumbs,
    			"dia" => $dia,
    			"mes" => $mes,
    			"ano" => $ano
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
    		$breadcrumbs[] = array(
    			"Agenda" => "?modulo=" . $_GET["modulo"],
    			"Novo compromisso" => ""
    		);

    		$dados = inicializaDados(new Agenda());
    		$dados["data"] = isset($_GET['data']) ? $_GET['data'] : date('d/m/Y');
    		$dados["hora"] = isset($_GET['hora']) ? $_GET['hora'] : '';
    		$dados["tipo"] = isset($_GET['tipo']) ? $_GET['tipo'] : '0';
    		
    		$fisioterapeutas = $this->dao->findAll($conexao, "vw_usuarios", array(
    				"where" => array(
    					"permissao" => Permissao::PERMISSAO_FISIOTERAPEUTA
    				),
    				"order" => array(
    					"nome" => "asc"
    				)
    			)
    		);
    		
    		// recupera os pacientes para o autocomplete
    		$pacientes = $this->dao->findAll($conexao, "pacientes");
    		$pacientesArr = array();
    		foreach ($pacientes as $paciente) {
    			$pacientesArr[] = '"' . $paciente["nome"] . '"';	
    		}
			
    		if (count($_POST) > 0) {
    			
    			$redirecionar = NULL;
    			$dados = $dadosIn = $_POST;
    			$idsFisioterapeutas = array();
    			$dados["fisioterapeutas"] = $dadosIn["fisioterapeutas"] = isset($dadosIn["fisioterapeutas"]) ? $dadosIn["fisioterapeutas"] : array();
    			
    			$obrigatorios = array(
    				"tipo" => array(
    					"tipo" => "select", 
    					"nome" => "Tipo"
    				),
    				"nomePaciente" => array(
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
    				"fisioterapeutas" => array(
    					"tipo" => "array", 
    					"nome" => "Fisioterapeutas"
    				)	
    			);
    			
    			$mensagens = array();		    			
    			
    			$mensagem = validaPost($obrigatorios, $dadosIn);
    			if (!empty($mensagem)) {
    				$mensagens[] = $mensagem;
    			}
    			
    			if (!empty($dadosIn["hora"]) && !validaHora($dadosIn["hora"])) {
    				$mensagens[] = "Informe uma hora válida.";
    			}
	    		
				foreach ($dadosIn["fisioterapeutas"] as $f) {
					list($nome, $id) = explode("-", $f);
					$idsFisioterapeutas[] = $id;
					$quantidadeCompromissos = $this->dao->count($conexao, "agenda", array(
							"leftJoin" => array(
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
					if ($quantidadeCompromissos > 0) {
						$mensagens[] = "Já existe um compromisso para " . $nome . " nesta mesma data e horário";
					}
				}
				
				if (count($mensagens) > 0) {
					throw new Exception(implode('<br />', $mensagens));
				}
				
				if ($dadosIn["id"] == 0) {
					$dadosIn["timestampC"] = time();
					$dadosIn["dataC"] = date('d/m/Y H:i:s', $dadosIn["timestampC"]);
				}

				$dadosIn = retiraDoArray(array("fisioterapeutas"), $dadosIn);
				list($dadosIn["dia"],$dadosIn["mes"],$dadosIn["ano"]) = explode("/", $dadosIn["data"]);
				
				$dadosIn = $this->dao->salva($conexao, "agenda", $dadosIn);
				
				foreach ($idsFisioterapeutas as $id) {
					$this->dao->salva($conexao, "agenda_fisioterapeutas", array(
							"id" => 0,
							"compromisso" => $dadosIn["id"],
							"fisioterapeuta" => $id
						)
					);
				}

				$conexao->commit();
    			
    			setMensagem("info", "Compromisso do dia " . desconverteData($dadosIn["data"]) . " às " . $dadosIn["hora"] . " cadastrado [" . $paciente["nome"] . "]");
    			Application::redirect("?modulo=agenda&acao=cadastrar");
    			exit;
    			
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
    			"pacientes" => implode(",", $pacientesArr),
    			"fisioterapeutas" => $fisioterapeutas
    		)
    	);
    	$view->showContents();
    	
    }
    
    public function excluirAction() {
    
    	try {

    		$conexao = $this->conexao->getConexao();
    		$redirect = WWW_ROOT . "/?modulo=agenda";
    		
    		$dados = $this->dao->findByPk($conexao, "vw_agenda", getVariavel("id"));
    		
    		$affectedRows = $this->dao->excluiByPk($conexao, "agenda", $dados["id"]);
    		
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
    					
    					$dados = $this->dao->getById($conexao, "agenda", $id);
    			
    					switch ($_POST["opcoes"]) {
    					
    						case "excluir" :
    							
    							$opcao = "excluído(s)";
    							try {
    								$affectedRows = $this->dao->excluir($conexao, "agenda", $id);
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
    							$affectedRows = $this->dao->atualizar($conexao, "agenda", $dados);
    							if ($affectedRows > 0) {
    								$processados += 1;
    								//$this->logDAO->adicionar ($conexao, "ativou", "paciente", $_SESSION[PREFIX . "loginNome"], $dados["nome"], "Usuário ativou paciente."); 
    							}
    							
    						break;
    						
    						case "desativar" :
    							
    							$opcao = "desativado(s)";
    							$dados["status"] = 0;
    							$affectedRows = $this->dao->atualizar($conexao, "agenda", $dados);
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
    
    public function imprimirAction() {
    	try {
    		$conexao = $this->conexao->getConexao();
    		
    		$dia = $_GET['dia'];
    		$mes = $_GET['mes'];
    		$ano = $_GET['ano'];
    		$fisioterapeuta = $_GET['fisioterapeuta'];
    		
    		$f = $this->dao->findByPk($conexao, "usuarios", $fisioterapeuta);
    		
    		$objetos = $this->dao->findAll($conexao, "agenda", array(
    				"dados" => array(
    					"agenda.id",
    					"agenda.tipo",
    					"agenda.data",
    					"agenda.hora",
    					"agenda.dia",
    					"agenda.mes",
    					"agenda.ano",
    					"agenda.telefoneResidencial",
    					"agenda.telefoneCelular",
    					"agenda.lembrete",
    					"agenda.observacoes",
    					"agenda.ano",
    					"agenda.nomePaciente",
    					"CONCAT_WS('T', data, hora) as timestamp"
    				),
    				"where" => array(
    					"agenda.mes" => $mes,
    					"agenda.ano" => $ano,
    					"agenda.dia" => $dia,
    					"agenda_fisioterapeutas.fisioterapeuta" => $fisioterapeuta
    				),
    				"leftJoin" => array(
    					"agenda_fisioterapeutas" => "agenda.id = agenda_fisioterapeutas.compromisso"
    				),
    				"order" => array(
    					"agenda.hora" => "asc"
    				)
    			)
    		);
    		
    		$compromissos = array();
    		$mesAtual = rangeMonth($ano . '-' . $mes . '-' . $dia);
    		
    		for ($i=$mesAtual["start"];$i<=$mesAtual["end"];$i++) {
    			foreach ($objetos as $objeto) {
    				if ($objeto["dia"] == $i) {
    					$compromissos[$objeto["hora"]] = $objeto;
    				}
    			}
    		}
    	    		
    		$data = str_pad($dia, 2, "0", STR_PAD_LEFT) . "/" . $mes . "/" . $ano;

    		$pdf = new AgendaDiaria();
    		$pdf->SetTitle(utf8_decode('Agenda Diária'));
    		$pdf->AddPage();
    		
    		$pdf->setTextColor(0,0,0);
    		$pdf->setY(30);
    		$pdf->SetFont('Helvetica','B',11);
    		$pdf->Cell(0,0,utf8_decode('Agenda Dr(a). ' . $f["nome"]));
    		$pdf->Ln(7);
    		$pdf->Cell(0,0,utf8_decode('Dia ' . $data));
    		$pdf->Ln(9);
    		$pdf->SetFont('Helvetica','',10);

			for ($i = 0; $i < 23; $i++) {
				$time = mktime(07, $i*30, 0, 0, 0, 0);
				$hora = date('H:i', $time);
				$pdf->SetX(12);
    			if (!array_key_exists($hora, $compromissos)) {
    				$nome = "";
    				$pdf->SetFillColor(255,165,0);
    			}
    			else {
    				$nome = $compromissos[$hora]["nomePaciente"];
    				if ($compromissos[$hora]["tipo"] == 1) {
	    				$pdf->SetFillColor(0,102,255);
	    			}
	    			else if ($compromissos[$hora]["tipo"] == 2) {
	    				$pdf->SetFillColor(0,153,51);
	    			} 
    			}
    			$pdf->Circle($pdf->GetX(),$pdf->GetY(),1.3,'F');
    			$item = $hora . " " . utf8_decode($nome);
    			$pdf->SetX(14);
    			$pdf->Cell(0,0,$item);
    			$pdf->Ln(7);
			}
    		
    		$pdf->Ln(10);
    		
    		$pdf->SetX(12);
    		$pdf->SetFillColor(255,165,0);
    		$pdf->Circle($pdf->GetX(),$pdf->GetY(),1.3,'F');
    		$pdf->SetX(14);
    		$pdf->Cell(0,0,'Livre');
    		$pdf->SetX(26);
    		$pdf->SetFillColor(0,102,255);
    		$pdf->Circle($pdf->GetX(),$pdf->GetY(),1.3,'F');
    		$pdf->SetX(28);
    		$pdf->Cell(0,0,'Consulta');
    		$pdf->SetX(46);
    		$pdf->SetFillColor(0,153,51);
    		$pdf->Circle($pdf->GetX(),$pdf->GetY(),1.3,'F');
    		$pdf->SetX(48);
    		$pdf->Cell(0,0,utf8_decode('Avaliação'));
    		
    		$pdf->output('Agenda-' . $f["nome"] . '-' . $data . '.pdf', 'I');
    	}
    	catch (Exception $e) {
    	}
    }
	
}

?>