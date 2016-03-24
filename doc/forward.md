Forward API
===========
The forward API wraps the [TransIP forward SOAP service](https://api.transip.nl/wsdl/?service=ForwardService).

### General
The domain API is available through the `Client` and can be accessed by calling `forward()` or `api('forward')`.

### Methods

#### Get a list of all domain names which have the Forward option enabled.
````php
$client->forward()->getForwardDomainNames();
````

#### Get information about a forwarded domain name.
````php
$client->forward()->getInfo('foo.com');
````

#### Order the Forward service for a domain name.
````php
// create Forward object
$forward = new TransIP\Model\Forward('foo.com', 'http://bar.com');
$forward->forwardEmailTo = 'foo@bar.com';

$client->forward()->order($forward);
````

#### Cancel the Forward service for a domain name.
````php
// cancel immediately
$client->forward()->cancel('foo.com', 'immediately');

// cancel at the end of the contract
$client->forward()->cancel('foo.com', 'end');
````

#### Modify the options of a Forward service.
````php
// create Forward object with changed fields only
$forward = new TransIP\Model\Forward('foo.com', 'http://foobar.com');

$client->forward()->modify($forward);
````