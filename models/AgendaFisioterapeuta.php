<?php

class AgendaFisioterapeuta extends Model {

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
	* @references usuarios (id)
	* @delete cascade
	* @update cascade
	*/
	protected $_fisioterapeuta;
	
	/**
	* @column
	* @readwrite
	* @type text
	* @length 15
	*/
	protected $_compromisso;

}

?>