<?php

namespace TransIP\Soap\Builder;

/**
 * @author Hidde Beydals <hello@hidde.co>
 */
class ForwardSoapClientBuilder extends SoapClientBuilder
{
    /**
     * {@inheritdoc}
     */
    protected function getWsdlPath()
    {
        return '/wsdl?service=ForwardService';
    }

    /**
     * {@inheritdoc}
     */
    protected function getClassMap()
    {
        return [
            'Forward' => 'TransIP\Model\Forward',
        ];
    }
}
