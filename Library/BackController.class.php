<?php

namespace Library;

abstract class BackController extends ApplicationComponents {

	protected $action;
	protected $view;
	protected $module;
	protected $page;
	protected $managers = null;

	public function __construct(Application $app, $module, $action) {

		parent::__construct($app);
		$this->managers = new Managers('PDO', PDOFactory::getMysqlConnexion());
		$this->page = new Page($app);
		$this->setModule($module);
		$this->setAction($action);
		//par defaut la vue à la même valeur que l'action
		$this->setView($action);
	}

	public function execute() {

		$method = 'execute'.ucfirst($this->action);

		if(!method_exists($this, $method)) {

			throw new RuntimeException("L'action ".$this->action. " n'est pas défini sur ce module");	
		}

		$this->$method($this->app->httpRequest());
	}

	public function page() {

		return $this->page;
	}

	public function setAction($action) {

		if(!is_string($action) OR empty($action)) {

			throw new InvalidArgumentException("L'action doit être une chaîne de caractères valides");
		}
		
		$this->action = $action;
	}

	public function setModule($module) {

		if(!is_string($module) OR empty($module)) {

			throw new InvalidArgumentException("Le module doit être une chaîne de caractères valides");
		}
		
		$this->module = $module;
	}

	public function setView($view) {

		if(!is_string($view) OR empty($view)) {

			throw new InvalidArgumentException("La vue doit être une chaîne de caractères valides");
		}
		
		$this->view = $view;
		$this->page->setContentFile(__DIR__.'/../Applications/'.$this->app->name().'/Modules/'.$this->module.'/Views/'.$this->view.'.php');
	}
}