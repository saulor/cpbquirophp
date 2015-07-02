<?php

class Application {

	public $defaultController = 'Index';
    protected $controller;
    protected $action;
  
    private function loadRoute($modulo, $acao) {
		$modulo = ($modulo != NULL) ? ucwords($modulo) : $this->defaultController;
        $acao = ($acao != NULL) ? $acao : 'index';
        
        if (!isset($_SESSION[PREFIX . "loginId"]) && $modulo != "Login") {
        	header("Location: ?modulo=login");
        	exit;
        }
        	
        $this->controller = $modulo;
        $this->action = $acao;
    }
  
    public function dispatch($modulo, $acao) {
		
        $this->loadRoute($modulo, $acao);

        $controllerArquivo = 'controllers/' . $this->controller . 'Controller.php';
		
        if(file_exists($controllerArquivo)) {
            require_once $controllerArquivo;
       	}
        else {
            throw new Exception('Arquivo '.$controllerArquivo.' nao encontrado');
       	}
       	
        $controllerClasse = $this->controller . 'Controller';
        
        if(class_exists($controllerClasse)) {
            $controllerObj = new $controllerClasse;
       	}
        else {
            throw new Exception("Classe '$controllerClasse' nao existe no arquivo '$controllerArquivo'");
        }
			
       	$metodo = $this->action . 'Action';

        if(method_exists($controllerObj,$metodo)) {
            $controllerObj->$metodo();
       	}
        else {
            throw new Exception("Metodo '$metodo' nao existe na classe '$controllerClasse'");
       	}
    }
  
    public static function redirect($uri) {
        header("Location: $uri");
    }
}
?>