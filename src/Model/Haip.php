<?php
declare(strict_types = 1);

namespace TransIP\Model;

class Haip
{
    /**
     * @var string
     */
    public $name = '';

    /**
     * @var string
     */
    public $status = '';

    /**
     * @var bool
     */
    public $isBlocked = false;

    /**
     * @var string
     */
    public $ipv4Address = '';

    /**
     * @var string
     */
    public $ipv6Address = '';

    /**
     * @var string
     */
    public $vpsName = '';

    /**
     * @var string
     */
    public $vpsIpv4Address = '';

    /**
     * @var string
     */
    public $vpsIpv6Address = '';
}
