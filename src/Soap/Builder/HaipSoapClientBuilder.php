<?php

namespace TransIP\Soap\Builder;

use TransIP\Model\Haip;

/**
 * @author Hidde Beydals <hello@hidde.co>
 */
class HaipSoapClientBuilder extends SoapClientBuilder
{
    /**
     * {@inheritdoc}
     */
    protected function getWsdlPath()
    {
        return '/wsdl?service=HaipService';
    }

    /**
     * {@inheritdoc}
     */
    protected function getClassMap()
    {
        return [
            'Haip' => Haip::class,
        ];
    }
}
