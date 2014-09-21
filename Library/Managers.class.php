<?php

class Manager {
	
	protected $api = null;
	protected $dao = null;
	protected $managers = array();

	public function __construct($api, $dao) {

		$this->api = $api;
		$thsi->dao = $dao;
	}

	public function getManagerOf($module) {

		if(!is_string($module) OR empty($module)) {

			throw new InvalidArgumentException("Le module spécifié est invalide");
		}

		if(!isset($this->managers[$module])) {

			$manager = '\\Library\\Models\\'.$module.'Manager_'.$this->api;
			$this->managers[$module] = new $manager($this->dao);
		}
		
		return $this->managers[$module];
	}
}