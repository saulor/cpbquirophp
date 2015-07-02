<?php

class Log extends Model {
    
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
    protected $_acao;
    
    /**
    * @column
    * @readwrite
    * @type text
    * @length 255
    */
    protected $_oque;
    
    /**
    * @column
    * @readwrite
    * @type text
    * @length 255
    */
    protected $_qual;
    
    /**
    * @column
    * @readwrite
    * @type text
    * @length 255
    */
    protected $_quem;
    
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
    protected $_timestampData;
   
}

?>