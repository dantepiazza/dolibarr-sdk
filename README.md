# Dolibarr API Rest SDK

## Installation

The recommended way to install this package is via the Packagist Dependency Manager ([dantepiazza/dolibarr-sdk](https://packagist.org/packages/dantepiazza/dolibarr-sdk)). 

## Getting Started

```php
$dolibarr = new Dolibarr([
	'url' => 'YOUR_DOLIBAR_API_URL',
	'token' => 'YOUR_DOLIBAR_API_TOKEN',
]);

$invoice = $dolibarr -> Invoices -> Get(1);

if($invoice -> status){
    print_r($invoice -> data);
}
```

The call to the different Dolibarr endpoints is made through the defined instance invoking the class and the corresponding method:


```php
$call = $dolibarr -> endpoint_class_name -> method_name(array $options);
```

You can see a detail of the different endpoints by exploring your API from the URL `YOUR_DOLIBAR_API_URL/api/index.php/explorer`

## Availables endpoints

The names of the classes correspond to the different endpoints of the Dolibarr Rest API. Below is a list of endpoints available in this version:

- [ ] BankAccounts
- [ ] Contacts
- [ ] Documents
- [ ] ExpenseReports
- [x] Invoices
- [ ] Login
- [ ] Projects
- [ ] Proposals
- [ ] Setup
- [ ] Status
- [x] SupplierInvoices
- [ ] SupplierOrders
- [ ] SupplierProposals
- [ ] Tasks
- [x] Thirdparties
- [ ] Users

Note that this repository is currently under development, additional classes and endpoints being actively added.

## Responses

All requests return an instance of the Response class

```php
class Response{
	var bool $status = false;
	var mixed $data = [];
	var int $code = 0;
}

```

## Contributions

First off, thanks for taking the time to contribute! 🎉👍 To help add functionality or address issues, please take the following steps:

* Fork the repository from the master branch.
* Create a new branch for your `features` or `fixes`.
* Make the changes you wish to see.
* Create a pull request with details of what changes have been made and explanation of new behaviour.
* Ensure documentation contains the correct information.
* Pull requests will be reviewed and hopefully merged into a release.
