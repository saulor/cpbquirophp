<?php

class PacientesController extends Controller {

	protected $info = array(
		"tabela" => "pacientes",
		"modulo" => "pacientes",
		"labelSing" => "Paciente",
		"labelPlur" => "Pacientes"
	);
	
	public function PacientesController() {
		parent::__construct();
	}
	
    public function indexAction() {
    	
    	try {
    		$conexao = $this->conexao->getConexao();
    		$breadcrumbs = array();
    		$breadcrumbs[] = array("Pacientes" => "");
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
    		
    		$quantidade = $this->dao->count($conexao, "pacientes");
    		$pacientes = $this->dao->findAll($conexao, "pacientes", array(
    				"limit" => $limit,
    				"offset" => $offset,
    				"order" => $order
    			)
    		);
    		
    		if (count($pacientes) == 0 && $pagina > 1) {
    			Application::redirect("?modulo=".$_GET["modulo"]."&p=".($pagina-1));
    		}
    		
    	}
    	catch (Exception $e) {
    		setMensagem("error", $e->getMessage());
    	}
    	$conexao->disconnect();
    	$view = new View($_GET["modulo"], "painel", "index.phtml");
    	$view->setParams(array(
    			"title" => getTitulo($breadcrumbs), 
    			"objetos" => $pacientes,
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
    		$redirecionar = "?modulo=pacientes";
    		$breadcrumbs = array();
    		$breadcrumbs[] = array("Pacientes" => "?modulo=".$_GET["modulo"]);
    		
    		$dados = inicializaDados(new Paciente());
    		
    		if (isset($_GET["id"])) {
    			$dados = $this->dao->findByPk($conexao, "pacientes", (int) $_GET["id"]);
    			$breadcrumbs[] = array(
    				"Atualizar" => ""
    			);
    			$acao = "editar";
    		}
    		else {
    			$breadcrumbs[] = array(
    					"Cadastrar" => ""
    				);
    			$acao = "novo";
    		}

    		if (count($_POST) > 0) {
    	
    			$redirecionar = NULL;
    			$dados = $_POST["Paciente"];
    			$dados["tratamentos"] = isset($dados["tratamentos"]) ? implode(",", $dados["tratamentos"]) : NULL;
    			
    			$obrigatorios = array(
    				"nome" => array(
    					"tipo" => "input", 
    					"nome" => "Nome"
    				)	
    			);
    			
    			$mensagem = validaPost($obrigatorios, $dados);
    			if (!empty($mensagem)) {
    				throw new Exception($mensagem);
    			}
    			
    			if (Funcoes::jaExiste($conexao, $this->dao, $dados, "pacientes", "nome")) {
    				throw new Exception('Já existe um paciente com esse nome');
    			}
    			
    			if ($dados["id"] == 0) {
    				$dados["timestamp"] = time();
    				$dados["data"] = date('d/m/Y H:i:s', $dados["timestamp"]);
    			}
    			
    			$dados = $this->dao->salva($conexao, "pacientes", $dados);
    			
    			if ($acao == "novo") {					
    				setMensagem("info", "Paciente cadastrado [" . $dados["nome"] . "]");
    			}
    			else {
    				setMensagem("info", "Paciente atualizado [" . $dados["nome"] . "]");
    			}
    			
    			$redirecionar = "?modulo=pacientes&acao=cadastrar&id=" . $dados["id"];
    			if (isset($_GET["r"])) {
    				$redirecionar = urldecode($_GET["r"]);
    			}
    			
    			$conexao->commit();	
    			$conexao->disconnect();
    			Application::redirect($redirecionar);
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
    			"paciente" => $dados
    		)
    	);
    	$view->showContents();
    	
    }
    
    public function observacoesAction() {
        	
    	try {
    		$conexao = $this->conexao->getConexao();
    		$redirecionar = "?modulo=pacientes";
    		$breadcrumbs = array();
    		$breadcrumbs[] = array(
    			"Pacientes" => "?modulo=pacientes",
    		);
    		
    		$dadosHistorico = $this->dao->findByPk($conexao, "atendimentos_historico", getVariavel("id"));
			$dadosAtendimento = $this->dao->findByPk($conexao, "atendimentos", $dadosHistorico["atendimento"]);
			$dadosPaciente = $this->dao->findByPk($conexao, "pacientes", $dadosAtendimento["paciente"]);
			
			$breadcrumbs[] = array(
				$dadosPaciente["nome"] => "?modulo=pacientes&acao=atendimento&id=" . $dadosPaciente["id"],
				"Observações sobre o atendimento" => ""
			);

    		if (count($_POST) > 0) {
    	
    			$dados = $_POST;
    			
    			$obrigatorios = array(
    				"observacoes" => array(
    					"tipo" => "textarea", 
    					"nome" => "Observações sobre o atendimento"
    				)	
    			);
    			
    			$mensagem = validaPost($obrigatorios, $dados);
    			if (!empty($mensagem)) {
    				$redirecionar = NULL;
    				throw new Exception($mensagem);
    			}
    			
				$this->dao->salva($conexao, "atendimentos_historico", $dados);
				setMensagem("info", "Observações atualizadas");
    			
    			$conexao->commit();	
    			$conexao->disconnect();
    			$redirecionar = "?modulo=pacientes&acao=atendimento&id=" . $dadosPaciente["id"];
    			Application::redirect($redirecionar);
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
    	$view = new View($_GET["modulo"], "painel", "observacoes.phtml");
    	$view->setParams(array(
    			"title" => getTitulo($breadcrumbs), 
    			"breadcrumbs" => $breadcrumbs,
    			"paciente" => $dadosPaciente,
    			"atendimento" => $dadosAtendimento,
    			"historico" => $dadosHistorico
    		)
    	);
    	$view->showContents();
    	
    }
    
    public function fotoAction() {
        	
    	try {
    		$conexao = $this->conexao->getConexao();
    		$redirecionar = "?modulo=pacientes";
    		$breadcrumbs = array();
    		
    		$breadcrumbs[] = array(
    			"Pacientes" => "?modulo=".$_GET["modulo"],
    		);
    		
    		$dados = inicializaDados(new Paciente());
    		
    		if (isset($_GET["id"])) {
    			$id = (int) $_GET["id"]; 
    			$dados = $this->dao->findByPk($conexao, "pacientes", $id);
    		}
    		
    		$breadcrumbs[] = array(
    			$dados["nome"] => "?modulo=pacientes&acao=cadastrar&id=" . $dados["id"],
    			"Tirar foto" => ""
    		);
    		
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
    	$view = new View($_GET["modulo"], "painel", "foto.phtml");
    	$view->setParams(array(
    			"title" => getTitulo($breadcrumbs), 
    			"breadcrumbs" => $breadcrumbs,
    			"paciente" => $dados
    		)
    	);
    	$view->showContents();
    	
    }
    
    public function atendimentoAction() {
        	
    	try {
    		$conexao = $this->conexao->getConexao();
    		$redirecionar = "?modulo=" . $_GET["modulo"];
    		$breadcrumbs = array();
    		$breadcrumbs[] = array("Pacientes" => "?modulo=" . $_GET["modulo"]);
    		
    		// recupera o paciente e o atendimento.
    		$paciente = $this->dao->findByPk($conexao, "pacientes", getVariavel("paciente"));
    		$atendimento = $this->dao->find($conexao, "atendimentos", array(
    				"where" => array(
    					"paciente" => (int) $paciente["id"]
    				)
    			)
    		);

    		// se não existir nenhum atendimento, cria um.
    		if (count($atendimento) == 0) {
    			$this->dao->salva($conexao, "atendimentos", array(
    					"id" => 0,
    					"hipertenso" => -1,
    					"diabetico" => -1,
    					"fuma" => -1,
    					"bebe" => -1,
    					"esportes" => -1,
    					"suplementos" => -1,
    					"medicamentos" => -1,
    					"doencasFamilia" => -1,
    					"gravidez" => -1,
    					"paciente" => $paciente["id"]
    				)
    			);
    			$conexao->commit();
    			Application::redirect('?modulo=pacientes&acao=atendimento&paciente=' . $paciente['id']);
    			exit;
    		}
    		
    		$doresAtuais = $atendimento["dores"] = $this->dao->findAll($conexao, "atendimentos_dores", array(
    				"where" => array(
    					"atendimento" => (int) $atendimento["id"]
    				)
    			)
    		);
    		
    		$historico = $this->dao->findAll($conexao, "atendimentos_historico", array(
    				"where" => array(
    					"atendimento" => (int) $atendimento["id"]
    				),
    				"order" => array(
    					"data" => "desc"
    				)
    			)
    		);
    		
    		if (isset($_GET["id"])) {
    			$breadcrumbs[] = array(
    				"Atendimento" => ""
    			);
    			$acao = "editar";
    		}
    		else {
    			$breadcrumbs[] = array(
    					"Cadastrar" => ""
    				);
    			$acao = "novo";
    		}

    		if (count($_POST) > 0) {
    			
    			$redirecionar = NULL;
    			$atendimentoIn = $atendimento = $_POST['Atendimento'];
    			$atendimento["intestinos"] = $atendimentoIn["intestinos"] = isset($atendimentoIn["intestinos"]) ? $atendimentoIn["intestinos"] : 0;
    			$atendimento["sono"] = $atendimentoIn["sono"] = isset($atendimentoIn["sono"]) ? $atendimentoIn["sono"] : 0;
    			$atendimento["agua"] = $atendimentoIn["agua"] = isset($atendimentoIn["agua"]) ? $atendimentoIn["agua"] : 0;
    			$atendimento["alimentacao"] = $atendimentoIn["alimentacao"] = isset($atendimentoIn["alimentacao"]) ? $atendimentoIn["alimentacao"] : 0;
    			
    			$atendimento["dores"] = $dores = $_POST['Dores'];
    			
				$locaisAtuais = $locais = array();
				
    			foreach ($doresAtuais as $dor) {
    				$locaisAtuais[$dor["id"]] = $dor["local"];
    			}
    			
    			foreach ($dores as $dor) {
    				if (isset($dor["local"])) {
    					$locais[$dor["id"]] = $dor["local"];
    				}
    			}
    			
    			$mensagens = array();
    			$mensagem = validaPost($obrigatorios, $atendimentoIn);
    			if (!empty($mensagem)) {
    				$mensagens[] = $mensagem;
    			}
    			$mensagem = validaPost($obrigatorios, $_POST);
    			if (!empty($mensagem)) {
    				$mensagens[] = $mensagem;
    			}
    			if (count($mensagens) > 0) {
    				throw new Exception(implode("<br />", $mensagens));
    			}
    			
    			$atendimentoIn = $this->dao->salva($conexao, "atendimentos", $atendimentoIn);
    			$time = time();
    			$historico = $this->dao->salva($conexao, "atendimentos_historico", array(
    					"id" => 0,
    					"atendimento" => $atendimentoIn["id"],
    					"timestamp" => $time,
    					"data" => date('d/m/Y H:i:s', $time),
    					"observacoes" => 'Atendimento realizado'
    				)
    			);
    			
    			$result = array_diff($locaisAtuais, $locais);
    			
    			foreach (array_diff($locaisAtuais, $locais) as $id => $value) {
    				$this->dao->excluiByPk($conexao, "atendimentos_dores", $id);
    			}
    			
    			foreach ($dores as $dor) {
    				$d = array();
    				// só vai cadastrar se for definida a localização da dor
    				// mesmo que não defina a característica nem o grau
    				if (!empty($dor["local"])) {
    					$d["id"] = $dor["id"];
    					$d["atendimento"] = $atendimentoIn["id"];
    					$d["local"] = $dor["local"];
    					$d["caracteristica"] = $dor["caracteristica"];
    					$d["grau"] = $dor["grau"];
    					$d["intensidade"] = isset($dor["intensidade"]) ? implode(",", $dor["intensidade"]) : 0;	
						$this->dao->salva($conexao, "atendimentos_dores", $d);
    				}	
    			}
    			
    			$conexao->commit();
				setMensagem("info", "Atendimento realizado");
    			Application::redirect("?modulo=" . $_GET["modulo"] . "&acao=atendimento&paciente=" . $paciente["id"]);
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
    	$view = new View($_GET["modulo"], "painel", "atendimento.phtml");
    	$view->setParams(array(
    			"title" => getTitulo($breadcrumbs), 
    			"breadcrumbs" => $breadcrumbs,
    			"paciente" => $paciente,
    			"atendimento" => $atendimento,
    			"objetos" => $historico
    		)
    	);
    	$view->showContents();
    	
    }
    
    public function excluirAction() {
    
    	try {
    		$conexao = $this->conexao->getConexao();
    		$dados = $this->dao->findByPk($conexao, "pacientes", getVariavel("id"));

    		$affectedRows = $this->dao->exclui($conexao, "pacientes", array(
    				"where" => array(
    					"id" => $dados["id"]
    				)
    			)
    		);
    		
    		if ($affectedRows) {
    			$diretorio = DIR_UPLOADS . SEPARADOR_DIRETORIO . "pacientes" . SEPARADOR_DIRETORIO . $dados["id"];
    			excluiDiretorio($diretorio);
    			$conexao->commit();
    			setMensagem("info", "Paciente excluído [" . $dados["nome"] . "]");
    		}
    	}
    	catch (Exception $e) {
    		$conexao->rollback();
    		setMensagem("error", $e->getMessage());
    	}
    	
    	$redirecionar = "?modulo=pacientes";
    	if (isset($_GET['exibir'])) {
    		$redirecionar .= '&exibir=' . $_GET['exibir'];
    	}
    	if (isset($_GET['order'])) {
    		$redirecionar .= '&order=' . $_GET['order'];
    	}
    	Application::redirect($redirecionar);
    	exit;
    	
    }
    
    public function removeraAction() {
    	try {
    		$conexao = $this->conexao->getConexao();
    		$dados = $this->dao->findByPk ($conexao, "atendimentos", getVariavel("atendimento"));
    		$diretorio = DIR_UPLOADS . SEPARADOR_DIRETORIO . 'atendimentos' . SEPARADOR_DIRETORIO . $dados['id'] . SEPARADOR_DIRETORIO . $_GET['arquivo'];
    		if (excluiArquivo($diretorio)) {				
    			setMensagem("info", "Arquivo excluído [" . $_GET['arquivo'] . "]");
    		}
    	}
    	catch (Exception $e) {
    		$conexao->rollback();
    		setMensagem("error", $e->getMessage());
    	}
    	
    	Application::redirect("?modulo=pacientes&acao=atendimento&id=" . $dados["id"]);
    	exit;
    	
    }
    
    public function removerhAction() {
    	try {
    		$conexao = $this->conexao->getConexao();
    		$dadosH = $this->dao->findByPk ($conexao, "atendimentos_historico", getVariavel("id"));
    		$dadosA = $this->dao->findByPk ($conexao, "atendimentos", $dadosH["atendimento"]);

    		$affectedRows = $this->dao->excluiByPk($conexao, "atendimentos_historico", $dadosH["id"]);
    		
    		if ($affectedRows) {
    			$conexao->commit();
    			setMensagem("info", "Registro excluído do histórico de atendimentos com sucesso");
    		}
    		
    	}
    	catch (Exception $e) {
    		$conexao->rollback();
    		setMensagem("error", $e->getMessage());
    	}
		$redirect = "?modulo=pacientes&acao=atendimento&paciente=" . $dadosA["paciente"];
    	Application::redirect($redirect);
    	exit;
    	
    }
    
    public function opcoesAction() {
    	try {
    		$processados = 0;
    		$naoProcessados = 0;
    		
    		if (empty($_POST["acoes"])) {
    			throw new Exception("É necessário escolher uma ação");
    		}
    		
    		$conexao = $this->conexao->getConexao();
    		$objetos = isset($_POST["objetos"]) ? $_POST["objetos"] : array();
    		
    		// retira o elemento -1, caso exista
    		if (count($objetos) > 0 && $objetos[0] == -1) {
    			array_shift($objetos);
    		}
    		
    		foreach ($objetos as $id) {
    			$dados = $this->dao->findByPk ($conexao, $this->info["tabela"], $id);
    			switch ($_POST['acoes']) {
    			
    				case 'excluir' :
    					$opcao = "excluído(a)(s)";	
    					try {	
    						$affectedRows = $this->dao->excluiByPk ($conexao, $this->info["tabela"], $dados["id"]);
    						if ($affectedRows > 0) {
    							$processados += 1;
    							$diretorio = DIR_UPLOADS . SEPARADOR_DIRETORIO . $this->info["modulo"] . SEPARADOR_DIRETORIO . $dados["id"];
    							excluiDiretorio($diretorio);
    							//$this->logDAO->adicionar ($conexao, "excluiu", $this->info["labelSing"], $_SESSION[PREFIX . "loginNome"], $dados[$_GET['nome']], "Usuário excluiu " . $this->info["labelSing"] . " através do recurso de aplicar ações em massa.");
    						}
    					}
    					catch (Exception $e) {
    						$naoProcessados+=1;
    					}
    				break;
    				
    			}
    		}
    		
    	}
    	catch (Exception $e) {
    		if (isset($conexao)) {
    			$conexao->rollback();
    		}
    		setMensagem("error", $e->getMessage());
    	}
    	
    	if ($processados > 0) {
    		$conexao->commit();
    		setMensagem("info", $processados . " " . $opcao);
    	}
    	
    	if ($naoProcessados > 0) {
    		setMensagem("error", $naoProcessados . " não pode(m) ser " . $opcao);
    	}
    	
    	if (isset($conexao)) {
    		$conexao->disconnect();
    	}
    	
    	$redirecionar = "?modulo=pacientes";
    	if (isset($_GET['exibir'])) {
    		$redirecionar .= '&exibir=' . $_GET['exibir'];
    	}
    	if (isset($_GET['order'])) {
    		$redirecionar .= '&order=' . $_GET['order'];
    	}
    	Application::redirect($redirecionar);
    	exit;
    }
    
    public function removerAction() {
    	
    	try {
    		$conexao = $this->conexao->getConexao();
    		$redirecionar = "?modulo=pacientes";				
    		$objeto = $this->dao->findByPk ($conexao, "pacientes", (int) $_GET["id"]);	
    		$redirecionar .= "&acao=cadastrar&id=" . $objeto["id"];		
    		$diretorio = DIR_UPLOADS . SEPARADOR_DIRETORIO . "pacientes" . SEPARADOR_DIRETORIO . $objeto["id"];
    		$diretorio .= SEPARADOR_DIRETORIO . $objeto["foto"];
    		
    		if (!existeArquivo($diretorio)) {
    			throw new Exception ("Imagem não encontrada");
    		}
    		
    		if (excluiArquivo($diretorio)) {
    			$objeto["foto"] = NULL;
    			$this->dao->salva($conexao, "pacientes", $objeto);
    			$conexao->commit();
    			setMensagem("info", "Foto excluída");
    		}
    		
    		Application::redirect($redirecionar);
    		exit;
    		
    	}
    	catch (Exception $e) {
    		$conexao->rollback();
    		setMensagem("error", $e->getMessage());
    		if ($redirecionar != NULL) {
    			Application::redirect($redirecionar);
    			exit;
    		}
    	}
    
    }
    
    public function fichaAction() {
    	try {
    		$conexao = $this->conexao->getConexao();
    		$redirecionar = "?modulo=pacientes";
    		$dados = $this->dao->findByPk($conexao, "pacientes", getVariavel("id"));
    		$atendimento = $this->dao->find($conexao, "atendimentos", array(
    				"where" => array(
    					"paciente" => $dados["id"]
    				)
    			)
    		);
    		if (count($atendimento) == 0) {
    			$atendimento = inicializaDados(new Atendimento());
    		}
    		$f = new Ficha();
    		$f->AddPage();
    		
    		$f->setTextColor(0,0,0);
    		$f->setY(38);
    		$f->setX(30);
    		$f->SetFont('Helvetica','B',12);
    		$f->SetFont('Helvetica','B',11);
    		$f->Cell(0,0,utf8_decode('FICHA DO PACIENTE'));
    		
    		$f->setY(48);
    		$f->setX(30);
    		$f->SetFont('Helvetica','B',10);
    		
			$f->Cell(0,0,utf8_decode('IDENTIFICAÇÃO'));

			$f->setY($f->getY()+6);
			$f->setX(30);
			$f->SetFont('Helvetica','B',10);
			$f->Cell(0,0,utf8_decode('NOME'));
			$f->SetFont('Helvetica','',9);
			$f->setY($f->getY()+6);
			$f->setX(31);
			$f->Cell(105,0.1,'',0,0,0,true,'');
			$f->setY($f->getY()-2);
			$f->setX(30);
			$f->Cell(0,0,utf8_decode($dados["nome"]));
			
			$f->setY($f->getY()-4);
			$f->setX(138);
			$f->SetFont('Helvetica','B',10);
			$f->Cell(0,0,utf8_decode('IDADE'));
			$f->SetFont('Helvetica','',9);
			$f->setY($f->getY()+6);
			$f->setX(138);
			$f->Cell(17,0.1,'',0,0,0,true,'');
			$f->setY($f->getY()-2);
			$f->setX(138);
			$f->Cell(0,0,utf8_decode($dados["idade"]) . " ano(s)");
					
			$f->setY($f->getY()-4);
			$f->setX(156);
			$f->SetFont('Helvetica','B',10);
			$f->Cell(0,0,utf8_decode('CPF'));
			$f->SetFont('Helvetica','',9);
			$f->setY($f->getY()+6);
			$f->setX(157);
			$f->Cell(36,0.1,'',0,0,0,true,'');
			$f->setY($f->getY()-2);
			$f->setX(156);
			$f->Cell(0,0,utf8_decode($dados["cpf"]));	
			
			$f->setY($f->getY() + 6);
			$f->setX(30);
			$f->SetFont('Helvetica','B',10);
			$f->Cell(0,0,utf8_decode('DATA DE NASCIMENTO'));
			$f->SetFont('Helvetica','',9);
			$f->setY($f->getY() + 6);
			$f->setX(31);
			$f->Cell(40,0.1,'',0,0,0,true,'');
			$f->setY($f->getY() - 2);
			$f->setX(30);
			$f->Cell(0,0,$dados["dataNascimento"]);
			
			$f->setY($f->getY() - 4);
			$f->setX(72);
			$f->SetFont('Helvetica','B',10);
			$f->Cell(0,0,utf8_decode('SEXO'));
			$f->SetFont('Helvetica','',9);
			$f->setY($f->getY() + 6);
			$f->setX(73);
			$f->Cell(40,0.1,'',0,0,0,true,'');
			$f->setY($f->getY() - 2);
			$f->setX(72);
			$f->Cell(0,0,utf8_decode($dados["sexo"]));
			
			$f->setY($f->getY() - 4);
			$f->setX(114);
			$f->SetFont('Helvetica','B',10);
			$f->Cell(0,0,utf8_decode('ESTADO CIVIL'));
			$f->SetFont('Helvetica','',9);
			$f->setY($f->getY() + 6);
			$f->setX(115);
			$f->Cell(78,0.1,'',0,0,0,true,'');		
			$f->setY($f->getY() - 2);
			$f->setX(114);
			$f->Cell(0,0,utf8_decode($dados["estadoCivil"]));
			
			$f->setY($f->getY() + 6);
			$f->setX(30);
			$f->SetFont('Helvetica','B',10);
			$f->Cell(0,0,utf8_decode('CEP'));
			$f->SetFont('Helvetica','',9);
			$f->setY($f->getY() + 6);
			$f->setX(31);
			$f->Cell(40,0.1,'',0,0,0,true,'');
			$f->setY($f->getY() - 2);
			$f->setX(30);
			$f->Cell(0,0,utf8_decode($dados["cep"]));
			
			$f->setY($f->getY() - 4);
			$f->setX(72);
			$f->SetFont('Helvetica','B',10);
			$f->Cell(0,0,utf8_decode('ENDEREÇO/Nº/COMPLEMENTO'));
			$f->SetFont('Helvetica','',9);
			$f->setY($f->getY() + 6);
			$f->setX(73);
			$f->Cell(120,0.1,'',0,0,0,true,'');
			$f->setY($f->getY() - 2);
			$f->setX(72);
			$endereco = $dados["endereco"];
			if (!empty($dados["numero"])) {
				$endereco .= ", " . $dados["numero"];
			}
			if (!empty($dados["complemento"])) {
				$endereco .= " " . $dados["complemento"];
			}
			$f->Cell(0,0,utf8_decode($endereco));
			
		
			
			$f->setY($f->getY()+6);
			$f->setX(30);
			$f->SetFont('Helvetica','B',10);
			$f->Cell(0,0,utf8_decode('BAIRRO'));
			$f->SetFont('Helvetica','',9);
			$f->setY($f->getY()+6);
			$f->setX(31);
			$f->Cell(82,0.1,'',0,0,0,true,'');
			$f->setY($f->getY()-2);
			$f->setX(30);
			$f->Cell(0,0,utf8_decode($dados["bairro"]));

			$f->setY($f->getY()-4);
			$f->setX(114);
			$f->SetFont('Helvetica','B',10);
			$f->Cell(0,0,utf8_decode('CIDADE'));
			$f->SetFont('Helvetica','',9);
			$f->setY($f->getY()+6);
			$f->setX(115);
			$f->Cell(78,0.1,'',0,0,0,true,'');
			$f->setY($f->getY()-2);
			$f->setX(114);
			$f->Cell(0,0,utf8_decode($dados["cidade"] .  " (" . $dados["uf"] . ")"));

			$f->setY($f->getY()+6);
			$f->setX(30);
			$f->SetFont('Helvetica','B',10);
			$f->Cell(0,0,utf8_decode('TELEF. CELULAR'));
			$f->SetFont('Helvetica','',9);
			$f->setY($f->getY()+6);
			$f->setX(31);
			$f->Cell(38,0.1,'',0,0,0,true,'');
			$f->setY($f->getY()-2);
			$f->setX(30);
			$f->Cell(0,0,utf8_decode($dados["telefoneCelular"]));
			
			$f->setY($f->getY()-4);
			$f->setX(71);
			$f->SetFont('Helvetica','B',10);
			$f->Cell(0,0,utf8_decode('TELEF. RESIDENCIAL'));
			$f->SetFont('Helvetica','',9);
			$f->setY($f->getY()+6);
			$f->setX(72);
			$f->Cell(38,0.1,'',0,0,0,true,'');
			$f->setY($f->getY()-2);
			$f->setX(71);
			$f->Cell(0,0,utf8_decode($dados["telefoneResidencial"]));

			$f->setY($f->getY()+6);
			$f->setX(30);
			$f->SetFont('Helvetica','B',10);
			$f->Cell(0,0,utf8_decode('E-MAIL'));
			$f->SetFont('Helvetica','',9);
			$f->setY($f->getY()+6);
			$f->setX(31);
			$f->Cell(81,0.1,'',0,0,0,true,'');
			$f->setY($f->getY()-2);
			$f->setX(30);
			$f->Cell(0,0,utf8_decode($dados["email"]));
			
			$f->setY($f->getY()-4);
			$f->setX(113);
			$f->SetFont('Helvetica','B',10);
			$f->Cell(0,0,utf8_decode('PROFISSÃO'));
			$f->SetFont('Helvetica','',9);
			$f->setY($f->getY()+6);
			$f->setX(114);
			$f->Cell(78,0.1,'',0,0,0,true,'');
			$f->setY($f->getY()-2);
			$f->setX(113);
			$f->Cell(0,0,utf8_decode($dados["profissao"]));
			
			$f->setY($f->getY()+6);
			$f->setX(30);
			$f->SetFont('Helvetica','B',10);
			$f->Cell(0,0,utf8_decode('TRATAMENTOS'));
			$f->SetFont('Helvetica','',9);
			$f->setY($f->getY()+6);
			$f->setX(31);
			$f->Cell(161,0.1,'',0,0,0,true,'');
			$f->setY($f->getY()-2);
			$f->setX(30);
			$f->Cell(0,0,utf8_decode(Paciente::getTratamentos($dados["tratamentos"])));
			
			$f->setY($f->getY()+6);
			$f->setX(30);
			$f->SetFont('Helvetica','B',10);
			$f->Cell(0,0,utf8_decode('ALTURA'));
			$f->SetFont('Helvetica','',9);
			$f->setY($f->getY()+6);
			$f->setX(31);
			$f->Cell(13,0.1,'',0,0,0,true,'');
			$f->setY($f->getY()-2);
			$f->setX(30);
			$f->Cell(0,0, $atendimento["altura"]);
			
			$f->setY($f->getY()-4);
			$f->setX(45);
			$f->SetFont('Helvetica','B',10);
			$f->Cell(0,0,utf8_decode('PESO'));
			$f->SetFont('Helvetica','',9);
			$f->setY($f->getY()+6);
			$f->setX(46);
			$f->Cell(13,0.1,'',0,0,0,true,'');
			$f->setY($f->getY()-2);
			$f->setX(45);
			$f->Cell(0,0,utf8_decode($atendimento["peso"]));
			
			$f->setY($f->getY()-4);
			$f->setX(60);
			$f->SetFont('Helvetica','B',10);
			$f->Cell(0,0,utf8_decode('IMC'));
			$f->SetFont('Helvetica','',9);
			$f->setY($f->getY()+6);
			$f->setX(61);
			$f->Cell(13,0.1,'',0,0,0,true,'');
			$f->setY($f->getY()-2);
			$f->setX(60);
			$f->Cell(0,0,utf8_decode($atendimento["imc"]));
			
			$f->setY($f->getY()+8);
			$f->setX(30);
			$f->SetFont('Helvetica','B',10);
			$f->Cell(0,0,utf8_decode('HISTÓRIA DA DOENÇA ATUAL'));
			$f->SetFont('Helvetica','',9);
			$f->setX(31);
			$f->setY($f->getY()+2);
			$f->setX(30);
			$f->MultiCell(0,5, empty($atendimento["hda"]) ? "Nada registrado" : strip_tags($atendimento["hda"]));
			
			$f->setY($f->getY()+6);
			$f->setX(30);
			$f->SetFont('Helvetica','B',10);
			$f->Cell(0,0,utf8_decode('AVALIAÇÃO POSTURAL'));
			$f->SetFont('Helvetica','',9);
			$f->setX(31);
			$f->setY($f->getY()+2);
			$f->setX(30);
			$f->MultiCell(0,5, empty($atendimento["avaliacaoPostural"]) ? "Nada registrado" : strip_tags($atendimento["avaliacaoPostural"]));
			
			$f->setY($f->getY()+6);
			$f->setX(30);
			$f->SetFont('Helvetica','B',10);
			$f->Cell(0,0,utf8_decode('EVOLUÇÃO'));
			$f->SetFont('Helvetica','',9);
			$f->setX(31);
			$f->setY($f->getY()+2);
			$f->setX(30);
			$f->MultiCell(0,5,  empty($atendimento["evolucao"]) ? "Nada registrado" : strip_tags($atendimento["evolucao"]));
			
			$f->output();
    		
    	}
    	catch (Exception $e) {
    		
    	}
    }
	
}

?>