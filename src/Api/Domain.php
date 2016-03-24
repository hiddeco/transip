<?php

namespace TransIP\Api;

class Domain extends AbstractApi
{
    const SERVICE = 'DomainService';

    /**
     * Check the availability of a domain name.
     *
     * @param string $domainName Domain name to check for availability
     *
     * @throws \SoapFault
     *
     * @return string
     */
    public function checkAvailability($domainName)
    {
        return $this->call(self::SERVICE, 'checkAvailability', [$domainName]);
    }

    /**
     * Check the availability of multiple domain names.
     *
     * @param string[] $domainNames Domain names to check for availability
     *
     * @throws \SoapFault
     *
     * @return \TransIP\Model\DomainCheckResult[]
     */
    public function batchCheckAvailability(array $domainNames)
    {
        return $this->call(self::SERVICE, 'batchCheckAvailability', [$domainNames]);
    }

    /**
     * Get the WHOIS of a domain name.
     *
     * @param string $domainName Domain name to get the whois for
     *
     * @throws \SoapFault
     *
     * @return string
     */
    public function getWhois($domainName)
    {
        return $this->call(self::SERVICE, 'getWhois', [$domainName]);
    }

    /**
     * Get all domain names.
     *
     * @throws \SoapFault
     *
     * @return string[]
     */
    public function getDomainNames()
    {
        return $this->call(self::SERVICE, 'getDomainNames');
    }

    /**
     * Get information about a domain name.
     *
     * @param string $domainName Domain name to get the information for
     *
     * @throws \SoapFault
     *
     * @return \TransIP\Model\Domain
     */
    public function getInfo($domainName)
    {
        return $this->call(self::SERVICE, 'getInfo', [$domainName]);
    }

    /**
     * Get information about multiple domain names.
     *
     * @param string[] $domainNames Domain names to get the information for
     *
     * @throws \SoapFault
     *
     * @return \TransIP\Model\Domain[]
     */
    public function batchGetInfo(array $domainNames)
    {
        return $this->call(self::SERVICE, 'batchGetInfo', [$domainNames]);
    }

    /**
     * Register a domain name, will automatically create and sign a proposition for it.
     *
     * @param \TransIP\Model\Domain $domain Domain object holding information about the domain
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function register($domain)
    {
        return $this->call(self::SERVICE, 'register', [$domain]);
    }

    /**
     * Cancel a domain name, will automatically create and sign a cancellation document.
     *
     * @param string $domainName Domain name that needs to be cancelled
     * @param string $endTime    Time to cancel the domain
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
     * Transfer a domain name with changing the owner, not all TLDs support this (e.g. NL).
     *
     * @param \TransIP\Model\Domain $domain   Domain object holding information about the domain
     * @param string                $authCode Authorization code for domains needing this for transfer
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function transferWithOwnerChange($domain, $authCode = '')
    {
        return $this->call(self::SERVICE, 'transferWithOwnerChange', [$domain, $authCode]);
    }

    /**
     * Transfer a domain name without changing the owner.
     *
     * @param \TransIP\Model\Domain $domain   Domain object holding information about the domain
     * @param string                $authCode Authorization code for domains needing this for transfer
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function transferWithoutOwnerChange($domain, $authCode = '')
    {
        return $this->call(self::SERVICE, 'transferWithoutOwnerChange', [$domain, $authCode]);
    }

    /**
     * Start a nameserver change for a domain name, will replace all existing nameservers with new ones.
     *
     * @param string                      $domainName  Domain name to change the nameservers for
     * @param \TransIP\Model\Nameserver[] $nameservers Array holding new Nameserver objects for this domain
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function setNameservers($domainName, array $nameservers)
    {
        return $this->call(self::SERVICE, 'setNameservers', [$domainName, $nameservers]);
    }

    /**
     * Set the DNS entries for a domain name,
     * will replace all the existing DNS entries.
     *
     * @param string                    $domainName Domain name to change the dns entries for
     * @param \TransIP\Model\DnsEntry[] $dnsEntries List of new DNS entries for the given domain
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function setDnsEntries($domainName, array $dnsEntries)
    {
        return $this->call(self::SERVICE, 'setDnsEntries', [$domainName, $dnsEntries]);
    }

    /**
     * Start an owner change for a domain name, brings additional costs with the following TLDs:
     * .nl
     * .be
     * .eu.
     *
     * @param string                      $domainName   Domain name to change the owner for
     * @param \TransIP\Model\WhoisContact $whoisContact New contact data for the given domain
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function setOwner($domainName, $whoisContact)
    {
        return $this->call(self::SERVICE, 'setOwner', [$domainName, $whoisContact]);
    }

    /**
     * Start a contact change for a domain name, this will replace all existing contacts.
     *
     * @param string                        $domainName Domain name to change the owner for
     * @param \TransIP\Model\WhoisContact[] $contacts   New contact data for the given domain
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function setContacts($domainName, $contacts)
    {
        return $this->call(self::SERVICE, 'setContacts', [$domainName, $contacts]);
    }

    /**
     * Lock a domain name in real time.
     *
     * @param string $domainName Domain name to lock
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function setLock($domainName)
    {
        return $this->call(self::SERVICE, 'setLock', [$domainName]);
    }

    /**
     * Unlock a domain name in real time.
     *
     * @param string $domainName Domain name to unlock
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function unsetLock($domainName)
    {
        return $this->call(self::SERVICE, 'unsetLock', [$domainName]);
    }

    /**
     * Get TLDs supported by TransIP.
     *
     * @throws \SoapFault
     *
     * @return \TransIP\Model\Tld[]
     */
    public function getAllTldInfos()
    {
        return $this->call(self::SERVICE, 'getAllTldInfos');
    }

    /**
     * Get information about a specific TLD.
     *
     * @param string $tldName TLD to get information about
     *
     * @throws \SoapFault
     *
     * @return \TransIP\Model\Tld
     */
    public function getTldInfo($tldName)
    {
        return $this->call(self::SERVICE, 'getTldInfo', [$tldName]);
    }

    /**
     * Get information about the action a domain name is currently running.
     *
     * @param string $domainName Name of the domain
     *
     * @throws \SoapFault
     *
     * @return \TransIP\Model\DomainAction
     */
    public function getCurrentDomainAction($domainName)
    {
        return $this->call(self::SERVICE, 'getCurrentDomainAction', [$domainName]);
    }

    /**
     * Retry a failed Domain action with new Domain data. The Domain 'name' field must contain
     * the name of the Domain, the 'nameserver', 'contacts', 'dnsEntries' fields contain the new data
     * for this domain. Set a field to null to not change the data.
     *
     * @param \TransIP\Model\Domain $domain Domain object with data to retry
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function retryCurrentDomainActionWithNewData($domain)
    {
        return $this->call(self::SERVICE, 'retryCurrentDomainActionWithNewData', [$domain]);
    }

    /**
     * Retry a transfer action with a new authorization code.
     *
     * @param \TransIP\Model\Domain $domain      Domain object to try the transfer with a different code for
     * @param string                $newAuthCode New authorization code
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function retryTransferWithDifferentAuthCode($domain, $newAuthCode)
    {
        return $this->call(self::SERVICE, 'retryTransferWithDifferentAuthCode', [$domain, $newAuthCode]);
    }

    /**
     * Cancel a failed Domain action.
     *
     * @param \TransIP\Model\Domain $domain Domain object to cancel the action for
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function cancelDomainAction($domain)
    {
        return $this->call(self::SERVICE, 'cancelDomainAction', [$domain]);
    }
}
