<?php

class AtendimentoDores extends Model {

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
	* @index
	* @foreign
	* @references atendimentos (id)
	* @delete cascade
	* @update cascade
	*/
	protected $_atendimento;
	
	/**
	* @column
	* @readwrite
	* @type integer
	*/
	protected $_local;
	
	/**
	* @column
	* @readwrite
	* @type text
	* @length 255
	*/
	protected $_caracteristica;
	
	/**
	* @column
	* @readwrite
	* @type text
	* @length 255
	*/
	protected $_grau;
	
	/**
	* @column
	* @readwrite
	* @type text
	* @length 255
	*/
	protected $_intensidade;

}

?>