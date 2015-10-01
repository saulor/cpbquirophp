<?php

class View {
	
	private $_modulo;
	private $_layout;
    private $_view;
    private $_menu;
    private $_params;
      
    public function __construct($_modulo = null, $_layout = null, $_view = null, $_menu = false) {
        $this->_modulo = $_modulo;
        $this->_layout = $_layout;
        $this->_view = $_view;
        $this->_menu = $_menu;
    }  
            
    public function setParams($_params) {
        $this->_params = $_params;
    }
      
    public function getParams() {
        return $this->_params;
    }
      
    public function getContents() {
        ob_start();
        if(isset($this->_view)) {
        	$viewPath = 'views' . SEPARADOR_DIRETORIO . $this->_modulo . SEPARADOR_DIRETORIO . $this->_view;
        	if (!is_file(DIR_ROOT . SEPARADOR_DIRETORIO . $viewPath)) {
        		throw new Exception('Layout não encontrado: ' . $viewPath);
        	}
            require_once $viewPath;
       	}
        $contents = ob_get_contents();
        ob_end_clean();
        return $contents;  
    }
    
    public function getMenu() {
    	ob_start();
    	$menuPath = 'views' . SEPARADOR_DIRETORIO . "includes" . SEPARADOR_DIRETORIO . "menus" . SEPARADOR_DIRETORIO . "menu-default.phtml";
    	if($this->_menu) {
			$menuPath = 'views' . SEPARADOR_DIRETORIO . "includes" . SEPARADOR_DIRETORIO . "menus" . SEPARADOR_DIRETORIO . $this->_menu;
		}
		require_once $menuPath;
    	$contents = ob_get_contents();
    	ob_end_clean();
    	return $contents; 
    }
      
    public function showContents() {
    	$layoutPath = 'views' . SEPARADOR_DIRETORIO . "layouts" . SEPARADOR_DIRETORIO . $this->_layout . '.phtml';
        $contents = $this->getContents();
        require_once($layoutPath);
    }
}

?>