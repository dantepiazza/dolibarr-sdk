<?php

class SupplierInvoices {

	private $adapter = null;

	function __construct($adapter){
		$this -> adapter = $adapter;
	}
	
	/**
	 * Create a new invoice
	 * 
	 * @since 1.0
	 *
	 * @param array $options
	 *
	 * @return Dolibarr\Adapter\Response
	 **/
	public function Create(array $options) {
		$this -> adapter -> payload = $options;

		return $this -> adapter -> exec('post', 'supplierinvoices') -> response;
	}

	/**
	 * Validate invoice
	 * 
	 * @since 1.0
	 *
	 * @param int $invoice
	 *
	 * @return Dolibarr\Adapter\Response
	 **/
	public function Validate(int $invoice) {
		return $this -> adapter -> exec('post', 'supplierinvoices/'.$invoice.'/validate') -> response;
	}

	/**
	 * Add payments to invoice
	 * 
	 * @since 1.0
	 *
	 * @param int $invoice  
	 * @param array $options
	 *
	 * @return Dolibarr\Adapter\Response
	 **/
	public function Payments(int $invoice, array $options) {
		$this -> adapter -> payload = $options;

		return $this -> adapter -> exec('post', 'supplierinvoices/'.$invoice.'/payments') -> response;
	}
}

