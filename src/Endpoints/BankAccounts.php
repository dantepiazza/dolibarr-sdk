<?php

class BankAccounts {

	private $adapter = null;

	function __construct($adapter){
		$this -> adapter = $adapter;
	}
}

