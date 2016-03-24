<?php

namespace TransIP\Soap\Builder;

/**
 * @author Hidde Beydals <hello@hidde.co>
 */
interface SoapClientBuilderInterface
{
    /**
     * Set the login.
     *
     * @param string $login TransIP username
     *
     * @return void
     */
    public function setLogin($login);

    /**
     * Set the permission mode.
     *
     * @param string $mode Permission mode
     *
     * @return void
     */
    public function setMode($mode);

    /**
     * Set the client version.
     *
     * @param int $clientVersion TransIP client version
     *
     * @return void
     */
    public function setClientVersion($clientVersion);

    /**
     * Create a new WSDL url.
     *
     * @param string $endpoint TransIP API endpoint
     *
     * @return void
     */
    public function createWsdl($endpoint);

    /**
     * Create a new soap client instance.
     *
     * @return void
     */
    public function createSoapClient();

    /**
     * Get the soap client instance.
     *
     * @return \TransIP\Soap\SoapClient
     */
    public function getSoapClient();
}
