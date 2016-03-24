Colocation API
==============
The colocation API wraps the [TransIP domain SOAP service](https://api.transip.nl/wsdl/?service=DomainService).

### General
The domain API is available through the `Client` and can be accessed by calling `domain()` or `api('domain')`.

### Methods

#### Check the availability of a domain name.
````php
$client->domain()->checkAvailability('foo.com');
````

#### Check the availability of multiple domain names.
````php
$domainNames = [
	'foo.com',
	'bar.com'
];

$client->domain()->batchCheckAvailability($domainNames);
````

#### Get the WHOIS of a domain name.
````php
$client->domain()->getWhois('foo.com');
````

#### Get all domain names.
````php
$client->domain()->getDomainNames();
````

#### Get information about a domain name.
````php
$client->domain()->getInfo('foo.com');
````

#### Get information about multiple domain names.
````php
$domainNames = [
	'foo.com',
	'bar.com'
];

$client->domain()->batchGetInfo($domainNames);
````

#### Register a domain name with default settings.
````php
$domain = new TransIP\Model\Domain('foo.com');

$client->domain()->register($domain);
````

#### Register a domain with custom settings.
````php
// create Nameserver objects
$nameServers[] = new TransIP\Model\Nameserver('ns1.foobar.com');
// ..

// create WHOIS contact objects for each WHOIS type
$whoisTypes = [
	\TransIP\Model\WhoisContact::TYPE_REGISTRANT,
	\TransIP\Model\WhoisContact::TYPE_ADMINISTRATIVE,
	\TransIP\Model\WhoisContact::TYPE_TECHNICAL
];

foreach($whoisTypes as $whoisType) {
	$contact = new TransIP\Model\WhoisContact();
	$contact->type 			= $whoisType;
	$contact->firstName 	= 'Foo',
	$contact->lastName 		= 'Bar',
	$contact->street		= 'Overlook Circle',
	$contact->number		= '790',
	$contact->postalCode	= 'R07866',
	$contact->city			= 'Rockaway',
	$contact->phoneNumber	= '+12025550114',
	$contact->email			= 'foo@bar.com',
	$contact->country		= 'US';
	
	$whoisContacts[] = $contact;
}

// create DNS entry objects
$dnsEntries[] = new TransIP\Model\DnsEntry('@', 86400, \TransIP\Model\DnsEntry::TYPE_A, '127.0.0.1');
// ..

// create Domain object with created objects from above
$domain = new TransIP\Model\Domain('foo.com', $nameServers, $whoisContacts, $dnsEntries);

// note: it is possible to leave out one of the optional parameters by setting the value to null
$domain = new TransIP\Model\Domain('foo.com', null, $whoisContacts);

$client->domain()->register($domain);
````

#### Cancel a domain name.
````php
// cancel immediately
$client->domain()->cancel('foo.com', 'immediately');

// cancel at the end of the contract
$client->domain()->cancel('foo.com', 'end');
````

#### Transfer a domain name.
````php
// create WHOIS contact objects for each WHOIS type
$whoisTypes = [
	\TransIP\Model\WhoisContact::TYPE_REGISTRANT,
	\TransIP\Model\WhoisContact::TYPE_ADMINISTRATIVE,
	\TransIP\Model\WhoisContact::TYPE_TECHNICAL
];

foreach($whoisTypes as $whoisType) {
	$contact = new TransIP\Model\WhoisContact();
	$contact->type 			= $whoisType;
	$contact->firstName 	= 'Foo',
	$contact->lastName 		= 'Bar',
	$contact->street		= 'Overlook Circle',
	$contact->number		= '790',
	$contact->postalCode	= 'R07866',
	$contact->city			= 'Rockaway',
	$contact->phoneNumber	= '+12025550114',
	$contact->email			= 'foo@bar.com',
	$contact->country		= 'US';
	
	$whoisContacts[] = $contact;
}

$domain = new TransIP\Model\Domain('foo.com', null, $whoisContacts);

$client->domain()->transferWithOwnerChange($domain);

// with authorization code if needed for the transfer
// you can check this by requesting information about the TLD:
// $tldInfo = $client->domain()->getTldInfo('com'); $tldInfo->capabilities
$client->domain()->transferWithOwnerChange($domain, 'authorizationCode');
````

#### Transfer a domain name without changing the owner.
````php
$domainName = 'foo.com';
$tldName = strstr($domainName, '.');
$authCode = 'authorizationCode';

$domain = new TransIP\Model\Domain($domainName);

$tldInfo = $client->domain()->getTldInfo($tldName);

if(in_array(\TransIP\Model\Tld::CAPABILITY_CANTRANSFERWITHOWNERCHANGE, $tldInfo->capabilities)) {
	if(in_array(\TransIP\Model\Tld::REQUIRESAUTHCODE, $tldInfo->capabilities)) {
		$client->domain()->transferWithOwnerChange($domain, $authCode);
	} else {
		$client->domain()->transferWithOwnerChange($domain);
	}
} elseif(in_array(\TransIP\Model\Tld::CAPABILITY_CANTRANSFERWITHOUTOWNERCHANGE, $tldInfo->capabilities)) {
	if(in_array(\TransIP\Model\Tld::REQUIRESAUTHCODE, $tldInfo->capabilities)) {
		$client->domain()->transferWithoutOwnerChange($domain, $authCode);
	} else {
		$client->domain()->transferWithoutOwnerChange($domain);
	}
} else {
	throw new \Exception(sprintf('TLD [%s] does not support domain transfers', %tldName));
}

````

#### Start a nameserver change for a domain name.
**Note**: This will replace all existing nameservers with new ones.
````php
$nameServers[] = new TransIP\Model\Nameserver('ns1.foobar.com');
// ..

$client->domain()->setNameservers('foo.com', $nameServers);
````

#### Set the DNS entries for a domain name.
**Note**: This will replace all existing DNS entries with new ones.
````php
$dnsEntries[] = new TransIP\Model\DnsEntry('@', 86400, \TransIP\Model\DnsEntry::TYPE_A, '127.0.0.1');
// ..

$client->domain()->setDnsEntries('foo.com', $dnsEntries);
````

#### Start an owner change for a domain name.
````php
$whoisContact = new TransIP\Model\WhoisContact();
$whoisContact->type 		= \TransIP\Model\WhoisContact:TYPE_REGISTRANT;
$whoisContact->firstName 	= 'Foo',
$whoisContact->lastName 	= 'Bar',
$whoisContact->street		= 'Overlook Circle',
$whoisContact->number		= '790',
$whoisContact->postalCode	= 'R07866',
$whoisContact->city			= 'Rockaway',
$whoisContact->phoneNumber	= '+12025550114',
$whoisContact->email		= 'foo@bar.com',
$whoisContact->country		= 'US';

$client->domain()->setOwner('foo.com', $whoisContact);
````

#### Start a contact change for a domain name.
````php
$whoisTypes = [
	\TransIP\Model\WhoisContact::TYPE_REGISTRANT,
	\TransIP\Model\WhoisContact::TYPE_ADMINISTRATIVE,
	\TransIP\Model\WhoisContact::TYPE_TECHNICAL
];

foreach($whoisTypes as $whoisType) {
	$contact = new TransIP\Model\WhoisContact();
	$contact->type 			= $whoisType;
	$contact->firstName 	= 'Foo',
	$contact->lastName 		= 'Bar',
	$contact->street		= 'Overlook Circle',
	$contact->number		= '790',
	$contact->postalCode	= 'R07866',
	$contact->city			= 'Rockaway',
	$contact->phoneNumber	= '+12025550114',
	$contact->email			= 'foo@bar.com',
	$contact->country		= 'US';
	
	$whoisContacts[] = $contact;
}

$client->domain()->setContacts('foo.com', $whoisContacts);
````

#### Lock a domain name in real time.
````php
$client->domain()->setLock('foo.com');
````

#### Unlock a domain name in real time.
````php
$client->domain()->unsetLock('foo.com');
````

#### Get TLDs supported by TransIP.
````php
$client->domain()->getAllTldInfos();
````

#### Get information about a specific TLD.
````php
$client->domain()->getTldInfo('com');
````

#### Get information about the action a domain name is currently running.
````php
$client->domain()->getCurrentDomainAction('foo.com');
````

#### Retry a failed domain action with new data.
````php
$whoisContact = new TransIP\Model\WhoisContact();
$whoisContact->type 		= \TransIP\Model\WhoisContact:TYPE_REGISTRANT;
$whoisContact->firstName 	= 'Foo',
$whoisContact->lastName 	= 'Bar',
$whoisContact->street		= 'Overlook Circle',
$whoisContact->number		= '790',
$whoisContact->postalCode	= 'R07866',
$whoisContact->city			= 'Rockaway',
$whoisContact->phoneNumber	= '+12025550114',
$whoisContact->email		= 'foo@bar.com',
$whoisContact->country		= 'US';

// set a field to null to not change the data
$domain = new TransIP\Model\Domain('foo.com', null, [$whoisContact]);

$client->domain()->retryCurrentDomainActionWithNewData($domain);
````

#### Retry a transfer action with a new authorization code.
````php
$domain = new TransIP\Model\Domain('foo.com');

$client->domain()->retryTransferWithDifferentAuthCode($domain, 'newAuthorizationCode');
````

#### Cancel a failed domain action.
````php
$domain = new TransIP\Model\Domain('foo.com');

$client->domain()->cancelDomainAction($domain);
````