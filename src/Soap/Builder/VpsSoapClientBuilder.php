<?php

namespace HiddeCo\TransIP\Soap\Builder;

/**
 * @author Hidde Beydals <hello@hidde.co>
 */
class VpsSoapClientBuilder extends SoapClientBuilder
{
    /**
     * {@inheritdoc}
     */
    protected function getWsdlPath()
    {
        return '/wsdl?service=VpsService';
    }

    /**
     * {@inheritdoc}
     */
    protected function getClassMap()
    {
        return [
            'Product'           => 'HiddeCo\TransIP\Model\Product',
            'PrivateNetwork'    => 'HiddeCo\TransIP\Model\PrivateNetwork',
            'Vps'               => 'HiddeCo\TransIP\Model\Vps',
            'Snapshot'          => 'HiddeCo\TransIP\Model\Snapshot',
            'OperatingSystem'   => 'HiddeCo\TransIP\Model\OperatingSystem',
        ];
    }
}
