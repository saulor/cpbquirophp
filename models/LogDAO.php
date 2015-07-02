<?php

class LogDAO extends DAO {	
	
	public function adicionar ($conexao, $acao, $oQue, $quem, $qual) {
		try {
			$timestamp = getTimestamp();
			$conexao->query()
                ->from("logs")
                ->save(array(
                    "acao" => $acao,
                    "oque" => $oQue,
                    "quem" => $quem,
                    "qual" => $qual,
                    "data" => getData($timestamp),
                    "timestampData" => $timestamp
                )
            );
		}
		catch (Exception $e) {
			throw $e;
		}
	}
	
}

?>