<?php

namespace TransIP\Soap\Builder;

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
            'Haip' => 'TransIP\Model\Haip',
        ];
    }
}
