<?php

namespace TransIP\Soap\Builder;

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
            'DomainCheckResult' => 'TransIP\Model\DomainCheckResult',
            'Domain'            => 'TransIP\Model\Domain',
            'Nameserver'        => 'TransIP\Model\Nameserver',
            'WhoisContact'      => 'TransIP\Model\WhoisContact',
            'DnsEntry'          => 'TransIP\Model\DnsEntry',
            'DomainBranding'    => 'TransIP\Model\DomainBranding',
            'Tld'               => 'TransIP\Model\Tld',
            'DomainAction'      => 'TransIP\Model\DomainAction',
        ];
    }
}
