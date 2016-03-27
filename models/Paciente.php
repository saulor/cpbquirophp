<?php

class Paciente extends Model {

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
    protected $_foto;

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
    * @length 1
    */
    protected $_sexo;

    /**
    * @column
    * @readwrite
    * @type integer
    */
    protected $_idade;

    /**
    * @column
    * @readwrite
    * @type text
    * @length 15
    */
    protected $_estadoCivil;

    /**
    * @column
    * @readwrite
    * @type text
    * @length 14
    */
    protected $_cpf;

    /**
    * @column
    * @readwrite
    * @type date
    */
    protected $_dataNascimento;

    /**
    * @column
    * @readwrite
    * @type integer
    */
    protected $_mesNascimento;

    /**
    * @column
    * @readwrite
    * @type text
    * @length 255
    */
    protected $endereco;

    /**
    * @column
    * @readwrite
    * @type text
    * @length 20
    */
    protected $_numero;

    /**
    * @column
    * @readwrite
    * @type text
    * @length 255
    */
    protected $_complemento;

    /**
    * @column
    * @readwrite
    * @type text
    * @length 255
    */
    protected $bairro;

    /**
    * @column
    * @readwrite
    * @type text
    * @length 255
    */
    protected $cidade;

    /**
    * @column
    * @readwrite
    * @type text
    * @length 2
    */
    protected $uf;

    /**
    * @column
    * @readwrite
    * @type text
    * @length 30
    */
    protected $cep;

    /**
    * @column
    * @readwrite
    * @type text
    * @length 15
    */
    protected $telefoneResidencial;

    /**
    * @column
    * @readwrite
    * @type text
    * @length 15
    */
    protected $telefoneCelular;

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
    * @type text
    * @length 255
    */
    protected $_profissao;

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

    /**
    * @column
    * @readwrite
    * @type text
    */
    protected $_observacoes;

    /**
    * @column
    * @readwrite
    * @type integer
    */
    protected $_status;

    /**
    * @column
    * @readwrite
    * @type text
    * @length 30
    */
    protected $_tratamentos;

    const PACIENTE_TIPO_TRATAMENTO_QUIROPRAXIA = 1;
    const PACIENTE_TIPO_TRATAMENTO_PILATES = 2;
    const PACIENTE_TIPO_TRATAMENTO_BUSQUET = 3;
    const PACIENTE_TIPO_TRATAMENTO_FISIOTERAPIA = 4;

    public static function getTiposTratamento() {
    	return array(
    		Paciente::PACIENTE_TIPO_TRATAMENTO_QUIROPRAXIA => "Quiropraxia",
    		Paciente::PACIENTE_TIPO_TRATAMENTO_PILATES => "Pilates",
    		Paciente::PACIENTE_TIPO_TRATAMENTO_BUSQUET => "Busquet",
    		Paciente::PACIENTE_TIPO_TRATAMENTO_FISIOTERAPIA => "Fisioterapia"
    	);
    }

    public static function getTipoTratamento ($const) {

    	switch ($const) {

    		case Paciente::PACIENTE_TIPO_TRATAMENTO_QUIROPRAXIA :
    			return "Quiropraxia";
    		break;

    		case Paciente::PACIENTE_TIPO_TRATAMENTO_PILATES :
    			return "Pilates";
    		break;

    		case Paciente::PACIENTE_TIPO_TRATAMENTO_BUSQUET :
    			return "Busquet";
    		break;

    		case Paciente::PACIENTE_TIPO_TRATAMENTO_FISIOTERAPIA :
    			return "Fisioterapia";
    		break;

    		default :
    			return "";
    		break;

    	}

    }

    public static function getTratamentos ($tratamentos) {
    	$tratArr = explode(",", $tratamentos);
    	$str = array();

    	foreach ($tratArr as $const) {
    		switch ($const) {
    			case Paciente::PACIENTE_TIPO_TRATAMENTO_QUIROPRAXIA :
    				$str[] = "Quiropraxia";
    			break;
    			case Paciente::PACIENTE_TIPO_TRATAMENTO_PILATES :
    				$str[] = "Pilates";
    			break;
    			case Paciente::PACIENTE_TIPO_TRATAMENTO_BUSQUET :
    				$str[] = "Busquet";
    			break;
    			case Paciente::PACIENTE_TIPO_TRATAMENTO_FISIOTERAPIA :
    				$str[] = "Fisioterapia";
    			break;
    		}
    	}
    	return implode(", ", $str);
    }

}

?>
