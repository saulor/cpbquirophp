<?php

class LoginController extends Controller {

	public function LoginController() {
		parent::__construct();
	}

	public function indexAction() {
		if(count($_POST) > 0) {
			if (!Util::isEmpty($_POST['login']) && !Util::isEmpty($_POST['senha'])) {
				$conexao = new Conexao();
				$dao = new DAOGenerico();
				
				$tabelas = array(
					"agenda",
					"agenda_fisioterapeutas",
					"atendimentos",
					"atendimentos_dores",
					"pacientes",
					"permissoes",
					"usuarios",
					"vw_agenda",
					"vw_pacientes_atendimentos",
					"vw_usuarios"
				);
				$infoTabelas = array();
				//foreach (glob("models/*.php") as $filename) {
				foreach ($tabelas as $tabela) {
				   $infoTabelas[$tabela] = $dao->getInformacoesTabela($conexao->getConexao(), $tabela);
				}
				$_SESSION[PREFIX . "infoTabelas"] = $infoTabelas;
				//die;
				
				$usuario = $dao->find($conexao->getConexao(), "usuarios", array(
						"where" => array(
							"login" => $_POST['login'],
							"senha" => md5($_POST['senha'])
						)
					)
				);

				if(count($usuario) == 0) {	
					$conexao->getConexao()->disconnect();	
					setMensagem("error", "Login inválido!");
				}
				else {
					
					
					
					$_SESSION[PREFIX . "loginId"] = $usuario["id"];
					$_SESSION[PREFIX . "loginNome"] = $usuario["nome"];
					$_SESSION[PREFIX . "loginPermissao"] = $usuario["permissao"];
					//$this->logDAO->adicionar ($conexao->getConexao(), "fez", "login", $_SESSION["loginNome"], "Painel de administração");	
					$conexao->getConexao()->disconnect();	
					Application::redirect('index.php');
					exit;
				}
			}
			else {
				setMensagem("error", "Login inválido!");
			}
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