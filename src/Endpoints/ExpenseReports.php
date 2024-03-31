<?php

class ExpenseReports {

	private $adapter = null;

	function __construct($adapter){
		$this -> adapter = $adapter;
	}
}

