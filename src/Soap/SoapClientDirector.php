<?php

namespace TransIP\Soap;

use TransIP\Soap\Builder\SoapClientBuilderInterface;

/**
 * @author Hidde Beydals <hello@hidde.co>
 */
class SoapClientDirector
{
    const CLIENT_VERSION = 5.8;

    /**
     * @var string
     */
    protected $login;

    /**
     * @var string
     */
    protected $mode;

    /**
     * @var string
     */
    protected $endpoint;

    /**
     * Construct the SOAP client director.
     *
     * @param string $login    TransIP login
     * @param string $mode     Permission mode
     * @param string $endpoint TransIP endpoint
     */
    public function __construct($login, $mode, $endpoint)
    {
        $this->login = $login;
        $this->mode = $mode;
        $this->endpoint = $endpoint;
    }

    /**
     * Build the the SOAP client.
     *
     * @param SoapClientBuilderInterface $builder
     *
     * @return SoapClient
     */
    public function build(SoapClientBuilderInterface $builder)
    {
        $builder->createWsdl($this->endpoint);
        $builder->createSoapClient();
        $builder->setLogin($this->login);
        $builder->setMode($this->mode);
        $builder->setClientVersion(self::CLIENT_VERSION);

        return $builder->getSoapClient();
    }
}
