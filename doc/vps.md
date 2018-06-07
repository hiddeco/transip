VPS API
=======
The VPS API wraps the [TransIP VPS SOAP service](https://api.transip.nl/wsdl/?service=VpsService).

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
$addons    = ['vpsAddon-1-extra-ip-address'];
$operatingSystemName = 'ubuntu-14.04-transip';
$hostname = 'baymax.foo.com';

$client->vps()->orderVps($productName, $addons, $operatingSystemName, $hostname);
````

#### Order a VPS with optional add-ons in AvailabilityZone.
````php
$productName = 'vps-bladevps-x1'
$addons    = ['vpsAddon-1-extra-ip-address'];
$operatingSystemName = 'ubuntu-14.04-transip';
$hostname = 'baymax.foo.com';
$availabilityZone = 'ams0';

$client->vps()->orderVpsInAvailabilityZone($productName, $addons, $operatingSystemName, $hostname, $availabilityZone);
````

#### Clone a VPS.
````php
$client->vps()->cloneVps('fooVps');
````

#### Clone a VPS to AvailabilityZone.
````php
$client->vps()->cloneVpsToAvailabilityZone('fooVps', 'ams01');
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

#### Install an operating system unattended on a VPS.
````php
$base64InstallText = base64_encode('
    ## Mirror settings
    d-i mirror/country string manual
    d-i mirror/http/hostname string mirror.transip.net
    d-i mirror/http/directory string /debian/debian

    ## Automatically choose key mapping, since VNC client will translate to the clients one
    d-i keymap select us

    ## Automatically select the networking interface
    d-i netcfg/choose_interface select auto

    ## Install ACPId so the machine is responsive to Ctrl+Alt+Del etc
    d-i pkgsel/include string acpid

    # Any hostname and domain names assigned from dhcp take precedence over
    # values set here. However, setting the values still prevents the questions
    # from being shown, even if values come from dhcp.
    d-i netcfg/get_hostname string test-vps
    d-i netcfg/get_domain string example.com

    # Controls whether or not the hardware clock is set to UTC.
    d-i clock-setup/utc boolean true

    # You may set this to any valid setting for $TZ; see the contents of
    # /usr/share/zoneinfo/ for valid values.
    d-i time/zone string Europe/Amsterdam

    # Controls whether to use NTP to set the clock during the install
    d-i clock-setup/ntp boolean true
');

$client->vps()->installOperatingSystemUnattended('fooVps', 'debian-8', $base64InstallText);
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

#### Get all active Availablity zones for VPS.
````php
$client->vps()->getAvailableAvailabilityZones();
````
