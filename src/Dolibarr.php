<?php

namespace Dantepiazza\DolibarrSdk;

use Exception;
use Dantepiazza\DolibarrSdk\Adapter\Response;

#[AllowDynamicProperties]
class Dolibarr{
	private $url = '';
	private $token = '';
	
	public $payload = [];
	public Response $response;

	/**
	 * Implemented endpoints
	 *
	 * @var array[string]
	 **/
	var $endpoints = [
		'BankAccounts',
		'Contacts',
		'Documents',
		'ExpenseReports',
		'Invoices',
		'Login',
		'Projects',
		'Proposals',
		'Setup',
		'Status',
		'SupplierInvoices',
		'SupplierOrders',
		'SupplierProposals',
		'Tasks',
		'Thirdparties',
		'Users',
	];
    
	function __construct(array $options){
		if(!isset($options['url']) || empty($options['url'])){
			throw new Exception('Dolibarr endpoint url is required', 1);
		}

		if(!isset($options['token']) || empty($options['token'])){
			throw new Exception('The Dolibarr token is required', 1);
		}

		$this -> url = $options['url'];
		$this -> token = $options['token'];
		$this -> response = new Response();
	}

	public function __get($property){
		if (!isset($this -> {$property}) && in_array($property, $this -> endpoints)) {
			$file = __DIR__.'/Endpoints/'.$property.'.php';
				
			if (!file_exists($file)) {
				throw new Exception('Failed to open '.$file, 1);
			}

			include_once $file;

			return ($this -> {$property} = new $property($this));
		} else {
			return $this -> {$property};
		}
	}

	public function exec(string $method, string $path, array $query = []){
		$headers = ['DOLAPIKEY: '.$this -> token];
		$method = strtoupper($method);		
		$query = count($query) > 0 ? sprintf("?%s", http_build_query($query)) : '';
		$url = $this -> url.$path.$query;

		$curl = curl_init();

		if(in_array($method, ['POST', 'PUT'])){
			$headers[] = 'Content-Type:application/json';
			
			curl_setopt($curl, CURLOPT_POST, true);	
			
			if($method === 'PUT'){
				curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');        		
			}

            if(count($this -> payload) > 0){
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($this -> payload));
			}
		}  
		
		// Optional Authentication:
		// curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		// curl_setopt($curl, CURLOPT_USERPWD, "username:password");

		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

		$response = json_decode(curl_exec($curl), true);
		
		$this -> response = new Response();
		$this -> response -> status = isset($response['error']) ? false : true;
		$this -> response -> data = isset($response['error']) ? array_merge($response['error'], ['url' => $url, 'payload' => $this -> payload]) : $response;
		$this -> response -> code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

		curl_close($curl);

		return $this;
	}
}
