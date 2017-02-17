<?php

namespace TransIP;

/**
 * The better TransIP SOAP client.
 *
 * @method Api\Colocation colocation()
 * @method Api\Colocation colocation_service()
 * @method Api\Colocation colocationService()
 * @method Api\Domain     domain()
 * @method Api\Domain     domain_service()
 * @method Api\Domain     domainService()
 * @method Api\Forward    forward()
 * @method Api\Forward    forward_service()
 * @method Api\Forward    forwardService()
 * @method Api\Vps        vps()
 * @method Api\Vps        vps_service()
 * @method Api\Vps        vpsService()
 * @method Api\WebHosting hosting()
 * @method Api\WebHosting web_hosting()
 * @method Api\WebHosting webHosting()
 * @method Api\WebHosting web_hosting_service()
 * @method Api\WebHosting webHostingService()
 * @method Api\Haip       haip()
 * @method Api\Haip       ha_ip()
 * @method Api\Haip       ha_ip_service()
 * @method Api\Haip       haip_service()
 * @method Api\Haip       haipService()
 *
 * @author Hidde Beydals <hello@hidde.co>
 */
class Client
{
    /**
     * @var string TransIP username
     */
    protected $username;

    /**
     * @var string TransIP private key
     */
    protected $privateKey;

    /**
     * @var string Accepted permission modes
     */
    protected $acceptedModes = [
        'readwrite',
        'readonly',
    ];

    /**
     * @var string Permission mode
     */
    protected $mode;

    /**
     * @var string TransIP endpoint
     */
    protected $endpoint;

    /**
     * Construct the TransIP client.
     *
     * @param string $username   TransIP username
     * @param string $privateKey TransIP private key
     * @param string $mode       Permission mode
     * @param string $endpoint   TransIP endpoint
     */
    public function __construct($username, $privateKey, $mode = 'readwrite', $endpoint = 'api.transip.nl')
    {
        $this->username = $username;
        $this->privateKey = $privateKey;
        $this->endpoint = $endpoint;

        $this->setMode($mode);
    }

    /**
     * Get the API.
     *
     * @param string $name Name/alias of the API
     *
     * @throws \InvalidArgumentException
     *
     * @return \TransIP\Api\ApiInterface
     */
    public function api($name)
    {
        switch ($name) {
            case 'domain':
            case 'domain_service':
            case 'domainService':
                return new Api\Domain($this);

            case 'colocation':
            case 'colocation_service':
            case 'colocationService':
                return new Api\Colocation($this);

            case 'forward':
            case 'forward_service':
            case 'forwardService':
                return new Api\Forward($this);

            case 'vps':
            case 'vps_service':
            case 'vpsService':
                return new Api\Vps($this);

            case 'hosting':
            case 'web_hosting':
            case 'webHosting':
            case 'web_hosting_service':
            case 'webHostingService':
                return new Api\WebHosting($this);

            case 'haip':
            case 'ha_ip':
            case 'ha_ip_service':
            case 'haip_service':
            case 'haipService':
                return new Api\Haip($this);

            default:
                throw new \InvalidArgumentException(sprintf('Undefined api instance called: [%s]', $name));
        }
    }

    /**
     * Build the SOAP client for the given service.
     *
     * @param string $service Name of the service to build the SOAP client for
     *
     * @throws \InvalidArgumentException
     *
     * @return \TransIP\Soap\SoapClient
     */
    public function buildSoapClient($service)
    {
        $director = new Soap\SoapClientDirector($this->username, $this->mode, $this->endpoint);

        switch ($service) {
            case 'DomainService':
                return $director->build(new Soap\Builder\DomainSoapClientBuilder);
            case 'ColocationService':
                return $director->build(new Soap\Builder\ColocationSoapClientBuilder);
            case 'ForwardService':
                return $director->build(new Soap\Builder\ForwardSoapClientBuilder);
            case 'VpsService':
                return $director->build(new Soap\Builder\VpsSoapClientBuilder);
            case 'WebhostingService':
                return $director->build(new Soap\Builder\WebHostingSoapClientBuilder);
            case 'HaipService':
                return $director->build(new Soap\Builder\HaipSoapClientBuilder);
            default:
                throw new \InvalidArgumentException(sprintf('Undefined soap client service builder called: [%s]', $service));
        }
    }

    /**
     * Set the permission mode.
     *
     * @param string $mode Permission mode
     *
     * @throws \InvalidArgumentException
     *
     * @return void
     */
    public function setMode($mode)
    {
        if (!in_array($mode, $this->acceptedModes)) {
            throw new \InvalidArgumentException(sprintf('Invalid mode: [%s]', $mode));
        }

        $this->mode = $mode;
    }

    /**
     * Get the private key.
     *
     * @return string
     */
    public function getPrivateKey()
    {
        return $this->privateKey;
    }

    /**
     * Get the endpoint.
     *
     * @return string
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * Let some magic happen.
     *
     * @param string $name
     *
     * @throws \InvalidArgumentException
     *
     * @return \TransIP\Api\ApiInterface
     */
    public function __call($name, $args)
    {
        try {
            return $this->api($name);
        } catch (\InvalidArgumentException $e) {
            throw new \BadMethodCallException(sprintf('Undefined method called: [%s]', $name));
        }
    }
}
