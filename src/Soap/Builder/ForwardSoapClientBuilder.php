<?php

namespace TransIP\Soap\Builder;

use TransIP\Model\Forward;

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
            'Forward' => Forward::class,
        ];
    }
}
