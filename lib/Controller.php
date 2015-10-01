<?php

class Controller {
	
	protected $layout = 'layouts.painel';
	protected $conexao;
	protected $logDAO;
	protected $dao;
	
	public function Controller() {
		$this->conexao = new Conexao();
		$this->logDAO = new LogDAO();
		$this->dao = new DAOGenerico();
	}
	
}

?>