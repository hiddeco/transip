<?php

namespace TransIP\Soap;

/**
 * @author Hidde Beydals <hello@hidde.co>
 */
class SoapClientFactory implements SoapClientFactoryInterface
{
    /**
     * Make a new SoapClient instance.
     *
     * @param string $wsdl     WSDL
     * @param array  $classMap Class map
     *
     * @return \TransIP\Soap\SoapClient
     */
    public function make($wsdl, array $classMap = [])
    {
        return new SoapClient($wsdl, [
            'trace'      => true,
            'exceptions' => true,
            'encoding'   => 'utf-8',
            'features'   => SOAP_SINGLE_ELEMENT_ARRAYS,
            'classmap'   => $classMap,
            'cache_wsdl' => WSDL_CACHE_MEMORY,
        ]);
    }
}
