<?php

namespace TransIP\Soap\Builder;

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
            'Product'           => 'TransIP\Model\Product',
            'PrivateNetwork'    => 'TransIP\Model\PrivateNetwork',
            'Vps'               => 'TransIP\Model\Vps',
            'Snapshot'          => 'TransIP\Model\Snapshot',
            'OperatingSystem'   => 'TransIP\Model\OperatingSystem',
        ];
    }
}
