<?php

class Agenda extends Model {

	/**
	* @column
	* @readwrite
	* @primary
	* @type autonumber
	*/
	protected $_id;
	
	/**
	* @column
	* @readwrite
	* @type integer
	*/
	protected $_tipo;
	
	/**
	* @column
	* @readwrite
	* @type text
	* @length 15
	*/
	protected $_telefoneResidencial;
	
	/**
	* @column
	* @readwrite
	* @type text
	* @length 15
	*/
	protected $_telefoneCelular;
	
	/**
	* @column
	* @readwrite
	* @type integer
	*/
	protected $_paciente;
	
	/**
	* @column
	* @readwrite
	* @type text
	* @length 255
	*/
	protected $_nomePaciente;
	
	/**
	* @column
	* @readwrite
	* @type text
	* @length 255
	*/
	protected $_fisioterapeutas;
	
	/**
	* @column
	* @readwrite
	* @type date
	*/
	protected $_data;
	
	/**
	* @column
	* @readwrite
	* @type integer
	*/
	protected $_dia;
	
	/**
	* @column
	* @readwrite
	* @type integer
	*/
	protected $_mes;
	
	/**
	* @column
	* @readwrite
	* @type integer
	*/
	protected $_ano;
	
	/**
	* @column
	* @readwrite
	* @type time
	*/
	protected $_horaInicio;
	
	/**
	* @column
	* @readwrite
	* @type time
	*/
	protected $_horaFim;
	
	/**
	* @column
	* @readwrite
	* @type text
	* @length 255
	*/
	protected $_lembrete;
	
	/**
	* @column
	* @readwrite
	* @type datetime
	*/
	protected $_dataC;
	
	/**
	* @column
	* @readwrite
	* @type integer
	*/
	protected $_timestampC;
	
	const AGENDA_TIPO_CONSULTA = 1;
	const AGENDA_TIPO_AVALIACAO = 2;
	
	public static function getTipos() {
		return array(
			Agenda::AGENDA_TIPO_CONSULTA => "Consulta",
			Agenda::AGENDA_TIPO_AVALIACAO => "Avaliação"
		);
	}
	
	public static function getTipo ($tipo) {
		switch ($tipo) {
			case Agenda::AGENDA_TIPO_CONSULTA :
				return "Consulta";
			break;
			case Agenda::AGENDA_TIPO_AVALIACAO :
				return "Avaliação";
			break;
		}
	}

}

?>