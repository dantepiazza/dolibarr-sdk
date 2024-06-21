<?php

class Contacts {

	private $adapter = null;

	function __construct($adapter){
		$this -> adapter = $adapter;
	}
	
	/**
	 * Create a new contact
	 * 
	 * @since 1.0
	 *
	 * @param array $options
	 *
	 * @return Dolibarr\Adapter\Response
	 **/
	public function Create(array $options) {
		$this -> adapter -> payload = $options;

		return $this -> adapter -> exec('post', 'contacts') -> response;
	}
	
	/**
	 * Update a contact
	 * 
	 * @since 1.0
	 *
	 * @param array $options
	 *
	 * @return Dolibarr\Adapter\Response
	 **/
	public function Update(int $thirdparty, array $options) {
		$this -> adapter -> payload = $options;

		return $this -> adapter -> exec('put', 'contacts/'.$thirdparty) -> response;
	}

	/**
	 * List contacts
	 * 
	 * @since 1.0
	 *
	 * @param array $options
	 *
	 * @return Dolibarr\Adapter\Response
	 **/
	public function All(array $options = []) {
		return $this -> adapter -> exec('get', 'contacts', $options) -> response;
	}
}

