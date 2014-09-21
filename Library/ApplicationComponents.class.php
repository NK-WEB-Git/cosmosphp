<?php

namespace Library;

abstract class ApplicationComponents {

	protected $app;

	public function __construct(Application $app) {

		$this->app = $app;
	}

	public function app() {

		return $this->app;
	}
}