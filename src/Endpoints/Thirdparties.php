<?php

class Thirdparties {

	private $adapter = null;

	function __construct($adapter){
		$this -> adapter = $adapter;
	}
	
	/**
	 * Create a new thirdpart
	 * 
	 * @since 1.0
	 *
	 * @param array $options
	 *
	 * @return Dolibarr\Adapter\Response
	 **/
	public function Create(array $options) {
		$this -> adapter -> payload = $options;

		return $this -> adapter -> exec('post', 'thirdparties') -> response;
	}
}

