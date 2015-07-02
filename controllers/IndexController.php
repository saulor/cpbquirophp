<?php

class IndexController extends Controller {

	public function IndexController() {
		parent::__construct();
		$this->DAO = new DAOGenerico();
	}

    public function indexAction() {
		try {
			$conexao = $this->conexao->getConexao();
			$pacientes = $this->DAO->findAll($conexao, "pacientes", array(
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
	
}
?>