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
	* @delete restrict
	* @update cascade
	*/
	protected $_fisioterapeuta;
	
	/**
	* @column
	* @readwrite
	* @type integer
	* @index
	* @foreign
	* @references agenda (id)
	* @delete cascade
	* @update cascade
	*/
	protected $_compromisso;

}

?>