<?php

class LogsController extends Controller {
	
	public function LogsController() {
		parent::__construct();
	}

	 function indexAction() {
		try {
			$conexao = $this->conexao->getConexao();
			$breadcrumbs = array();
			$breadcrumbs[] = array("Logs" => "");
			$quantidade = 0;
			$logs = array();
			$quantidadePorPagina = (isset($_REQUEST["exibir"]) && $_GET["exibir"] != '')  ? (int) $_GET["exibir"] : QUANTIDADE_POR_PAGINA;
			$pagina = (isset($_GET['p'])) ? $_GET['p'] : 1;
			$pagina = ($pagina <= 0) ? 1 : $pagina;
			$limit = ($pagina == 1) ? $quantidadePorPagina : $quantidadePorPagina * ($pagina - 1);
			$offset = ($pagina == 1) ? 0 : $quantidadePorPagina;
			
			//if (!temPermissao(array('logs:visualizarLogs'), $_SESSION['permissoes']))
			//	throw new Exception("Você não tem permissão para visualizar logs");			
			
			$quantidade = $this->logDAO->getQuantidade($conexao, "logs");
			$logs = $this->logDAO->getDados ($conexao, "logs", array(
					"limit" => $limit,
					"offset" => $offset,
					"order" => array(
						"data" => "desc"
					)
				)
			);
			if (count($logs) == 0 && $pagina > 1) {
				Application::redirect("?modulo=".$_GET["modulo"]."&p=".($pagina-1));
			}
		}
		catch (Exception $e) {
			setMensagem("error", $e->getMessage());
		}
		
		$conexao->disconnect();
		$view = new View("views/logs/index.phtml");
		$view->setParams(array(
				"title" => getTitulo($breadcrumbs), 
				"logs" => $logs,
				"quantidade" => $quantidade,
				"quantidadePorPagina" => $quantidadePorPagina,
				"pagina" => $pagina,
				"breadcrumbs" => $breadcrumbs
				
			)
		);
        $view->showContents();
	}
	
}

?>