<?php

class ErroController extends Controller {

    public function indexAction() {
    	$titulo = "Erro";
		$view = new View($_GET['modulo'], "painel", "index.phtml");
		$view->setParams(array(
				"title" => $titulo
			)
		);
		$view->showContents();
    }
	
}
?>