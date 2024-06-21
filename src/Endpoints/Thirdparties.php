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
	
	/**
	 * Update a thirdpart
	 * 
	 * @since 1.0
	 *
	 * @param array $options
	 *
	 * @return Dolibarr\Adapter\Response
	 **/
	public function Update(int $thirdparty, array $options) {
		$this -> adapter -> payload = $options;

		return $this -> adapter -> exec('put', 'thirdparties/'.$thirdparty) -> response;
	}

	/**
	 * List thirdparties
	 * 
	 * @since 1.0
	 *
	 * @param array $options
	 *
	 * @return Dolibarr\Adapter\Response
	 **/
	public function All(array $options = []) {
		return $this -> adapter -> exec('get', 'thirdparties', $options) -> response;
	}
}

