<?php

class Controller {
	
	protected $layout = 'layouts.painel';
	protected $conexao;
	protected $logDAO;
	
	public function Controller() {
		$this->conexao = new Conexao();
		$this->logDAO = new LogDAO();
	}
	
}

?>