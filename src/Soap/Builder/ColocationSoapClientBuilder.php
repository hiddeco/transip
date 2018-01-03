<?php

namespace TransIP\Soap\Builder;

use TransIP\Model\DataCenterVisitor;

/**
 * @author Hidde Beydals <hello@hidde.co>
 */
class ColocationSoapClientBuilder extends SoapClientBuilder
{
    /**
     * {@inheritdoc}
     */
    protected function getWsdlPath()
    {
        return '/wsdl?service=ColocationService';
    }

    /**
     * {@inheritdoc}
     */
    protected function getClassMap()
    {
        return [
            'DataCenterVisitor' => DataCenterVisitor::class,
        ];
    }
}
