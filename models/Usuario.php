<?php

class Usuario extends Model {
	
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
    * @length 100
    */
    protected $_login;
    
    /**
    * @column
    * @readwrite
    * @type text
    * @length 32
    */
    protected $_senha;
    
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
    * @type text
    * @length 100
    */
    protected $_email;
    
    /**
    * @column
    * @readwrite
    * @type integer
    */
    protected $_permissao;
    
    /**
    * @column
    * @readwrite
    * @type datetime
    */
    protected $_data;
    
    /**
    * @column
    * @readwrite
    * @type integer
    */
    protected $_timestamp;
    
    public static function getPermissao ($const) {
    	switch ($const) {
    		case Permissao::PERMISSAO_ADMINISTRADOR :
    			return "Administrador";
    		break;
    		case Permissao::PERMISSAO_FISIOTERAPEUTA :
    			return "Fisioterapeuta";
    		break;
    		case Permissao::PERMISSAO_RECEPCIONISTA :
    			return "Recepcionista";
    		break;
    		default :
    			return "Não definida";
    		break;
    	}
    }
	
}


?>