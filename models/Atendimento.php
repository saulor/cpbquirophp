<?php

class Atendimento extends Model {

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
    * @references pacientes (id)
    * @delete cascade
    * @update cascade
    */
    protected $_paciente;
    
    /**
    * @column
    * @readwrite
    * @type decimal
    * @length 14
    */
    protected $_altura;
    
    /**
    * @column
    * @readwrite
    * @type decimal
    * @length 14
    */
    protected $_peso;
    
    /**
    * @column
    * @readwrite
    * @type decimal
    * @length 14
    */
    protected $_imc;
    
    /**
    * @column
    * @readwrite
    * @type longtext
    */
    protected $_hda;
    
    /**
    * @column
    * @readwrite
    * @type longtext
    */
    protected $_avaliacaoPostural;
    
    /**
    * @column
    * @readwrite
    * @type longtext
    */
    protected $_evolucao;
    
    /**
    * @array
    */
    protected $_dores;
    
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
    
    const ATENDIMENTO_DORES_CABECA = 1;
    const ATENDIMENTO_DORES_PESCOCO = 2;
    const ATENDIMENTO_DORES_OMBRO = 3;
    const ATENDIMENTO_DORES_COTOVELO = 4;
    const ATENDIMENTO_DORES_PUNHO = 5;
    const ATENDIMENTO_DORES_MAOS_DEDOS = 6;
    const ATENDIMENTO_DORES_TORACICA = 7;
    const ATENDIMENTO_DORES_LOMBAR = 8;
    const ATENDIMENTO_DORES_QUADRIL = 9;
    const ATENDIMENTO_DORES_JOELHOS = 10;
    const ATENDIMENTO_DORES_TORNOZELOS = 11;
    const ATENDIMENTO_DORES_AQUILES = 12;
    const ATENDIMENTO_DORES_PES_DEDOS = 13;
    
    const ATENDIMENTO_DOR_GRAU_LEVE = 1;
    const ATENDIMENTO_DOR_GRAU_MODERADO = 2;
    const ATENDIMENTO_DOR_GRAU_GRAVE = 3;
    
    public static function getLocalizacaoDores () {
    	return array(
    		Atendimento::ATENDIMENTO_DORES_CABECA => "Cabeça",
    		Atendimento::ATENDIMENTO_DORES_PESCOCO => "Pescoço",
    		Atendimento::ATENDIMENTO_DORES_OMBRO => "Ombro",
    		Atendimento::ATENDIMENTO_DORES_COTOVELO => "Cotovelo",
    		Atendimento::ATENDIMENTO_DORES_MAOS_DEDOS => "Mãos/Dedos",
    		Atendimento::ATENDIMENTO_DORES_TORACICA => "Torácica",
    		Atendimento::ATENDIMENTO_DORES_LOMBAR => "Lombar",
    		Atendimento::ATENDIMENTO_DORES_QUADRIL => "Quadril",
    		Atendimento::ATENDIMENTO_DORES_JOELHOS => "Joelhos",
    		Atendimento::ATENDIMENTO_DORES_TORNOZELOS => "Tornozelos",
    		Atendimento::ATENDIMENTO_DORES_AQUILES => "Aquiles",
    		Atendimento::ATENDIMENTO_DORES_PES_DEDOS => "Pés/Dedos",
    	);
    }
    

}

?>