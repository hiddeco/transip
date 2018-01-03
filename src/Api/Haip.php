<?php

namespace TransIP\Api;

class Haip extends AbstractApi
{
    const SERVICE = 'HaipService';

    /**
     * Get a HA-IP by name.
     *
     * @param string $haipName The HA-IP name
     *
     * @throws \SoapFault
     *
     * @return \TransIP\Model\Haip
     */
    public function getHaip($haipName)
    {
        return $this->call(self::SERVICE, 'getHaip', [$haipName]);
    }

    /**
     * Get all HA-IPs.
     *
     * @throws \SoapFault
     *
     * @return \TransIP\Model\Haip[]
     */
    public function getHaips()
    {
        return $this->call(self::SERVICE, 'getHaips');
    }

    /**
     * Changes the VPS connected to the HA-IP.
     *
     * @param string $haipName The HA-IP name
     * @param string $vpsName  The VPS name
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function changeHaipVps($haipName, $vpsName)
    {
        return $this->call(self::SERVICE, 'changeHaipVps', [$haipName, $vpsName]);
    }

    /**
     * Replaces the currently attached VPSes to the HA-IP with the provided list.
     *
     * @param string   $haipName The HA-IP name
     * @param string[] $vpsNames The VPS names
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function setHaipVpses($haipName, $vpsNames)
    {
        return $this->call(self::SERVICE, 'setHaipVpses', [$haipName, $vpsNames]);
    }

    /**
     * Sets the provided IP setup for the HA-IP.
     *
     * @param string $haipName The HA-IP name
     * @param string $ipSetup  ('both', 'noipv6', 'ipv6to4')
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function setIpSetup($haipName, $ipSetup)
    {
        return $this->call(self::SERVICE, 'setIpSetup', [$haipName, $ipSetup]);
    }

    /**
     * Sets the provided balancing mode for the HA-IP.
     *
     * The cookie name is expected to be an empty string unless the balancing mode is set to 'cookie'.
     *
     * HA-IP Pro feature.
     *
     * @param string $haipName      The HA-IP name
     * @param string $balancingMode ('roundrobin', 'cookie', 'source)
     * @param string $cookieName    The cookie name that pins the session if the balancing mode is 'cookie'
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function setBalancingMode($haipName, $balancingMode, $cookieName = '')
    {
        return $this->call(self::SERVICE, 'setBalancingMode', [$haipName, $balancingMode, $cookieName]);
    }

    /**
     * Configures the HTTP health check for the HA-IP. To disable use Haip::setTcpHealthCheck.
     *
     * HA-IP Pro feature.
     *
     * @param string $haipName  The HA-IP name
     * @param string $path      The path that will be accessed when performing health checks
     * @param int    $port      The port that will be used when performing health checks
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function setHttpHealthCheck($haipName, $path, $port)
    {
        return $this->call(self::SERVICE, 'setHttpHealthCheck', [$haipName, $path, $port]);
    }

    /**
     * Configures a TCP health check for the HA-IP. This is the default health check.
     *
     * HA-IP Pro feature.
     *
     * @param string $haipName The HA-IP name
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function setTcpHealthCheck($haipName)
    {
        return $this->call(self::SERVICE, 'setTcpHealthCheck', [$haipName]);
    }

    /**
     * Get a status report for the HA-IP.
     *
     * @param string $haipName The HA-IP name
     *
     * @throws \SoapFault
     *
     * @return array
     */
    public function getStatusReport($haipName)
    {
        return $this->call(self::SERVICE, 'getStatusReport', [$haipName]);
    }

    /**
     * Get all certificates for the HA-IP.
     *
     * @param string $haipName The HA-IP name
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function getCertificatesByHaip($haipName)
    {
        return $this->call(self::SERVICE, 'getCertificatesByHaip', [$haipName]);
    }

    /**
     * Get all available certificates ready to attach to your HA-IP.
     *
     * @param string $haipName The HA-IP name
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function getAvailableCertificatesByHaip($haipName)
    {
        return $this->call(self::SERVICE, 'getAvailableCertificatesByHaip', [$haipName]);
    }

    /**
     * Add a certificate to the HA-IP.
     *
     * @param string $haipName      The HA-IP name
     * @param int    $certificateId The certificate ID
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function addCertificateToHaip($haipName, $certificateId)
    {
        return $this->call(self::SERVICE, 'addCertificateToHaip', [$haipName, $certificateId]);
    }

    /**
     * Remove a certificate from the HA-IP.
     *
     * @param string $haipName      The HA-IP name
     * @param int    $certificateId The certificate ID
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function deleteCertificateFromHaip($haipName, $certificateId)
    {
        return $this->call(self::SERVICE, 'deleteCertificateFromHaip', [$haipName, $certificateId]);
    }

    /**
     * Add a LetsEncrypt certificate to the HA-IP.
     *
     * @param string $haipName   The HA-IP name
     * @param string $commonName The common name
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function startHaipLetsEncryptCertificateIssue($haipName, $commonName)
    {
        return $this->call(self::SERVICE, 'startHaipLetsEncryptCertificateIssue', [$haipName, $commonName]);
    }

    /**
     * Returns the current ptr for the given HA-IP.
     *
     * @param string $haipName The HA-IP name
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function getPtrForHaip($haipName)
    {
        return $this->call(self::SERVICE, 'getPtrForHaip', [$haipName]);
    }

    /**
     * Update the ptr record for the given HA-IP.
     *
     * @param string $haipName The HA-IP name
     * @param string $ptr      The ptr record
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function setPtrForHaip($haipName, $ptr)
    {
        return $this->call(self::SERVICE, 'setPtrForHaip', [$haipName, $ptr]);
    }

    /**
     * Update the description for the HA-IP.
     *
     * @param string $haipName    The HA-IP name
     * @param string $description The HA-IP description
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function setHaipDescription($haipName, $description)
    {
        return $this->call(self::SERVICE, 'setHaipDescription', [$haipName, $description]);
    }

    /**
     * Get all port configurations for the HA-IP.
     *
     * @param string $haipName The HA-IP name
     *
     * @deprecated 5.6
     * @see Haip::getPortConfigurations()
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function getHaipPortConfigurations($haipName)
    {
        return $this->call(self::SERVICE, 'getHaipPortConfigurations', [$haipName]);
    }

    /**
     * Get all port configurations for the HA-IP.
     *
     * @param string $haipName The HA-IP name
     *
     * @throws \SoapFault
     *
     * @return array
     */
    public function getPortConfigurations($haipName)
    {
        return $this->call(self::SERVICE, 'getPortConfigurations', [$haipName]);
    }

    /**
     * Set the default port configuration for the HA-IP.
     *
     * @param string $haipName The HA-IP name
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function setDefaultPortConfiguration($haipName)
    {
        return $this->call(self::SERVICE, 'setDefaultPortConfiguration', [$haipName]);
    }

    /**
     * Add port configuration to the HA-IP.
     *
     * @param string $haipName   The HA-IP name
     * @param string $name       The port name
     * @param int    $portNumber The port number
     * @param string $mode       ('tcp','http','https','proxy')
     *
     * @deprecated 5.6
     * @see Haip::addPortConfiguration()
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function addHaipPortConfiguration($haipName, $name, $portNumber, $mode)
    {
        return $this->call(self::SERVICE, 'addHaipPortConfiguration', [$haipName, $name, $portNumber, $mode]);
    }

    /**
     * Add port configuration to the HA-IP.
     *
     * @param string $haipName       The HA-IP name
     * @param string $name           The name describing the port configuration
     * @param int    $sourcePort     The port that is addressed on the HA-IP
     * @param int    $targetPort     The port that is addressed on the VPS
     * @param string $mode           ('tcp', 'http', 'https', 'proxy')
     * @param string $endointSslMode ('off, 'on' strict')
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function addPortConfiguration($haipName, $name, $sourcePort, $targetPort, $mode, $endointSslMode)
    {
        $this->call(
            self::SERVICE,
            'addPortConfiguration',
            [$haipName, $name, $sourcePort, $targetPort, $mode, $endointSslMode]
        );
    }

    /**
     * Update port configuration for the HA-IP.
     *
     * @param string $haipName        The HA-IP name
     * @param int    $configurationId The configuration ID
     * @param string $name            The port name
     * @param int    $portNumber      The port number
     * @param string $mode            ('tcp','http','https','proxy')
     *
     * @deprecated 5.6
     * @see Haip::updatePortConfiguration()
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function updateHaipPortConfiguration($haipName, $configurationId, $name, $portNumber, $mode)
    {
        return $this->call(
            self::SERVICE,
            'updateHaipPortConfiguration',
            [$haipName, $configurationId, $name, $portNumber, $mode]
        );
    }

    /**
     * Update port configuration for the HA-IP.
     *
     * @param string $haipName        The HA-IP name
     * @param int    $configurationId The configuration ID
     * @param string $name            The name describing the port configuration
     * @param int    $sourcePort      The port that is addressed on the HA-IP
     * @param int    $targetPort      The port that is addressed on the VPS
     * @param string $mode            ('tcp', 'http', 'https', 'proxy')
     * @param string $endointSslMode  ('off, 'on' strict')
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function updatePortConfiguration(
        $haipName,
        $configurationId,
        $name,
        $sourcePort,
        $targetPort,
        $mode,
        $endointSslMode
    ) {
        $this->call(
            self::SERVICE,
            'updatePortConfiguration',
            [$haipName, $configurationId, $name, $sourcePort, $targetPort, $mode, $endointSslMode]
        );
    }

    /**
     * Delete the port configuration for the HA-IP.
     *
     * @param string $haipName        The HA-IP name
     * @param int    $configurationId The configuration ID
     *
     * @deprecated 5.6
     * @see Haip::deletePortConfiguration()
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function deleteHaipPortConfiguration($haipName, $configurationId)
    {
        return $this->call(self::SERVICE, 'deleteHaipPortConfiguration', [$haipName, $configurationId]);
    }

    /**
     * Delete the port configuration for the HA-IP.
     *
     * @param string $haipName     The HA-IP name
     * @param int $configurationId The configuration ID
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function deletePortConfiguration($haipName, $configurationId)
    {
        return $this->call(self::SERVICE, 'deletePortConfiguration', [$haipName, $configurationId]);
    }

    /**
     * Cancel the HA-IP.
     *
     * @param string $haipName The HA-IP name
     * @param string $endTime  The time to cancel the HA-IP
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function cancelHaip($haipName, $endTime)
    {
        return $this->call(self::SERVICE, 'cancelHaip', [$haipName, $endTime]);
    }
}
