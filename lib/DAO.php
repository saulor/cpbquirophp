<?php

class DAO {	
	
	public function DAO () {
	
	}
	
	/**
	*	Este método retorna a quantidade de registros em uma tabela.
	*	@param $conexao Representa a conexão com o banco de dados.
	*	@param $tabela Nome da tabela.
	*	@param $where Representa um array com dados que poderão ser incluídos
	*	na cláusula WHERE.
	*/
	public function getQuantidade ($conexao, $tabela, $where = array()) {
		$query = $conexao->query()->from($tabela);		
		if (count($where) > 0) {
			foreach ($where as $key => $value) {
				$query = $query->where($key . " = ?", $value);
			}
		}
		return $query->count();
	}
	
	/**
	*	Este método é utilizado para retornar dados do banco de dados.
	*	@param $conexao Representa a conexão com o banco de dados.
	*	@param $tabela Nome da tabela.
	*	@param $parametrosBusca Representa um array com os parâmetros de busca especificados.
	*	@param $dados Representa os dados que devem ser retornados. Se nenhum dado for 
	*	especificado todos serão retornados. 
	*/
	public function getDados ($conexao, $tabela, $parametrosBusca = array(), $dados = array()) {
		
		if (!is_array($parametrosBusca))
			throw new Exception ('Erro na especificação dos parâmetros de busca.');
		
		// Se nenhum dado for especificado na busca todos serão retornados
		if (count($dados) == 0)
			$dados = array($tabela.".*");
			
		$query = $conexao->query()->from($tabela, $dados);
		
		if (array_key_exists("limit", $parametrosBusca)) {
			$query = $query->limitIn($parametrosBusca["limit"], $parametrosBusca["offset"]);
		}
		
		if (array_key_exists("join", $parametrosBusca)) {
			foreach ($parametrosBusca["join"] as $key => $value) {
				$query = $query->join($key, $value);
			}
		}
		
		if (array_key_exists("where", $parametrosBusca)) {
			foreach ($parametrosBusca["where"] as $key => $value) {
				$query = $query->where($key . " = ?", $value);
			}
		}
		
		if (array_key_exists("order", $parametrosBusca)) {
			foreach ($parametrosBusca["order"] as $key => $value) {
				$query = $query->order($key, $value);
			}
		}
		
		$dados = $query->all();
		
		foreach ($dados as $key => $value) {
			$dados[$key] = decodificaDados($value);
		}
		
		if (count($dados) == 1 && isset($parametrosBusca["where"]) && array_key_exists("id", $parametrosBusca["where"]))
			return $dados[0];
		else
			return $dados;
	}
	
	public function getById ($conexao, $tabela, $id) {
		$dados = $conexao->query()
			->from($tabela)
			->where("id = ?", (int) $id)
			->first();
		if (count($dados) > 0)
			return decodificaDados($dados);
		else
			return $dados;
	}
	
	public function exclui ($conexao, $tabela, $where = array()) {
		$query = $conexao->query()->from($tabela);
		if (count($where) > 0) {
			foreach ($where as $key => $value) {
				$query = $query->where($key . " = ?", $value);
			}
		}
		return $query->delete();
	}
	
}

?>