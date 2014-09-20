<?php

class A {

	protected $test;

	public function __construct($test)
	{
		$this->test = $test;
	}
}

/**
* 
*/
class B extends A
{
	public function toString() {

		echo $this->test;
	}	
}

/**
* 
*/
class C 
{
	public function __construct($test) {

		$B = new B($test);
		$B->toString();
	}
	
}

$C = new C('boris');

?>