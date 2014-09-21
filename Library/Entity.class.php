<?php

namespace Library;

abstract class Entity {

	protected $erreurs = array();
	protected $id;

	public function __construct(array $donnees=array()) {

		if(!empty($donnees)) {

			$this->hydrate($donnees);
		}
	}

	public function hydrate(array $donnees) {

		foreach ($donnees as $key => $value) {
			
			$method = 'set'.ucfirst($key);

			if(method_exists($this, $method)) {

				$this->$method($value);
			}
		}
	}

	public function ereurs(){

		return $this->erreurs;
	}

	public function isNew() {

		return empty($this->id());
	}

	public function id() {

		return $id;
	}

	public function setId($id) {

		$this->id = (int) $id;
	}
}