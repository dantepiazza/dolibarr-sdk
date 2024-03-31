<?php

class Users {

	private $adapter = null;

	function __construct($adapter){
		$this -> adapter = $adapter;
	}
}

