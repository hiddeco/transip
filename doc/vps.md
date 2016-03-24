VPS API
=======
The VPS API wraps the [TransIP VPS SOAP service](https://api.transip.co.uk/wsdl/?service=VpsService).

### General
The domain API is available through the `Client` and can be accessed by calling `forward()` or `api('forward')`.

### Methods

#### Get available VPS products.
````php
$client->vps()->getAvailableProducts();
````

#### Get available VPS add-ons.
````php
$client->vps()->getAvailableAddons();
````

#### Get all the active add-ons for a VPS.
````php
$client->vps()->getActiveAddonsForVps('fooVps');
````

#### Get available upgrades for a VPS.
````php
$client->vps()->getAvailableUpgrades('fooVps');
````

#### Get cancellable add-ons for a VPS.
````php
$client->vps()->getCancellableAddonsForVps('fooVps');
````

#### Order a VPS with optional add-ons.
````php
$productName = 'vps-bladevps-x1'
$addons	= ['vpsAddon-1-extra-ip-address'];
$operatingSystemName = 'ubuntu-14.04-transip';
$hostname = 'baymax.foo.com';

$client->vps()->orderVps($productName, $addons, $operatingSystemName, $hostname);
````

#### Clone a VPS.
````php
$client->vps()->cloneVps('fooVps');
````

#### Order add-ons for a VPS.
````php
$client->vps()->orderAddon('fooVps', 'vpsAddon-1-extra-ip-address');
````

#### Order a private network.
````php
$client->vps()->orderPrivateNetwork();
````

#### Upgrade a VPS.
````php
$client->vps()->upgradeVps('fooVps', 'vps-bladevps-x4');
````

#### Cancel a VPS.
````php
// cancel immediately
$client->vps()->cancelVps('fooVps', 'immediately');

// cancel at the end of the contract
$client->vps()->cancelVps('fooVps', 'end');
````

#### Cancel a VPS add-on.
````php
$client->vps()->cancelAddon('fooVps', 'vpsAddon-1-extra-ip-address');
````

#### Cancel a private network.
````php
// cancel immediately
$client->vps()->cancelPrivateNetwork('fooNetwork', 'immediately');

// cancel at the end of the contract
$client->vps()->cancelPrivateNetwork('fooNetwork', 'end');
````

#### Get private networks for a VPS.
````php
$client->vps()->getPrivateNetworksByVps('fooVps');
````

#### Get all private networks.
````php
$client->vps()->getAllPrivateNetworks();
````

#### Add VPS to a private network.
````php
$client->vps()->addVpsToPrivateNetwork('fooVps', 'fooNetwork');
````

#### Remove VPS from a private network.
````php
$client->vps()->removeVpsFromPrivateNetwork('fooVps', 'fooNetwork');
````

#### Get traffic information for a VPS for this contract period.
````php
$client->vps()->getTrafficInformationForVps('fooVps');
````

#### Start a VPS.
````php
$client->vps()->start('fooVps');
````

#### Stop a VPS.
````php
$client->vps()->stop('fooVps');
````

#### Reset a VPS.
````php
$client->vps()->reset('fooVps');
````

#### Create a snapshot of a VPS.
````php
$client->vps()->createSnapshot('fooVps', 'fooVpsSnapshot');
````

#### Revert a snapshot.
````php
$client->vps()->revertSnapshot('fooVps', 'fooSnapshot');
````

#### Revert a snapshot to another VPS.
````php
$client->vps()->revertSnapshotToOtherVps('fooVps', 'fooSnapshot', 'barVps');
````

#### Remove a snapshot.
````php
$client->vps()->removeSnapshot('fooVps', 'fooSnapshot');
````

#### Revert a VPS backup.
````php
$client->vps()->revertVpsBackup('fooVps', 'backUpID');
````

#### Get a VPS.
````php
$client->vps()->getVps('fooVps');
````

#### Get all VPSes.
````php
$client->vps()->getVpses();
````

#### Get all snapshots for a VPS.
````php
$client->vps()->getSnapshotByVps('fooVps');
````

#### Get all operating systems.
````php
$client->vps()->getOperatingSystems();
````

#### Install an operating system on a VPS.
````php
$client->vps()->installOperatingSystem('fooVps', 'ubuntu-14.04-transip', 'baymax.foo.com');
````

#### Get IP addresses for a VPS.
````php
$client->vps()->getIpsForVps('fooVps');
````

#### Get all IP addresses. 
````php
$client->vps()->getAllIps();
````

#### Add ipv6 address to a VPS.
````php
$client->vps()->addIpv6ToVps('fooVps', '0:0:0:0:0:0:0:1');
````

#### Update PTR record (reverse DNS) for an IP address.
````php
$client->vps()->updatePtrRecord('127.0.0.1', '127.0.0.1.in-addr.arpa');
````

#### Enable or disable a customer lock for a VPS.
````php
$client->vps()->setCustomerLock('fooVps', true);
````

#### Handover a VPS to another TransIP user.
````php
$client->vps()->handoverVps('fooVps', 'fooUsername');
````