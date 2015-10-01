<?php

class LoginController extends Controller {

	public function LoginController() {
		parent::__construct();
	}

	public function indexAction() {
		try {
			if(count($_POST) > 0) {
							
				if (Util::isEmpty($_POST['login']) && Util::isEmpty($_POST['senha'])) {
					throw new Exception('Login inválido!');
				}
							
				$usuario = $this->dao->find($this->conexao->getConexao(), "usuarios", array(
						"where" => array(
							"login" => $_POST['login'],
							"senha" => md5($_POST['senha'])
						)
					)
				);
				
				if(count($usuario) == 0) {
					throw new Exception("Login inválido!");
				}

				
				$_SESSION[PREFIX . "loginId"] = $usuario["id"];
				$_SESSION[PREFIX . "loginNome"] = $usuario["nome"];
				$_SESSION[PREFIX . "loginPermissao"] = $usuario["permissao"];
				//$this->logDAO->adicionar ($conexao->getConexao(), "fez", "login", $_SESSION["loginNome"], "Painel de administração");	
				$this->conexao->getConexao()->disconnect();	
				Application::redirect('index.php');
				exit;
				
			}
		}
		catch (Exception $e) {
			$this->conexao->getConexao()->disconnect();	
			setMensagem("error", $e->getMessage());
		}
		
		$view = new View($_GET["modulo"], "painel", "index.phtml");
		$view->setParams(array(
				"title" => "Login"
			)
		);
        $view->showContents();
	}
    
}
?>