Web Hosting API
===============
The web hosting API wraps the [TransIP web hosting SOAP service](https://api.transip.nl/wsdl/?service=WebhostingService).

### General
The domain API is available through the `Client` and can be accessed by calling `hosting()` or `api('hosting')`.

### Methods

#### Get all domain names that have a web hosting package attached to them.
````php
$client->hosting()->getWebHostingDomainNames();
````

#### Get available web hosting packages.
````php
$client->hosting()->getAvailablePackages();
````

#### Get information about existing web hosting on a domain name.
````php
$client->hosting()->getInfo('foo.com');
````

#### Order web hosting for a domain name.
````php
$client->hosting()->order('foo.com', 'webhosting-small');
````

#### Get available upgrades for a domain name with web hosting.
````php
$client->hosting()->getAvailableUpgrades('foo.com');
````

#### Upgrade the web hosting of a domain name.
````php
// note: check for available upgrades first by calling getAvailableUpgrades()
$client->hosting()->upgrade('foo.com', webhosting-large');
````

#### Cancel web hosting for a domain name.
````php
// cancel immediately
$client->hosting()->cancel('foo.com', 'immediately');

// cancel at the end of the contract
$client->hosting()->cancel('foo.com', 'end');
````

#### Set a new FTP password for a web hosting package.
````php
$client->hosting()->setFtpPassword('foo.com', 'newSuperStrongPassword');
````

#### Create a cronjob for a web hosting package.
````php
// create a new Cronjob object
$cronjob = new TransIP\Model\Cronjob('FooCron', 'http://foo.com/bar.php', 'cron@foo.com', '0', '*', '*', '*', '*');

$client->hosting()->createCronjob('foo.com', $cronjob');
````

#### Delete a cronjob for a web hosting package.
**Note:** all completely matching cronjobs will be removed.
````php
// create a new Cronjob object
$cronjob = new TransIP\Model\Cronjob('FooCron', 'http://foo.com/bar.php', 'cron@foo.com', '0', '*', '*', '*', '*');

$client->hosting()->deleteCronjob('foo.com', $cronjob);
````

#### Create a mail box for a web hosting package.
````php
// create a new MailBox object with default settings
$mailBox = new TransIP\Model\MailBox('foo');

// create a new MailBox object with custom settings
$mailBox = new TransIP\Model\MailBox('foo', \TransIP\Model\MailBox::SPAMCHECKER_STRENGTH_OFF, 50);

$client->hosting()->createMailBox('foo.com', $mailBox');
````

#### Modify the mail box settings for a web hosting package.
````php
// create a new MailBox object with modified fields
$mailBox = new TransIP\Model\MailBox('foo', \TransIP\Model\MailBox::SPAMCHECKER_STRENGTH_LOW);

$client->hosting()->modifyMailBox('foo.com', $mailBox');
````

#### Set a new password for a mail box from a web hosting package.
````php
// MailBox object to change the password for
$mailBox = new TransIP\Model\MailBox('foo');

$client->hosting()->setMailBoxPassword('foo.com', $mailBox, 'newSuperStrongPassword');
````

#### Delete a mail box from a web hosting package.
````php
// MailBox object to delete
$mailBox = new TransIP\Model\MailBox('foo');

$client->hosting()->deleteMailBox('foo.com', $mailBox);
````

#### Create a mail forward for a web hosting package.
````php
// create new MailForward object
$mailForward = new TransIP\Model\MailForward('foo@foo.com', 'bar@foo.com');

$client->hosting()->createMailForward('foo.com', $mailForward);
````

#### Modify a mail forward from a web hosting package.
````php
// create a MailForward object with modified fields
$mailForward = new TransIP\Model\MailForward('foo@foo.com', 'foobar@foo.com');

$client->hosting()->modifyMailForward('foo.com', $mailForward);
````

#### Delete a mail forward from a web hosting package.
````php
// MailForward object to delete
$mailForward = new TransIP\Model\MailForward('foo@foo.com', 'bar@foo.com');

$client->hosting()->deleteMaiLForward('foo.com', $mailForward);
````

#### Create a new database for a web hosting package.
````php
// create a new Db object
$database = new TransIP\Model\Db('foo_db', 'foo_user');

// create a new Db object with custom database size in mb
$database = new TransIP\Model\Db('foo_db', 'foo_user', 200);

$client->hosting()->createDatabase('foo.com', $database');
````

#### Modify a database from a web hosting package.
````php
// create a Db object with modified fields
$database = new TransIP\Model\Db('foo_db', 'foo_user', 400);

$client->hosting()->modifyDatabase('foo.com', $database);
````

#### Set a password for a database from a web hosting package.
````php
// Db object to set the password for
$database = new TransIP\Model\Db('foo_db', 'foo_user');

$client->hosting()->setDatabasePassword('foo.com', $database', 'superStrongPassword');
````

#### Delete a database from a web hosting package.
````php
// Db object to delete
$database = new TransIP\Model\Db('foo_db', 'foo_user');

$client->hosting()->deleteDatabase('foo.com', $database);
````

#### Create a sub domain for a web hosting package.
````php
// create a new SubDomain object
$subDomain = new TransIP\Model\SubDomain('bar');

$client->hosting()->createSubDomain('foo.com', $subDomain);
````

#### Delete a sub domain for a web hosting package.
````php
// SubDomain object to delete
$subDomain = new TransIP\Model\SubDomain('bar');

$client->hosting()->deleteSubDomain('foo.com', $subDomain);
````