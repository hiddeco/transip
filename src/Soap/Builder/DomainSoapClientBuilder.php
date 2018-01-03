<?php

namespace TransIP\Soap\Builder;

use TransIP\Model\DnsEntry;
use TransIP\Model\Domain;
use TransIP\Model\DomainAction;
use TransIP\Model\DomainBranding;
use TransIP\Model\DomainCheckResult;
use TransIP\Model\Nameserver;
use TransIP\Model\Tld;
use TransIP\Model\WhoisContact;

/**
 * @author Hidde Beydals <hello@hidde.co>
 */
class DomainSoapClientBuilder extends SoapClientBuilder
{
    /**
     * {@inheritdoc}
     */
    protected function getWsdlPath()
    {
        return '/wsdl?service=DomainService';
    }

    /**
     * {@inheritdoc}
     */
    protected function getClassMap()
    {
        return [
            'DomainCheckResult' => DomainCheckResult::class,
            'Domain'            => Domain::class,
            'Nameserver'        => Nameserver::class,
            'WhoisContact'      => WhoisContact::class,
            'DnsEntry'          => DnsEntry::class,
            'DomainBranding'    => DomainBranding::class,
            'Tld'               => Tld::class,
            'DomainAction'      => DomainAction::class,
        ];
    }
}
