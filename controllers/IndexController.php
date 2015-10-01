<?php

class IndexController extends Controller {

	public function IndexController() {
		parent::__construct();
		//$this->DAO = new DAOGenerico();
	}

    public function indexAction() {
		try {
			$conexao = $this->conexao->getConexao();
			$pacientes = $this->dao->findAll($conexao, "pacientes", array(
					"dados" => array(
						"nome",
						"dataNascimento"
					),
					"where" => array(
						"mesNascimento" => date('m')
					),
					"order" => array(
						"nome" => "asc"
					)
				)
			);			
		}
		catch (Exception $e) {
			setMensagem("error", $e->getMessage());
		}
		$conexao->disconnect();
		$view = new View("index", "painel", "index.phtml");
		$view->setParams(array(
				"title" => "",
				"aniversariantes" => $pacientes
			)
		);
		$view->showContents();
    }
    
    public function alterarAction() {
        	
    	try {

    		$conexao = $this->conexao->getConexao();
    		//$redirecionar = montaRedirect($_SERVER["QUERY_STRING"], array("id", "acao"));
    		$breadcrumbs = array();
    		
    		$dadosUsuario = $this->dao->findByPk ($conexao, "usuarios", getVariavel("id"));
    		
    		// usuário só poderá alterar os dados dele mesmo
    		if ($dadosUsuario["id"] != $_SESSION[PREFIX . "loginId"]) {
    			throw new Exception("Você não tem permissão para atualizar dados de outros usuários");
    		}
    		
    		$breadcrumbs[] = array(
    			$dadosUsuario["nome"] => "",
    			"Alterar dados" => ""
    		);
    		// armazena a senha atual em uma variável
    		$senhaAtual = $dadosUsuario["senha"];
    		$novaSenha = $dadosUsuario["senha"];				
    		
    		// se submeteu dados
    		if (count($_POST) > 0) {
    			
    			$redirecionar = NULL;
    			$dados = $_POST;
    			
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
    			
    			// se o usuário informar a nova senha, deverá informar a senha atual
    			if (!empty($dados["novaSenha"])) {
    				$obrigatorios["senhaAtual"] = array(
    						"tipo" => "input", 
    						"nome" => "Senha atual"
    					);
    			}
    			 
    			// valida
    			$mensagem = validaPost($obrigatorios, $dados);
    			if (!empty($mensagem)) {
    				throw new Exception($mensagem);
    			}
    			
    			// recebe e codifica a senha atual
    			$dados["senhaAtual"] = !empty($dados["senhaAtual"]) ? md5(trim($dados["senhaAtual"])) : $senhaAtual;
    			if ($dados["senhaAtual"] != $senhaAtual) {
    				throw new Exception("Senha atual não confere");
    			}
    			$dados["senha"] = $dados["novaSenha"] = !empty($dados["novaSenha"]) ? md5(trim($dados["novaSenha"])) : $novaSenha;
    			$dados = retiraDoArray(array("novaSenha", "senhaAtual"), $dados);
    			$dados = $this->dao->salva($conexao, "usuarios", $dados);
    				
    			// adiciona nos logs
    			//$this->logDAO->adicionar ($conexao, "alterou", "dados", $_SESSION[PREFIX . "loginNome"], $dados["nome"], "Usuário atualizou seus dados.");
    			
    			$conexao->commit();
    			$conexao->disconnect();		
    			setMensagem("info", "Dados atualizados");
    			Application::redirect('?modulo=index&acao=alterar&id=' . $dados["id"]);
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
    	$view = new View($_GET["modulo"], "extendido", "alterar.phtml");
    	$view->setParams(array(
    			"title" => getTitulo($breadcrumbs), 
    			"breadcrumbs" => $breadcrumbs,
    			"usuario" => $dadosUsuario
    		)
    	);
        $view->showContents();
    }
	
}
?>