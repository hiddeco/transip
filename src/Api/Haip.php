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
}
