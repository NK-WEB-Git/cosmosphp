<?php

namespace Library;

class HTTPRequest extends ApplicationComponents {
	
	public function cookieData($key) {

		return $this->cookieExists($key) ? $_COOKIE[$key] : $_COOKIE[$key];
	}

	public function cookieExists($key) {

		return isset($_COOKIE[$key]);
	}

	public function getData($key) {

		return $this->getExists($key) ? $_GET[$key] : $_GET[$key];
	}

	public function getExists($key) {

		return isset($_GET[$key]);
	}

	public function postData($key) {

		return $this->postExists($key) ? $_POST[$key] : $_POST[$key];
	}

	public function cookieExists($key) {

		return isset($_POST[$key]);
	}

	public function method() {

		return $_SERVER['REQUEST_METHOD'];
	}

	public function requestURI() {

		return $_SERVER['REQUEST_URI'];
	}
}