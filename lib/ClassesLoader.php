<?php

class ClassesLoader
{
	public static function Register() {
		return spl_autoload_register(array('ClassesLoader', 'Load'));
	}

	public static function Load($_class) {
		if(file_exists(DIR_ROOT . SEPARADOR_DIRETORIO . "lib" . SEPARADOR_DIRETORIO . $_class . ".php"))
			require(DIR_ROOT . SEPARADOR_DIRETORIO . "lib" . SEPARADOR_DIRETORIO . $_class . ".php");
		if(file_exists(DIR_ROOT . SEPARADOR_DIRETORIO . "models" . SEPARADOR_DIRETORIO . $_class.".php"))
			require(DIR_ROOT . SEPARADOR_DIRETORIO . "models" . SEPARADOR_DIRETORIO . $_class.".php");
	}
}
?>