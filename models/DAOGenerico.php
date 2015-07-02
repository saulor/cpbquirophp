<?php

class DAOGenerico {

	public function DAOGenerico () {

	}
	
	public function execute ($conexao, $sql) {
		$dados = array();
		$result = $conexao->execute($sql);
		if ($result === false) {
			$error = $conexao->getLastError();
		    setMensagem("error", "There was an error with your SQL query: {$error}");
		}
		for ($i=0; $i<$result->num_rows; $i++) {
		    $dados[] = $result->fetch_array(MYSQLI_ASSOC);
		}
		return $dados;
	}
	
	public function mountQuery($conexao, $tabela, $params = array()) {
	
		if (!array_key_exists("dados", $params)) {
			$params["dados"] = array("*");
		}
		
		$query = $conexao->query()->from($tabela, $params["dados"]);
		
		if (array_key_exists("join", $params)) {
			foreach ($params["join"] as $key => $value) {	
				$query = $query->join($key, $value);	
			}
		}
		
		if (array_key_exists("leftJoin", $params)) {
			foreach ($params["leftJoin"] as $key => $value) {	
				$query = $query->leftJoin($key, $value);	
			}
		}
		
		if (array_key_exists("rightJoin", $params)) {
			foreach ($params["rightJoin"] as $key => $value) {	
				$query = $query->rightJoin($key, $value);	
			}
		}
		
		if (array_key_exists("where", $params)) {
			foreach ($params["where"] as $key => $value) {
				if (is_numeric($value)) {
					$value = (int) $value;
				}
				$query = $query->where($key . " = ?", $value);
			}
		}
		
		if (array_key_exists("whereNot", $params)) {
			foreach ($params["whereNot"] as $key => $value) {
				if (is_numeric($value)) {
					$value = (int) $value;
				}	
				$query = $query->where($key . " <> ?", $value);	
			}
		}
			
		if (array_key_exists("whereIn", $params)) {
			foreach ($params["whereIn"] as $key => $value) {
				if (!empty($value)) {
					$query = $query->where($key . " in (" . $value .")");	
				}
			}
		}
		
		if (array_key_exists("whereNotIn", $params)) {
			foreach ($params["whereNotIn"] as $key => $value) {
				if (!empty($value)) {
					$query = $query->where($key . " not in (" . $value .")");	
				}
			}
		}
		
		if (array_key_exists("whereOr", $params)) {
			if (count($params["whereOr"]) > 0) {	
				$query = $query->where("(" . implode(" or ", $params["whereOr"]) . ")");
			}
		}
		
		if (array_key_exists("whereLike", $params)) {
			foreach ($params["whereLike"] as $key => $value) {
				if (!empty($value)) {
					$sql .= " AND " . $key . " like '%" . $value . "%'";
				}
			}
		}
		
		if (array_key_exists("limit", $params)) {
			$offset = isset($params["offset"]) ? $params["offset"] : 0;
			$query = $query->limitIn($params["limit"], $offset);
		}
		
		if (array_key_exists("order", $params)) {
			foreach ($params["order"] as $key => $value) {
				$query = $query->order($key, $value);
			}
		}
		
		if (array_key_exists("group", $params)) {
			foreach ($params["group"] as $group) {
				$query = $query->group($group);
			}
		}
		
		return $query;
	}
	
	public function count ($conexao, $tabela, $params = array()) {
		try {
			$params = $this->_codificaWheres($conexao, $tabela, $params);
			$query = $this->mountQuery($conexao, $tabela, $params);
			return $query->count();
		}
		catch (Exception $e) {
			throw $e;
		}
	}

	public function findByPk ($conexao, $tabela, $id = 0, $params = array()) {
		try {
			$infoCampos = $this->_infoCampos($conexao, $tabela, $params);
			$query = $this->mountQuery($conexao, $tabela, $params);
			$query = $query->where($tabela . ".id = ?", (int) $id);
			$dados = $query->first();
			if (count($dados) == 0) {
				throw new Exception ("[{$tabela}] Objeto não encontrado");
			}
			return $this->_decodificaDados($conexao, $dados, $infoCampos);
		}
		catch (Exception $e) {
			throw $e;
		}
	}
	
	public function find ($conexao, $tabela, $params = array()) {
		try {
			$infoCampos = $this->_infoCampos($conexao, $tabela, $params);
			$params = $this->_codificaWheres($conexao, $tabela, $params);
			$query = $this->mountQuery($conexao, $tabela, $params);
			$dados = $query->first();
			if (count($dados) == 0) {
				return array();
			}
			else {
				return $this->_decodificaDados($conexao, $dados, $infoCampos);
			}
		}
		catch (Exception $e) {
			throw $e;
		}
	}
	
	public function findAll($conexao, $tabela, $params = array()) {
		try {
			$infoCampos = $this->_infoCampos($conexao, $tabela, $params);
			$params = $this->_codificaWheres($conexao, $tabela, $params);
			$query = $this->mountQuery($conexao, $tabela, $params);
			$dados = $query->all();
			foreach ($dados as $key => $value) {
				$dados[$key] = $this->_decodificaDados($conexao, $value, $infoCampos);
			}
			return $dados;
		}
		catch (Exception $e) {
			throw $e;
		}
	}
	
	private function _decodificaDados ($conexao, $dados, $infoCampos) {
		try {
			$infosTabela = array();
			//print_r($infoCampos);die;
			foreach ($dados as $key => $value) {
				list($tabela, $campo) = explode(",", $infoCampos[$key]);
				//$infoTabela = $this->getInformacoesTabela($conexao, $tabela);
				$infoTabela = $_SESSION[PREFIX . "infoTabelas"][$tabela];
				if (strpos($infoTabela[$campo], 'int') !== false) {
					$dados[$key] = (int) $value; 
				}
				if (strpos($infoTabela[$campo], 'int') !== false) {
					$dados[$key] = (int) $value; 
				}
				else if (strpos($infoTabela[$campo], 'decimal') !== false) {
					$dados[$key] = desconverteDecimal($value); 
				}
				else if ($infoTabela[$campo] == 'text' && !is_html($value)) {
					$dados[$key] = htmlentities($value, ENT_NOQUOTES, 'utf-8');
				}
				else if ($infoTabela[$campo] == 'date') {
					$dados[$key] = desconverteData($value);
				}
				else if ($infoTabela[$campo] == 'time') {
					$dados[$key] = substr($value,0,5);
				}
				else if ($infoTabela[$campo] == 'datetime') {
					$dados[$key] = desconverteDataTime($value);
				}
				else if ($infoTabela[$campo] == 'varchar(255)') {
					$dados[$key] = html_entity_decode($value, ENT_NOQUOTES, 'utf-8');
				}
			}
			return $dados;
		}
		catch (Exception $e) {
			throw $e;
		}
	}
	
	private function _infoCampos ($conexao, $tabela, $params = array()) {
		try {
			$info = array();
			$nomeTabela = $tabela;
			
			if (!array_key_exists("dados", $params)) {
				//foreach($this->getInformacoesTabela($conexao, $tabela) as $nomeCampo => $tipo) {
				foreach($_SESSION[PREFIX . "infoTabelas"][$tabela] as $nomeCampo => $tipo) {
					$info[$nomeCampo] = $nomeTabela . "," . $nomeCampo;
				}
			}
			else {
				foreach ($params["dados"] as $campo) {
					$alias = $nomeCampo = $campo;
					if (preg_match("/(.*)\.(.*)/i", $campo)) {
						preg_match("/([A-Z_]*)\.([A-Z_]*)/i", $campo, $results1);
						$nomeTabela = $results1[1];
						$alias = $nomeCampo = $results1[2];
						if (preg_match("/as (.*)/i", $campo)) {
							preg_match("/as ([A-Z_]*)/i", $campo, $results2);
							$alias = $results2[1];
						}
						
					}
					$info[$alias] = $nomeTabela . ',' . $nomeCampo;
				}
			}
			return $info;
		}
		catch (Exception $e) {
			throw $e;
		}
	}
	
	private function _codificaWheres($conexao, $tabela, $params) {
		try {
			
			//$info = $this->getInformacoesTabela($conexao, $tabela);
			$info = $_SESSION[PREFIX . "infoTabelas"][$tabela];
			$infos[$tabela] = $info;
			
			if (array_key_exists("where", $params)) {
				foreach ($params["where"] as $key => $value) {
					
					if (preg_match("/(.*)\.(.*)/i", $key)) {
						preg_match("/([A-Z_]*)\.([A-Z]*)/i", $key, $results);
						$nomeTabela = $results[1];
						$nomeCampo = $results[2];
					}
					else {
						$nomeTabela = $tabela;
						$nomeCampo = $key;
					}
					
					if (!array_key_exists($nomeTabela, $infos)) {
						//$info = $this->getInformacoesTabela($conexao, $nomeTabela);
						$info = $_SESSION[PREFIX . "infoTabelas"][$nomeTabela];
						$infos[$nomeTabela] = $info;
					}
					
					if (!array_key_exists($nomeCampo, $infos[$nomeTabela])) {
						throw new Exception('Campo ' . $nomeCampo . ' não existe na tabela ' . $tabela);
					}
					
					if (strpos($infos[$nomeTabela][$nomeCampo], 'int') !== false) {
						$params["where"][$key] = (int) $value; 
					}
					else if (strpos($infos[$nomeTabela][$nomeCampo], 'decimal') !== false) {
						$params["where"][$key] = converteDecimal($value); 
					}
					else if ($infos[$nomeTabela][$nomeCampo] == 'text' && !is_html($value)) {
						$params["where"][$key] = htmlentities($value, ENT_NOQUOTES, 'utf-8');
					}
					else if ($infos[$nomeTabela][$nomeCampo] == 'date') {
						$params["where"][$key] = converteData($value);
						//$params["where"][$key] = $value;
					}
					else if ($infos[$nomeTabela][$nomeCampo] == 'datetime') {
						$params["where"][$key] = converteDataTime($value);
					}
					else if ($infos[$nomeTabela][$nomeCampo] == 'varchar(255)') {
						$params["where"][$key] = htmlentities($value, ENT_NOQUOTES, 'utf-8');
					}
				}
			}
			return $params;
		}
		catch (Exception $e) {
			throw $e;
		}
	}
	
	private function _codificaDados($conexao, $tabela, $dados) {
		try {
			//$info = $this->getInformacoesTabela($conexao, $tabela);
			$info = $_SESSION[PREFIX . "infoTabelas"][$tabela];
			foreach ($dados as $key => $value) {
				if (strpos($info[$key], 'int') !== false) {
					$dados[$key] = (int) $value; 
				}
				else if (strpos($info[$key], 'decimal') !== false) {
					$dados[$key] = converteDecimal($value); 
				}
				else if ($info[$key] == 'text' && !is_html($value)) {
					$dados[$key] = htmlentities($value, ENT_NOQUOTES, 'utf-8');
				}
				else if ($info[$key] == 'date') {
					$dados[$key] = converteData($value);
				}
				else if ($info[$key] == 'datetime') {
					$dados[$key] = converteDataTime($value);
				}
				else if ($info[$key] == 'varchar(255)') {
					$dados[$key] = htmlentities($value, ENT_NOQUOTES, 'utf-8');
				}
			}
			return $dados;
		}
		catch (Exception $e) {
			throw $e;
		}
	}
	
	/*
	private function _decodificaDados ($info, $tabela, $params, $dados) {
		try {
			/*foreach ($dados as $indice => $value) {
				if (strpos($info[$indice], 'int') !== false) {
					$dados[$indice] = (int) $value; 
				}
				else if (strpos($info[$indice], 'decimal') !== false) {
					$dados[$indice] = desconverteDecimal($value); 
				}
				else if ($info[$indice] == 'text' && !is_html($value)) {
					$dados[$indice] = htmlentities($value, ENT_NOQUOTES, 'utf-8');
				}
				else if ($info[$indice] == 'date') {
					$dados[$indice] = desconverteData($value);
				}
				else if ($info[$indice] == 'time') {
					$dados[$indice] = substr($value,0,5);
				}
				else if ($info[$indice] == 'datetime') {
					$dados[$indice] = desconverteDataTime($value);
				}
				else if ($info[$indice] == 'varchar(255)') {
					$dados[$indice] = html_entity_decode($value, ENT_NOQUOTES, 'utf-8');
				}
			}
			
			return $dados;
		}
		catch (Exception $e) {
			throw $e;
		}
	}
	
	public function findAll ($conexao, $tabela, $params = array()) {
		try {

			$info = $dadosAux = $whereAux = array();
			$infoTabela = $this->getInformacoesTabela($conexao, $tabela);

			if (array_key_exists("dados", $params)) {
				foreach ($params["dados"] as $dado) {
					if (preg_match("/(.*)\.(.*)/i", $dado)) {
						preg_match("/\.([A-Z]*)/i", $dado, $results);
						$d = $results[1];
					}
					else {
						$d = $dado;
					}
					if (!in_array($d, $dadosAux)) {
						$dadosAux[] = $d;
					}
				}
				foreach ($infoTabela as $key => $value) {
					if (in_array($key, $dadosAux)) {
						$info[$key] = $value;
					}
					$info[$key] = $value;
					
				}
			}
			else {
				foreach ($infoTabela as $key => $value) {
					$info[$key] = $value;
				}
			}
			
			if (array_key_exists("where", $params)) {
				foreach ($params["where"] as $key => $value) {
					if (preg_match("/(.*)\.(.*)/i", $key)) {
						preg_match("/\.([A-Z]*)/i", $key, $results);
						$key = $results[1];
					}
					else {
						$key = $dado;
					}
					if (!in_array($w, $whereAux)) {
						$whereAux[$key] = $value;
					}
				}
			}
			
			//print_r($whereAux);die;
			
			$params["where"] = $this->_codificaDados($whereAux, $info);
			
			print_r($params["where"]);die;

			if (array_key_exists("join", $params)) {
				foreach ($params["join"] as $join => $on) {
					$infoTabela = $this->getInformacoesTabela($conexao, $join);
					foreach ($infoTabela as $key => $value) {
						if (!in_array($key, $dadosAux)) {
							$info[$key] = $value;
						}
					}
				}
			}
			
			$query = $this->mountQuery($conexao, $tabela, $params);
			$dados = $query->all();
			foreach ($dados as $key => $value) {
				$dados[$key] = $this->_decodificaDados($value, $info);
			}
			return $dados;
		}
		catch (Exception $e) {
			throw $e;
		}
	}*/

	public function salva ($conexao, $tabela, $dados = array()) {
		try {
			$retorno = array();
			//$info = $this->getInformacoesTabela($conexao, $tabela);
			$info = $_SESSION[PREFIX . "infoTabelas"][$tabela];
			$dados = $this->_codificaDados($conexao, $tabela, $dados);
			$query = $conexao->query()->from($tabela);
			$id = array_shift($dados);
			if ($id != 0) {
				$query->where("id = ?", (int) $id);
			}
			$newId = $query->save($dados);
			if ($newId != 0 && $id == 0) {
				$id = $newId;
			}
			$retorno["id"] = $id;
			$retorno = array_merge($retorno, $dados);
			return $retorno;
		}
		catch (Exception $e) {
			throw $e;
		}
	}
	
	public function salvaTodos ($conexao, $tabela, $dados = array()) {
		try {
			foreach ($dados as $dado) {
				$id = array_shift($dado);
				$query = $conexao->query()
					->from($tabela);
				if ($id != 0) {
					$query->where("id = ?", (int) $id);
				}
				$query->save($dado);
			}
		}
		catch (Exception $e) {
			throw $e;
		}
	}
	
	public function excluiByPk ($conexao, $tabela, $id) {
		try {
			return $conexao->query()
					->from($tabela)
					->where("id = ?", (int) $id)
					->delete();
		}
		catch (Exception $e) {
			throw $e;
		}
	}
	
	public function exclui ($conexao, $tabela, $params = array()) {
		try {
			$query = $this->mountQuery($conexao, $tabela, $params);
			return $query->delete();
		}
		catch (Exception $e) {
			throw $e;
		}
	}
	
	public function excluiTodos ($conexao, $tabela, $dados = array()) {
		try {
			$affectedRows = 0;
			foreach ($dados as $dado) {
				$affectedRows += $query = $conexao->query()
					->from($tabela)
					->where("id = ?", $dado["id"])
					->delete();
			}
			return $affectedRows;
		}
		catch (Exception $e) {
			throw $e;
		}
	}
	
	public function getInformacoesTabela($conexao, $tabela) {
		try {
			$sql = "SHOW COLUMNS FROM " . $tabela;
			//echo $sql . '<br>';
			$result = $conexao->execute($sql);
			$fields = array();
			for ($i=0; $i<$result->num_rows; $i++) {
				$r = $result->fetch_array(MYSQLI_ASSOC);
				//$f[$tabela . '.' . $r['Field']] = $r['Type'];
				$f[$r['Field']] = $r['Type'];
				$fields = $f;
			}
			return $fields;
		}
		catch (Exception $e) {
			throw $e;
		}
	}
	
//	private function _decodificaDados($dados, $informacoesTabela) {
//		print_r($dados);echo '<br /><br />';
//		print_r($informacoesTabela);
//		foreach ($dados as $key => $value) {
//			if (strpos($informacoesTabela[$key], 'decimal') !== false) {
//				$dados[$key] = desconverteDecimal($value); 
//			}
//			else if ($informacoesTabela[$key] == 'varchar(255)') {
//				$dados[$key] = html_entity_decode($value, ENT_NOQUOTES, 'utf-8');
//			}
//			else if ($informacoesTabela[$key] == 'date') {
//				$dados[$key] = desconverteData($value);
//			}
//			else if ($informacoesTabela[$key] == 'datetime') {
//				$dados[$key] = desconverteDataTime($value);
//			}
//		}
//		return $dados;
//	}
	
//	private function _codificaDados($dados, $informacoesTabela) {
//		print_r($dados);echo '<br /><br />';
//		print_r($informacoesTabela);
//		foreach ($dados as $key => $value) {
//			if (strpos($informacoesTabela[$key], 'int') !== false) {
//				$dados[$key] = (int) $value; 
//			}
//			else if (strpos($informacoesTabela[$key], 'decimal') !== false) {
//				$dados[$key] = converteDecimal($value); 
//			}
//			else if ($informacoesTabela[$key] == 'text') {
//				if (!is_html($value)) {
//					$dados[$key] = htmlentities($value, ENT_NOQUOTES, 'utf-8');
//				}
//			}
//			else if ($informacoesTabela[$key] == 'date') {
//				$dados[$key] = converteData($value);
//			}
//			else if ($informacoesTabela[$key] == 'decimal') {
				//$dados[$key] = (decimal); converter decimal
//			}
//			else if ($informacoesTabela[$key] == 'datetime') {
//				$dados[$key] = converteDataTime($value);
//			}
//			else if ($informacoesTabela[$key] == 'varchar(255)') {
//				$dados[$key] = htmlentities($value, ENT_NOQUOTES, 'utf-8');
//			}
//		}
//		return $dados;
//	}
}

?>