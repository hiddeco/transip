<?php

namespace TransIP\Soap\Builder;

use TransIP\Soap\SoapClientFactory;

/**
 * @author Hidde Beydals <hello@hidde.co>
 */
abstract class SoapClientBuilder implements SoapClientBuilderInterface
{
    /**
     * @var \TransIP\Soap\SoapClient
     */
    protected $soapClient;

    /**
     * @var string
     */
    protected $wsdl;

    /**
     * {@inheritdoc}
     */
    public function setLogin($login)
    {
        $this->soapClient->setLogin($login);
    }

    /**
     * {@inheritdoc}
     */
    public function setMode($mode)
    {
        $this->soapClient->setMode($mode);
    }

    /**
     * {@inheritdoc}
     */
    public function setClientVersion($clientVersion)
    {
        $this->soapClient->setClientVersion($clientVersion);
    }

    /**
     * {@inheritdoc}
     */
    public function createWsdl($endpoint)
    {
        $this->wsdl = sprintf('https://%s'.$this->getWsdlPath(), $endpoint);
    }

    /**
     * {@inheritdoc}
     */
    public function createSoapClient()
    {
        $factory = new SoapClientFactory();
        $this->soapClient = $factory->make($this->wsdl, $this->getClassMap());
    }

    /**
     * {@inheritdoc}
     */
    public function getSoapClient()
    {
        return $this->soapClient;
    }

    /**
     * Get the Wsdl path.
     *
     * @return string
     */
    abstract protected function getWsdlPath();

    /**
     * Get the SOAP class map.
     *
     * @return array
     */
    abstract protected function getClassMap();
}
