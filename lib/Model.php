<?php

class Model extends Base {

	/**
	* @readwrite
	*/
	protected $_table;
	
	/**
	* @readwrite
	*/
	protected $_connector;
	
	/**
	* @read
	*/
	protected $_types = array( // tipos de dados que o modelo entende
		"autonumber",
		"longtext",
		"text",
		"integer",
		"decimal",
		"boolean",
		"datetime",
		"date",
		"time"
	);
	
	protected $_columns;
	protected $_primary;
	
	public function getColumns () {
		$primaries = 0;
		$columns = array();
		// recupera o nome da classe (Model que está sendo manipulado)
		$class = get_class($this);
		// armazena os tipos de dados que o modelo entende numa variável
		$types = $this->_types;
		// cria o objeto inspector
		$inspector = new Inspector($this);
		// recupera as propriedades da classe através do objeto Inspector
		$properties = $inspector->getClassProperties();
		
		// função interna pra retornar o primeiro elemento do array
		$first = function($array, $key) {
			if (!empty($array[$key]) && sizeof($array[$key]) == 1) {
				return $array[$key][0];
			}
			return null;
		};
		
		foreach ($properties as $property) {
			
			$propertyMeta = $inspector->getPropertyMeta($property);
			
			// se tiver a marcação @column
			if (!empty($propertyMeta["@column"])) {
				$name = preg_replace("#^_#", "", $property);
				$primary = !empty($propertyMeta["@primary"]);
				$foreign = !empty($propertyMeta["@foreign"]);
				$references = $first($propertyMeta, "@references");
				$delete = $first($propertyMeta, "@delete");
				$update = $first($propertyMeta, "@update");
				$type = $first($propertyMeta, "@type");
				$length = $first($propertyMeta, "@length");
				$index = !empty($propertyMeta["@index"]);
				$readwrite = !empty($propertyMeta["@readwrite"]);
				$read = !empty($propertyMeta["@read"]) || $readwrite;
				$write = !empty($propertyMeta["@write"]) || $readwrite;
				$validate = !empty($propertyMeta["@validate"]) ? $propertyMeta["@validate"] : false;
				$label = $first($propertyMeta, "@label");
				
				if (!in_array($type, $types)) {
					throw new Exception ("{$type} is not a valid type");
				}

				$columns[$name] = array(
					"raw" => $property,
					"name" => $name,
					"primary" => $primary,
					"foreign" => $foreign,
					"type" => $type,
					"references" => $references,
					"delete" => $delete,
					"update" => $update,
					"length" => $length,
					"index" => $index,
					"read" => $read,
					"write" => $write,
					"validate" => $validate,
					"label" => $label
				);
				
				if ($primary) {
					$primaries++;
				}
				
			}
		}
		
		if ($primaries !== 1) {
			throw new Exception ("{$class} must have exactly one @primary column");
		}	
		
		$this->_columns = $columns;
		return $this->_columns;
		
	}
	
	public function save () {
		$primary = $this->primaryColumn;
		$raw = $primary["raw"];
		$name = $primary["name"];
		$query = $this->connector
			->query()
			->from($this->table);
		if (!empty($this->$raw)) {
			$query->where("{$name} = ?", $this->$raw);
		}
		$data = array();
		foreach ($this->columns as $key => $column) {
			if (!$column["read"]) {
				$prop = $column["raw"];
				$data[$key] = $this->$prop;
				continue;
			}
			if ($column != $this->primaryColumn && $column) {
				$method = "get".ucfirst($key);
				$data[$key] = $this->$method();
				continue;
			}
		}
		$result = $query->save($data);
		if ($result > 0) {
			$this->$raw = $result;
		}
		return $result;
	}	
	
}

?>