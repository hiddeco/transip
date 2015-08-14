<?php

namespace HiddeCo\TransIP\Model;

/**
 * @author Hidde Beydals <hello@hidde.co>
 */
class Nameserver
{
    /**
     * @var string
     */
    public $hostname;

    /**
     * @var string
     */
    public $ipv4;

    /**
     * @var string
     */
    public $ipv6;

    /**
     * @param string $hostname Hostname
     * @param string $ipv4     Ipv4 address
     * @param string $ipv6     Ipv6 address
     */
    public function __construct($hostname, $ipv4 = '', $ipv6 = '')
    {
        $this->hostname = $hostname;
        $this->ipv4 = $ipv4;
        $this->ipv6 = $ipv6;
    }
}
