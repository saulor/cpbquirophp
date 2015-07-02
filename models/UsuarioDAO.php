<?php

class UsuarioDAO extends DAO {	

	public function login ($conexao, $usuario) {
	
		$usu = $conexao->query()
			->from("usuarios")
			->where("login = ?", $usuario->getLogin())
			->where("senha = ?", $usuario->getSenha())
			->first();
			
		if (count($usu) == 0)
			return NULL;
			
		return $usu;
		
	}
	
	public function getLista ($conexao, $tabela, $limit, $offset, $order = NULL) {
		$query = $usuarios = $conexao->query()
			->from("usuarios", array(
					"usuarios.id",
					"usuarios.nome",
					"usuarios.data"
				)
			)
			->join("permissoes AS p", "usuarios.permissao = p.id", array(
				"p.nome" => "nomePermissao"
			))
			->limitIn($limit, $offset);
			
		//if (array_key_exists("order", $parametrosBusca)) {
			foreach ($order as $key => $value) {
				$query = $query->order($key, $value);
			}
		//}
			
		return $query->all(); 
	}
	
	/**
	* 	Este método retorna todos os estados de determinado usuário.
	* 	@param $conexao Objeto que representa a conexão com o banco de dados
	*	@param $idCurso id do usuário
	*
	*/
	public function getTodosEstadosUsuario ($conexao, $id) {
		$estados = array();
		$usuarioEstados = $this->getDados($conexao, "usuarios_estados", array(
				"where" => array(
					"usuario" => (int) $id
				)
			)
		);
		foreach ($usuarioEstados as $usuarioEstado) {
			$estados[] = $usuarioEstado["estado"];
		}
		return $estados;
	}
	
	
	public function cadastrar ($conexao, $dados) {
		
		try {
			$id = $conexao->query()
				->from("usuarios")
				->save(array(
						"nome" => codificaDado($dados["nome"]),
						"login" => $dados["login"],
						"senha" => $dados["senha"],
						"email" => $dados["email"],
						"permissao" => (int) $dados["permissao"],
						"data" => getMomento()
					)
				);
			return $id;
		}
		catch (Exception $e) {
			throw $e;
		}
		
	}
	
	public function atualizar ($conexao, $dados) {
		
		try {
			$affectedRows = $conexao->query()
				->from("usuarios")
				->where("id = ?", (int) $dados["id"])
				->save(array(
						"nome" => codificaDado($dados["nome"]),
						"login" => $dados["login"],
						"senha" => $dados["senha"],
						"email" => $dados["email"],
						"permissao" => (int) $dados["permissao"],
					)
				);
			return $affectedRows;
		}
		catch (Exception $e) {
			throw $e;		
		}
	}
	
	public function excluir ($conexao, $id) {
		
		try {
			
			// exclui os estados do usuário
			$conexao->query()
				->from("usuarios_estados")
				->where("usuario = ?", (int) $id)
				->delete();
			
			// exclui o usuário
			$affectedRows = $conexao->query()
				->from("usuarios")
				->where("id = ?", (int) $id)
				->delete();
				
			return $affectedRows;
		}
		catch (Exception $e) {
			throw $e;		
		}
	}
	
	/**
	*	Este método verifica se o usuário pode ser excluído. Usuários default do sistema não podem ser excluídos.
	*	@param $conexao Representa a conexão com o banco de dados
	*	@param $id Representa o id do usuário 
	*/
	public function podeExcluir ($conexao, $dados) {
		try {
			if ($dados["id"] == 1)
				return false;
			return true;
		}
		catch (Exception $e) {
			throw $e;
		}
		
	}
	
}

?>