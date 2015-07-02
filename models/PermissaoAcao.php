<?php

class PermissaoAcao extends Model {
    
    /**
    * @column
    * @readwrite
    * @primary
    * @type autonumber
    */
    private $_id;
    
    /**
    * @column
    * @readwrite
    * @type integer
    */
    private $_permissao;
    
    /**
    * @column
    * @readwrite
    * @type text
    * @length 255
    */
    private $_acao;

}

?>