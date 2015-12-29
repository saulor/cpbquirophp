<?php

class UsuariosController extends Controller {
	
	public function UsuariosController() {
		parent::__construct();
	}
	
    public function indexAction() {
    	
    	try {
    		$conexao = $this->conexao->getConexao();
    		$breadcrumbs = array();
    		$breadcrumbs[] = array("Usuários" => "");
    		$quantidadePorPagina = (isset($_REQUEST["exibir"]) && $_REQUEST["exibir"] != "")  ? (int) $_REQUEST["exibir"] : QUANTIDADE_POR_PAGINA;
    		$pagina = (isset($_REQUEST["p"])) ? $_REQUEST["p"] : 1;
    		$pagina = ($pagina <= 0) ? 1 : $pagina;
    		$limit = ($pagina == 1) ? $quantidadePorPagina : $quantidadePorPagina * ($pagina - 1);
    		$offset = ($pagina == 1) ? 0 : $quantidadePorPagina;
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
    		
    		$quantidade = $this->dao->count($conexao, "vw_usuarios");
    		$objetos = $this->dao->findAll($conexao, "vw_usuarios", array(
    				"limit" => $limit,
    				"offset" => $offset,
    				"order" => $order
    			)
    		);
    		if (count($objetos) == 0 && $pagina > 1) {
    			Application::redirect("?modulo=" . $_GET["modulo"] . "&p=" . ($pagina-1));
    		}
    	}
    	catch (Exception $e) {
    		setMensagem("error", $e->getMessage());
    	}
    	$conexao->disconnect();
    	$view = new View($_GET['modulo'], "painel", "index.phtml");
    	$view->setParams(array(
    			"title" => getTitulo($breadcrumbs), 
    			"objetos" => $objetos,
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
    		$redirecionar = NULL;
    		$breadcrumbs = array();
    		$breadcrumbs[] = array("Usuários" => "?modulo=".$_GET["modulo"]);
    		
    		$dados = inicializaDados(new Usuario());
			$permissoes = $this->dao->findAll ($conexao, "permissoes");	
    		
    		if (isset($_GET["id"])) {
    		
    			//if (!temPermissao(array('usuarios:visualizarDados'), $_SESSION['permissoes'])) {
    			//	throw new Exception("Você não tem permissão para visualizar dados de usuarios");
    			//}
    			
    			$id = (int) $_GET["id"]; 
    			$dados = $this->dao->findByPk($conexao, "usuarios", $id);
    			$dados["diasAtendimento"] = explode(",", $dados["diasAtendimento"]);
				$senha = $dados["senha"];
    			// desconverte as datas
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
    	
    			$dados = $_POST["Usuario"];
    			
    			$obrigatorios = array(
    				"nome" => array(
    					"tipo" => "input", 
    					"nome" => "Nome"
    				),
					"login" => array(
    					"tipo" => "input", 
    					"nome" => "Login"
    				),
					"permissao" => array(
    					"tipo" => "select", 
    					"nome" => "Permissão"
    				)					
    			);
    			
				// A senha só será obrigatória quando for cadastro de usuários novos
				// Em atualizações não é necessário informar  
				if ($dados["id"] == 0) {
					$obrigatorios["senha"] = array(
							"tipo" => "input", 
							"nome" => "Senha"
						);
				}
				
    			$mensagem = validaPost($obrigatorios, $dados);
    			if (!empty($mensagem)) {
    				throw new Exception($mensagem);
    			}
					
    			if ($dados["id"] == 0) {
    				$dados["senha"] = md5($dados["senha"]);
    				$dados["timestamp"] = time();
    				$dados["data"] = date('d/m/Y H:i:s', $dados["timestamp"]);
    			}
    			else {
					if ($dados["senha"] == "") {
						$dados["senha"] = $senha;
					}
					else {
						$dados["senha"] = md5($dados["senha"]);
					}
    			}	
    			
    			$dados["diasAtendimento"] = implode(",", $dados["diasAtendimento"]);
    			$dados = $this->dao->salva($conexao, "usuarios", $dados);
    			
    			$conexao->commit();
    			
    			if ($acao == "novo") {					
    				setMensagem("info", "Usuário cadastrado [" . $dados["nome"] . "]");
    				Application::redirect("?modulo=usuarios&acao=cadastrar");
    				exit;
    			}
    			else {
    				setMensagem("info", "Usuário atualizado [" . $dados["nome"] . "]");
    				Application::redirect("?modulo=usuarios");
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
    	$view = new View($_GET['modulo'], "painel", "novo.phtml");
    	$view->setParams(array(
    			"title" => getTitulo($breadcrumbs), 
    			"breadcrumbs" => $breadcrumbs,
    			"usuario" => $dados,
				"permissoes" => $permissoes
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
    		
    		$id = isset($_GET["id"]) ? (int) $_GET["id"] : 0;
    		
    		$dados = $this->dao->findByPk($conexao, "usuarios", $id);
				
			if (in_array((int) $dados["id"], array(1,2))) {
				throw new Exception ("Este usuário não pode ser excluído");
			}
    		
    		$affectedRows = $this->dao->exclui($conexao, "usuarios", array(
    				"where" => array(
    					"id" => $id
    				)
    			)
    		);
    		
    		if ($affectedRows > 0) {
    			//$this->logDAO->adicionar ($conexao, "excluiu", "Profissional Administrativo", $_SESSION[PREFIX . "loginNome"], $dados["nome"], "Usuário excluiu um Profissional Administrativo.");
    			$conexao->commit();
    			setMensagem("info", "Usuario excluído [" . $dados["nome"] . "]");
    		}
    	}
    	catch (Exception $e) {
    		$conexao->rollback();
    		setMensagem("error", $e->getMessage());
    	}
    	
    	$conexao->disconnect();
    	Application::redirect("?modulo=usuarios");
    	exit;
    	
    }
    
    public function alterarAction() {
		
		try {
			
			$conexao = $this->conexao->getConexao();
			$redirecionar = NULL;
			$breadcrumbs = array();
			
			$id = isset($_GET["id"]) ? (int) $_GET["id"] : 0;
			$dadosUsuario = $this->dao->getById($conexao, "usuarios", $id);
			if (count($dadosUsuario) == 0) {
				throw new Exception ("Usuário não encontrado");
			}
			
			// usuário só poderá alterar os dados dele mesmo
			if ($id != $_SESSION[PREFIX . "loginId"]) {
				$dadosUsuario = array(
					"nome" => "",
					"login" => "",
					"senhaAtual" => "",
					"novaSenha" => "",
					"email" => ""
				);
				throw new Exception("Você não tem permissão para visualizar os dados deste usuário");
			}
			
			$breadcrumbs[] = array(
				$dadosUsuario["nome"] => "?modulo=".$_GET["modulo"]."&acao=alterar&id=".$dadosUsuario["id"],
				"Alterar dados" => ""
			);
			// armazena a senha atual em uma variável
			$senhaAtual = $dadosUsuario["senha"];
			$novaSenha = $dadosUsuario["senha"];				
			
			// se submeteu dados
			if (count($_POST) > 0) {
				
				// todos os dados são obrigatórios
				$obrigatorios = array(
					"nome" => array(
						"tipo" => "input", 
						"nome" => "Nome"
					),
					"login" => array(
						"tipo" => "input", 
						"nome" => "Login"
					),
					"email" => array(
						"tipo" => "input", 
						"nome" => "E-mail"
					)	
				);
				
				// recebe os dados
				$dados = $_POST;
				
				// se o usuário informar a nova senha, deverá informar a senha atual
				if ($dados["novaSenha"] != "") {
					$obrigatorios["senhaAtual"] = array(
							"tipo" => "input", 
							"nome" => "Senha atual"
						);
				}
				 
				// valida
				$mensagem = validaPost($obrigatorios, $dados);
				if ($mensagem != "") {
					throw new Exception($mensagem);
				}
				
				// recebe e codifica a senha atual
				$dados["senhaAtual"] = ($dados["senhaAtual"] != "") ? md5(trim($dados["senhaAtual"])) : $senhaAtual;
				
				if ($dados["senhaAtual"] != $senhaAtual) {
					throw new Exception("Senha atual não confere");
				}
				
				$dados["novaSenha"] = ($dados["novaSenha"] != "") ? md5(trim($dados["novaSenha"])) : $novaSenha;
				
				$dadosUsuario["nome"] = $dados["nome"];
				$dadosUsuario["login"] = $dados["login"];
				$dadosUsuario["senha"] = $dados["novaSenha"];
				$dadosUsuario["email"] = $dados["email"];
				
				// atualiza o usuário
				$dadosUsuario = trataDados($dadosUsuario);
				$this->dao->atualizar($conexao, "usuarios", $dadosUsuario);
				// adiciona nos logs
				//$this->logDAO->adicionar ($conexao, "alterou", "dados", $_SESSION[PREFIX . "loginNome"], $dadosUsuario["nome"], "Usuário atualizou seus dados.");
				$conexao->commit();
				$conexao->disconnect();		
				setMensagem("info", "Dados alterados");
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
		$view = new View($_GET['modulo'], "painel", "alterar.phtml");
		$view->setParams(array(
				"title" => getTitulo($breadcrumbs), 
				"breadcrumbs" => $breadcrumbs,
				"usuario" => $dadosUsuario
			)
		);
	    $view->showContents();
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
						
						$dados = $this->dao->findByPk($conexao, "usuarios", $id);
				
						switch ($_POST["acoes"]) {
						
							case "excluir" :
								
								$opcao = "excluído(s)";
								try {
									if (in_array((int) $dados["id"], array(1))) {
										$naoProcessados+=1;
									}
									else if (true) {
									}
									else {
										$affectedRows = $this->dao->exclui($conexao, "usuarios", array(
												"where" => array(
													"id" => (int) $id
												)
											)
										);
										if ($affectedRows > 0) {
											$processados+=1;
										}
									}
								}
								catch (Exception $e) {
									$naoProcessados+=1;
								}
								
							break;
							
						}
					}
					
					if ($processados > 0) {
						$conexao->commit();
						setMensagem("info", $processados. " usuário(s) " . $opcao);
					}
					
					if ($naoProcessados > 0) {
						setMensagem("error", $naoProcessados. " usuário(s) não podem ser " . $opcao);
					}
					
					$conexao->disconnect();
				
				}
				catch (Exception $e) {
					setMensagem("error", $e->getMessage());
					$conexao->rollback();
				}
				
			}
			
		}
		
		Application::redirect(WWW_ROOT . "/?modulo=usuarios");
		exit;
		
	}
	
}

?>