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

#### Replace the currently attached VPSes to the HA-IP with the provided list.
````php
$client->haip()->setHaipVpses('ha-ip-foo', ['vps-bar, 'vps-foo']);
````

#### Set the provided IP setup for the HA-IP.
````php
// the ip setup can be one of the following values
// 'both', 'noipv6', 'ipv6to4'
$client->haip()->setIpSetup('ha-ip-foo', 'both');
````

#### Set the provided balancing mode for the HA-IP.

:warning:	HA-IP Pro feature

````php
// the balancing mode can be one of the following values
// 'roundrobin', 'cookie', 'source'
// the cookie name is only mandatory when the mode is set to 'cookie'
$client->haip()->setBalancingMode('ha-ip-foo', 'cookie', 'cookie-name');
````

#### Configure the HTTP health check for the HA-IP.

:warning:	HA-IP Pro feature

````php
$client->haip()->setHttpHealthCheck('ha-ip-foo', '/path', 80);
````

#### Configure a TCP health check for the HA-IP.

:warning:	HA-IP Pro feature

````php
$client->haip()->setTcpHealthCheck('ha-ip-foo');
````

#### Get a status report for the HA-IP.
````php
$client->haip()->getStatusReport('ha-ip-foo');
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
$client->haip()->getPortConfigurations('ha-ip-foo');
````

#### Set the default port configuration for the HA-IP.
````php
$client->haip()->setDefaultPortConfiguration('ha-ip-foo');
````

#### Add port configuration to the HA-IP.
````php
// the $node parameter can receive one of the following values
// 'tcp','http','https', or 'proxy'
// the $endPointSslMode can receive on of the following values
// 'off, 'on' strict'
$client->haip()->addPortConfiguration('ha-ip-foo', 'ssl', 443, 'https', 'on');
````

#### Update port configuration for the HA-IP.
````php
$client->haip()->updatePortConfiguration('ha-ip-foo', 123, 'ssl', 443, 'https', 'on');
````

#### Delete the port configuration for the HA-IP.
````php
$client->haip()->deletePortConfiguration('ha-ip-foo', 123);
````

#### Cancel the HA-IP.
````php
// cancel immediatly
$client->haip()->cancelHaip('ha-ip-foo', 'immediatly');

// cancel at the end of the contract
$client->haip()->cancelHaip('ha-ip-foo', 'end');
````
