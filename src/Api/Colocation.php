<?php

namespace HiddeCo\TransIP\Api;

/**
 * @author Hidde Beydals <hello@hidde.co>
 */
class Colocation extends AbstractApi
{
    const SERVICE = 'ColocationService';

    /**
     * Request access to the data-center.
     *
     * @param string   $when        Datetime of the wanted data-center access, in YYYY-MM-DD hh:mm:ss format
     * @param int      $duration    Expected duration of the visit, in minutes
     * @param string[] $visitors    Names of the visitors for this data-center visit, max amount of visitors is 20
     * @param string   $phoneNumber Phone number to receive access codes on
     *
     * @return \HiddeCo\TransIP\Model\DataCenterVisitor[]
     *
     * @throws \SoapFault
     */
    public function requestAccess($when, $duration, array $visitors, $phoneNumber)
    {
        return $this->call(self::SERVICE, 'requestAccess', [$when, $duration, $visitors, $phoneNumber]);
    }

    /**
     * Request remote hands to the data-center.
     *
     * @param string $colocationName   Name of the colocation
     * @param string $contactName      Contact name
     * @param string $phoneNumber      Phone number to contact
     * @param int    $expectedDuration Expected duration of the job in minutes
     * @param string $instructions     Instructions on what to do
     *
     * @return mixed
     *
     * @throws \SoapFault
     */
    public function requestRemoteHands($colocationName, $contactName, $phoneNumber, $expectedDuration, $instructions)
    {
        return $this->call(self::SERVICE, 'requestRemoteHands', [$colocationName, $contactName, $phoneNumber, $expectedDuration, $instructions]);
    }

    /**
     * Get colocation names.
     *
     * @return string[]
     *
     * @throws \SoapFault
     */
    public function getColocationNames()
    {
        return $this->call(self::SERVICE, 'getColoNames');
    }

    /**
     * Get active IP addresses that are assigned to a colocation.
     * Both ipv4 (dot notation) and ipv6 addresses (ipv6 presentation) are returned.
     *
     * @param string $colocationName Name of the colocation to get the IP addresses for
     *
     * @return string[]
     *
     * @throws \SoapFault
     */
    public function getIpAddresses($colocationName)
    {
        return $this->call(self::SERVICE, 'getIpAddresses', [$colocationName]);
    }

    /**
     * Get IP ranges that are assigned to a colocation.
     * Both ipv4 and ipv6 ranges are returned in CIDR notation.
     *
     * @see https://en.wikipedia.org/wiki/Classless_Inter-Domain_Routing
     *
     * @param string $colocationName Name of the colocation to get the ranges for
     *
     * @return string[]
     *
     * @throws \SoapFault
     */
    public function getIpRanges($colocationName)
    {
        return $this->call(self::SERVICE, 'getIpRanges', [$colocationName]);
    }

    /**
     * Create a new IP address, either ipv4 or ipv6.
     *
     * The service will validate the address, ensure the user is entitled
     * to the address and will add the address to the correct colocation
     * and range.
     *
     * @param string $ipAddress  IP address to create, can be ipv4 or ipv6
     * @param string $reverseDns Reverse DNS name for this IP address
     *
     * @return mixed
     *
     * @throws \SoapFault
     */
    public function createIpAddress($ipAddress, $reverseDns)
    {
        return $this->call(self::SERVICE, 'createIpAddress', [$ipAddress, $reverseDns]);
    }

    /**
     * Delete an IP address, either ipv4 or ipv6.
     *
     * The service will validate the address, ensure the user is entitled
     * to remove the address and will remove it completely, together with
     * any Reverse DNS and monitoring assined to the address.
     *
     * @param string $ipAddress IP address to delete, can be ipv6 or ipv6
     *
     * @return mixed
     *
     * @throws \SoapFault
     */
    public function deleteIpAddress($ipAddress)
    {
        return $this->call(self::SERVICE, 'deleteIpAddress', [$ipAddress]);
    }

    /**
     * Get the Reverse DNS for an IP address assigned to the user.
     *
     * @param string $ipAddress IP address, can be ipv4 or ipv6
     *
     * @return string
     *
     * @throws \SoapFault
     */
    public function getReverseDns($ipAddress)
    {
        return $this->call(self::SERVICE, 'getReverseDns', [$ipAddress]);
    }

    /**
     * Set the Reverse DNS name for an IP address.
     *
     * @param string $ipAddress  IP address to set the Reverse DNS for, can be ipv4 or ipv6
     * @param string $reverseDns New Reverse DNS, must be a valid value
     *
     * @return mixed
     *
     * @throws \SoapFault
     */
    public function setReverseDns($ipAddress, $reverseDns)
    {
        return $this->call(self::SERVICE, 'setReverseDns', [$ipAddress, $reverseDns]);
    }
}