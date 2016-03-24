<?php

namespace TransIP\Api;

/**
 * @author Hidde Beydals <hello@hidde.co>
 */
class WebHosting extends AbstractApi
{
    const SERVICE = 'WebhostingService';

    /**
     * Get all domain names that have a web hosting package attached to them.
     *
     * @throws \SoapFault
     *
     * @return string[]
     */
    public function getWebHostingDomainNames()
    {
        return $this->call(self::SERVICE, 'getWebhostingDomainNames');
    }

    /**
     * Get available web hosting packages.
     *
     * @throws \SoapFault
     *
     * @return \TransIP\Model\WebHostingPackage[]
     */
    public function getAvailablePackages()
    {
        return $this->call(self::SERVICE, 'getAvailablePackages');
    }

    /**
     * Get information about existing web hosting on a domain name.
     *
     * Be aware that the information returned is outdated after calling
     * a modifying function (e.g. create Cronjob()).
     *
     * Call this function again to refresh the information.
     *
     * @param string $domainName Domain name of the web hosting package to get info for
     *
     * @throws \SoapFault
     *
     * @return \TransIP\Model\WebHost
     */
    public function getInfo($domainName)
    {
        return $this->call(self::SERVICE, 'getInfo', [$domainName]);
    }

    /**
     * Order web hosting for a domain name.
     *
     * @param string                                   $domainName        Domain name to order web hosting for
     * @param \TransIP\Model\WebHostingPackage $webHostingPackage Web hosting package to order
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function order($domainName, $webHostingPackage)
    {
        return $this->call(self::SERVICE, 'order', [$domainName, $webHostingPackage]);
    }

    /**
     * Get available upgrade packages for a domain name with web hosting.
     *
     * @param string $domainName Domain name to get the upgrades for
     *
     * @throws \SoapFault
     *
     * @return \TransIP\Model\WebHostingPackage[]
     */
    public function getAvailableUpgrades($domainName)
    {
        return $this->call(self::SERVICE, 'getAvailableUpgrades', [$domainName]);
    }

    /**
     * Upgrade the web hosting of a domain name.
     *
     * @param string $domainName        Domain name to upgrade web hosting for
     * @param string $webHostingPackage Web hosting package to upgrade to
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function upgrade($domainName, $webHostingPackage)
    {
        return $this->call(self::SERVICE, 'upgrade', [$domainName, $webHostingPackage]);
    }

    /**
     * Cancel web hosting for a domain name.
     *
     * @param string $domainName Domain name to cancel the web hosting for
     * @param string $endTime    Time to cancel the web hosting
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function cancel($domainName, $endTime)
    {
        return $this->call(self::SERVICE, 'cancel', [$domainName, $endTime]);
    }

    /**
     * Set a new FTP password for a web hosting package.
     *
     * @param string $domainName Domain name to set the FTP password for
     * @param string $password   New FTP password for the web hosting package
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function setFtpPassword($domainName, $password)
    {
        return $this->call(self::SERVICE, 'setFtpPassword', [$domainName, $password]);
    }

    /**
     * Create a cronjob for a web hosting package.
     *
     * @param string                         $domainName Domain name to create the cronjob for
     * @param \TransIP\Model\Cronjob $cronjob    Cronjob to create
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function createCronjob($domainName, $cronjob)
    {
        return $this->call(self::SERVICE, 'createCronjob', [$domainName, $cronjob]);
    }

    /**
     * Delete a cronjob for a web hosting package.
     * All completely matching cronjobs will be removed.
     *
     * @param string                         $domainName Domain name to create the cronjob for
     * @param \TransIP\Model\Cronjob $cronjob    Cronjob to create
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function deleteCronjob($domainName, $cronjob)
    {
        return $this->call(self::SERVICE, 'deleteCronjob', [$domainName, $cronjob]);
    }

    /**
     * Create a mail box for a web hosting package.
     * The address field of the mail box object has to be unique.
     *
     * @param string                         $domainName Domain name to create the mail box for
     * @param \TransIP\Model\MailBox $mailBox    Mail box to create
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function createMailBox($domainName, $mailBox)
    {
        return $this->call(self::SERVICE, 'createMailBox', [$domainName, $mailBox]);
    }

    /**
     * Modify the mail box settings for a web hosting package.
     *
     * @param string                         $domainName Domain name to modify the mail box for
     * @param \TransIP\Model\MailBox $mailBox    Mail box to modify
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function modifyMailBox($domainName, $mailBox)
    {
        return $this->call(self::SERVICE, 'modifyMailbox', [$domainName, $mailBox]);
    }

    /**
     * Set a new password for a mail box from a web hosting package.
     *
     * @param string                         $domainName Domain name to set the mail box password for
     * @param \TransIP\Model\MailBox $mailBox    Mail box to set the password for
     * @param string                         $password   New password for the mail box
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function setMailBoxPassword($domainName, $mailBox, $password)
    {
        return $this->call(self::SERVICE, 'setMailBoxPassword', [$domainName, $mailBox, $password]);
    }

    /**
     * Delete a mail box from a web hosting package.
     *
     * @param string                         $domainName Domain name to remove the mail box from
     * @param \TransIP\Model\MailBox $mailBox    Mail box to remove
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function deleteMailBox($domainName, $mailBox)
    {
        return $this->call(self::SERVICE, 'deleteMailBox', [$domainName, $mailBox]);
    }

    /**
     * Create a mail forward for a web hosting package.
     *
     * @param string                             $domainName  Domain name to create the mail forward for
     * @param \TransIP\Model\MailForward $mailForward Mail forward to create
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function createMailForward($domainName, $mailForward)
    {
        return $this->call(self::SERVICE, 'createMailForward', [$domainName, $mailForward]);
    }

    /**
     * Modify a mail forward from a web hosting package.
     *
     * @param string                             $domainName  Domain name to modify the mail forward from
     * @param \TransIP\Model\MailForward $mailForward Mail forward to modify
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function modifyMailForward($domainName, $mailForward)
    {
        return $this->call(self::SERVICE, 'modifyMailForward', [$domainName, $mailForward]);
    }

    /**
     * Delete a mail forward from a web hosting package.
     *
     * @param string                             $domainName  Domain name to delete the mail forward from
     * @param \TransIP\Model\MailForward $mailForward Mail forward to delete
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function deleteMailForward($domainName, $mailForward)
    {
        return $this->call(self::SERVICE, 'deleteMailForward', [$domainName, $mailForward]);
    }

    /**
     * Create a new database for a web hosting package.
     *
     * @param string                    $domainName Domain name to create the database for
     * @param \TransIP\Model\Db $database   Database to create
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function createDatabase($domainName, $database)
    {
        return $this->call(self::SERVICE, 'createDatabase', [$domainName, $database]);
    }

    /**
     * Modify a database from a web hosting package.
     *
     * @param string                    $domainName Domain name to modify the database from
     * @param \TransIP\Model\Db $database   Database to modify
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function modifyDatabase($domainName, $database)
    {
        return $this->call(self::SERVICE, 'modifyDatabase', [$domainName, $database]);
    }

    /**
     * Set a password for a database from a web hosting package.
     *
     * @param string                    $domainName Domain name to set the database password for
     * @param \TransIP\Model\Db $database   Database to set the password for
     * @param string                    $password   Password to set
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function setDatabasePassword($domainName, $database, $password)
    {
        return $this->call(self::SERVICE, 'setDatabasePassword', [$domainName, $database, $password]);
    }

    /**
     * Delete a database from a web hosting package.
     *
     * @param string $domainName Domain name to delete the database from
     * @param string $database   Database to delete
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function deleteDatabase($domainName, $database)
    {
        return $this->call(self::SERVICE, 'deleteDatabase', [$domainName, $database]);
    }

    /**
     * Create a sub domain for a web hosting package.
     *
     * @param string                           $domainName $domainName Domain name to create the sub domain for
     * @param \TransIP\Model\SubDomain $subDomain  Sub domain to create
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function createSubDomain($domainName, $subDomain)
    {
        return $this->call(self::SERVICE, 'createSubdomain', [$domainName, $subDomain]);
    }

    /**
     * Delete a sub domain for a web hosting package.
     *
     * @param string                           $domainName $domainName Domain name to delete the sub domain from
     * @param \TransIP\Model\Subdomain $subDomain  Sub domain to delete
     *
     * @return mixed
     *
     * @throws\ SoapFault
     */
    public function deleteSubDomain($domainName, $subDomain)
    {
        return $this->call(self::SERVICE, 'deleteSubdomain', [$domainName, $subDomain]);
    }
}
