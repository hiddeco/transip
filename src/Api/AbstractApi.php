<?php

namespace HiddeCo\TransIP\Api;

use HiddeCo\TransIP\Client;

/**
 * @author Hidde Beydals <hello@hidde.co>
 */
abstract class AbstractApi implements ApiInterface
{
    /**
     * @var \HiddeCo\TransIP\Client
     */
    protected $client;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Make a SOAP call.
     *
     * @param string $service    WSDL service used for the call
     * @param string $method     Method used for the call
     * @param array  $parameters Parameters used for the call
     *
     * @return mixed
     */
    protected function call($service, $method, array $parameters = [])
    {
        return $this->getSoapClient($service, $method, $parameters)->__call($method, $parameters);
    }

    /**
     * Get the SOAP client and preset call parameters.
     *
     * @param string $service    WSDL service used for the call
     * @param string $method     Method used for the call
     * @param array  $parameters Parameters used for the call
     *
     * @return \HiddeCo\TransIP\Soap\SoapClient
     */
    private function getSoapClient($service, $method, array $parameters)
    {
        $timestamp = time();
        $nonce = uniqid(null, true);

        $soapClient = $this->client->buildSoapClient($service);
        $soapClient->setTimestamp($timestamp);
        $soapClient->setNonce($nonce);
        $soapClient->setSignature(array_merge($parameters, ['__method' => $method]), $this->client->getPrivateKey(), $service, $this->client->getEndpoint(), $timestamp, $nonce);

        return $soapClient;
    }
}
