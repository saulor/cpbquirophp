<?php

class PacientesController extends Controller {
	
	public function PacientesController() {
		parent::__construct();
		$this->DAO = new DAOGenerico();
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
    		
    		$quantidade = $this->DAO->count($conexao, "pacientes");
    		$pacientes = $this->DAO->findAll($conexao, "pacientes", array(
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
    			$dados = $this->DAO->findByPk($conexao, "pacientes", (int) $_GET["id"]);
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
    	
    			$dados = $_POST["Paciente"];
    			$dados["tratamentos"] = isset($dados["tratamentos"]) ? implode(",", $dados["tratamentos"]) : array();
    			
    			$obrigatorios = array(
    				"nome" => array(
    					"tipo" => "input", 
    					"nome" => "Nome"
    				)	
    			);
    			
    			$mensagem = validaPost($obrigatorios, $dados);
    			if (!empty($mensagem)) {
    				$redirecionar = NULL;
    				throw new Exception($mensagem);
    			}
    			
    			if ($dados["id"] == 0) {
    				$dados["status"] = 1;
    				$dados["timestamp"] = time();
    				$dados["data"] = date('Y-m-d H:i:s', $dados["timestamp"]);
					$id = $this->DAO->salva($conexao, "pacientes", trataDados($dados));
    			}
    			else {
    				$this->DAO->salva($conexao, "pacientes", $dados);
    			}
    			
    			$conexao->commit();	
    			
    			if ($acao == "novo") {					
    				setMensagem("info", "Paciente cadastrado [" . $dados["nome"] . "]");
    				Application::redirect("?modulo=" . $_GET["modulo"] . "&acao=cadastrar&id=" . $dados["id"]);
    				exit;
    			}
    			else {
    				setMensagem("info", "Paciente atualizado [" . $dados["nome"] . "]");
    				$redirecionar = "?modulo=" . $_GET["modulo"];
    				if (isset($_GET["r"])) {
    					$redirecionar = urldecode($_GET["r"]);
    				}
    				Application::redirect($redirecionar);
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
    			"paciente" => $dados
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
    			$dados = $this->DAO->findByPk($conexao, "pacientes", $id);
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
    		$breadcrumbs[] = array("Pacientes" => "?modulo=".$_GET["modulo"]);
    		
    		$atendimento = inicializaDados(new Atendimento());
    		$doresAtuais = array();
    		
    		if (isset($_GET["id"])) {
    			
    			$paciente = $this->DAO->findByPk($conexao, "pacientes", (int) $_GET["id"]);
    			
    			$atendimento = $this->DAO->find($conexao, "atendimentos", array(
    					"where" => array(
    						"paciente" => (int) $paciente["id"]
    					)
    				)
    			);
    			
    			if (count($atendimento) == 0) {
    				$atendimento = inicializaDados(new Atendimento());
    				$atendimento["dores"] = array();
    			}
    			else {
	    			$doresAtuais = $atendimento["dores"] = $this->DAO->findAll($conexao, "atendimentos_dores", array(
	    					"where" => array(
	    						"atendimento" => (int) $atendimento["id"]
	    					)
	    				)
	    			);
	    		}
    			
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
    			$atendimentoIn = $_POST['Atendimento'];
    			
    			$dores = $_POST['Dores'];
    			
    			$obrigatorios = array(
    				"altura" => array(
    					"tipo" => "decimal", 
    					"nome" => "Altura"
    				),
    				"peso" => array(
    					"tipo" => "decimal", 
    					"nome" => "Peso"
    				),
    				"imc" => array(
    					"tipo" => "decimal", 
    					"nome" => "IMC"
    				)		
    			);
    			
    			$mensagem = validaPost($obrigatorios, $atendimentoIn);
    			if (!empty($mensagem)) {
    				throw new Exception($mensagem);
    			}
    			
    			$id = $this->DAO->salva($conexao, "atendimentos", $atendimentoIn);
    			
    			if ($id > 0 && $atendimentoIn["id"] == 0) { 
    				$atendimentoIn["id"] = $id;
    			}
				
				$locaisAtuais = $locais = array();
				
    			foreach ($doresAtuais as $dor) {
    				$locaisAtuais[$dor["id"]] = $dor["local"];
    			}
    			
    			foreach ($dores as $dor) {
    				if (isset($dor["local"])) {
    					$locais[$dor["id"]] = $dor["local"];
    				}
    			}
    			
    			$result = array_diff($locaisAtuais, $locais);
    			
    			foreach (array_diff($locaisAtuais, $locais) as $id => $value) {
    				$this->DAO->excluiByPk($conexao, "atendimentos_dores", $id);
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
						$this->DAO->salva($conexao, "atendimentos_dores", $d);
    				}	
    			}
    			
    			$conexao->commit();
				setMensagem("info", "Atendimento realizado");
    			Application::redirect("?modulo=" . $_GET["modulo"] . "&acao=atendimento&id=" . $paciente["id"]);
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
    			"atendimento" => $atendimento
    		)
    	);
    	$view->showContents();
    	
    }
    
    public function excluirAction() {
    
    	try {
    		$conexao = $this->conexao->getConexao();
    		
//    		if (!temPermissao(array('administrativos:manterAdministrativos'), $_SESSION[PREFIX . "permissoes"])) {
//    			throw new Exception("Você não tem permissão para realizar esta ação.");
//    		}
    		
    		$id = (int) $_GET["id"];
    		
    		$dados = $this->DAO->findByPk($conexao, "pacientes", $id);
    		
    		$affectedRows = $this->DAO->exclui($conexao, "pacientes", array(
    				"where" => array(
    					"id" => $id
    				)
    			)
    		);
    		
    		if ($affectedRows > 0) {
    			$diretorio = DIR_UPLOADS . SEPARADOR_DIRETORIO . "pacientes" . SEPARADOR_DIRETORIO . $id;
    			excluiDiretorio($diretorio);
    			//$this->logDAO->adicionar ($conexao, "excluiu", "Profissional Administrativo", $_SESSION[PREFIX . "loginNome"], $dados["nome"], "Usuário excluiu um Profissional Administrativo.");
    			$conexao->commit();
    			setMensagem("info", "Paciente excluído [" . $dados["nome"] . "]");
    		}
    	}
    	catch (Exception $e) {
    		$conexao->rollback();
    		setMensagem("error", $e->getMessage());
    	}
    	
    	Application::redirect("?modulo=pacientes");
    	exit;
    	
    }
    
    public function opcoesAction () {
    	
    	if (count($_POST) > 0) {
    		
    		if (isset($_POST["acoes"])) {
    		
    			$processados = 0;
    			$naoProcessados = 0;
    			$ids = isset($_POST["objetos"]) ? $_POST["objetos"] : array();
    			
    			// retira o elemento -1, caso exista
    			if (count($ids) > 0 && $ids[0] == -1) {
    				array_shift($ids);
    			}
    		
    			try {
    				
    				$conexao = $this->conexao->getConexao();
    				
    				//if (!temPermissao(array('pacientes:manterCursos'), $_SESSION[PREFIX . "permissoes"]))
    				//	throw new Exception("Você não tem permissão para realizar esta ação.");
    					
    				foreach ($ids as $id) {
    					
    					$dados = $this->DAO->findByPk($conexao, "pacientes", (int) $id);
    			
    					switch ($_POST["acoes"]) {
    					
    						case "excluir" :
    							
    							$opcao = "excluído(s)";
    							try {
    								$affectedRows = $this->DAO->exclui($conexao, "pacientes", array(
	    									"where" => array(
	    										"id" => $id
	    									)
	    								)
	    							);
    								if ($affectedRows > 0) {
    									$processados+=1;
    									$diretorio = DIR_UPLOADS . SEPARADOR_DIRETORIO . "pacientes" . SEPARADOR_DIRETORIO . $id;
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
    							$affectedRows = $this->DAO->atualizar($conexao, "pacientes", $dados);
    							if ($affectedRows > 0) {
    								$processados += 1;
    								//$this->logDAO->adicionar ($conexao, "ativou", "paciente", $_SESSION[PREFIX . "loginNome"], $dados["nome"], "Usuário ativou paciente."); 
    							}
    							
    						break;
    						
    						case "desativar" :
    							
    							$opcao = "desativado(s)";
    							$dados["status"] = 0;
    							$affectedRows = $this->DAO->atualizar($conexao, "pacientes", $dados);
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
    	
    	Application::redirect(WWW_ROOT . "/?modulo=pacientes");
    	exit;
    	
    }
    
    public function removerAction() {
    	
    	try {
    		$conexao = $this->conexao->getConexao();
    		$redirecionar = "?modulo=pacientes";				
    		$objeto = $this->DAO->findByPk ($conexao, "pacientes", (int) $_GET["id"]);	
    		$redirecionar .= "&acao=cadastrar&id=" . $objeto["id"];		
    		$diretorio = DIR_UPLOADS . SEPARADOR_DIRETORIO . "pacientes" . SEPARADOR_DIRETORIO . $objeto["id"];
    		$file = $diretorio . SEPARADOR_DIRETORIO . $objeto["foto"];
    		
    		if (!existeArquivo($file)) {
    			throw new Exception ("Imagem não encontrada");
    		}
    		
    		if (excluiArquivo($file)) {
    			$objeto["foto"] = NULL;
    			$this->DAO->salva($conexao, "pacientes", $objeto);
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
    		$dados = $this->DAO->findByPk($conexao, "pacientes", getVariavel("id"));
    		$atendimento = $this->DAO->find($conexao, "atendimentos", array(
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
			$f->MultiCell(0,5,  empty($atendimento["hda"]) ? "Nada registrado" : strip_tags($atendimento["hda"]));
			
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