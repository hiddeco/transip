<?php

namespace HiddeCo\TransIP\Soap\Builder;

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
            'DomainCheckResult' => 'HiddeCo\TransIP\Model\DomainCheckResult',
            'Domain'            => 'HiddeCo\TransIP\Model\Domain',
            'Nameserver'        => 'HiddeCo\TransIP\Model\Nameserver',
            'WhoisContact'      => 'HiddeCo\TransIP\Model\WhoisContact',
            'DnsEntry'          => 'HiddeCo\TransIP\Model\DnsEntry',
            'DomainBranding'    => 'HiddeCo\TransIP\Model\DomainBranding',
            'Tld'               => 'HiddeCo\TransIP\Model\Tld',
            'DomainAction'      => 'HiddeCo\TransIP\Model\DomainAction'
        ];
    }
}