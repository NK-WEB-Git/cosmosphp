<?php

namespace Library;

abstract class Application {
	
	protected $name;
	protected $httpRequest;
	protected $httpResponse;
	protected $user;
	protected $config;

	public function __construct() {

		$this->httpRequest = new HTTPRequest($this);
		$this->httpResponse = new HTTPResponse($this);
		$this->user = new User($this);
		$this->config = new Config($this);
		$this->name = '';
	}

	abstract public function run();

	public function name() {

		return $this->name();
	}

	public function httpRequest() {

		return $this->httpRequest;
	}

	public function httpResponse() {

		return $this->httpResponse;
	}

	public function getController() {

		$router = new Router;
		$xml = new \DOMDocument('1.0', 'UTF-8');
		$xml->load(__DIR__.'/../Applications/'.$this->name.'/Config/routes.xml');

		$routes = $xml->getElementsByTagName('route');

		//on parcourt les routes du fichier xml

		foreach ($routes as $route) {
			
			$vars = array();

			//on regarde si des variables sont présentes dans l'url
			if($route->hasAttribute('vars')) {

				$vars = explode(',', $route->getAttribute('vars'));
			}

			$router->addRoute(new Route($route->getAttribute('action'), $route->getAttribute('module'), $route->getAttribute('url'), $vars));
		}

		try {

			//on récupère la route correspondante aux url
			$matchedRoute = $router->getRoute($this->httpRequest->requestURI());
		}
		catch(\RuntimeException $e) {

			if($e->getCode() == Router::NO_ROUTE) {

				//Si aucune route ne correspond c'est que la page demandée n'existe pas
				$this->httpResponse->redirect404();
			}
		}

		//on ajoute les variables de l'URL au tableau GET
		$_GET = array_merge($_GET, $matchedRoute->vars());

		//on instancie le controller
		$controllerClass = 'Applications\\'.$this->name.'\\Modules\\'.$matchedRoute->module().'\\'.$matchedRoute->module().'Controller';
		return new $controllerClass($this, $matchedRoute->module(), $matchedRoute->action());
	}
}