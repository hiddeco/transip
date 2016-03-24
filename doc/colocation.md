Colocation API
==============
The colocation API wraps the [TransIP colocation SOAP service](https://api.transip.nl/wsdl/?service=ColocationService).

### General
The colocation API is available through the `Client` and can be accessed by calling `colocation()` or `api('colocation')`.

### Methods

#### Request access to the data-center.
````php
$visitors = [
	'Firstname Lastname',
];

$client->colocation()->requestAccess('2012-12-23 00:00:00', 60, $visitors, '+31612312399');
````

#### Request remote hands.
````php
$client->colocation()->requestRemoteHands('colocationFoo', 'Firstname Lastname', '+31612312399', 60, 'Instructions');
````

#### Get colocation names.
````php
$client->colocation()->getColocationNames();
````

#### Get active IP addresses for a colocation.
````php
$client->colocation()->getIpAddresses('colocationFoo');
````

#### Get IP ranges for a colocation.
````php
$client->colocation()->getIpRanges('colocationFoo');
````

#### Create a new ipv4 or ipv6 address.
````php
$client->colocation()->createIpAddress('127.0.0.1', '127.0.0.1.in-addr.arpa');
````

#### Delete an IP address.
````php
$client->colocation()->deleteIpAddress('127.0.0.1');
````

#### Get Reverse DNS for an IP address.
````php
$client->colocation()->getReverseDns('127.0.0.1');
````

#### Set Reverse DNS for an IP address.
````php
$client->colocation()->setReverseDns('127.0.0.1', '127.0.0.1.in-addr.arpa');
````