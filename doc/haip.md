HA-IP API
===============
The HA-IP API wraps the [TransIP HA-IP SOAP service](https://api.transip.nl/wsdl/?service=HaipService).

### General
The domain API is available through the `Client` and can be accessed by calling `haip()` or `api('haip')`.

### Methods

#### Get a HA-IP by name.
````php
$client->haip()->getHaip('foo');
````

#### Get all HA-IPs.
````php
$client->haip()->getHaips();
````

#### Change the VPS connected to the HA-IP.
````php
$client->haip()->changeHaipVps('ha-ip-foo', 'vps-bar');
````
