<?php

namespace Library;

class Page extends ApplicationComponents {

	protected $contentFile;
	protected $vars = array();

	public function addVars($vars, $value) {

		if (!is_string($vars) OR is_numeric($vars) OR empty($vars)) {

			throw new \InvalidArgumentException("Le nom de la variable doit être une chaîne de caratère non nulle");		
		}

		$this->vars[$vars] = $value;
	} 

	public function getGeneratePage() {

		if(!file_exists($this->contentFile)) {

			throw new \RuntimeException("La vue spécifiée n'existe pas");
		}

		extract($this->vars);

		ob_start();
			require $this->contentFile;
	    $content = ob_get_clean();
	    
	    ob_start();
	      	require __DIR__.'/../Applications/'.$this->app->name().'/Templates/layout.php';
	    return ob_get_clean();
	}

	public function setContentFile($contentFile){

		if(!is_string($vars) OR empty($vars)) {

			throw new \InvalidArgumentException("La vue spécifiée est invalide");
		}

		$this->contentFile = $contentFile;
	}
}