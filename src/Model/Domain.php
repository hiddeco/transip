<?php

namespace TransIP\Model;

/**
 * @author Hidde Beydals <hello@hidde.co>
 */
class Domain
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var NameServer[]
     */
    public $nameservers = [];

    /**
     * @var WhoisContact[]
     */
    public $contacts = [];

    /**
     * @var DnsEntry[]
     */
    public $dnsEntries = [];

    /**
     * @var DomainBranding
     */
    public $branding;

    /**
     * @var string
     * @readonly
     */
    public $authCode;

    /**
     * @var bool
     * @readonly
     */
    public $isLocked = false;

    /**
     * @var string
     * @readonly
     */
    public $registrationDate;

    /**
     * @var string
     * @readonly
     */
    public $renewalDate;

    /**
     * @param string         $name        Name of the domain
     * @param Nameserver[]   $nameservers Array with nameserver objects
     * @param WhoisContact[] $contacts    Array with WHOIS contacts
     * @param DnsEntry[]     $dnsEntries  Array with DNS entries
     * @param DomainBranding $branding    Branding
     */
    public function __construct($name, $nameservers = [], $contacts = [], $dnsEntries = [], $branding = null)
    {
        $this->name = $name;
        $this->nameservers = $nameservers;
        $this->contacts = $contacts;
        $this->dnsEntries = $dnsEntries;
        $this->branding = $branding;
    }
}
