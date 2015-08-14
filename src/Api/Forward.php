<?php

namespace HiddeCo\TransIP\Api;

/**
 * @author Hidde Beydals <hello@hidde.co>
 */
class Forward extends AbstractApi
{
    const SERVICE = 'ForwardService';

    /**
     * Get a list of all domain names which have the Forward option enabled.
     *
     * @throws \SoapFault
     *
     * @return string[] List of all forwards enabled domains
     */
    public function getForwardDomainNames()
    {
        return $this->call(self::SERVICE, 'getForwardDomainNames');
    }

    /**
     * Get information about a forwarded domain name.
     *
     * @param string $forwardDomainName Domain to get the information for
     *
     * @throws \SoapFault
     *
     * @return \HiddeCo\TransIP\Model\Forward
     */
    public function getInfo($forwardDomainName)
    {
        return $this->call(self::SERVICE, 'getInfo', [$forwardDomainName]);
    }

    /**
     * Order the Forward service for a domain name.
     *
     * @param \HiddeCo\TransIP\Model\Forward $forward Information about the Forward service to order.
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function order($forward)
    {
        return $this->call(self::SERVICE, 'order', [$forward]);
    }

    /**
     * Cancel the Forward service for a domain name.
     *
     * @param string $forwardDomainName Domain name to cancel the Forwarding service for
     * @param string $endTime           Time to cancel the service
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function cancel($forwardDomainName, $endTime)
    {
        return $this->call(self::SERVICE, 'cancel', [$forwardDomainName, $endTime]);
    }

    /**
     * Modify the options of a Forward service,
     * all fields set in the Forward object will be changed.
     *
     * @param \HiddeCo\TransIP\Model\Forward $forward Forward object to modify
     *
     * @throws \SoapFault
     *
     * @return mixed
     */
    public function modify($forward)
    {
        return $this->call(self::SERVICE, 'modify', [$forward]);
    }
}
