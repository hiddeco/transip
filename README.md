TransIP
=======
This library is an Object Oriented wrapper for the [TransIP](https://www.transip.co.uk) SOAP API (v5.1), which aims to 
provide a better and more structured client than the official [TransIP API package](https://www.transip.co.uk/transip/api/), 
including extensive documentation.

![TransIP SOAP client](https://i.imgur.com/O4RP263.jpg)

## Installation
To use this library without running in to trouble you will need PHP 5.4+ or HHVM 3.6+ and Composer.

1.	Get the latest version of TransIP by adding the following line to your `composer.json` file
	`"hiddeco/transip": "0.1"`

2.	Run `composer update` or `composer install`

## Features
- All TransIP services and methods available through one `Client`
- Follows PSR-4 conventions and PSR-2 coding standards
- Extensively documented

## Usage

### Basics

#### Using the `Client`
````php
// Composer autoload
require_once 'vendor/autoload.php';

$client = new \HiddeCo\TransIP\Client('username', 'privateKey');
$domainNames = $client->api('domain')->getDomainNames();
````

#### Setting the permission mode and endpoint
Although the permission mode and endpoint are configured by default as `readonly` and `api.transip.nl` it is possible to
chance them according to your wishes.

**Note:** accepted permission modes are `readonly` and `readwrite`. Invalid permission mode will throw an ` \InvalidArgumentException`.

````php
$client = new \HiddeCo\TransIP\Client('username', 'privateKey', 'readwrite', 'api.transip.co.uk');

// set permission mode on the run
try {
	$client->setMode('readonly');
} catch(\InvalidArgumentException $e) {
	echo $e->getMessage();
}
````

#### Catching `\SoapFault`
````php
$client = new \HiddeCo\TransIP\Client('username', 'privateKey');

try {
	$client->api('domain')->getDomainNames();
} catch(\SoapFault $e) {
	echo $e->getMessage();
}
````

### API documentation
For a full documentation on the available methods foreach API and how to use them take a look at the 
[extensive docs](https://github.com/hiddeco/transip/tree/master/doc).

## License
TransIP is licensed under [The MIT License (MIT)](https://github.com/hiddeco/transip/blob/master/LICENSE).