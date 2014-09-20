<?php

namespace Library;

class Router {

	protected $routes = array();
	const NO_ROUTE = 1;

	public function addRoute(Route $route) {

		if(!in_array($route, $this->routes)) {

			$this->routes[] = $route;
		}
	}


	public function gerRoute($url) {

		foreach ($this->routes as $route) {
			
			//si la route correspond à l'URL
			if($varsValues = $route->match($url) !== false) {

				//si la route a des variables
				if($route->hasVars()) {

					$varsNames = $route->varsNames();
					$listVars = array();

					foreach ($varsValues as $key => $match) {
						
						if($key !== 0) {

							$listVars[$varsNames[$key-1]] = $match;
						}
					}

					//on assigne ce tableau de variables  à la route
					$route->setVars($listVars);
				}

				return $route;
			}
		}

		throw new RuntimeException("Route not found", self::NO_ROUTE);
		
	}

}