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
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function getHaipPortConfigurations($haipName)
    {
        return $this->call(self::SERVICE, 'getHaipPortConfigurations', [$haipName]);
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
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function addHaipPortConfiguration($haipName, $name, $portNumber, $mode)
    {
        return $this->call(self::SERVICE, 'addHaipPortConfiguration', [$haipName, $name, $portNumber, $mode]);
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
     * Delete the port configuration for the HA-IP.
     *
     * @param string $haipName        The HA-IP name
     * @param int    $configurationId The configuration ID
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
