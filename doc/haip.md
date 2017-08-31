HA-IP API
===============
The HA-IP API wraps the [TransIP HA-IP SOAP service](https://api.transip.nl/wsdl/?service=HaipService).

### General
The domain API is available through the `Client` and can be accessed by calling `haip()` or `api('haip')`.

### Methods

#### Get a HA-IP by name.
````php
$client->haip()->getHaip('ha-ip-foo');
````

#### Get all HA-IPs.
````php
$client->haip()->getHaips();
````

#### Change the VPS connected to the HA-IP.
````php
$client->haip()->changeHaipVps('ha-ip-foo', 'vps-bar');
````
#### Get all certificates for the HA-IP.
````php
$client->haip()->getCertificatesByHaip('ha-ip-foo');
````

#### Get all available certificates ready to attach to your HA-IP.
````php
$client->haip()->getAvailableCertificatesByHaip('ha-ip-foo');
````

#### Add a certificate to the HA-IP.
````php
$client->haip()->addCertificateToHaip('ha-ip-foo', 123);
````

#### Remove a certificate from the HA-IP.
````php
$client->haip()->deleteCertificateFromHaip('ha-ip-foo', 123);
````

#### Add a LetsEncrypt certificate to the HA-IP.
````php
$client->haip()->startHaipLetsEncryptCertificateIssue('ha-ip-foo', 'common-name');
````

#### Returns the current ptr for the given HA-IP.
````php
$client->haip()->getPtrForHaip('ha-ip-foo');
````
#### Update the ptr record for the given HA-IP.
````php
$client->haip()->setPtrForHaip('ha-ip-foo', 'ptr');
````

#### Update the description for the HA-IP.
````php
$client->haip()->setHaipDescription('ha-ip-foo', 'description');
````

#### Get all port configurations for the HA-IP.
````php
$client->haip()->getHaipPortConfigurations('ha-ip-foo');
````

#### Set the default port configuration for the HA-IP.
````php
$client->haip()->setDefaultPortConfiguration('ha-ip-foo');
````

#### Add port configuration to the HA-IP.
````php
// the last ($node) parameter can receive one of the following values
// 'tcp','http','https', or 'proxy'
$client->haip()->addHaipPortConfiguration('ha-ip-foo', 'ssl', 443, 'https');
````

#### Update port configuration for the HA-IP.
````php
$client->haip()->updateHaipPortConfiguration('ha-ip-foo', 'ssl', 443, 'https');
````

#### Delete the port configuration for the HA-IP.
````php
$client->haip()->deleteHaipPortConfiguration('ha-ip-foo', 123);
````

#### Cancel the HA-IP.
````php
// cancel immediatly
$client->haip()->cancelHaip('ha-ip-foo', 'immediatly');

// cancel at the end of the contract
$client->haip()->cancelHaip('ha-ip-foo', 'end');
````
