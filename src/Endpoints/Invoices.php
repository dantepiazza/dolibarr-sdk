<?php

class Invoices {

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

		return $this -> adapter -> exec('post', 'invoices') -> response;
	}
	
	/**
	 * Add lines to invoice
	 * 
	 * @since 1.0
	 *
	 * @param int $invoice  
	 * @param array $options
	 *
	 * @return Dolibarr\Adapter\Response
	 **/
	public function Lines(int $invoice, array $options) {
		$this -> adapter -> payload = $options;

		return $this -> adapter -> exec('post', 'invoices/'.$invoice.'/lines') -> response;
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
		return $this -> adapter -> exec('post', 'invoices/'.$invoice.'/validate') -> response;
	}

	/**
	 * Get invoice
	 * 
	 * @since 1.0
	 *
	 * @param int $invoice
	 *
	 * @return Dolibarr\Adapter\Response
	 **/
	public function Get(int $invoice) {
		return $this -> adapter -> exec('get', 'invoices/'.$invoice) -> response;
	}

	/**
	 * Set to paid a invoice
	 * 
	 * @since 1.0
	 *
	 * @param int $invoice
	 *
	 * @return Dolibarr\Adapter\Response
	 **/
	public function SetToPaid(int $invoice) {
		return $this -> adapter -> exec('post', 'invoices/'.$invoice.'/settopaid') -> response;
	}

	/**
	 * Set to draft a invoice
	 * 
	 * @since 1.0
	 *
	 * @param int $invoice
	 * @param array $options
	 *
	 * @return Dolibarr\Adapter\Response
	 **/
	public function SetToDraft(int $invoice, array $options) {
		$this -> adapter -> payload = $options;

		return $this -> adapter -> exec('post', 'invoices/'.$invoice.'/settodraft') -> response;
	}

	/**
	 * Add payments to invoice
	 * 
	 * @since 1.0
	 *
	 * @param array $options
	 *
	 * @return Dolibarr\Adapter\Response
	 **/
	public function PaymentsDistributed(array $options) {
		$this -> adapter -> payload = $options;

		return $this -> adapter -> exec('post', 'invoices/paymentsdistributed') -> response;
	}
}

