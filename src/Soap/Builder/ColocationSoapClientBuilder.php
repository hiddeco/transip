<?php

namespace HiddeCo\TransIP\Soap\Builder;

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
            'DataCenterVisitor' => 'HiddeCo\TransIP\Model\DataCenterVisitor'
        ];
    }
}