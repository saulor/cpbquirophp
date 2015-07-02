<?php

class Permissao extends Model {

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
    * @type text
    * @length 255
    */
    protected $_nome;
    
    /**
    * @column
    * @readwrite
    * @type integer
    */
    protected $_codigo;
    
    const PERMISSAO_ADMINISTRADOR = 1;
    const PERMISSAO_FISIOTERAPEUTA = 2;
    const PERMISSAO_RECEPCIONISTA = 3;
	
}

?>