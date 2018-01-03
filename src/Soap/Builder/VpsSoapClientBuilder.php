<?php

namespace TransIP\Soap\Builder;

use TransIP\Model\OperatingSystem;
use TransIP\Model\PrivateNetwork;
use TransIP\Model\Product;
use TransIP\Model\Snapshot;
use TransIP\Model\Vps;

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
            'Product'           => Product::class,
            'PrivateNetwork'    => PrivateNetwork::class,
            'Vps'               => Vps::class,
            'Snapshot'          => Snapshot::class,
            'OperatingSystem'   => OperatingSystem::class,
        ];
    }
}
