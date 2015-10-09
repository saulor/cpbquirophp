<?php

class Funcoes {
	
	public static function jaExiste($conexao, $dao, $dados, $tabela, $campo) {
		try {
			$paramsQuery = array(
				"where" => array(
					$campo => $dados[$campo]
				),
				"whereNot" => array(
					"id" => $dados["id"]
				)
			);
			return count($dao->findAll($conexao, $tabela, $paramsQuery)) > 0;
		}
		catch (Exception $e) {
			throw $e;
		}
	}
	
}

?>